<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Loan;

class MemberDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Ambil data pinjaman aktif
        $activeLoan = Loan::where('user_id', $user->id)
            ->whereIn('status', ['pending', 'approved', 'active'])
            ->with('installments')
            ->first();

        // Ambil tagihan terdekat jika ada pinjaman aktif
        $nextInstallment = null;
        if ($activeLoan && in_array($activeLoan->status, ['active', 'approved'])) {
            $nextInstallment = $activeLoan->installments()
                ->where('status', 'unpaid')
                ->orderBy('due_date', 'asc')
                ->first();
        }

        return view('dashboard', compact('user', 'activeLoan', 'nextInstallment'));
    }
}
