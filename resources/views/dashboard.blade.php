<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ringkasan Akun') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('error'))
                <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r-xl shadow-sm mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-red-700 font-medium">Perhatian! {{ session('error') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-r-xl shadow-sm mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700 font-medium">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Welcome / Overview Header -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-sm border border-gray-100 flex flex-col sm:flex-row justify-between items-start sm:items-center">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900">Halo, {{ explode(' ', $user->name)[0] }}!</h3>
                    <p class="text-gray-500 mt-1 text-sm">Pantau saldo simpanan dan tagihan pinjaman Anda di sini.</p>
                </div>
                <div class="mt-4 sm:mt-0 flex items-center gap-4">
                    <p class="text-sm font-medium text-gray-500 hidden md:block">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
                    <a href="{{ route('loans.create') }}" class="inline-flex items-center px-4 py-2 bg-kop-green border border-transparent rounded-xl font-bold text-xs text-white uppercase tracking-widest hover:bg-kop-greenDark focus:bg-kop-greenDark transition shadow-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Ajukan Pinjaman
                    </a>
                </div>
            </div>

            <!-- Financial Summary Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Simpanan Pokok -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col justify-between">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <span class="px-2 py-1 bg-blue-50 text-blue-600 text-xs font-semibold rounded-md">Wajib 1x</span>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Simpanan Pokok</p>
                        <h4 class="text-2xl font-bold text-gray-900">Rp{{ number_format($user->balance_pokok, 0, ',', '.') }}</h4>
                    </div>
                </div>

                <!-- Simpanan Wajib -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col justify-between">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-10 h-10 bg-green-50 text-green-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <span class="px-2 py-1 bg-green-50 text-green-600 text-xs font-semibold rounded-md">Rutin Bulanan</span>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Simpanan Wajib</p>
                        <h4 class="text-2xl font-bold text-gray-900">Rp{{ number_format($user->balance_wajib, 0, ',', '.') }}</h4>
                    </div>
                </div>

                <!-- Simpanan Sukarela -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col justify-between">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-10 h-10 bg-kop-light text-kop-green rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        </div>
                        <span class="px-2 py-1 bg-kop-light text-kop-green text-xs font-semibold rounded-md">Bebas Tarik</span>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Simpanan Sukarela</p>
                        <h4 class="text-2xl font-bold text-gray-900">Rp{{ number_format($user->balance_sukarela, 0, ',', '.') }}</h4>
                    </div>
                </div>

                <!-- Pinjaman Aktif -->
                <div class="bg-white rounded-2xl shadow-sm border {{ $activeLoan ? 'border-red-100 bg-red-50/20' : 'border-gray-100' }} p-6 flex flex-col justify-between">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-10 h-10 {{ $activeLoan ? 'bg-red-100 text-red-600' : 'bg-gray-100 text-gray-500' }} rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                        </div>
                        @if($activeLoan)
                            @if($activeLoan->status === 'pending')
                                <span class="px-2 py-1 bg-orange-100 text-orange-700 text-xs font-semibold rounded-md">Menunggu</span>
                            @elseif($activeLoan->status === 'approved')
                                <span class="px-2 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-md">Disetujui</span>
                            @else
                                <span class="px-2 py-1 bg-red-100 text-red-700 text-xs font-semibold rounded-md">Berjalan</span>
                            @endif
                        @else
                            <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs font-semibold rounded-md">Nihil</span>
                        @endif
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Pinjaman Aktif</p>
                        <h4 class="text-2xl font-bold text-gray-900">
                            @if($activeLoan) Rp{{ number_format($activeLoan->principal_amount, 0, ',', '.') }} @else Rp0 @endif
                        </h4>
                    </div>
                </div>

            </div>

            <!-- Additional Info Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                
                <!-- Tagihan Terdekat -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                    <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <h3 class="text-lg font-bold text-gray-900">Tagihan Terdekat</h3>
                        </div>
                        @if($nextInstallment)
                            <span class="flex h-3 w-3">
                                <span class="absolute inline-flex h-3 w-3 rounded-full bg-red-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                            </span>
                        @endif
                    </div>
                    
                    <div class="p-6 flex-grow flex flex-col justify-center">
                        @if($nextInstallment)
                            <div class="bg-red-50/50 border border-red-100 rounded-xl p-5">
                                <p class="text-xs font-semibold text-red-600 uppercase tracking-wider mb-1">Jatuh Tempo</p>
                                <p class="text-xl font-bold text-gray-900 mb-4">{{ \Carbon\Carbon::parse($nextInstallment->due_date)->format('d F Y') }}</p>
                                
                                <p class="text-xs font-semibold text-red-600 uppercase tracking-wider mb-1">Total Tagihan</p>
                                <p class="text-3xl font-black text-red-600 mb-6 tracking-tight">Rp{{ number_format($nextInstallment->amount_principal + $nextInstallment->amount_interest, 0, ',', '.') }}</p>
                                
                                <a href="{{ route('loans.show', $nextInstallment->loan_id) }}" class="block w-full py-3 text-center bg-red-600 hover:bg-red-700 text-white font-bold rounded-lg transition shadow-sm">
                                    Bayar Sekarang
                                </a>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-300">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <h4 class="text-gray-900 font-bold mb-1">Semua Lunas!</h4>
                                <p class="text-sm text-gray-500">Anda tidak memiliki tagihan dalam waktu dekat.</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Info Pinjaman Aktif -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                    <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            <h3 class="text-lg font-bold text-gray-900">Status Pinjaman</h3>
                        </div>
                    </div>

                    <div class="p-6 flex-grow flex flex-col justify-center">
                        @if($activeLoan)
                            <div class="border border-gray-200 rounded-xl p-5">
                                <div class="flex justify-between items-end mb-6">
                                    <div>
                                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Total Pinjaman</p>
                                        <p class="text-xl font-bold text-gray-900">Rp{{ number_format($activeLoan->principal_amount, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                                
                                <div class="grid grid-cols-2 gap-4 mb-6">
                                    <div class="bg-gray-50 p-3 rounded-lg">
                                        <p class="text-xs text-gray-500 mb-1">Tenor</p>
                                        <p class="font-semibold text-gray-900 text-sm">{{ $activeLoan->tenor_months }} Bulan</p>
                                    </div>
                                    <div class="bg-gray-50 p-3 rounded-lg">
                                        <p class="text-xs text-gray-500 mb-1">Tgl Pengajuan</p>
                                        <p class="font-semibold text-gray-900 text-sm">{{ \Carbon\Carbon::parse($activeLoan->created_at)->format('d M Y') }}</p>
                                    </div>
                                </div>

                                @if($activeLoan->status == 'active')
                                    @php
                                        $totalInst = $activeLoan->installments->count();
                                        $paidInst = $activeLoan->installments->where('status', 'paid')->count();
                                        $prog = $totalInst > 0 ? ($paidInst / $totalInst) * 100 : 0;
                                    @endphp
                                    <div class="mb-6">
                                        <div class="flex justify-between text-xs font-semibold text-gray-500 mb-2">
                                            <span>Progress Pembayaran</span>
                                            <span>{{ $paidInst }} / {{ $totalInst }} Bulan</span>
                                        </div>
                                        <div class="w-full bg-gray-100 h-2 rounded-full overflow-hidden">
                                            <div class="bg-teal-500 h-full rounded-full" style="width: {{ $prog }}%"></div>
                                        </div>
                                    </div>
                                @endif

                                <a href="{{ route('loans.show', $activeLoan->id) }}" class="block w-full py-3 text-center bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-bold rounded-lg transition">
                                    Lihat Detail Pinjaman
                                </a>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-300">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                </div>
                                <h4 class="text-gray-900 font-bold mb-1">Belum ada Pinjaman</h4>
                                <p class="text-sm text-gray-500 mb-4">Ajukan pinjaman pertama Anda untuk memenuhi kebutuhan.</p>
                                <a href="{{ route('loans.create') }}" class="inline-flex items-center px-4 py-2 bg-kop-green text-white font-semibold rounded-lg hover:bg-kop-greenDark transition">
                                    Mulai Pengajuan
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
