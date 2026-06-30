<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Installment;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Notifications\InstallmentStatusUpdated;
use Illuminate\Support\Facades\Notification;

class AdminInstallmentController extends Controller
{
    public function index()
    {
        $installments = Installment::with(['loan.user'])
            ->whereNotNull('proof_of_payment')
            ->orderByRaw("CASE WHEN status = 'unpaid' THEN 1 ELSE 2 END")
            ->orderBy('created_at', 'asc')
            ->paginate(15);
            
        return view('admin.installments.index', compact('installments'));
    }

    public function approve(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $installment = Installment::with('loan')->findOrFail($id);
            
            if ($installment->status !== 'unpaid' || !$installment->proof_of_payment) {
                return back()->with('error', 'Cicilan ini tidak valid untuk disetujui.');
            }

            $installment->status = 'paid';
            $installment->paid_at = Carbon::now();
            $installment->save();

            // Cek apakah semua cicilan untuk loan ini sudah lunas
            $loan = $installment->loan;
            $unpaidCount = Installment::where('loan_id', $loan->id)
                ->where('status', '!=', 'paid')
                ->count();

            if ($unpaidCount === 0) {
                $loan->status = 'paid_off';
                $loan->save();
            }

            DB::commit();

            // Notify Member
            Notification::send($loan->user, new InstallmentStatusUpdated($installment, 'paid'));

            return back()->with('success', 'Pembayaran cicilan berhasil divalidasi!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    
    public function reject(Request $request, $id)
    {
        $installment = Installment::findOrFail($id);
        
        if ($installment->status !== 'unpaid' || !$installment->proof_of_payment) {
            return back()->with('error', 'Cicilan ini tidak valid untuk ditolak.');
        }

        // Hapus bukti pembayaran agar member bisa mengunggah ulang
        $installment->proof_of_payment = null;
        $installment->save();

        // Notify Member
        $installment->load('loan.user');
        Notification::send($installment->loan->user, new InstallmentStatusUpdated($installment, 'rejected'));

        return back()->with('success', 'Pembayaran cicilan ditolak. Nasabah dapat mengunggah bukti baru.');
    }
}
