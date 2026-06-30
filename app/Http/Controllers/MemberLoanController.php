<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\LoanRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Notifications\NewLoanApplication;
use Illuminate\Support\Facades\Notification;

class MemberLoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with('rule')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        // Pastikan nasabah tidak punya pinjaman aktif/pending
        $hasActiveLoan = Loan::where('user_id', Auth::id())
            ->whereIn('status', ['pending', 'approved', 'active'])
            ->exists();

        if ($hasActiveLoan) {
            return redirect()->route('dashboard')->with('error', 'Anda masih memiliki pinjaman aktif atau dalam proses persetujuan.');
        }

        $rules = LoanRule::all();
        return view('loans.create', compact('rules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'principal_amount' => 'required|numeric|min:1000000|max:25000000',
            'bank_name' => 'required|string|max:100',
            'bank_account_number' => 'required|string|max:50',
            'document_ktp' => 'required|image|max:2048',
            'document_stnk' => 'nullable|image|max:2048',
            'document_bpkb' => 'nullable|image|max:2048',
            'terms_accepted' => 'accepted'
        ]);

        $principal = $request->principal_amount;

        // Cari rule
        $rule = LoanRule::where('min_plafon', '<=', $principal)
            ->where('max_plafon', '>=', $principal)
            ->first();

        if (!$rule) {
            return back()->with('error', 'Plafon tidak sesuai dengan aturan yang berlaku.');
        }

        // Kalkulasi
        $adminFee = $principal * ($rule->admin_fee_percent / 100);
        $insuranceFee = $principal * ($rule->insurance_fee_percent / 100);
        $mandatorySavings = $rule->mandatory_savings_flat;

        $totalDeduction = $adminFee + $insuranceFee + $mandatorySavings;
        $netDisbursement = $principal - $totalDeduction;

        // Upload Dokumen
        $ktpPath = $request->file('document_ktp')->store('documents/ktp', 'public');
        $stnkPath = $request->hasFile('document_stnk') ? $request->file('document_stnk')->store('documents/stnk', 'public') : null;
        $bpkbPath = $request->hasFile('document_bpkb') ? $request->file('document_bpkb')->store('documents/bpkb', 'public') : null;
        // Simpan Data Rekening Pencairan ke Profil Nasabah
        $user = Auth::user();
        $user->bank_name = $request->bank_name;
        $user->bank_account_number = $request->bank_account_number;
        $user->save();

        // Simpan Pinjaman
        $loan = Loan::create([
            'user_id' => Auth::id(),
            'rule_id' => $rule->id,
            'principal_amount' => $principal,
            'net_disbursement' => $netDisbursement,
            'total_deduction' => $totalDeduction,
            'status' => 'pending',
            'document_ktp' => $ktpPath,
            'document_stnk' => $stnkPath,
            'document_bpkb' => $bpkbPath,
        ]);

        // Notify Admins
        $admins = User::where('role', 'admin')->get();
        Notification::send($admins, new NewLoanApplication($loan, Auth::user()->name));

        return redirect()->route('dashboard')->with('success', 'Pengajuan pinjaman berhasil dibuat dan sedang menunggu persetujuan Admin.');
    }
}
