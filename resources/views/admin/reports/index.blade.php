<x-app-layout>
    <x-slot name="header">
        Laporan Koperasi
    </x-slot>

    <div class="space-y-6">
        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1 -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center space-x-4">
                <div class="bg-blue-100 p-3 rounded-lg text-blue-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-gray-500 uppercase tracking-wider">Total Nasabah</p>
                    <h3 class="text-2xl font-black text-gray-800">{{ $totalMembers }}</h3>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center space-x-4">
                <div class="bg-green-100 p-3 rounded-lg text-green-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-gray-500 uppercase tracking-wider">Total Simpanan</p>
                    <h3 class="text-2xl font-black text-gray-800">Rp{{ number_format($totalSavings, 0, ',', '.') }}</h3>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center space-x-4">
                <div class="bg-orange-100 p-3 rounded-lg text-orange-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-gray-500 uppercase tracking-wider">Pinjaman Beredar</p>
                    <h3 class="text-2xl font-black text-gray-800">Rp{{ number_format($totalLoansDisbursed, 0, ',', '.') }}</h3>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center space-x-4">
                <div class="bg-purple-100 p-3 rounded-lg text-purple-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-gray-500 uppercase tracking-wider">Pinjaman Aktif</p>
                    <h3 class="text-2xl font-black text-gray-800">{{ $activeLoansCount }}</h3>
                </div>
            </div>
        </div>

        <!-- Export Actions -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-6">Unduh Laporan (Export CSV)</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Export Pinjaman -->
                <div class="border border-gray-200 rounded-xl p-6 hover:border-orange-300 transition group relative overflow-hidden">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-orange-50 rounded-full opacity-50 group-hover:scale-150 transition duration-500"></div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-orange-100 text-orange-600 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <h4 class="font-bold text-gray-800 text-lg mb-2">Laporan Pinjaman</h4>
                        <p class="text-sm text-gray-500 mb-6">Unduh data pengajuan pinjaman, detail tenor, potongan administrasi, asuransi, dan status terkini seluruh pinjaman nasabah.</p>
                        <a href="{{ route('admin.reports.loans') }}" class="inline-flex items-center bg-gray-800 hover:bg-gray-900 text-white text-sm font-bold px-5 py-2.5 rounded-lg transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            Download CSV
                        </a>
                    </div>
                </div>

                <!-- Export Simpanan -->
                <div class="border border-gray-200 rounded-xl p-6 hover:border-green-300 transition group relative overflow-hidden">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-green-50 rounded-full opacity-50 group-hover:scale-150 transition duration-500"></div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-green-100 text-green-600 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <h4 class="font-bold text-gray-800 text-lg mb-2">Laporan Simpanan</h4>
                        <p class="text-sm text-gray-500 mb-6">Unduh rekapitulasi transaksi simpanan pokok, simpanan wajib, dan simpanan sukarela dari seluruh nasabah koperasi.</p>
                        <a href="{{ route('admin.reports.savings') }}" class="inline-flex items-center bg-gray-800 hover:bg-gray-900 text-white text-sm font-bold px-5 py-2.5 rounded-lg transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            Download CSV
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
