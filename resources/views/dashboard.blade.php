<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight" style="margin: 0;">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        /* Vanilla CSS Dashboard Custom Styles */
        :root {
            --primary-orange: #f97316; /* Sidebar orange */
            --primary-orange-dark: #ea580c;
            --bg-light: #f8fafc;
            --card-bg: #ffffff;
            --text-dark: #1f2937;
            --text-muted: #6b7280;
            --border-color: #f3f4f6;
            --success-color: #10b981;
            --info-color: #3b82f6;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
        }

        .dashboard-wrapper {
            padding: 24px;
            font-family: inherit;
            color: var(--text-dark);
            max-width: 1280px;
            margin: 0 auto;
        }

        /* Alerts */
        .alert {
            padding: 16px;
            border-radius: 12px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            color: #fff;
        }
        .alert-danger { background-color: var(--danger-color); }
        .alert-success { background-color: var(--success-color); }
        .alert svg { width: 24px; height: 24px; margin-right: 12px; flex-shrink: 0; }

        /* Welcome Banner */
        .welcome-banner {
            background: linear-gradient(135deg, var(--primary-orange), var(--primary-orange-dark));
            border-radius: 24px;
            padding: 40px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
            box-shadow: 0 10px 25px rgba(249, 115, 22, 0.3);
            position: relative;
            overflow: hidden;
        }
        .welcome-banner::after {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.15) 1px, transparent 0);
            background-size: 24px 24px;
            pointer-events: none;
        }
        .welcome-text { position: relative; z-index: 1; }
        .welcome-text h3 { margin: 0 0 8px 0; font-size: 28px; font-weight: 800; }
        .welcome-text p { margin: 0; font-size: 16px; opacity: 0.9; }
        
        .welcome-actions { position: relative; z-index: 1; }
        .btn-apply {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 12px 24px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
        }
        .btn-apply:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }
        .btn-apply svg { width: 20px; height: 20px; margin-right: 8px; }

        /* Section Titles */
        .section-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 16px;
            color: var(--text-dark);
        }

        /* Summary Cards Grid */
        .summary-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }
        .summary-card {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.03);
            border: 1px solid var(--border-color);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }
        .summary-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.06);
        }
        .card-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
        }
        .card-icon svg { width: 24px; height: 24px; }
        
        /* Specific Colors for cards */
        .card-blue .card-icon { background: #eff6ff; color: #3b82f6; }
        .card-blue .card-watermark { color: #3b82f6; }
        
        .card-green .card-icon { background: #ecfdf5; color: #10b981; }
        .card-green .card-watermark { color: #10b981; }
        
        .card-orange .card-icon { background: #fff7ed; color: #f97316; }
        .card-orange .card-watermark { color: #f97316; }
        
        .card-red .card-icon { background: #fef2f2; color: #ef4444; }
        .card-red .card-watermark { color: #ef4444; }

        .summary-card p {
            margin: 0 0 4px 0;
            font-size: 14px;
            color: var(--text-muted);
            font-weight: 500;
        }
        .summary-card h4 {
            margin: 0 0 16px 0;
            font-size: 24px;
            font-weight: 700;
            color: var(--text-dark);
        }
        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            width: max-content;
        }
        .badge-blue { background: #eff6ff; color: #3b82f6; }
        .badge-green { background: #ecfdf5; color: #10b981; }
        .badge-orange { background: #fff7ed; color: #f97316; }
        .badge-red { background: #fef2f2; color: #ef4444; }
        .badge-gray { background: #f3f4f6; color: #6b7280; }

        .card-watermark {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 64px;
            height: 64px;
            opacity: 0.05;
            transition: opacity 0.3s ease;
        }
        .summary-card:hover .card-watermark { opacity: 0.15; }

        /* Panels Grid */
        .panels-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 24px;
        }
        
        .panel-card {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.03);
            border: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
            height: 100%;
            box-sizing: border-box;
        }
        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }
        .panel-title-group {
            display: flex;
            align-items: center;
        }
        .panel-header h3 {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
            color: var(--text-dark);
        }
        .panel-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
        }
        .panel-icon.indigo { background: #eef2ff; color: #6366f1; }
        .panel-icon.teal { background: #f0fdfa; color: #14b8a6; }
        .panel-icon svg { width: 16px; height: 16px; }

        .ping-indicator {
            position: relative;
            display: flex;
            width: 12px;
            height: 12px;
        }
        .ping-anim {
            animation: ping 1s cubic-bezier(0, 0, 0.2, 1) infinite;
            position: absolute;
            display: inline-flex;
            height: 100%;
            width: 100%;
            border-radius: 50%;
            background-color: #f87171;
            opacity: 0.75;
        }
        @keyframes ping { 75%, 100% { transform: scale(2); opacity: 0; } }
        .ping-dot {
            position: relative;
            display: inline-flex;
            border-radius: 50%;
            height: 12px;
            width: 12px;
            background-color: #ef4444;
        }

        /* Next Installment Box */
        .bill-box {
            background: linear-gradient(to bottom right, #fff5f5, #fffbeb);
            border: 1px solid #fee2e2;
            border-radius: 16px;
            padding: 24px;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
            flex-grow: 1;
        }
        .bill-box .watermark {
            position: absolute;
            bottom: -20px;
            right: -20px;
            width: 120px;
            height: 120px;
            color: #ef4444;
            opacity: 0.05;
        }
        .bill-label { font-size: 14px; font-weight: 600; color: #ef4444; margin-bottom: 4px; }
        .bill-date { font-size: 20px; font-weight: 700; color: var(--text-dark); margin-bottom: 16px; }
        .bill-amount { font-size: 36px; font-weight: 800; color: #ef4444; margin-bottom: 24px; letter-spacing: -1px; margin-top:0; }
        .btn-pay {
            display: block;
            width: 100%;
            padding: 14px;
            background: #ef4444;
            color: white;
            text-align: center;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            transition: background 0.3s;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
            box-sizing: border-box;
            position: relative;
            z-index: 1;
        }
        .btn-pay:hover { background: #dc2626; }

        /* Active Loan Box */
        .loan-box {
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 20px;
            transition: border-color 0.3s;
        }
        .loan-box:hover { border-color: #ccfbf1; }
        .loan-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 16px;
        }
        .loan-header-title { font-size: 12px; text-transform: uppercase; color: var(--text-muted); font-weight: 600; margin-bottom: 4px; }
        .loan-header-amount { font-size: 24px; font-weight: 700; color: var(--text-dark); margin: 0; }
        .loan-details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 20px;
        }
        .loan-detail-item {
            background: #f9fafb;
            padding: 12px;
            border-radius: 12px;
        }
        .loan-detail-item p { margin: 0 0 4px 0; font-size: 12px; color: var(--text-muted); }
        .loan-detail-item strong { font-size: 14px; color: var(--text-dark); }
        
        .progress-container { margin-bottom: 20px; }
        .progress-labels { display: flex; justify-content: space-between; font-size: 12px; font-weight: 600; color: var(--text-muted); margin-bottom: 8px; }
        .progress-track { width: 100%; background: #f3f4f6; height: 10px; border-radius: 10px; overflow: hidden; }
        .progress-fill { background: #14b8a6; height: 100%; border-radius: 10px; transition: width 1s ease; }

        .btn-outline {
            display: block;
            width: 100%;
            padding: 12px;
            background: white;
            border: 2px solid #e5e7eb;
            color: #374151;
            text-align: center;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s;
            box-sizing: border-box;
        }
        .btn-outline:hover { border-color: #14b8a6; color: #0d9488; }

        /* Empty States */
        .empty-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 32px 16px;
            text-align: center;
            flex-grow: 1;
        }
        .empty-icon {
            width: 80px; height: 80px;
            background: #f9fafb;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 16px;
            color: #d1d5db;
        }
        .empty-icon svg { width: 40px; height: 40px; }
        .empty-state h4 { margin: 0 0 8px 0; font-size: 18px; color: #374151; font-weight: 700; }
        .empty-state p { margin: 0 0 24px 0; font-size: 14px; color: #6b7280; }
        .btn-primary {
            background: var(--primary-orange);
            color: white;
            padding: 10px 24px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(249, 115, 22, 0.3);
            transition: background 0.3s;
            display: inline-block;
        }
        .btn-primary:hover { background: var(--primary-orange-dark); }

        @media (max-width: 768px) {
            .welcome-banner { flex-direction: column; text-align: center; }
            .welcome-text { margin-bottom: 24px; }
        }
    </style>

    <div class="dashboard-wrapper">
        
        @if (session('error'))
            <div class="alert alert-danger">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                <div>
                    <strong>Perhatian!</strong>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- Welcome Banner -->
        <div class="welcome-banner">
            <div class="welcome-text">
                <h3>Halo, {{ explode(' ', $user->name)[0] }}! 👋</h3>
                <p>Selamat datang kembali di Koperasi Anda.</p>
            </div>
            <div class="welcome-actions">
                <a href="{{ route('loans.create') }}" class="btn-apply">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Ajukan Pinjaman
                </a>
            </div>
        </div>

        <!-- Balances Overview -->
        <div>
            <h3 class="section-title">Ringkasan Finansial</h3>
            <div class="summary-grid">
                
                <!-- Simpanan Pokok -->
                <div class="summary-card card-blue">
                    <svg class="card-watermark" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
                    <div class="card-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p>Simpanan Pokok</p>
                    <h4>Rp{{ number_format($user->balance_pokok, 0, ',', '.') }}</h4>
                    <span class="badge badge-blue">Wajib 1x</span>
                </div>

                <!-- Simpanan Wajib -->
                <div class="summary-card card-green">
                    <svg class="card-watermark" fill="currentColor" viewBox="0 0 24 24"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm4.24 16L12 15.45 7.77 18l1.12-4.81-3.73-3.23 4.92-.42L12 5l1.92 4.53 4.92.42-3.73 3.23L16.23 18z"/></svg>
                    <div class="card-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p>Simpanan Wajib</p>
                    <h4>Rp{{ number_format($user->balance_wajib, 0, ',', '.') }}</h4>
                    <span class="badge badge-green">Rutin Bulanan</span>
                </div>

                <!-- Simpanan Sukarela -->
                <div class="summary-card card-orange">
                    <svg class="card-watermark" fill="currentColor" viewBox="0 0 24 24"><path d="M21 18v1c0 1.1-.9 2-2 2H5c-1.11 0-2-.9-2-2V5c0-1.1.89-2 2-2h14c1.1 0 2 .9 2 2v1h-9c-1.11 0-2 .9-2 2v8c0 1.1.89 2 2 2h9zm-9-2h10V8H12v8zm4-2.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/></svg>
                    <div class="card-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </div>
                    <p>Simpanan Sukarela</p>
                    <h4>Rp{{ number_format($user->balance_sukarela, 0, ',', '.') }}</h4>
                    <span class="badge badge-orange">Bebas Tarik</span>
                </div>

                <!-- Total Pinjaman -->
                <div class="summary-card card-red">
                    <svg class="card-watermark" fill="currentColor" viewBox="0 0 24 24"><path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"/></svg>
                    <div class="card-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                    </div>
                    <p>Pinjaman Aktif</p>
                    <h4>
                        @if($activeLoan) Rp{{ number_format($activeLoan->principal_amount, 0, ',', '.') }} @else Rp0 @endif
                    </h4>
                    @if($activeLoan)
                        @if($activeLoan->status === 'pending')
                            <span class="badge badge-orange">Menunggu Verifikasi</span>
                        @elseif($activeLoan->status === 'approved')
                            <span class="badge badge-blue">Disetujui</span>
                        @else
                            <span class="badge badge-red">Berjalan</span>
                        @endif
                    @else
                        <span class="badge badge-gray">Tidak Ada Pinjaman</span>
                    @endif
                </div>

            </div>
        </div>

        <!-- Activity & Billing -->
        <div class="panels-grid">
            
            <!-- Tagihan Terdekat -->
            <div class="panel-card">
                <div class="panel-header">
                    <div class="panel-title-group">
                        <div class="panel-icon indigo">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3>Tagihan Terdekat</h3>
                    </div>
                    @if($nextInstallment)
                        <div class="ping-indicator">
                            <span class="ping-anim"></span>
                            <span class="ping-dot"></span>
                        </div>
                    @endif
                </div>
                
                @if($nextInstallment)
                    <div class="bill-box">
                        <svg class="watermark" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
                        <p class="bill-label">Jatuh Tempo</p>
                        <p class="bill-date">{{ \Carbon\Carbon::parse($nextInstallment->due_date)->format('d F Y') }}</p>
                        
                        <p class="bill-label">Total Tagihan</p>
                        <p class="bill-amount">Rp{{ number_format($nextInstallment->amount_principal + $nextInstallment->amount_interest, 0, ',', '.') }}</p>
                        
                        <a href="{{ route('loans.show', $nextInstallment->loan_id) }}" class="btn-pay">
                            Bayar Sekarang
                        </a>
                    </div>
                @else
                    <div class="empty-state">
                        <div class="empty-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h4>Semua Lunas!</h4>
                        <p>Anda tidak memiliki tagihan dalam waktu dekat.</p>
                    </div>
                @endif
            </div>

            <!-- Info Pinjaman Aktif -->
            <div class="panel-card">
                <div class="panel-header">
                    <div class="panel-title-group">
                        <div class="panel-icon teal">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <h3>Status Pinjaman</h3>
                    </div>
                    @if($activeLoan && $activeLoan->status == 'active')
                        @php
                            $totalInst = $activeLoan->installments->count();
                            $paidInst = $activeLoan->installments->where('status', 'paid')->count();
                            $prog = $totalInst > 0 ? ($paidInst / $totalInst) * 100 : 0;
                        @endphp
                        <span class="badge badge-green">{{ round($prog) }}% Selesai</span>
                    @endif
                </div>

                @if($activeLoan)
                    <div class="loan-box">
                        <div class="loan-header">
                            <div>
                                <p class="loan-header-title">Total Pinjaman</p>
                                <p class="loan-header-amount">Rp{{ number_format($activeLoan->principal_amount, 0, ',', '.') }}</p>
                            </div>
                            <div>
                                @if($activeLoan->status === 'pending')
                                    <span class="badge badge-orange">Menunggu</span>
                                @elseif($activeLoan->status === 'approved')
                                    <span class="badge badge-blue">Disetujui</span>
                                @else
                                    <span class="badge badge-green">Aktif</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="loan-details-grid">
                            <div class="loan-detail-item">
                                <p>Tenor</p>
                                <strong>{{ $activeLoan->tenor_months }} Bulan</strong>
                            </div>
                            <div class="loan-detail-item">
                                <p>Tgl Pengajuan</p>
                                <strong>{{ \Carbon\Carbon::parse($activeLoan->created_at)->format('d M Y') }}</strong>
                            </div>
                        </div>

                        @if($activeLoan->status == 'active')
                            <div class="progress-container">
                                <div class="progress-labels">
                                    <span>Progress</span>
                                    <span>{{ $paidInst }} dari {{ $totalInst }} Bulan</span>
                                </div>
                                <div class="progress-track">
                                    <div class="progress-fill" style="width: {{ $prog }}%"></div>
                                </div>
                            </div>
                        @endif

                        <a href="{{ route('loans.show', $activeLoan->id) }}" class="btn-outline">
                            Lihat Detail Pinjaman
                        </a>
                    </div>
                @else
                    <div class="empty-state">
                        <div class="empty-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        </div>
                        <h4>Belum ada Pinjaman</h4>
                        <p>Ajukan pinjaman pertama Anda untuk memenuhi kebutuhan.</p>
                        <a href="{{ route('loans.create') }}" class="btn-primary">
                            Mulai Pengajuan
                        </a>
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
