<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Installment;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\NewInstallmentPayment;
use Illuminate\Support\Facades\Notification;

class MemberInstallmentController extends Controller
{
    public function show($id)
    {
        $loan = Loan::with(['installments', 'rule'])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('loans.show', compact('loan'));
    }

    public function pay(Request $request, $id)
    {
        $request->validate([
            'proof_of_payment' => 'required|image|max:2048',
        ]);

        $installment = Installment::whereHas('loan', function($query) {
            $query->where('user_id', Auth::id());
        })->findOrFail($id);

        if ($installment->status !== 'unpaid') {
            return back()->with('error', 'Cicilan ini sudah dibayar atau sedang menunggu validasi.');
        }

        $proofPath = $request->file('proof_of_payment')->store('documents/installments', 'public');

        $installment->proof_of_payment = $proofPath;
        $installment->save();

        // Notify Admins
        $admins = User::where('role', 'admin')->get();
        Notification::send($admins, new NewInstallmentPayment($installment, Auth::user()->name));

        return back()->with('success', 'Bukti pembayaran berhasil diunggah. Menunggu verifikasi admin.');
    }
}
