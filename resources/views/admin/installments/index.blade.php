<x-app-layout>
    <x-slot name="header">
        Verifikasi Pembayaran Cicilan
    </x-slot>

    <div class="space-y-6">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-50">
                <h3 class="font-bold text-gray-800">Antrean Validasi Pembayaran</h3>
            </div>
            
            <div class="p-6">
                @if($installments->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-gray-200">
                                    <th class="px-6 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Tgl Upload</th>
                                    <th class="px-6 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Nasabah & Pinjaman</th>
                                    <th class="px-6 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Jatuh Tempo</th>
                                    <th class="px-6 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Nominal</th>
                                    <th class="px-6 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Bukti Transfer</th>
                                    <th class="px-6 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($installments as $inst)
                                    <tr class="hover:bg-gray-50 transition duration-150">
                                        <td class="px-6 py-4 align-top text-sm text-gray-500">
                                            {{ \Carbon\Carbon::parse($inst->updated_at)->format('d M Y H:i') }}
                                        </td>
                                        <td class="px-6 py-4 align-top">
                                            <div class="font-bold text-gray-800">{{ $inst->loan->user->name }}</div>
                                            <div class="text-xs text-gray-500">{{ $inst->loan->user->email }}</div>
                                            <a href="{{ route('loans.show', $inst->loan_id) }}" class="text-xs text-blue-600 hover:underline mt-1 block">Lihat Detail Pinjaman</a>
                                        </td>
                                        <td class="px-6 py-4 align-top text-sm text-gray-500">
                                            {{ \Carbon\Carbon::parse($inst->due_date)->format('d M Y') }}
                                        </td>
                                        <td class="px-6 py-4 align-top">
                                            <div class="font-bold text-gray-800">Rp{{ number_format($inst->amount_principal + $inst->amount_interest, 0, ',', '.') }}</div>
                                        </td>
                                        <td class="px-6 py-4 align-top">
                                            <a href="{{ asset('storage/' . $inst->proof_of_payment) }}" target="_blank" class="inline-flex items-center px-3 py-1.5 bg-blue-50 text-blue-700 hover:bg-blue-100 rounded-lg text-xs font-bold transition">
                                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                                Lihat
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 align-top">
                                            @if($inst->status === 'unpaid')
                                            <div class="flex space-x-2">
                                                <form action="{{ route('admin.installments.approve', $inst->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white text-xs font-bold px-3 py-1.5 rounded-lg transition">Setujui</button>
                                                </form>
                                                <form action="{{ route('admin.installments.reject', $inst->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-xs font-bold px-3 py-1.5 rounded-lg transition" onclick="return confirm('Tolak dan minta nasabah upload ulang?')">Tolak</button>
                                                </form>
                                            </div>
                                            @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                Sudah Validasi
                                            </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $installments->links() }}
                    </div>
                @else
                    <div class="text-center py-8">
                        <svg class="mx-auto h-12 w-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                        <p class="mt-4 text-sm text-gray-500">Belum ada antrean validasi pembayaran cicilan.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
