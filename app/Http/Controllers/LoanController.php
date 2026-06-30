<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoanRequest $request)
    {
        $principalAmount = $request->validated('principal_amount');
        
        // 1. Dapatkan Loan Rule (Tier) berdasarkan nominal (IF/AND Logic)
        $rule = \App\Models\LoanRule::where('min_plafon', '<=', $principalAmount)
                        ->where('max_plafon', '>=', $principalAmount)
                        ->first();

        if (!$rule) {
            return redirect()->back()->withErrors(['principal_amount' => 'Aturan pinjaman tidak ditemukan untuk nominal ini.']);
        }

        // 2. Kalkulasi Otomatis (Saat Pencairan)
        $adminFee = ($principalAmount * $rule->admin_fee_percent) / 100;
        $insuranceFee = ($principalAmount * $rule->insurance_fee_percent) / 100;
        $mandatorySavings = $rule->mandatory_savings_flat;

        $totalDeduction = $adminFee + $insuranceFee + $mandatorySavings;
        $netDisbursement = $principalAmount - $totalDeduction;

        // 3. Simpan data Pengajuan Pinjaman (fact_loans)
        \Illuminate\Support\Facades\DB::beginTransaction();
        try {
            $loan = \App\Models\Loan::create([
                // Sementara fallback ke user id 1 jika tidak ada session auth untuk keperluan testing
                'user_id' => auth()->id() ?? 1, 
                'rule_id' => $rule->id,
                'principal_amount' => $principalAmount,
                'net_disbursement' => $netDisbursement,
                'total_deduction' => $totalDeduction,
                'status' => 'pending' // Menunggu approval Admin
            ]);

            \Illuminate\Support\Facades\DB::commit();

            return redirect()->back()->with('success', 'Pengajuan pinjaman berhasil dibuat dan sedang menunggu persetujuan.');
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses pengajuan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoanRequest $request, Loan $loan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        //
    }
}
