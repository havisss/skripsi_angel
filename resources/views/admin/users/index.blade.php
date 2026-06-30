<x-app-layout>
    <x-slot name="header">
        Manajemen Pengguna (Nasabah)
    </x-slot>

    <div class="space-y-6">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-50 flex justify-between items-center">
                <h3 class="font-bold text-gray-800">Daftar Nasabah Terdaftar</h3>
            </div>
            
            <div class="p-6">
                @if($users->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-gray-200">
                                    <th class="px-6 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Tgl Daftar</th>
                                    <th class="px-6 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Nasabah</th>
                                    <th class="px-6 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Info Bank</th>
                                    <th class="px-6 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Total Simpanan</th>
                                    <th class="px-6 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($users as $user)
                                    <tr class="hover:bg-gray-50 transition duration-150">
                                        <td class="px-6 py-4 align-top text-sm text-gray-500">
                                            {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}
                                        </td>
                                        <td class="px-6 py-4 align-top">
                                            <div class="font-bold text-gray-800">{{ $user->name }}</div>
                                            <div class="text-xs text-gray-500">{{ $user->email }}</div>
                                        </td>
                                        <td class="px-6 py-4 align-top">
                                            <div class="font-bold text-gray-800">{{ $user->bank_name ?? 'Belum Diatur' }}</div>
                                            <div class="text-xs text-gray-500">{{ $user->bank_account_number ?? '-' }}</div>
                                        </td>
                                        <td class="px-6 py-4 align-top">
                                            @php
                                                $total = $user->balance_wajib + $user->balance_pokok + $user->balance_sukarela;
                                            @endphp
                                            <div class="font-bold text-green-600">Rp{{ number_format($total, 0, ',', '.') }}</div>
                                        </td>
                                        <td class="px-6 py-4 align-top">
                                            @if($user->is_active)
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    Aktif
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                    Nonaktif
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 align-top">
                                            <form action="{{ route('admin.users.toggle', $user->id) }}" method="POST">
                                                @csrf
                                                @if($user->is_active)
                                                    <button type="submit" class="bg-red-50 hover:bg-red-100 text-red-600 text-xs font-bold px-3 py-1.5 rounded-lg border border-red-200 transition" onclick="return confirm('Apakah Anda yakin ingin menonaktifkan akun ini? Nasabah tidak akan bisa login.')">Nonaktifkan</button>
                                                @else
                                                    <button type="submit" class="bg-green-50 hover:bg-green-100 text-green-600 text-xs font-bold px-3 py-1.5 rounded-lg border border-green-200 transition" onclick="return confirm('Aktifkan kembali akun ini?')">Aktifkan</button>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                @else
                    <div class="text-center py-8">
                        <p class="mt-4 text-sm text-gray-500">Belum ada nasabah terdaftar.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
