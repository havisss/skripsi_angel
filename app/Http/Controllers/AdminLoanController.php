<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\SavingsTransaction;
use App\Models\Installment;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Notifications\LoanStatusUpdated;
use Illuminate\Support\Facades\Notification;

class AdminLoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with('user')
            ->orderByRaw("CASE WHEN status = 'pending' THEN 1 ELSE 2 END")
            ->orderBy('created_at', 'desc')
            ->paginate(15);
            
        return view('admin.loans.index', compact('loans'));
    }

    public function approve(Request $request, $id)
    {
        $loan = Loan::findOrFail($id);
        
        if ($loan->status !== 'pending') {
            return back()->with('error', 'Pinjaman ini sudah diproses sebelumnya.');
        }

        try {
            DB::beginTransaction();

            // 1. Update status pinjaman
            $loan->status = 'approved';
            $loan->save();

            // 2. Distribusikan Simpanan Wajib (dari potongan) ke SavingsTransaction
            $mandatorySavingsDeduction = $loan->rule->mandatory_savings_flat;
            if ($mandatorySavingsDeduction > 0) {
                SavingsTransaction::create([
                    'user_id' => $loan->user_id,
                    'type' => 'wajib',
                    'amount' => $mandatorySavingsDeduction,
                    'type_trx' => 'credit',
                    'status' => 'approved',
                ]);
                
                // Tambahkan langsung ke saldo nasabah
                $user = $loan->user;
                $user->balance_wajib += $mandatorySavingsDeduction;
                $user->save();
            }

            // 3. Auto-Generate Cicilan (Installments)
            // Asumsi: Cicilan pertama jatuh tempo bulan depan dari tanggal disetujui.
            $startDate = Carbon::now();
            $tenor = $loan->rule->tenor_months;
            
            // Hitung cicilan per bulan
            $bungaFlat = ($loan->principal_amount * ($loan->rule->interest_rate_monthly / 100));
            $pokokPerBulan = $loan->principal_amount / $tenor;
            $totalAngsuran = $pokokPerBulan + $bungaFlat;

            for ($i = 1; $i <= $tenor; $i++) {
                Installment::create([
                    'loan_id' => $loan->id,
                    'due_date' => $startDate->copy()->addMonths($i)->format('Y-m-d'),
                    'amount_principal' => $pokokPerBulan,
                    'amount_interest' => $bungaFlat,
                    'status' => 'unpaid',
                ]);
            }

            DB::commit();

            // Notify Member
            Notification::send($loan->user, new LoanStatusUpdated($loan, 'approved'));

            return back()->with('success', 'Pinjaman disetujui! Potongan simpanan wajib telah dialokasikan dan jadwal cicilan berhasil dibuat otomatis.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menyetujui pinjaman: ' . $e->getMessage());
        }
    }

    public function reject(Request $request, $id)
    {
        $loan = Loan::findOrFail($id);
        
        if ($loan->status !== 'pending') {
            return back()->with('error', 'Pinjaman ini sudah diproses sebelumnya.');
        }

        $request->validate([
            'rejection_note' => 'required|string|max:255'
        ]);

        $loan->status = 'rejected';
        $loan->rejection_note = $request->rejection_note;
        $loan->save();

        // Notify Member
        Notification::send($loan->user, new LoanStatusUpdated($loan, 'rejected'));

        return back()->with('success', 'Pinjaman telah ditolak.');
    }
}
