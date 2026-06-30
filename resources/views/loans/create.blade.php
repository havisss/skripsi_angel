<x-app-layout>
    <x-slot name="header">
        Pengajuan Pinjaman Baru
    </x-slot>

    <div class="space-y-8">
        <div class="max-w-4xl mx-auto">
            
            @if(session('error'))
                <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg relative shadow-sm" role="alert">
                    <span class="block sm:inline font-semibold">{{ session('error') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg relative shadow-sm">
                    <ul class="list-disc list-inside text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-50 bg-blue-50/50 flex items-center">
                    <svg class="w-6 h-6 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="font-bold text-gray-800 text-lg">Formulir Pengajuan & Kalkulator</h3>
                </div>
                
                <div class="p-6 md:p-8">
                    <form action="{{ route('loans.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf
                        
                        <!-- Input Plafon -->
                        <div class="bg-gray-50/50 p-6 rounded-xl border border-gray-100">
                            <label for="principal_amount" class="block text-sm font-bold text-gray-700 mb-2">Plafon Pinjaman yang Diajukan</label>
                            <div class="relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="text-gray-500 font-bold">Rp</span>
                                </div>
                                <input type="number" name="principal_amount" id="principal_amount" min="1000000" max="25000000" class="focus:ring-orange-500 focus:border-orange-500 block w-full pl-12 pr-4 py-3 sm:text-lg font-bold border-gray-300 rounded-lg text-gray-900" placeholder="Contoh: 15000000" required>
                            </div>
                            <p class="mt-2 text-xs text-gray-500">Minimal Rp 1.000.000 | Maksimal Rp 25.000.000. Sistem akan otomatis menyesuaikan tenor dan bunga.</p>
                        </div>
                        <div class="bg-blue-50/50 p-6 rounded-xl border border-blue-100">
                            <h4 class="text-sm font-bold text-gray-800 mb-4">Rekening Tujuan Pencairan</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Nama Bank</label>
                                    <select name="bank_name" required class="w-full bg-white border border-gray-300 text-gray-900 rounded-lg focus:ring-orange-500 focus:border-orange-500 p-2.5">
                                        <option value="" disabled {{ Auth::user()->bank_name ? '' : 'selected' }}>Pilih Bank...</option>
                                        <option value="BCA" {{ Auth::user()->bank_name == 'BCA' ? 'selected' : '' }}>Bank BCA</option>
                                        <option value="Mandiri" {{ Auth::user()->bank_name == 'Mandiri' ? 'selected' : '' }}>Bank Mandiri</option>
                                        <option value="BNI" {{ Auth::user()->bank_name == 'BNI' ? 'selected' : '' }}>Bank BNI</option>
                                        <option value="BRI" {{ Auth::user()->bank_name == 'BRI' ? 'selected' : '' }}>Bank BRI</option>
                                        <option value="BSI" {{ Auth::user()->bank_name == 'BSI' ? 'selected' : '' }}>Bank Syariah Indonesia (BSI)</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Nomor Rekening</label>
                                    <input type="text" name="bank_account_number" required value="{{ Auth::user()->bank_account_number }}" class="w-full bg-white border border-gray-300 text-gray-900 rounded-lg focus:ring-orange-500 focus:border-orange-500 p-2.5" placeholder="Contoh: 1234567890">
                                </div>
                            </div>
                            <p class="mt-2 text-xs text-blue-600">Penting: Dana pinjaman yang disetujui akan ditransfer ke rekening ini.</p>
                        </div>

                        <!-- Simulasi Kalkulasi (JavaScript) -->
                        <div id="simulationBox" class="hidden bg-white border-2 border-orange-100 p-6 rounded-xl shadow-sm">
                            <div class="flex items-center mb-6 border-b border-gray-100 pb-3">
                                <span class="bg-orange-100 text-orange-600 p-2 rounded-lg mr-3">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                </span>
                                <h3 class="text-lg font-bold text-gray-800">Rincian Kalkulasi Otomatis</h3>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="bg-gray-50 rounded-lg p-4 border border-gray-100">
                                    <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Jangka Waktu (Tenor)</p>
                                    <p class="font-bold text-gray-900 text-lg mt-1" id="sim_tenor">-</p>
                                </div>
                                <div class="bg-gray-50 rounded-lg p-4 border border-gray-100">
                                    <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Suku Bunga (Flat)</p>
                                    <p class="font-bold text-gray-900 text-lg mt-1" id="sim_bunga">-</p>
                                </div>
                                <div class="bg-red-50 rounded-lg p-4 border border-red-100">
                                    <p class="text-xs text-red-500 uppercase tracking-wider font-semibold">Total Potongan (Admin, Asuransi, Simp. Wajib)</p>
                                    <p class="font-bold text-red-600 text-lg mt-1" id="sim_potongan">-</p>
                                </div>
                                <div class="bg-green-50 rounded-lg p-4 border border-green-100">
                                    <p class="text-xs text-green-600 uppercase tracking-wider font-semibold">Pencairan Bersih Diterima</p>
                                    <p class="font-bold text-green-700 text-2xl mt-1" id="sim_bersih">-</p>
                                </div>
                                <div class="md:col-span-2 bg-blue-50 rounded-lg p-6 border border-blue-200 text-center">
                                    <p class="text-sm text-blue-600 uppercase tracking-wider font-bold mb-1">Estimasi Angsuran Per Bulan</p>
                                    <p class="font-black text-blue-800 text-4xl" id="sim_cicilan">-</p>
                                    <p class="text-xs text-blue-500 mt-2">Sudah termasuk angsuran pokok dan bunga flat bulanan.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Upload Dokumen -->
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                                <span class="bg-gray-100 text-gray-600 p-1.5 rounded-lg mr-2"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg></span>
                                Dokumen Persyaratan
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                                    <label class="block text-sm font-bold text-gray-700 mb-2">F.C KTP <span class="text-red-500">*</span></label>
                                    <input type="file" name="document_ktp" accept="image/*" required class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-bold file:bg-orange-50 file:text-orange-600 hover:file:bg-orange-100">
                                </div>
                                <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                                    <label class="block text-sm font-bold text-gray-700 mb-2">F.C STNK <span class="text-gray-400 font-normal">(Opsional)</span></label>
                                    <input type="file" name="document_stnk" accept="image/*" class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-bold file:bg-orange-50 file:text-orange-600 hover:file:bg-orange-100">
                                </div>
                                <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                                    <label class="block text-sm font-bold text-gray-700 mb-2">F.C BPKB <span class="text-gray-400 font-normal">(Opsional)</span></label>
                                    <input type="file" name="document_bpkb" accept="image/*" class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-bold file:bg-orange-50 file:text-orange-600 hover:file:bg-orange-100">
                                </div>
                            </div>
                        </div>

                        <!-- S&K -->
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <div class="flex items-start">
                                <div class="flex items-center h-5 mt-1">
                                    <input id="terms" name="terms_accepted" type="checkbox" required class="focus:ring-orange-500 h-5 w-5 text-orange-600 border-gray-300 rounded cursor-pointer">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="terms" class="font-bold text-gray-800 cursor-pointer">Saya menyetujui Syarat & Ketentuan Koperasi</label>
                                    <p class="text-gray-500 mt-1">Dengan mencentang ini, saya menyatakan bahwa data yang diberikan adalah benar, dan saya bersedia pencairan dana dipotong di awal untuk biaya admin, asuransi, dan simpanan wajib sesuai rincian kalkulasi di atas.</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end pt-4">
                            <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold text-lg py-3 px-8 rounded-xl shadow-md transition transform hover:-translate-y-1">
                                Kirim Pengajuan Pinjaman
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Kalkulasi Dinamis -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const rules = @json($rules);
            const inputPrincipal = document.getElementById('principal_amount');
            const simBox = document.getElementById('simulationBox');
            
            const formatRupiah = (number) => {
                return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(number);
            };

            inputPrincipal.addEventListener('input', function() {
                const p = parseFloat(this.value);
                
                if (p && p >= 1000000 && p <= 25000000) {
                    simBox.classList.remove('hidden');
                    
                    // Cari rule yang cocok
                    let matchedRule = rules.find(r => p >= r.min_plafon && p <= r.max_plafon);
                    
                    if (matchedRule) {
                        const tenor = matchedRule.tenor_months;
                        const bungaRate = matchedRule.interest_rate_monthly / 100;
                        const adminRate = matchedRule.admin_fee_percent / 100;
                        const asuransiRate = matchedRule.insurance_fee_percent / 100;
                        const simpananWajib = parseFloat(matchedRule.mandatory_savings_flat);

                        const potongan = (p * adminRate) + (p * asuransiRate) + simpananWajib;
                        const terimaBersih = p - potongan;

                        const cicilanPokok = p / tenor;
                        const bebanBunga = p * bungaRate;
                        const angsuranBulan = cicilanPokok + bebanBunga;

                        document.getElementById('sim_tenor').innerText = tenor + ' Bulan';
                        document.getElementById('sim_bunga').innerText = matchedRule.interest_rate_monthly + '% / Bulan';
                        document.getElementById('sim_potongan').innerText = formatRupiah(potongan);
                        document.getElementById('sim_bersih').innerText = formatRupiah(terimaBersih);
                        document.getElementById('sim_cicilan').innerText = formatRupiah(angsuranBulan);
                    } else {
                        simBox.classList.add('hidden');
                    }
                } else {
                    simBox.classList.add('hidden');
                }
            });
        });
    </script>
</x-app-layout>
