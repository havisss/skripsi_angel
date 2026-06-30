<x-app-layout>
    <x-slot name="header">
        Master Data: Aturan Pinjaman
    </x-slot>

    <div class="space-y-6">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl">
                {{ session('success') }}
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
            <!-- Tambah Aturan Baru (Form) -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-50 bg-gray-50/50">
                        <h3 class="font-bold text-gray-800">Tambah Paket Pinjaman</h3>
                    </div>
                    <form action="{{ route('admin.rules.store') }}" method="POST" class="p-6 space-y-4">
                        @csrf
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Tenor (Bulan)</label>
                            <input type="number" name="tenor_months" required min="1" class="w-full bg-gray-50 border border-gray-200 text-gray-900 rounded-lg focus:ring-orange-500 focus:border-orange-500 block p-2.5">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Bunga per Bulan (%)</label>
                            <input type="number" step="0.01" name="interest_rate_monthly" required min="0" class="w-full bg-gray-50 border border-gray-200 text-gray-900 rounded-lg focus:ring-orange-500 focus:border-orange-500 block p-2.5">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Potongan Admin (%)</label>
                            <input type="number" step="0.01" name="admin_fee_percentage" required min="0" class="w-full bg-gray-50 border border-gray-200 text-gray-900 rounded-lg focus:ring-orange-500 focus:border-orange-500 block p-2.5">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Potongan Asuransi (%)</label>
                            <input type="number" step="0.01" name="insurance_fee_percentage" required min="0" class="w-full bg-gray-50 border border-gray-200 text-gray-900 rounded-lg focus:ring-orange-500 focus:border-orange-500 block p-2.5">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Potongan Simpanan Wajib (Rp)</label>
                            <input type="number" name="mandatory_savings_flat" required min="0" class="w-full bg-gray-50 border border-gray-200 text-gray-900 rounded-lg focus:ring-orange-500 focus:border-orange-500 block p-2.5" placeholder="Contoh: 50000">
                        </div>
                        <div class="flex items-center pt-2">
                            <input type="checkbox" name="is_active" id="is_active" value="1" checked class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-orange-500">
                            <label for="is_active" class="ml-2 text-sm font-medium text-gray-900">Jadikan Paket Aktif</label>
                        </div>
                        <button type="submit" class="w-full bg-gray-900 hover:bg-black text-white font-bold py-3 px-4 rounded-xl transition duration-200 shadow-lg mt-4">
                            Simpan Paket Baru
                        </button>
                    </form>
                </div>
            </div>

            <!-- Daftar Aturan -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-50 flex justify-between items-center bg-gray-50/50">
                        <h3 class="font-bold text-gray-800">Daftar Paket / Aturan Pinjaman</h3>
                    </div>
                    
                    <div class="p-6">
                        <div class="grid gap-4">
                            @foreach($rules as $rule)
                                <div class="border {{ $rule->is_active ? 'border-orange-200 bg-orange-50/30' : 'border-gray-200 bg-gray-50 opacity-75' }} rounded-xl p-5 flex flex-col md:flex-row justify-between items-center transition">
                                    <div class="mb-4 md:mb-0">
                                        <div class="flex items-center space-x-3 mb-2">
                                            <h4 class="font-black text-xl text-gray-900">Tenor {{ $rule->tenor_months }} Bulan</h4>
                                            @if($rule->is_active)
                                                <span class="bg-green-100 text-green-700 text-xs font-bold px-2.5 py-0.5 rounded-full">Aktif</span>
                                            @else
                                                <span class="bg-gray-200 text-gray-600 text-xs font-bold px-2.5 py-0.5 rounded-full">Nonaktif</span>
                                            @endif
                                        </div>
                                        <div class="flex flex-wrap gap-x-6 gap-y-2 text-sm">
                                            <p class="text-gray-600"><span class="font-semibold text-gray-800">Bunga:</span> {{ $rule->interest_rate_monthly }}%/bln</p>
                                            <p class="text-gray-600"><span class="font-semibold text-gray-800">Admin:</span> {{ $rule->admin_fee_percentage }}%</p>
                                            <p class="text-gray-600"><span class="font-semibold text-gray-800">Asuransi:</span> {{ $rule->insurance_fee_percentage }}%</p>
                                            <p class="text-gray-600"><span class="font-semibold text-gray-800">S. Wajib:</span> Rp{{ number_format($rule->mandatory_savings_flat, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        <form action="{{ route('admin.rules.toggle', $rule->id) }}" method="POST">
                                            @csrf
                                            @if($rule->is_active)
                                                <button type="submit" class="bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 text-sm font-bold py-2 px-4 rounded-lg transition shadow-sm">
                                                    Nonaktifkan
                                                </button>
                                            @else
                                                <button type="submit" class="bg-orange-100 border border-orange-200 text-orange-700 hover:bg-orange-200 text-sm font-bold py-2 px-4 rounded-lg transition shadow-sm">
                                                    Aktifkan
                                                </button>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
