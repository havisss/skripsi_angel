<x-app-layout>
    <x-slot name="header">
        Manajemen Pegawai / Admin
    </x-slot>

    <div class="space-y-6">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative">
                <span class="block sm:inline">{{ session('success') }}</span>
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

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Form Tambah Pegawai -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-50 bg-gray-50/50">
                        <h3 class="font-bold text-gray-800">Tambah Pegawai Baru</h3>
                    </div>
                    <form action="{{ route('admin.pegawai.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
                        @csrf
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Nama Lengkap</label>
                            <input type="text" name="name" required class="w-full bg-gray-50 border border-gray-200 text-gray-900 rounded-lg focus:ring-orange-500 focus:border-orange-500 block p-2.5">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Alamat Email</label>
                            <input type="email" name="email" required class="w-full bg-gray-50 border border-gray-200 text-gray-900 rounded-lg focus:ring-orange-500 focus:border-orange-500 block p-2.5">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Password</label>
                            <input type="password" name="password" required minlength="8" class="w-full bg-gray-50 border border-gray-200 text-gray-900 rounded-lg focus:ring-orange-500 focus:border-orange-500 block p-2.5">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" required minlength="8" class="w-full bg-gray-50 border border-gray-200 text-gray-900 rounded-lg focus:ring-orange-500 focus:border-orange-500 block p-2.5">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Foto Profil (Opsional)</label>
                            <input type="file" name="profile_photo" accept="image/*" class="w-full bg-gray-50 border border-gray-200 text-gray-900 rounded-lg focus:ring-orange-500 focus:border-orange-500 block p-2.5 text-sm">
                        </div>
                        <button type="submit" class="w-full bg-gray-900 hover:bg-black text-white font-bold py-3 px-4 rounded-xl transition duration-200 shadow-lg mt-4">
                            Simpan Pegawai
                        </button>
                    </form>
                </div>
            </div>

            <!-- Daftar Pegawai -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-50 flex justify-between items-center bg-gray-50/50">
                        <h3 class="font-bold text-gray-800">Daftar Pegawai (Admin)</h3>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-400 uppercase bg-gray-50/50 border-b border-gray-100">
                                <tr>
                                    <th scope="col" class="px-6 py-4 font-semibold">Pegawai</th>
                                    <th scope="col" class="px-6 py-4 font-semibold">Email</th>
                                    <th scope="col" class="px-6 py-4 font-semibold">Tgl. Bergabung</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pegawais as $pegawai)
                                    <tr class="bg-white border-b border-gray-50 hover:bg-gray-50/50 transition">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                @if($pegawai->profile_photo)
                                                    <img class="w-8 h-8 rounded-full object-cover mr-3 border border-gray-200" src="{{ asset('storage/' . $pegawai->profile_photo) }}" alt="{{ $pegawai->name }}">
                                                @else
                                                    <div class="w-8 h-8 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center font-bold mr-3">
                                                        {{ substr($pegawai->name, 0, 1) }}
                                                    </div>
                                                @endif
                                                <div class="font-bold text-gray-900">{{ $pegawai->name }}</div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">{{ $pegawai->email }}</td>
                                        <td class="px-6 py-4">{{ $pegawai->created_at->format('d M Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($pegawais->isEmpty())
                            <div class="p-8 text-center text-gray-500">
                                Belum ada pegawai yang terdaftar.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
