<x-app-layout>
    <x-slot name="header">
        Modul Simpanan Online
    </x-slot>

    <div class="space-y-8">
        
        @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                {{ session('success') }}
            </div>
        @endif

        <!-- Layout 2 Kolom: Form Setoran & Ringkasan -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- Ringkasan Saldo -->
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-2xl shadow-xl overflow-hidden relative">
                    <!-- Decorative Background -->
                    <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 rounded-full bg-white opacity-5 blur-2xl"></div>
                    <div class="absolute bottom-0 left-0 -ml-8 -mb-8 w-24 h-24 rounded-full bg-kop-green opacity-20 blur-xl"></div>
                    
                    <div class="p-6 relative z-10 text-white">
                        <p class="text-gray-400 text-sm font-medium mb-1 uppercase tracking-wider">Total Saldo Simpanan</p>
                        <h2 class="text-3xl font-extrabold mb-6 tracking-tight">Rp {{ number_format($user->balance_pokok + $user->balance_wajib + $user->balance_sukarela, 0, ',', '.') }}</h2>
                        
                        <div class="space-y-4 pt-4 border-t border-gray-700/50">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 rounded-full bg-blue-400 mr-2"></div>
                                    <span class="text-sm text-gray-300">Simpanan Pokok</span>
                                </div>
                                <span class="font-bold text-white text-sm">Rp {{ number_format($user->balance_pokok, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 rounded-full bg-orange-400 mr-2"></div>
                                    <span class="text-sm text-gray-300">Simpanan Wajib</span>
                                </div>
                                <span class="font-bold text-white text-sm">Rp {{ number_format($user->balance_wajib, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 rounded-full bg-green-400 mr-2"></div>
                                    <span class="text-sm text-gray-300">Simpanan Sukarela</span>
                                </div>
                                <span class="font-bold text-white text-sm">Rp {{ number_format($user->balance_sukarela, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Setoran -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-50 flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-orange-50 flex items-center justify-center text-kop-accent">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        </div>
                        <h3 class="font-bold text-gray-800">Top Up Saldo</h3>
                    </div>
                    <div class="p-6">
                        @if($errors->any())
                            <div class="mb-5 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-md">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <div class="ml-3">
                                        <ul class="text-sm text-red-700 list-disc list-inside">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('savings.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                            @csrf
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Jenis Simpanan</label>
                                <select name="type" class="w-full text-sm border-gray-200 rounded-xl focus:ring-kop-green focus:border-kop-green bg-gray-50 hover:bg-white transition" required>
                                    <option value="wajib">Simpanan Wajib</option>
                                    <option value="sukarela">Simpanan Sukarela</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Nominal Setoran (Min: Rp 10.000)</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-2.5 text-gray-500 font-semibold text-sm">Rp</span>
                                    <input type="number" name="amount" min="10000" class="w-full text-sm pl-11 py-2.5 border-gray-200 rounded-xl focus:ring-kop-green focus:border-kop-green bg-gray-50 hover:bg-white transition" placeholder="0" required>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Bukti Transfer</label>
                                <input type="file" name="proof_of_payment" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-kop-green hover:file:bg-orange-100 border border-gray-200 rounded-xl bg-gray-50 cursor-pointer" required>
                            </div>

                            <button type="submit" class="w-full bg-kop-green hover:bg-kop-greenDark text-white font-bold py-3 px-4 rounded-xl transition shadow-md shadow-kop-green/30 flex justify-center items-center gap-2 mt-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Kirim Pengajuan
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tabel Riwayat / Buku Besar -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden h-full flex flex-col">
                    <div class="px-6 py-5 border-b border-gray-50 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                            </div>
                            <h3 class="font-bold text-gray-800">Buku Besar & Riwayat</h3>
                        </div>
                    </div>
                    
                    <div class="p-0 overflow-x-auto flex-1">
                        <table class="w-full text-sm text-left">
                            <thead class="bg-gray-50/80 border-b border-gray-100">
                                <tr>
                                    <th class="px-6 py-4 font-bold text-gray-500 uppercase tracking-wider text-xs">Tanggal</th>
                                    <th class="px-6 py-4 font-bold text-gray-500 uppercase tracking-wider text-xs">Transaksi</th>
                                    <th class="px-6 py-4 font-bold text-gray-500 uppercase tracking-wider text-xs text-right">Nominal</th>
                                    <th class="px-6 py-4 font-bold text-gray-500 uppercase tracking-wider text-xs text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @forelse($transactions as $trx)
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="px-6 py-4 text-gray-500 whitespace-nowrap">
                                        <div class="font-medium text-gray-900">{{ $trx->created_at->format('d M Y') }}</div>
                                        <div class="text-xs">{{ $trx->created_at->format('H:i') }} WIB</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="font-bold text-gray-800 capitalize">Simpanan {{ $trx->type }}</div>
                                        <div class="text-xs mt-0.5">
                                            @if($trx->type_trx === 'credit')
                                                <span class="text-green-600 font-medium bg-green-50 px-2 py-0.5 rounded">Setoran Masuk</span>
                                            @else
                                                <span class="text-red-600 font-medium bg-red-50 px-2 py-0.5 rounded">Penarikan</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 font-bold text-gray-800 text-right whitespace-nowrap">
                                        @if($trx->type_trx === 'credit')
                                            <span class="text-green-600">+ Rp {{ number_format($trx->amount, 0, ',', '.') }}</span>
                                        @else
                                            <span class="text-red-600">- Rp {{ number_format($trx->amount, 0, ',', '.') }}</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        @if($trx->status === 'pending')
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-yellow-50 text-yellow-600 border border-yellow-100">
                                                <span class="w-1.5 h-1.5 bg-yellow-500 rounded-full mr-1.5 animate-pulse"></span>
                                                Menunggu
                                            </span>
                                        @elseif($trx->status === 'approved')
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-green-50 text-green-600 border border-green-100">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                                Berhasil
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-50 text-red-600 border border-red-100">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg>
                                                Ditolak
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center">
                                        <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-3">
                                            <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        </div>
                                        <p class="text-gray-500 font-medium">Belum ada riwayat transaksi.</p>
                                        <p class="text-gray-400 text-sm mt-1">Mulai menabung untuk masa depan yang lebih baik.</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>
