<x-app-layout>
    <x-slot name="header">
        Detail Pinjaman
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

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Informasi Pinjaman</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-bold">Plafon</p>
                    <p class="text-lg font-black text-gray-800">Rp{{ number_format($loan->principal_amount, 0, ',', '.') }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 uppercase font-bold">Tenor</p>
                    <p class="text-lg font-black text-gray-800">{{ $loan->rule->tenor_months }} Bulan</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 uppercase font-bold">Status</p>
                    @if($loan->status === 'active')
                        <span class="inline-block px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">Aktif</span>
                    @elseif($loan->status === 'paid_off')
                        <span class="inline-block px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-700">Lunas</span>
                    @else
                        <span class="inline-block px-3 py-1 rounded-full text-xs font-bold bg-gray-100 text-gray-700">{{ ucfirst($loan->status) }}</span>
                    @endif
                </div>
                <div>
                    <p class="text-xs text-gray-500 uppercase font-bold">Sisa Utang Pokok</p>
                    @php
                        $paidPrincipal = $loan->installments->where('status', 'paid')->sum('amount_principal');
                        $remainingPrincipal = $loan->principal_amount - $paidPrincipal;
                    @endphp
                    <p class="text-lg font-black text-red-600">Rp{{ number_format($remainingPrincipal, 0, ',', '.') }}</p>
                </div>
            </div>
            
            <div class="mt-6">
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    @php
                        $progress = $loan->principal_amount > 0 ? ($paidPrincipal / $loan->principal_amount) * 100 : 0;
                    @endphp
                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $progress }}%"></div>
                </div>
                <p class="text-xs text-gray-500 mt-2 text-right">{{ number_format($progress, 1) }}% Lunas</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Jadwal Angsuran</h3>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-gray-200 bg-gray-50">
                            <th class="px-6 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Cicilan Ke</th>
                            <th class="px-6 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Jatuh Tempo</th>
                            <th class="px-6 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Pokok + Bunga</th>
                            <th class="px-6 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($loan->installments as $index => $inst)
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td class="px-6 py-4">
                                    <div class="font-bold text-gray-800">{{ $index + 1 }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm {{ $inst->status === 'unpaid' && \Carbon\Carbon::parse($inst->due_date)->isPast() ? 'text-red-600 font-bold' : 'text-gray-600' }}">
                                        {{ \Carbon\Carbon::parse($inst->due_date)->format('d M Y') }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-gray-800">Rp{{ number_format($inst->amount_principal + $inst->amount_interest, 0, ',', '.') }}</div>
                                    <div class="text-xs text-gray-500">P: Rp{{ number_format($inst->amount_principal, 0, ',', '.') }} | B: Rp{{ number_format($inst->amount_interest, 0, ',', '.') }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    @if($inst->status === 'paid')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Lunas
                                        </span>
                                    @elseif($inst->proof_of_payment)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                                            Menunggu Validasi
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            Belum Dibayar
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if($inst->status === 'paid')
                                        <span class="text-xs text-gray-500 font-bold">Dibayar: {{ \Carbon\Carbon::parse($inst->paid_at)->format('d/m/Y') }}</span>
                                    @elseif($inst->proof_of_payment)
                                        <a href="{{ asset('storage/' . $inst->proof_of_payment) }}" target="_blank" class="text-xs text-blue-600 hover:underline font-bold">Lihat Bukti</a>
                                    @else
                                        <!-- Form Upload Bukti -->
                                        <form action="{{ route('installments.pay', $inst->id) }}" method="POST" enctype="multipart/form-data" class="flex items-center space-x-2">
                                            @csrf
                                            <input type="file" name="proof_of_payment" required class="text-xs w-32 file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"/>
                                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold py-1.5 px-3 rounded-lg transition duration-200">
                                                Bayar
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
