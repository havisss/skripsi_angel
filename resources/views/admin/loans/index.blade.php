<x-app-layout>
    <x-slot name="header">
        Manajemen & Persetujuan Pinjaman
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
        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl relative shadow-sm">
                <ul class="list-disc list-inside text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-50 flex justify-between items-center bg-gray-50/50">
                <h3 class="font-bold text-gray-800">Daftar Pengajuan Pinjaman</h3>
            </div>
            <div class="p-0 overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead>
                        <tr class="text-gray-500 border-b border-gray-100 bg-gray-50/20">
                            <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs">Tanggal</th>
                            <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs">Nasabah</th>
                            <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs">Plafon & Tenor</th>
                            <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs">Potongan & Pencairan</th>
                            <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs text-center">Dokumen</th>
                            <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs text-center">Status</th>
                            <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($loans as $loan)
                        <tr class="border-b border-gray-50 hover:bg-orange-50/30 transition {{ $loan->status === 'pending' ? 'bg-orange-50/10' : '' }}">
                            <td class="px-6 py-4 text-gray-800 align-top">{{ $loan->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4 align-top">
                                <div class="font-bold text-gray-800">{{ $loan->user->name }}</div>
                                <div class="text-xs text-gray-500">{{ $loan->user->email }}</div>
                            </td>
                            <td class="px-6 py-4 align-top">
                                <div class="font-bold text-gray-800">Rp{{ number_format($loan->principal_amount, 0, ',', '.') }}</div>
                                <div class="text-xs text-gray-500">{{ $loan->rule->tenor_months }} Bulan ({{ $loan->rule->interest_rate_monthly }}%/bln)</div>
                            </td>
                            <td class="px-6 py-4 align-top">
                                <div class="text-xs text-red-500 font-bold">- Rp{{ number_format($loan->total_deduction, 0, ',', '.') }}</div>
                                <div class="text-sm font-bold text-green-600 mt-1">Cair: Rp{{ number_format($loan->net_disbursement, 0, ',', '.') }}</div>
                            </td>
                            <td class="px-6 py-4 align-top">
                                <div class="flex flex-col space-y-1 items-center">
                                    @if($loan->document_ktp)
                                        <a href="{{ asset('storage/' . $loan->document_ktp) }}" target="_blank" class="text-xs text-blue-600 hover:underline">KTP</a>
                                    @endif
                                    @if($loan->document_stnk)
                                        <a href="{{ asset('storage/' . $loan->document_stnk) }}" target="_blank" class="text-xs text-blue-600 hover:underline">STNK</a>
                                    @endif
                                    @if($loan->document_bpkb)
                                        <a href="{{ asset('storage/' . $loan->document_bpkb) }}" target="_blank" class="text-xs text-blue-600 hover:underline">BPKB</a>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center align-top">
                                @if($loan->status === 'pending')
                                    <span class="px-2 py-1 bg-yellow-50 text-yellow-600 text-xs rounded-lg font-bold border border-yellow-200">Pending</span>
                                @elseif($loan->status === 'approved')
                                    <span class="px-2 py-1 bg-green-50 text-green-600 text-xs rounded-lg font-bold border border-green-200">Disetujui</span>
                                @else
                                    <span class="px-2 py-1 bg-red-50 text-red-600 text-xs rounded-lg font-bold border border-red-200">Ditolak</span>
                                    <div class="text-[10px] text-red-500 mt-1 max-w-[100px] truncate" title="{{ $loan->rejection_note }}">{{ $loan->rejection_note }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center align-top">
                                @if($loan->status === 'pending')
                                <div class="flex flex-col space-y-2">
                                    <form action="{{ route('admin.loans.approve', $loan->id) }}" method="POST" onsubmit="return confirm('Setujui pinjaman ini? Sistem akan membuat jadwal cicilan secara otomatis.');">
                                        @csrf
                                        <button type="submit" class="w-full px-3 py-1.5 bg-green-500 hover:bg-green-600 text-white rounded-lg text-xs font-bold transition shadow-sm">
                                            Setujui
                                        </button>
                                    </form>
                                    
                                    <!-- Tombol Tolak membuka modal / prompt -->
                                    <button type="button" onclick="rejectLoan({{ $loan->id }})" class="w-full px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white rounded-lg text-xs font-bold transition shadow-sm">
                                        Tolak
                                    </button>
                                </div>
                                @else
                                    <span class="text-gray-400 text-xs">-</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-gray-500 font-medium">Belum ada pengajuan pinjaman baru.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($loans->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $loans->links() }}
            </div>
            @endif
        </div>
    </div>

    <!-- Hidden form for rejection -->
    <form id="rejectForm" method="POST" class="hidden">
        @csrf
        <input type="hidden" name="rejection_note" id="rejection_note_input">
    </form>

    <script>
        function rejectLoan(id) {
            const reason = prompt("Masukkan alasan penolakan:");
            if (reason === null) return; // User cancelled
            
            if (reason.trim() === '') {
                alert("Alasan penolakan tidak boleh kosong.");
                return;
            }

            const form = document.getElementById('rejectForm');
            form.action = `/admin/loans/${id}/reject`;
            document.getElementById('rejection_note_input').value = reason;
            form.submit();
        }
    </script>
</x-app-layout>
