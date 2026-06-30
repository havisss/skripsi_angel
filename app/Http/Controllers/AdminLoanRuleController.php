<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoanRule;

class AdminLoanRuleController extends Controller
{
    public function index()
    {
        $rules = LoanRule::orderBy('tenor_months', 'asc')->get();
        return view('admin.rules.index', compact('rules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tenor_months' => 'required|integer|min:1',
            'interest_rate_monthly' => 'required|numeric|min:0',
            'admin_fee_percentage' => 'required|numeric|min:0',
            'insurance_fee_percentage' => 'required|numeric|min:0',
            'mandatory_savings_flat' => 'required|numeric|min:0',
            'is_active' => 'boolean'
        ]);

        LoanRule::create([
            'tenor_months' => $request->tenor_months,
            'interest_rate_monthly' => $request->interest_rate_monthly,
            'admin_fee_percentage' => $request->admin_fee_percentage,
            'insurance_fee_percentage' => $request->insurance_fee_percentage,
            'mandatory_savings_flat' => $request->mandatory_savings_flat,
            'is_active' => $request->has('is_active'),
        ]);

        return back()->with('success', 'Paket pinjaman baru berhasil ditambahkan.');
    }

    public function toggleStatus($id)
    {
        $rule = LoanRule::findOrFail($id);
        $rule->is_active = !$rule->is_active;
        $rule->save();

        $statusStr = $rule->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return back()->with('success', "Paket pinjaman berhasil {$statusStr}.");
    }
}
