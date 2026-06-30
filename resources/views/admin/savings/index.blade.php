<x-app-layout>
    <x-slot name="header">
        Verifikasi Simpanan Nasabah
    </x-slot>

    <div class="space-y-6">
        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl relative shadow-sm">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl relative shadow-sm">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-50 flex justify-between items-center bg-gray-50/50">
                <h3 class="font-bold text-gray-800">Antrean Validasi Setoran</h3>
            </div>
            <div class="p-0 overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead>
                        <tr class="text-gray-500 border-b border-gray-100 bg-gray-50/20">
                            <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs">Tanggal</th>
                            <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs">Nasabah</th>
                            <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs">Jenis</th>
                            <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs">Nominal</th>
                            <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs">Bukti Transfer</th>
                            <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs text-center">Status</th>
                            <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transactions as $trx)
                        <tr class="border-b border-gray-50 hover:bg-orange-50/30 transition {{ $trx->status === 'pending' ? 'bg-orange-50/10' : '' }}">
                            <td class="px-6 py-4 text-gray-800">{{ $trx->created_at->format('d M Y H:i') }}</td>
                            <td class="px-6 py-4">
                                <div class="font-bold text-gray-800">{{ $trx->user->name }}</div>
                                <div class="text-xs text-gray-500">{{ $trx->user->email }}</div>
                            </td>
                            <td class="px-6 py-4 text-gray-800 font-medium capitalize">Simpanan {{ $trx->type }}</td>
                            <td class="px-6 py-4 font-bold text-gray-800">Rp{{ number_format($trx->amount, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">
                                @if($trx->proof_of_payment)
                                    <a href="{{ asset('storage/' . $trx->proof_of_payment) }}" target="_blank" class="inline-flex items-center px-3 py-1 bg-blue-50 text-blue-600 rounded-lg text-xs font-bold hover:bg-blue-100">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                        Lihat
                                    </a>
                                @else
                                    <span class="text-gray-400 text-xs italic">Tidak ada</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center">
                                @if($trx->status === 'pending')
                                    <span class="px-2 py-1 bg-yellow-50 text-yellow-600 text-xs rounded-lg font-bold border border-yellow-200">Pending</span>
                                @elseif($trx->status === 'approved')
                                    <span class="px-2 py-1 bg-green-50 text-green-600 text-xs rounded-lg font-bold border border-green-200">Disetujui</span>
                                @else
                                    <span class="px-2 py-1 bg-red-50 text-red-600 text-xs rounded-lg font-bold border border-red-200">Ditolak</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center">
                                @if($trx->status === 'pending')
                                <div class="flex items-center justify-center space-x-2">
                                    <form action="{{ route('admin.savings.approve', $trx->id) }}" method="POST" onsubmit="return confirm('Setujui dan masukkan ke saldo nasabah?');">
                                        @csrf
                                        <button type="submit" class="px-3 py-1.5 bg-green-500 hover:bg-green-600 text-white rounded-lg text-xs font-bold transition shadow-sm">
                                            Validasi
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.savings.reject', $trx->id) }}" method="POST" onsubmit="return confirm('Tolak setoran ini?');">
                                        @csrf
                                        <button type="submit" class="px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white rounded-lg text-xs font-bold transition shadow-sm">
                                            Tolak
                                        </button>
                                    </form>
                                </div>
                                @else
                                    <span class="text-gray-400 text-xs">-</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-gray-500 font-medium">Belum ada transaksi simpanan baru.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($transactions->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $transactions->links() }}
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
