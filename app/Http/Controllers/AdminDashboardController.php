<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\SavingsTransaction;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $pendingLoans = Loan::where('status', 'pending')->count();
        $pendingSavings = SavingsTransaction::where('status', 'pending')->count();
        $totalMembers = User::where('role', 'member')->count();

        return view('admin.dashboard', compact('pendingLoans', 'pendingSavings', 'totalMembers'));
    }
}
