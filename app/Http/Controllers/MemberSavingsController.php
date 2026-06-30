<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\SavingsTransaction;
use App\Models\User;
use App\Notifications\NewSavingsDeposit;
use Illuminate\Support\Facades\Notification;

class MemberSavingsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $transactions = SavingsTransaction::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('savings.index', compact('user', 'transactions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:wajib,sukarela',
            'amount' => 'required|numeric|min:10000',
            'proof_of_payment' => 'required|image|max:2048',
        ]);

        $proofPath = $request->file('proof_of_payment')->store('documents/savings', 'public');

        $transaction = SavingsTransaction::create([
            'user_id' => Auth::id(),
            'type' => $request->type,
            'amount' => $request->amount,
            'type_trx' => 'credit', // Setoran masuk ke koperasi
            'proof_of_payment' => $proofPath,
            'status' => 'pending'
        ]);

        // Notify Admins
        $admins = User::where('role', 'admin')->get();
        Notification::send($admins, new NewSavingsDeposit($transaction, Auth::user()->name));

        return redirect()->route('savings.index')->with('success', 'Setoran berhasil diajukan dan sedang menunggu validasi Admin.');
    }
}
