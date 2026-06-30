<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Sarasehan Koperasi Mandiri') }}</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Tailwind CDN (Forcing CDN so styles always work without npm run build) -->
        <script src="https://cdn.tailwindcss.com"></script>
        
        <!-- Custom Configuration for typical Cooperative Colors -->
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            kop: {
                                green: '#047857', // Emerald 700
                                light: '#ecfdf5', // Emerald 50
                                blue: '#1e3a8a',  // Blue 900
                                accent: '#f59e0b' // Amber 500
                            }
                        }
                    }
                }
            }
        </script>
        <style>
            html {
                scroll-behavior: smooth;
            }
        </style>
    </head>
    <body class="font-sans antialiased text-gray-800 bg-white selection:bg-kop-green selection:text-white">
        
        <!-- Top Bar -->
        <div class="bg-kop-blue text-white py-2 text-xs hidden md:block">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <div class="flex space-x-6">
                    <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg> (021) 1234-5678</span>
                    <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg> info@sarasehankoperasimandiri.com</span>
                </div>
                <div>
                    <span>Terdaftar dan diawasi oleh Kementerian Koperasi dan UKM Republik Indonesia</span>
                </div>
            </div>
        </div>

        <!-- Navbar -->
        <nav class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20 items-center">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center gap-3">
                        <div class="w-12 h-12 bg-kop-green rounded-full flex items-center justify-center shadow-md">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                        </div>
                        <div>
                            <h1 class="text-xl font-bold tracking-tight text-kop-blue leading-none">SARASEHAN KOPERASI MANDIRI</h1>
                            <p class="text-[11px] text-gray-500 font-semibold leading-none mt-1">Koperasi Simpan Pinjam</p>
                        </div>
                    </div>

                    <!-- Desktop Menu -->
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="#beranda" class="text-sm font-semibold text-kop-green border-b-2 border-kop-green py-2 transition">Beranda</a>
                        <a href="#tentang" class="text-sm font-semibold text-gray-600 hover:text-kop-green transition">Tentang Kami</a>
                        <a href="#layanan" class="text-sm font-semibold text-gray-600 hover:text-kop-green transition">Produk & Layanan</a>
                        <a href="#kalkulator" class="text-sm font-semibold text-gray-600 hover:text-kop-green transition">Simulasi Pinjaman</a>
                        
                        <div class="flex items-center space-x-3 ml-4 pl-4 border-l border-gray-200">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="bg-kop-blue hover:bg-blue-800 text-white text-sm font-bold px-6 py-2.5 rounded-md transition shadow-md">
                                        Member Area
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="text-sm font-bold text-kop-blue hover:text-blue-800 border-2 border-kop-blue px-5 py-2 rounded-md transition">
                                        Masuk
                                    </a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="bg-kop-green hover:bg-green-700 text-white text-sm font-bold px-5 py-2.5 rounded-md transition shadow-md">
                                            Daftar Anggota
                                        </a>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="relative bg-kop-blue overflow-hidden min-h-[600px] flex items-center">
            <!-- Background Image -->
            <div class="absolute inset-0">
                <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Hero Background" class="w-full h-full object-cover object-center" />
                <div class="absolute inset-0 bg-gradient-to-r from-kop-blue/95 via-kop-blue/80 to-transparent"></div>
                <div class="absolute inset-0 bg-black/20"></div>
            </div>

            <!-- Content -->
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-20 lg:py-32 z-10">
                <div class="max-w-2xl">
                    <span class="inline-block py-1 px-3 rounded-full bg-kop-green/20 border border-kop-green/50 text-kop-green text-sm font-semibold mb-6 backdrop-blur-sm text-white">
                        Koperasi Simpan Pinjam Terbaik
                    </span>
                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6 drop-shadow-md">
                        Bersama Membangun <br><span class="text-kop-accent">Kesejahteraan</span> Bersama.
                    </h2>
                    <p class="text-lg md:text-xl text-gray-200 mb-10 leading-relaxed drop-shadow">
                        Koperasi Simpan Pinjam Sejahtera hadir memberikan solusi finansial yang aman, transparan, dan saling menguntungkan berasaskan kekeluargaan untuk seluruh anggota.
                    </p>
                    <div class="flex flex-col sm:flex-row flex-wrap gap-4">
                        <a href="{{ route('register') }}" class="text-center px-8 py-3.5 text-base font-bold rounded-md text-white bg-kop-green hover:bg-green-600 transition shadow-lg">
                            Menjadi Anggota
                        </a>
                        <a href="#kalkulator" class="flex items-center justify-center px-8 py-3.5 text-base font-bold rounded-md text-white bg-kop-accent hover:bg-yellow-500 transition shadow-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                            Simulasi Pinjaman
                        </a>
                        <a href="#layanan" class="text-center px-8 py-3.5 text-base font-bold rounded-md text-white border-2 border-white/30 hover:bg-white/10 backdrop-blur-sm transition shadow-sm">
                            Lihat Produk
                        </a>
                    </div>
                    
                    <div class="mt-12 pt-8 border-t border-white/20 flex flex-wrap items-center gap-6 sm:gap-10">
                        <div>
                            <p class="text-3xl font-extrabold text-white">10k+</p>
                            <p class="text-sm font-medium text-gray-300">Anggota Aktif</p>
                        </div>
                        <div class="w-px h-12 bg-white/20 hidden sm:block"></div>
                        <div>
                            <p class="text-3xl font-extrabold text-white">Rp 50M+</p>
                            <p class="text-sm font-medium text-gray-300">Aset Dikelola</p>
                        </div>
                        <div class="w-px h-12 bg-white/20 hidden sm:block"></div>
                        <div>
                            <p class="text-3xl font-extrabold text-white">15+ Thn</p>
                            <p class="text-sm font-medium text-gray-300">Pengalaman</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Bottom decorative shape -->
            <div class="absolute bottom-0 left-0 right-0">
                <svg class="fill-current text-white h-8 md:h-16 w-full" preserveAspectRatio="none" viewBox="0 0 1440 54" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0,54 L1440,54 L1440,0 C1200,36 960,54 720,54 C480,54 240,36 0,0 L0,54 Z"></path>
                </svg>
            </div>
        </div>



        <!-- Visi Misi Section -->
        <div id="tentang" class="py-24 bg-white relative overflow-hidden">
            <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-kop-green/5 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-96 h-96 bg-kop-blue/5 rounded-full blur-3xl"></div>
            
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-12 h-1 bg-kop-accent rounded-full"></div>
                            <h3 class="text-kop-green font-bold tracking-widest uppercase text-sm">Tentang SARASEHAN KOPERASI MANDIRI</h3>
                        </div>
                        <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-kop-blue mb-6 leading-tight">
                            Pilar Ekonomi Kerakyatan yang <span class="text-transparent bg-clip-text bg-gradient-to-r from-kop-blue to-kop-green">Solid & Terpercaya</span>
                        </h2>
                        <p class="text-gray-600 mb-10 text-lg leading-relaxed">
                            Menjadi lembaga keuangan mikro berbasis koperasi yang unggul, sehat, dan terpercaya untuk meningkatkan taraf hidup serta kesejahteraan anggota di seluruh nusantara.
                        </p>
                        
                        <div class="space-y-8">
                            <div class="flex items-start group">
                                <div class="flex-shrink-0 w-14 h-14 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center text-kop-blue mt-1 group-hover:scale-110 group-hover:bg-kop-blue group-hover:text-white transition duration-300 shadow-sm">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div class="ml-5">
                                    <h4 class="text-xl font-bold text-gray-900 mb-2">Pelayanan Cepat & Transparan</h4>
                                    <p class="text-gray-600 leading-relaxed">Memberikan pelayanan simpan pinjam yang cepat, mudah, dan sangat transparan dengan dukungan teknologi digital masa kini.</p>
                                </div>
                            </div>
                            <div class="flex items-start group">
                                <div class="flex-shrink-0 w-14 h-14 rounded-xl bg-green-50 border border-green-100 flex items-center justify-center text-kop-green mt-1 group-hover:scale-110 group-hover:bg-kop-green group-hover:text-white transition duration-300 shadow-sm">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                                </div>
                                <div class="ml-5">
                                    <h4 class="text-xl font-bold text-gray-900 mb-2">Kemandirian Finansial</h4>
                                    <p class="text-gray-600 leading-relaxed">Membangun kemandirian ekonomi seluruh anggota melalui edukasi literasi keuangan yang rutin dan tepat sasaran.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="relative mt-10 lg:mt-0">
                        <!-- Decorative elements -->
                        <div class="absolute inset-0 bg-gradient-to-tr from-kop-blue to-kop-green rounded-3xl transform rotate-3 scale-105 opacity-10 blur-xl"></div>
                        <div class="absolute -top-6 -right-6 w-24 h-24 bg-kop-accent/20 rounded-full blur-2xl"></div>
                        
                        <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Tim Koperasi" class="relative rounded-3xl shadow-2xl object-cover h-[550px] w-full border-4 border-white">
                        
                        <!-- Floating Badge -->
                        <div class="absolute -bottom-8 -left-8 bg-white p-5 rounded-2xl shadow-xl border border-gray-50 flex items-center gap-4 z-10 animate-[bounce_4s_infinite]">
                            <div class="w-14 h-14 bg-gradient-to-br from-kop-accent to-yellow-500 rounded-full flex items-center justify-center text-white shadow-inner">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            </div>
                            <div>
                                <p class="font-extrabold text-gray-900 text-lg">Legal & Aman</p>
                                <p class="text-sm text-gray-500 font-medium">Diawasi Kemenkop UKM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Layanan Section -->
        <div id="layanan" class="py-24 bg-slate-50 relative border-t border-gray-100">
            <!-- Subtle background pattern -->
            <div class="absolute inset-0 opacity-[0.02]" style="background-image: radial-gradient(#1e3a8a 1.5px, transparent 1.5px); background-size: 24px 24px;"></div>
            
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Logos (bisa diganti source-nya nanti) -->
                <div class="max-w-5xl mx-auto mb-24">
                    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 py-10 px-10 flex flex-wrap justify-center md:justify-around items-center gap-12 border border-white relative z-10">
                        <img src="{{ asset('build/assets/images/logo/koperasi.png') }}" alt="Logo Koperasi" class="h-20 md:h-24 object-contain transition-transform duration-500 hover:scale-105">
                        <img src="{{ asset('build/assets/images/logo/kemenkop.png') }}" alt="Logo Kemenkop" class="h-20 md:h-24 object-contain transition-transform duration-500 hover:scale-105">
                        <img src="{{ asset('build/assets/images/logo/diskopukm.png') }}" alt="Logo Diskopukm" class="h-20 md:h-24 object-contain transition-transform duration-500 hover:scale-105">
                    </div>
                </div>

                <div class="text-center mb-20 relative z-10">
                    <div class="flex items-center justify-center gap-3 mb-4">
                        <div class="w-12 h-1 bg-kop-green rounded-full"></div>
                        <h3 class="text-kop-green font-bold tracking-widest uppercase text-sm">Produk Koperasi</h3>
                        <div class="w-12 h-1 bg-kop-green rounded-full"></div>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-extrabold text-kop-blue mb-6">Layanan Kami</h2>
                    <p class="text-gray-600 text-lg max-w-2xl mx-auto">Dilayani oleh tenaga profesional yang sangat akrab dengan kebutuhan pelaku usaha dan masyarakat luas.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 max-w-6xl mx-auto">
                    <!-- Produk 1 -->
                    <div class="bg-white rounded-xl overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-xl transition duration-300 border border-gray-100 flex flex-col items-center text-center p-10 cursor-pointer group">
                        <div class="text-kop-blue mb-6 group-hover:scale-110 transition duration-300">
                            <!-- Icon (Tabungan) -->
                            <svg class="w-14 h-14 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <h4 class="font-bold text-gray-900 text-xl mb-4">Tabungan Koperasi</h4>
                        <p class="text-sm text-gray-500 mb-10 leading-relaxed px-2">Menyediakan layanan yang fleksibel dalam penyetoran dan pengambilan dana</p>
                        <div class="mt-auto">
                            <svg class="w-7 h-7 text-gray-400 group-hover:text-kop-blue transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </div>
                    </div>

                    <!-- Produk 2 (Highlighted) -->
                    <div class="bg-kop-blue rounded-xl overflow-hidden shadow-2xl hover:-translate-y-2 transition duration-300 flex flex-col items-center text-center p-10 cursor-pointer group">
                        <div class="text-white mb-6 group-hover:scale-110 transition duration-300">
                            <!-- Icon (Pinjaman) -->
                            <svg class="w-14 h-14 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                        </div>
                        <h4 class="font-bold text-white text-xl mb-4">Pinjaman Usaha</h4>
                        <p class="text-sm text-blue-100 mb-10 leading-relaxed px-2">Menyediakan layanan pinjaman bagi pelaku usaha (Profesional & Wirausahawan), untuk memenuhi kebutuhan tambahan investasi peralatan / mesin produksi atau modal kerja permanen</p>
                        <div class="mt-auto">
                            <svg class="w-7 h-7 text-blue-300 group-hover:text-white transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </div>
                    </div>
                    
                    <!-- Produk 3 -->
                    <div class="bg-white rounded-xl overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-xl transition duration-300 border border-gray-100 flex flex-col items-center text-center p-10 cursor-pointer group">
                        <div class="text-kop-blue mb-6 group-hover:scale-110 transition duration-300">
                            <!-- Icon (Simpanan Berjangka) -->
                            <svg class="w-14 h-14 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <h4 class="font-bold text-gray-900 text-xl mb-4">Simpanan Berjangka</h4>
                        <p class="text-sm text-gray-500 mb-10 leading-relaxed px-2">Menyediakan layanan untuk menampung dana investasi anggota dalam usaha simpan pinjam yang dijalankan SARASEHAN KOPERASI MANDIRI</p>
                        <div class="mt-auto">
                            <svg class="w-7 h-7 text-gray-400 group-hover:text-kop-blue transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kalkulator Section -->
        <div id="kalkulator" class="py-24 bg-white relative overflow-hidden">
            <div class="absolute right-0 top-0 w-full md:w-1/3 h-full bg-gradient-to-l from-blue-50/60 to-transparent"></div>
            
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <div class="flex items-center justify-center gap-3 mb-4">
                        <h3 class="text-kop-accent font-bold tracking-widest uppercase text-sm">Alat Finansial</h3>
                    </div>
                    <h2 class="text-4xl font-extrabold text-kop-blue mb-6">Kalkulator Pinjaman</h2>
                    <div class="w-24 h-1.5 bg-kop-accent mx-auto rounded-full mb-6"></div>
                    <p class="text-gray-600 text-lg max-w-2xl mx-auto">Gunakan kalkulator di bawah ini untuk mengestimasi cicilan pinjaman Anda berdasarkan perhitungan bunga efektif/menurun.</p>
                </div>

                <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="p-6 md:p-10 border-b border-gray-100 bg-gray-50/50">
                        <form id="simulasiForm" class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                                <label class="md:col-span-1 text-sm font-bold text-gray-700">Besar Pinjaman</label>
                                <div class="md:col-span-3 flex items-center shadow-sm rounded-md">
                                    <span class="px-4 py-2.5 bg-gray-100 border border-r-0 border-gray-300 rounded-l-md font-semibold text-gray-600">Rp</span>
                                    <input type="number" id="loanAmount" class="w-full px-4 py-2.5 border border-gray-300 rounded-r-md focus:ring-kop-green focus:border-kop-green outline-none" placeholder="Contoh: 20000000" required>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                                <label class="md:col-span-1 text-sm font-bold text-gray-700">Bunga / Tahun (%)</label>
                                <div class="md:col-span-3">
                                    <input type="number" id="loanRate" step="0.1" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:ring-kop-green focus:border-kop-green outline-none shadow-sm" placeholder="Contoh: 5" required>
                                    <p class="text-xs text-gray-500 mt-1.5">*Sektor Riil (5%), Simpan Pinjam (7%), atau sesuai kebijakan.</p>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                                <label class="md:col-span-1 text-sm font-bold text-gray-700">Lama Pinjaman</label>
                                <div class="md:col-span-3 flex items-center shadow-sm rounded-md">
                                    <input type="number" id="loanTenor" class="w-full px-4 py-2.5 border border-gray-300 rounded-l-md focus:ring-kop-green focus:border-kop-green outline-none" placeholder="Contoh: 12" required>
                                    <span class="px-4 py-2.5 bg-gray-100 border border-l-0 border-gray-300 rounded-r-md font-semibold text-gray-600">Bulan</span>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                                <label class="md:col-span-1 text-sm font-bold text-gray-700">Pola Bayar</label>
                                <div class="md:col-span-3">
                                    <select id="loanPattern" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:ring-kop-green focus:border-kop-green bg-white outline-none shadow-sm">
                                        <option value="1">1 Bulanan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center pt-4">
                                <div class="md:col-span-1"></div>
                                <div class="md:col-span-3">
                                    <button type="submit" class="bg-kop-blue hover:bg-blue-800 text-white font-bold py-3 px-8 rounded-md transition duration-300 shadow-md w-full md:w-auto flex items-center justify-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                        Simulasikan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div id="resultSection" class="hidden bg-white p-6 md:p-10 border-t-4 border-kop-green">
                        <div class="flex items-center justify-between mb-6">
                            <h4 class="text-xl font-bold text-kop-blue">Tabel Simulasi Angsuran</h4>
                            <button type="button" id="closeResult" class="text-gray-400 hover:text-red-500 transition">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                        </div>
                        <div class="bg-white rounded-lg border border-gray-200 overflow-x-auto shadow-sm">
                            <div id="simulationResult"></div>
                        </div>
                        <div class="mt-6 text-sm text-gray-700 bg-blue-50/50 p-4 rounded-lg border border-blue-100">
                            <p class="font-bold mb-2 text-kop-blue">Catatan Penting:</p>
                            <ol class="list-decimal list-inside space-y-1.5">
                                <li>Perhitungan di atas menggunakan metode bunga <span class="font-semibold">menurun (efektif)</span>.</li>
                                <li>Tabel ini hanya <span class="font-semibold">simulasi atau estimasi</span>, tidak mengikat dan dapat berubah sewaktu-waktu mengikuti kebijakan bunga yang berlaku.</li>
                                <li>Untuk perhitungan final dan pengajuan resmi, silakan hubungi atau kunjungi kantor SARASEHAN Koperasi Mandiri.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('simulasiForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const amount = parseFloat(document.getElementById('loanAmount').value);
                const rate = parseFloat(document.getElementById('loanRate').value);
                const tenor = parseInt(document.getElementById('loanTenor').value);
                
                if (isNaN(amount) || isNaN(rate) || isNaN(tenor) || amount <= 0 || tenor <= 0) return;

                let sisaHutang = amount;
                let tableHTML = `
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">No</th>
                                <th class="px-4 py-3 text-right text-xs font-bold text-gray-700 uppercase tracking-wider">Angsuran Pokok</th>
                                <th class="px-4 py-3 text-right text-xs font-bold text-gray-700 uppercase tracking-wider">Angsuran Bunga</th>
                                <th class="px-4 py-3 text-right text-xs font-bold text-gray-700 uppercase tracking-wider">Total Angsuran</th>
                                <th class="px-4 py-3 text-right text-xs font-bold text-gray-700 uppercase tracking-wider">Sisa Hutang</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="bg-gray-50/50">
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 text-center">-</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 text-right">-</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 text-right">-</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 text-right">-</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm font-semibold text-gray-800 text-right">Rp ${sisaHutang.toLocaleString('id-ID')}</td>
                            </tr>
                `;

                // Calculate base principal (bulatkan ke atas ribuan)
                const pokokBase = Math.ceil(amount / tenor / 1000) * 1000;

                for (let i = 1; i <= tenor; i++) {
                    let pokok = (i === tenor) ? sisaHutang : Math.min(pokokBase, sisaHutang);
                    let bunga = Math.round(sisaHutang * (rate / 100) / 12);
                    let total = pokok + bunga;
                    
                    sisaHutang -= pokok;
                    if (sisaHutang < 0) sisaHutang = 0;
                    
                    tableHTML += `
                        <tr class="hover:bg-blue-50/30 transition">
                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">${i}</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-600 text-right">Rp ${pokok.toLocaleString('id-ID')}</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-600 text-right">Rp ${bunga.toLocaleString('id-ID')}</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm font-bold text-kop-blue text-right">Rp ${total.toLocaleString('id-ID')}</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-800 text-right">Rp ${sisaHutang.toLocaleString('id-ID')}</td>
                        </tr>
                    `;
                }

                tableHTML += `</tbody></table>`;
                document.getElementById('simulationResult').innerHTML = tableHTML;
                document.getElementById('resultSection').classList.remove('hidden');
                
                // Scroll slightly down to make result visible
                setTimeout(() => {
                    document.getElementById('resultSection').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }, 100);
            });
            
            document.getElementById('closeResult').addEventListener('click', function() {
                document.getElementById('resultSection').classList.add('hidden');
            });
        </script>

        <!-- Footer -->
        <footer class="bg-kop-blue text-white pt-16 pb-8 border-t-4 border-kop-green">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                    <div class="col-span-1 md:col-span-2">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-kop-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold tracking-tight text-white leading-none">SARASEHAN KOPERASI MANDIRI</h2>
                                <p class="text-[10px] uppercase text-gray-300 font-bold leading-none mt-1">Badan Hukum No: 123.456/BH/KDK</p>
                            </div>
                        </div>
                        <p class="text-gray-300 text-sm max-w-md mt-4 leading-relaxed">
                            Koperasi Simpan Pinjam Sejahtera berkomitmen memajukan kesejahteraan anggota dengan prinsip kekeluargaan, kegotongroyongan, dan transparansi keuangan secara digital.
                        </p>
                    </div>
                    <div>
                        <h4 class="font-bold text-white mb-4 uppercase text-sm">Informasi</h4>
                        <ul class="space-y-2 text-sm text-gray-300">
                            <li><a href="#" class="hover:text-white transition">Profil Koperasi</a></li>
                            <li><a href="#" class="hover:text-white transition">Struktur Organisasi</a></li>
                            <li><a href="#" class="hover:text-white transition">Laporan SHU Tahunan</a></li>
                            <li><a href="#" class="hover:text-white transition">Syarat & Ketentuan</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold text-white mb-4 uppercase text-sm">Hubungi Kami</h4>
                        <ul class="space-y-3 text-sm text-gray-300">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                Jl. Nusa Kambangan No. 123, Denpasar Barat, Denpasar, Bali, Indonesia
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                (021) 1234-5678
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                info@sarasehankoperasimandiri.com
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-gray-700/50 pt-8 text-center text-xs text-gray-400 flex flex-col md:flex-row justify-between items-center">
                    <p>&copy; {{ date('Y') }} Koperasi Simpan Pinjam Sarasehan. Hak Cipta Dilindungi Undang-Undang.</p>
                    <div class="mt-4 md:mt-0 flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition">Facebook</a>
                        <a href="#" class="text-gray-400 hover:text-white transition">Instagram</a>
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- Floating WhatsApp -->
        <a href="https://wa.me/6281234567890" target="_blank" class="fixed bottom-6 right-6 bg-[#006bb3] hover:bg-blue-800 text-white px-5 py-3 rounded-full shadow-2xl transition-all duration-300 z-50 flex items-center justify-center font-bold text-sm shadow-[0_4px_15px_rgba(0,107,179,0.4)]" aria-label="Chat WhatsApp">
            <!-- Icon Chat/WA -->
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
            Butuh bantuan?
        </a>
        
    </body>
</html>
