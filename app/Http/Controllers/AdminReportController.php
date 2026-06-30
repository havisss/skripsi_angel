<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\SavingsTransaction;
use App\Models\User;
use Carbon\Carbon;

class AdminReportController extends Controller
{
    public function index()
    {
        // Metrik Ringkasan untuk Dashboard Laporan
        $totalLoansDisbursed = Loan::whereIn('status', ['active', 'paid_off'])->sum('net_disbursement');
        $totalSavings = User::sum('balance_wajib') + User::sum('balance_sukarela') + User::sum('balance_pokok');
        
        $activeLoansCount = Loan::where('status', 'active')->count();
        $totalMembers = User::where('role', 'member')->count();

        return view('admin.reports.index', compact(
            'totalLoansDisbursed', 
            'totalSavings', 
            'activeLoansCount', 
            'totalMembers'
        ));
    }

    public function exportLoans()
    {
        $loans = Loan::with(['user', 'rule'])->orderBy('created_at', 'desc')->get();
        
        $filename = "laporan_pinjaman_" . date('Y-m-d') . ".csv";
        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = [
            'ID Pinjaman', 'Tanggal Pengajuan', 'Nama Nasabah', 'Email Nasabah', 
            'Plafon', 'Tenor (Bulan)', 'Pencairan Bersih', 'Total Potongan', 'Status'
        ];

        $callback = function() use($loans, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($loans as $loan) {
                $row = [
                    $loan->id,
                    $loan->created_at->format('Y-m-d H:i'),
                    $loan->user->name ?? 'N/A',
                    $loan->user->email ?? 'N/A',
                    $loan->principal_amount,
                    $loan->rule->tenor_months ?? 0,
                    $loan->net_disbursement,
                    $loan->total_deduction,
                    $loan->status
                ];
                fputcsv($file, $row);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function exportSavings()
    {
        $transactions = SavingsTransaction::with('user')->orderBy('created_at', 'desc')->get();
        
        $filename = "laporan_simpanan_" . date('Y-m-d') . ".csv";
        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = [
            'ID Transaksi', 'Tanggal', 'Nama Nasabah', 'Email Nasabah', 
            'Jenis Simpanan', 'Kredit/Debit', 'Nominal', 'Status'
        ];

        $callback = function() use($transactions, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($transactions as $trx) {
                $row = [
                    $trx->id,
                    $trx->created_at->format('Y-m-d H:i'),
                    $trx->user->name ?? 'N/A',
                    $trx->user->email ?? 'N/A',
                    ucfirst($trx->type),
                    ucfirst($trx->type_trx),
                    $trx->amount,
                    $trx->status
                ];
                fputcsv($file, $row);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
