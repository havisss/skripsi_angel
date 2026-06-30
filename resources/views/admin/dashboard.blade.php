<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Administrator') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Header Section -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-sm border border-gray-100 flex flex-col sm:flex-row justify-between items-start sm:items-center">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900">Overview Sistem</h3>
                    <p class="text-gray-500 mt-1 text-sm">Pantau aktivitas operasional dan pengajuan nasabah secara realtime.</p>
                </div>
                <div class="mt-4 sm:mt-0 text-right">
                    <p class="text-sm font-medium text-gray-500">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
                </div>
            </div>

            <!-- Metrics Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Total Nasabah -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Total Nasabah Aktif</p>
                        <h4 class="text-3xl font-bold text-gray-900">{{ $totalMembers }}</h4>
                    </div>
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                </div>

                <!-- Pengajuan Pinjaman -->
                <a href="{{ route('admin.loans.index') }}" class="block bg-white rounded-2xl shadow-sm border {{ $pendingLoans > 0 ? 'border-orange-200 bg-orange-50/30' : 'border-gray-100' }} p-6 flex items-center justify-between hover:shadow-md transition">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Pengajuan Pinjaman</p>
                        <div class="flex items-end gap-2">
                            <h4 class="text-3xl font-bold text-gray-900">{{ $pendingLoans }}</h4>
                            @if($pendingLoans > 0)
                            <span class="text-xs font-semibold text-orange-600 mb-1">Menunggu Review</span>
                            @endif
                        </div>
                    </div>
                    <div class="w-12 h-12 {{ $pendingLoans > 0 ? 'bg-orange-100 text-orange-600' : 'bg-gray-50 text-gray-400' }} rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    </div>
                </a>

                <!-- Setoran Simpanan -->
                <a href="{{ route('admin.savings.index') }}" class="block bg-white rounded-2xl shadow-sm border {{ $pendingSavings > 0 ? 'border-blue-200 bg-blue-50/30' : 'border-gray-100' }} p-6 flex items-center justify-between hover:shadow-md transition">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Verifikasi Simpanan</p>
                        <div class="flex items-end gap-2">
                            <h4 class="text-3xl font-bold text-gray-900">{{ $pendingSavings }}</h4>
                            @if($pendingSavings > 0)
                            <span class="text-xs font-semibold text-blue-600 mb-1">Perlu Validasi</span>
                            @endif
                        </div>
                    </div>
                    <div class="w-12 h-12 {{ $pendingSavings > 0 ? 'bg-blue-100 text-blue-600' : 'bg-gray-50 text-gray-400' }} rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </a>
            </div>

            <!-- Placeholder for Recent Activity (Aktivitas Terakhir) -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                    <h3 class="text-lg font-bold text-gray-900">Aksi Cepat (Quick Actions)</h3>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="{{ route('admin.users.index') }}" class="flex items-center p-4 border border-gray-200 rounded-xl hover:bg-gray-50 hover:border-kop-green transition group">
                        <div class="w-10 h-10 rounded-lg bg-gray-100 text-gray-500 group-hover:bg-kop-light group-hover:text-kop-green flex items-center justify-center mr-4 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 text-sm">Kelola Anggota</p>
                            <p class="text-xs text-gray-500">Tambah/edit data</p>
                        </div>
                    </a>
                    
                    <a href="{{ route('admin.rules.index') }}" class="flex items-center p-4 border border-gray-200 rounded-xl hover:bg-gray-50 hover:border-kop-green transition group">
                        <div class="w-10 h-10 rounded-lg bg-gray-100 text-gray-500 group-hover:bg-kop-light group-hover:text-kop-green flex items-center justify-center mr-4 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 text-sm">Master Paket</p>
                            <p class="text-xs text-gray-500">Atur bunga & tenor</p>
                        </div>
                    </a>

                    <a href="{{ route('admin.reports.index') }}" class="flex items-center p-4 border border-gray-200 rounded-xl hover:bg-gray-50 hover:border-kop-green transition group">
                        <div class="w-10 h-10 rounded-lg bg-gray-100 text-gray-500 group-hover:bg-kop-light group-hover:text-kop-green flex items-center justify-center mr-4 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 text-sm">Laporan</p>
                            <p class="text-xs text-gray-500">Export data excel</p>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
