<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SavingsTransaction;
use Illuminate\Support\Facades\DB;
use App\Notifications\SavingsStatusUpdated;
use Illuminate\Support\Facades\Notification;

class AdminSavingsController extends Controller
{
    public function index()
    {
        $transactions = SavingsTransaction::with('user')
            ->orderByRaw("CASE WHEN status = 'pending' THEN 1 ELSE 2 END")
            ->orderBy('created_at', 'desc')
            ->paginate(15);
            
        return view('admin.savings.index', compact('transactions'));
    }

    public function approve(Request $request, $id)
    {
        $transaction = SavingsTransaction::findOrFail($id);
        
        if ($transaction->status !== 'pending') {
            return back()->with('error', 'Transaksi ini sudah diproses.');
        }

        try {
            DB::beginTransaction();

            // Update status
            $transaction->status = 'approved';
            $transaction->save();

            // Tambahkan ke saldo user
            $user = $transaction->user;
            if ($transaction->type === 'wajib') {
                $user->balance_wajib += $transaction->amount;
            } else if ($transaction->type === 'sukarela') {
                $user->balance_sukarela += $transaction->amount;
            } else if ($transaction->type === 'pokok') {
                $user->balance_pokok += $transaction->amount;
            }
            $user->save();

            DB::commit();

            // Notify Member
            Notification::send($user, new SavingsStatusUpdated($transaction, 'approved'));

            return back()->with('success', 'Setoran berhasil disetujui dan ditambahkan ke saldo nasabah.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menyetujui setoran: ' . $e->getMessage());
        }
    }

    public function reject(Request $request, $id)
    {
        $transaction = SavingsTransaction::findOrFail($id);
        
        if ($transaction->status !== 'pending') {
            return back()->with('error', 'Transaksi ini sudah diproses.');
        }

        $transaction->status = 'rejected';
        $transaction->save();

        // Notify Member
        Notification::send($transaction->user, new SavingsStatusUpdated($transaction, 'rejected'));

        return back()->with('success', 'Setoran telah ditolak.');
    }
}
