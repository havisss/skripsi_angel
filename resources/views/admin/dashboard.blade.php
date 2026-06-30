<x-app-layout>
    <x-slot name="header">
        Admin Dashboard (Ringkasan)
    </x-slot>

    <div class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex flex-col justify-center items-center hover:-translate-y-1 transition transform duration-200">
                <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <h4 class="text-gray-500 text-sm font-bold uppercase tracking-wider mb-1">Total Nasabah</h4>
                <p class="text-3xl font-black text-gray-800">{{ $totalMembers }}</p>
            </div>

            <!-- Card 2 -->
            <a href="{{ route('admin.loans.index') }}" class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex flex-col justify-center items-center hover:-translate-y-1 transition transform duration-200 group">
                <div class="w-12 h-12 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                </div>
                <h4 class="text-gray-500 text-sm font-bold uppercase tracking-wider mb-1 text-center">Pengajuan Pinjaman<br><span class="text-[10px]">(Menunggu Validasi)</span></h4>
                <p class="text-3xl font-black {{ $pendingLoans > 0 ? 'text-orange-500' : 'text-gray-800' }}">{{ $pendingLoans }}</p>
            </a>

            <!-- Card 3 -->
            <a href="{{ route('admin.savings.index') }}" class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex flex-col justify-center items-center hover:-translate-y-1 transition transform duration-200 group">
                <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h4 class="text-gray-500 text-sm font-bold uppercase tracking-wider mb-1 text-center">Setoran Simpanan<br><span class="text-[10px]">(Menunggu Validasi)</span></h4>
                <p class="text-3xl font-black {{ $pendingSavings > 0 ? 'text-green-500' : 'text-gray-800' }}">{{ $pendingSavings }}</p>
            </a>
        </div>
        
        <div class="bg-blue-50 border border-blue-100 rounded-xl p-6 shadow-sm">
            <h3 class="text-lg font-bold text-blue-800 mb-2">Selamat Datang, Admin!</h3>
            <p class="text-blue-600 text-sm">
                Gunakan menu di Sidebar untuk meninjau pengajuan pinjaman dan setoran simpanan nasabah. Semua tindakan yang Anda lakukan akan langsung memengaruhi database dan sistem.
            </p>
        </div>
    </div>
</x-app-layout>
