<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Sarasehan Koperasi Mandiri') }} - Solusi Finansial Terpercaya</title>
        <meta name="description" content="Koperasi Simpan Pinjam terpercaya dengan bunga kompetitif, proses cepat, dan pelayanan profesional untuk kesejahteraan anggota.">
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800,900&display=swap" rel="stylesheet" />

        <!-- Tailwind CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
        
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Inter', 'sans-serif'],
                        },
                        colors: {
                            kop: {
                                green: '#047857',
                                greenDark: '#065f46',
                                light: '#ecfdf5',
                                blue: '#1e3a8a',
                                blueDark: '#172554',
                                accent: '#f59e0b',
                                accentDark: '#d97706',
                                warm: '#faf9f6',
                            }
                        }
                    }
                }
            }
        </script>
        <style>
            html { scroll-behavior: smooth; }
            
            /* Custom Animations */
            @keyframes float {
                0% { transform: translateY(0px); }
                50% { transform: translateY(-15px); }
                100% { transform: translateY(0px); }
            }
            .animate-float { animation: float 5s ease-in-out infinite; }
            .animate-float-delayed { animation: float 6s ease-in-out infinite 2s; }
            .animate-float-slow { animation: float 7s ease-in-out infinite 1s; }
            
            @keyframes pulse-ring {
                0% { transform: scale(0.8); box-shadow: 0 0 0 0 rgba(4, 120, 87, 0.7); }
                70% { transform: scale(1); box-shadow: 0 0 0 20px rgba(4, 120, 87, 0); }
                100% { transform: scale(0.8); box-shadow: 0 0 0 0 rgba(4, 120, 87, 0); }
            }
            .animate-pulse-ring { animation: pulse-ring 2.5s infinite cubic-bezier(0.215, 0.61, 0.355, 1); }

            /* Shape Dividers */
            .custom-shape-divider-bottom {
                position: absolute;
                bottom: -1px;
                left: 0;
                width: 100%;
                overflow: hidden;
                line-height: 0;
                transform: rotate(180deg);
                z-index: 20;
            }
            .custom-shape-divider-bottom svg {
                position: relative;
                display: block;
                width: calc(100% + 1.3px);
                height: 80px;
            }
            .custom-shape-divider-top {
                position: absolute;
                top: -1px;
                left: 0;
                width: 100%;
                overflow: hidden;
                line-height: 0;
                z-index: 20;
            }
            .custom-shape-divider-top svg {
                position: relative;
                display: block;
                width: calc(100% + 1.3px);
                height: 80px;
            }

            
            /* Animated counter */
            @keyframes fadeInUp {
                from { opacity: 0; transform: translateY(30px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .fade-in-up {
                animation: fadeInUp 0.7s ease-out forwards;
            }
            
            /* Promo ticker */
            @keyframes ticker {
                0% { transform: translateX(0); }
                100% { transform: translateX(-50%); }
            }
            .ticker-track {
                animation: ticker 30s linear infinite;
            }
            .ticker-track:hover {
                animation-play-state: paused;
            }
            
            /* Gradient text */
            .text-gradient {
                background-clip: text;
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
            
            /* FAQ accordion */
            .faq-answer {
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.4s ease, padding 0.4s ease;
            }
            .faq-answer.open {
                max-height: 300px;
                padding-top: 1rem;
                padding-bottom: 0.5rem;
            }
            .faq-chevron {
                transition: transform 0.3s ease;
            }
            .faq-chevron.rotated {
                transform: rotate(180deg);
            }

            /* Navbar scroll */
            .nav-transparent { background: transparent; border-color: transparent; }
            .nav-solid { background: rgba(255,255,255,0.97); backdrop-filter: blur(12px); border-color: #e5e7eb; box-shadow: 0 1px 3px rgba(0,0,0,0.06); }
            #mainNav { transition: all 0.35s ease; }
        </style>
    </head>
    <body class="font-sans antialiased text-gray-800 bg-white selection:bg-kop-green selection:text-white">
        
        <!-- Promo Ticker Bar -->
        <div class="bg-gradient-to-r from-kop-accent via-yellow-400 to-kop-accent text-kop-blueDark py-2 overflow-hidden relative z-[60]">
            <div class="ticker-track flex whitespace-nowrap items-center" style="width: max-content;">
                <span class="mx-8 text-sm font-bold flex items-center">🎉 PROMO: Bunga Pinjaman Mulai 0.5%/bulan — Daftar Sekarang!</span>
                <span class="mx-8 text-sm font-bold flex items-center">💰 SHU Tahun 2025 Sudah Dibagikan — Terima Kasih Anggota Setia!</span>
                <span class="mx-8 text-sm font-bold flex items-center">🏆 Terpilih Sebagai Koperasi Berprestasi Tingkat Provinsi 2025</span>
                <span class="mx-8 text-sm font-bold flex items-center">📱 Fitur Baru: Cek Saldo & Angsuran Online di Member Area</span>
                <span class="mx-8 text-sm font-bold flex items-center">🎉 PROMO: Bunga Pinjaman Mulai 0.5%/bulan — Daftar Sekarang!</span>
                <span class="mx-8 text-sm font-bold flex items-center">💰 SHU Tahun 2025 Sudah Dibagikan — Terima Kasih Anggota Setia!</span>
                <span class="mx-8 text-sm font-bold flex items-center">🏆 Terpilih Sebagai Koperasi Berprestasi Tingkat Provinsi 2025</span>
                <span class="mx-8 text-sm font-bold flex items-center">📱 Fitur Baru: Cek Saldo & Angsuran Online di Member Area</span>
            </div>
        </div>

        <!-- Navbar (Transparent → Solid on scroll) -->
        <nav id="mainNav" class="fixed w-full top-0 z-50 nav-transparent border-b border-transparent" style="top: 36px;">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20 items-center">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center gap-3">
                        <div class="w-11 h-11 bg-kop-green rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path></svg>
                        </div>
                        <div>
                            <h1 id="navTitle" class="text-lg font-extrabold tracking-tight text-white leading-none transition-colors">SARASEHAN KOPERASI MANDIRI</h1>
                            <p id="navSub" class="text-[10px] text-gray-300 font-semibold leading-none mt-0.5 transition-colors">Koperasi Simpan Pinjam</p>
                        </div>
                    </div>

                    <!-- Desktop Menu -->
                    <div class="hidden lg:flex items-center space-x-6">
                        <a href="#tentang" class="nav-link text-sm font-semibold text-white/90 hover:text-kop-accent transition">Tentang</a>
                        <a href="#keunggulan" class="nav-link text-sm font-semibold text-white/90 hover:text-kop-accent transition">Keunggulan</a>
                        <a href="#layanan" class="nav-link text-sm font-semibold text-white/90 hover:text-kop-accent transition">Produk</a>
                        <a href="#promo" class="nav-link text-sm font-semibold text-white/90 hover:text-kop-accent transition">Promo</a>
                        <a href="#kalkulator" class="nav-link text-sm font-semibold text-white/90 hover:text-kop-accent transition">Simulasi</a>
                        <a href="#faq" class="nav-link text-sm font-semibold text-white/90 hover:text-kop-accent transition">FAQ</a>
                        
                        <div class="flex items-center space-x-3 ml-4 pl-4 border-l border-white/20">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="bg-kop-green hover:bg-kop-greenDark text-white text-sm font-bold px-5 py-2.5 rounded-lg transition shadow-lg shadow-green-900/20">
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" id="navLogin" class="text-sm font-bold text-white hover:text-kop-accent px-4 py-2 transition">
                                        Masuk
                                    </a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="bg-kop-green hover:bg-kop-greenDark text-white text-sm font-bold px-5 py-2.5 rounded-lg transition shadow-lg shadow-green-900/20">
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

        <!-- ============================================ -->
        <!-- HERO SECTION - Full Screen -->
        <!-- ============================================ -->
        <header class="relative min-h-[105vh] flex items-center overflow-hidden bg-kop-blueDark">
            <!-- Background Image -->
            <div class="absolute inset-0">
                <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Hero" class="w-full h-full object-cover opacity-40" />
                <div class="absolute inset-0 bg-gradient-to-r from-kop-blueDark via-kop-blueDark/90 to-kop-blue/60"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-kop-blueDark via-transparent to-transparent"></div>
            </div>
            
            <!-- Clean hero background without glowing orbs -->

            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full pt-32 pb-48">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <!-- Left: Text -->
                    <div>
                        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/20 backdrop-blur-sm mb-8">
                            <span class="flex h-2 w-2 relative">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                            </span>
                            <span class="text-sm font-bold text-green-300 uppercase tracking-wider">Resmi Berbadan Hukum</span>
                        </div>
                        
                        <h2 class="text-4xl md:text-5xl lg:text-6xl font-black text-white leading-[1.1] mb-6">
                            Wujudkan Impian<br>
                            <span class="text-kop-accent">Finansial Anda</span><br>
                            Bersama Kami.
                        </h2>
                        
                        <p class="text-lg text-gray-300 mb-10 max-w-xl leading-relaxed">
                            Solusi simpan pinjam terpercaya dengan bunga kompetitif, proses cepat tanpa ribet, dan transparansi penuh untuk setiap rupiah yang Anda percayakan.
                        </p>
                        
                        <div class="flex flex-col sm:flex-row gap-4 mb-12">
                            <a href="{{ route('register') }}" class="text-center px-8 py-4 text-base font-bold rounded-xl text-white bg-kop-green hover:bg-kop-greenDark transition shadow-xl shadow-green-900/30 hover:-translate-y-0.5 transform">
                                Mulai Bergabung →
                            </a>
                            <a href="#kalkulator" class="flex items-center justify-center px-8 py-4 text-base font-bold rounded-xl text-white border-2 border-white/25 hover:bg-white/10 backdrop-blur-sm transition">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                Simulasi Pinjaman
                            </a>
                        </div>

                        <!-- Stats Row -->
                        <div class="flex flex-wrap items-center gap-8 pt-8 border-t border-white/15">
                            <div>
                                <p class="text-3xl font-black text-white">10,000+</p>
                                <p class="text-sm text-gray-400 font-medium">Anggota Aktif</p>
                            </div>
                            <div class="w-px h-10 bg-white/15 hidden sm:block"></div>
                            <div>
                                <p class="text-3xl font-black text-white">Rp 50M+</p>
                                <p class="text-sm text-gray-400 font-medium">Aset Dikelola</p>
                            </div>
                            <div class="w-px h-10 bg-white/15 hidden sm:block"></div>
                            <div>
                                <p class="text-3xl font-black text-white">15+ Thn</p>
                                <p class="text-sm text-gray-400 font-medium">Berpengalaman</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Floating Cards -->
                    <div class="hidden lg:block relative">
                        <div class="relative w-full h-[500px]">
                            <!-- Card 1 -->
                            <div class="absolute top-0 right-0 w-72 bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 shadow-xl animate-float" style="animation: float 5s ease-in-out infinite, fadeInUp 0.7s ease-out 0.2s both;">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    </div>
                                    <div>
                                        <p class="text-white font-bold text-sm">Pinjaman Disetujui</p>
                                        <p class="text-green-400 text-xs font-medium">2 menit yang lalu</p>
                                    </div>
                                </div>
                                <p class="text-white/70 text-sm">Pengajuan pinjaman senilai <span class="text-kop-accent font-bold">Rp 25.000.000</span> telah disetujui.</p>
                            </div>
                            
                            <!-- Card 2 -->
                            <div class="absolute top-40 left-0 w-64 bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 shadow-xl animate-float-delayed" style="animation: float 6s ease-in-out infinite 2s, fadeInUp 0.7s ease-out 0.5s both;">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-10 h-10 bg-kop-accent/20 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-kop-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8V7m0 10v1"></path></svg>
                                    </div>
                                    <div>
                                        <p class="text-white font-bold text-sm">SHU Terbagi</p>
                                        <p class="text-kop-accent text-xs font-medium">Desember 2025</p>
                                    </div>
                                </div>
                                <p class="text-3xl font-black text-white">Rp 2.4M</p>
                                <p class="text-white/60 text-xs mt-1">Total SHU dibagikan</p>
                            </div>
                            
                            <!-- Card 3 -->
                            <div class="absolute bottom-0 right-8 w-72 bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 shadow-xl animate-float-slow" style="animation: float 7s ease-in-out infinite 1s, fadeInUp 0.7s ease-out 0.8s both;">
                                <p class="text-white/70 text-xs font-medium uppercase tracking-wider mb-2">Tingkat Kepuasan</p>
                                <div class="flex items-end gap-2">
                                    <p class="text-4xl font-black text-white">98.7%</p>
                                    <span class="text-green-400 text-sm font-bold mb-1">↑ 2.1%</span>
                                </div>
                                <div class="w-full bg-white/20 rounded-full h-2 mt-3 overflow-hidden">
                                    <div class="bg-green-400 h-2 rounded-full" style="width: 98.7%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scroll Indicator -->
            <div class="absolute bottom-28 left-1/2 transform -translate-x-1/2 animate-bounce z-30">
                <a href="#tentang" class="w-10 h-10 bg-white/10 border border-white/30 backdrop-blur-md rounded-full flex items-center justify-center hover:bg-white/30 transition text-white shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                </a>
            </div>
            
            <!-- Modern Wave separator -->
            <div class="custom-shape-divider-bottom">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="fill-white"></path>
                </svg>
            </div>
        </header>

        <!-- ============================================ -->
        <!-- PARTNER LOGOS -->
        <!-- ============================================ -->
        <section class="py-12 bg-white border-b border-gray-100">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                <p class="text-center text-sm font-semibold text-gray-400 uppercase tracking-widest mb-8">Terdaftar & Diawasi Oleh</p>
                <div class="flex flex-wrap justify-center items-center gap-10 md:gap-16">
                    <img src="{{ asset('images/logo/koperasi.png') }}" alt="Logo Koperasi" class="h-24 md:h-32 object-contain">
                    <img src="{{ asset('images/logo/kemenkop.png') }}" alt="Logo Kemenkop" class="h-24 md:h-32 object-contain">
                    <img src="{{ asset('images/logo/diskopukm.png') }}" alt="Logo Diskopukm" class="h-24 md:h-32 object-contain">
                </div>
            </div>
        </section>

        <!-- ============================================ -->
        <!-- TENTANG KAMI -->
        <!-- ============================================ -->
        <section id="tentang" class="py-24 bg-white relative overflow-hidden">
            <div class="absolute top-0 right-0 -mt-20 -mr-20 w-[500px] h-[500px] bg-kop-green/5 rounded-full blur-3xl"></div>
            
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div>
                        <div class="flex items-center gap-3 mb-5">
                            <div class="w-12 h-1 bg-kop-accent rounded-full"></div>
                            <span class="text-kop-green font-bold tracking-widest uppercase text-sm">Tentang Kami</span>
                        </div>
                        <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-kop-blue mb-6 leading-tight">
                            Pilar Ekonomi Kerakyatan yang <span class="text-kop-blueDark">Solid & Terpercaya</span>
                        </h2>
                        <p class="text-gray-600 mb-8 text-lg leading-relaxed">
                            Berdiri sejak 2010, Sarasehan Koperasi Mandiri telah melayani lebih dari 10.000 anggota dengan prinsip kekeluargaan dan gotong royong. Kami berkomitmen membangun kemandirian ekonomi masyarakat melalui layanan simpan pinjam yang transparan dan profesional.
                        </p>
                        
                        <div class="space-y-6">
                            <div class="flex items-start group">
                                <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center text-kop-blue group-hover:bg-kop-blue group-hover:text-white transition duration-300">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-bold text-gray-900 mb-1">Pelayanan Cepat & Transparan</h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">Proses pengajuan dan pencairan dana cepat dengan dukungan sistem digital modern.</p>
                                </div>
                            </div>
                            <div class="flex items-start group">
                                <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-green-50 border border-green-100 flex items-center justify-center text-kop-green group-hover:bg-kop-green group-hover:text-white transition duration-300">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-bold text-gray-900 mb-1">Kemandirian Finansial</h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">Edukasi literasi keuangan dan pendampingan usaha untuk anggota.</p>
                                </div>
                            </div>
                            <div class="flex items-start group">
                                <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-amber-50 border border-amber-100 flex items-center justify-center text-kop-accent group-hover:bg-kop-accent group-hover:text-white transition duration-300">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-bold text-gray-900 mb-1">Asas Kekeluargaan</h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">Setiap anggota adalah keluarga. Keputusan diambil secara musyawarah demi kepentingan bersama.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Image side -->
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-tr from-kop-blue to-kop-green rounded-3xl transform rotate-3 scale-105 opacity-10 blur-xl"></div>
                        <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Tim Koperasi" class="relative rounded-3xl shadow-2xl object-cover h-[500px] w-full border-4 border-white">
                        
                        <!-- Floating badge -->
                        <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-2xl shadow-xl border border-gray-100 flex items-center gap-3 z-10">
                            <div class="w-12 h-12 bg-gradient-to-br from-kop-accent to-yellow-500 rounded-full flex items-center justify-center text-white">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            </div>
                            <div>
                                <p class="font-extrabold text-gray-900">Legal & Aman</p>
                                <p class="text-xs text-gray-500 font-medium">Diawasi Kemenkop UKM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================ -->
        <!-- MENGAPA MEMILIH KAMI (6 reasons) -->
        <!-- ============================================ -->
        <section id="keunggulan" class="py-24 pt-32 bg-kop-warm relative">
            <div class="custom-shape-divider-top">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="fill-white"></path>
                </svg>
            </div>
            <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(#1e3a8a 1px, transparent 1px); background-size: 20px 20px;"></div>
            
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <div class="flex items-center justify-center gap-3 mb-4">
                        <div class="w-10 h-1 bg-kop-accent rounded-full"></div>
                        <span class="text-kop-green font-bold tracking-widest uppercase text-sm">Keunggulan</span>
                        <div class="w-10 h-1 bg-kop-accent rounded-full"></div>
                    </div>
                    <h2 class="text-3xl md:text-5xl font-extrabold text-kop-blue mb-4">Mengapa Memilih Kami?</h2>
                    <p class="text-gray-600 text-lg max-w-2xl mx-auto">Kami hadir dengan keunggulan yang dirancang untuk memberikan rasa aman dan kemudahan bagi setiap anggota.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Reason 1 -->
                    <div class="bg-white rounded-2xl p-8 border border-gray-100 hover:shadow-xl hover:border-kop-green/30 transition-all duration-300 group">
                        <div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center mb-6 group-hover:bg-kop-blue group-hover:scale-110 transition-all duration-300">
                            <svg class="w-7 h-7 text-kop-blue group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-3">Aman & Legal</h4>
                        <p class="text-gray-600 text-sm leading-relaxed">Terdaftar resmi di Kementerian Koperasi dan UKM RI dengan badan hukum yang sah. Dana Anda terlindungi sepenuhnya.</p>
                    </div>
                    
                    <!-- Reason 2 -->
                    <div class="bg-white rounded-2xl p-8 border border-gray-100 hover:shadow-xl hover:border-kop-green/30 transition-all duration-300 group">
                        <div class="w-14 h-14 bg-green-50 rounded-xl flex items-center justify-center mb-6 group-hover:bg-kop-green group-hover:scale-110 transition-all duration-300">
                            <svg class="w-7 h-7 text-kop-green group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-3">Bunga Rendah & Kompetitif</h4>
                        <p class="text-gray-600 text-sm leading-relaxed">Bunga pinjaman dengan sistem menurun (efektif) mulai dari 0.5% per bulan. Lebih hemat dibanding lembaga keuangan lain.</p>
                    </div>
                    
                    <!-- Reason 3 -->
                    <div class="bg-white rounded-2xl p-8 border border-gray-100 hover:shadow-xl hover:border-kop-green/30 transition-all duration-300 group">
                        <div class="w-14 h-14 bg-amber-50 rounded-xl flex items-center justify-center mb-6 group-hover:bg-kop-accent group-hover:scale-110 transition-all duration-300">
                            <svg class="w-7 h-7 text-kop-accent group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-3">Proses Cepat 1x24 Jam</h4>
                        <p class="text-gray-600 text-sm leading-relaxed">Pengajuan pinjaman hingga pencairan dana diproses dalam waktu maksimal 1 hari kerja. Tanpa prosedur berbelit.</p>
                    </div>
                    
                    <!-- Reason 4 -->
                    <div class="bg-white rounded-2xl p-8 border border-gray-100 hover:shadow-xl hover:border-kop-green/30 transition-all duration-300 group">
                        <div class="w-14 h-14 bg-indigo-50 rounded-xl flex items-center justify-center mb-6 group-hover:bg-indigo-600 group-hover:scale-110 transition-all duration-300">
                            <svg class="w-7 h-7 text-indigo-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-3">Akses Digital 24/7</h4>
                        <p class="text-gray-600 text-sm leading-relaxed">Pantau saldo simpanan, status pinjaman, dan riwayat angsuran kapan saja melalui Member Area online kami.</p>
                    </div>
                    
                    <!-- Reason 5 -->
                    <div class="bg-white rounded-2xl p-8 border border-gray-100 hover:shadow-xl hover:border-kop-green/30 transition-all duration-300 group">
                        <div class="w-14 h-14 bg-rose-50 rounded-xl flex items-center justify-center mb-6 group-hover:bg-rose-500 group-hover:scale-110 transition-all duration-300">
                            <svg class="w-7 h-7 text-rose-500 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-3">Bagi Hasil SHU Tahunan</h4>
                        <p class="text-gray-600 text-sm leading-relaxed">Setiap akhir tahun, anggota berhak menerima Sisa Hasil Usaha (SHU) secara proporsional dan transparan.</p>
                    </div>
                    
                    <!-- Reason 6 -->
                    <div class="bg-white rounded-2xl p-8 border border-gray-100 hover:shadow-xl hover:border-kop-green/30 transition-all duration-300 group">
                        <div class="w-14 h-14 bg-teal-50 rounded-xl flex items-center justify-center mb-6 group-hover:bg-teal-600 group-hover:scale-110 transition-all duration-300">
                            <svg class="w-7 h-7 text-teal-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-3">Customer Service Responsif</h4>
                        <p class="text-gray-600 text-sm leading-relaxed">Tim profesional kami siap membantu Anda melalui telepon, WhatsApp, atau kunjungan langsung ke kantor.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================ -->
        <!-- PRODUK & LAYANAN (6 products) -->
        <!-- ============================================ -->
        <section id="layanan" class="py-24 pt-32 bg-white relative">
            <div class="custom-shape-divider-top">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="fill-[#faf9f6]"></path>
                </svg>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <div class="flex items-center justify-center gap-3 mb-4">
                        <div class="w-10 h-1 bg-kop-green rounded-full"></div>
                        <span class="text-kop-green font-bold tracking-widest uppercase text-sm">Produk Koperasi</span>
                        <div class="w-10 h-1 bg-kop-green rounded-full"></div>
                    </div>
                    <h2 class="text-3xl md:text-5xl font-extrabold text-kop-blue mb-4">Layanan Lengkap untuk Anda</h2>
                    <p class="text-gray-600 text-lg max-w-2xl mx-auto">Beragam produk simpanan dan pinjaman yang dirancang khusus untuk memenuhi kebutuhan finansial Anda.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Product 1 -->
                    <div class="bg-white rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.04)] hover:shadow-xl transition-all duration-300 border border-gray-100 group">
                        <div class="h-2 bg-gradient-to-r from-kop-blue to-blue-400"></div>
                        <div class="p-8">
                            <div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <svg class="w-7 h-7 text-kop-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h4 class="font-bold text-gray-900 text-xl mb-3">Simpanan Pokok & Wajib</h4>
                            <p class="text-gray-600 text-sm leading-relaxed mb-6">Simpanan dasar keanggotaan yang menjadi fondasi partisipasi Anda di koperasi. Dibayarkan saat mendaftar dan setiap bulan.</p>
                            <div class="flex items-center text-kop-blue font-bold text-sm group-hover:text-kop-green transition-colors">
                                Pelajari Selengkapnya
                                <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </div>
                        </div>
                    </div>

                    <!-- Product 2 - Highlighted -->
                    <div class="bg-kop-blue rounded-2xl overflow-hidden shadow-2xl hover:-translate-y-1 transition-all duration-300 group relative">
                        <div class="absolute top-4 right-4 bg-kop-accent text-kop-blueDark text-xs font-extrabold px-3 py-1 rounded-full">POPULER</div>
                        <div class="h-2 bg-gradient-to-r from-kop-accent to-yellow-300"></div>
                        <div class="p-8">
                            <div class="w-14 h-14 bg-white/10 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                            </div>
                            <h4 class="font-bold text-white text-xl mb-3">Pinjaman Usaha</h4>
                            <p class="text-blue-200 text-sm leading-relaxed mb-6">Pinjaman untuk modal kerja dan investasi usaha dengan bunga menurun yang kompetitif. Tenor fleksibel hingga 60 bulan.</p>
                            <div class="flex items-center text-kop-accent font-bold text-sm group-hover:text-yellow-300 transition-colors">
                                Ajukan Sekarang
                                <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </div>
                        </div>
                    </div>

                    <!-- Product 3 -->
                    <div class="bg-white rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.04)] hover:shadow-xl transition-all duration-300 border border-gray-100 group">
                        <div class="h-2 bg-gradient-to-r from-kop-green to-emerald-400"></div>
                        <div class="p-8">
                            <div class="w-14 h-14 bg-green-50 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <svg class="w-7 h-7 text-kop-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                            <h4 class="font-bold text-gray-900 text-xl mb-3">Simpanan Berjangka</h4>
                            <p class="text-gray-600 text-sm leading-relaxed mb-6">Investasikan dana Anda dengan jangka waktu tetap dan dapatkan imbal hasil yang lebih tinggi. Pilihan tenor 3, 6, atau 12 bulan.</p>
                            <div class="flex items-center text-kop-blue font-bold text-sm group-hover:text-kop-green transition-colors">
                                Pelajari Selengkapnya
                                <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </div>
                        </div>
                    </div>

                    <!-- Product 4 -->
                    <div class="bg-white rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.04)] hover:shadow-xl transition-all duration-300 border border-gray-100 group">
                        <div class="h-2 bg-gradient-to-r from-kop-accent to-orange-300"></div>
                        <div class="p-8">
                            <div class="w-14 h-14 bg-amber-50 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <svg class="w-7 h-7 text-kop-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            </div>
                            <h4 class="font-bold text-gray-900 text-xl mb-3">Pinjaman Konsumtif</h4>
                            <p class="text-gray-600 text-sm leading-relaxed mb-6">Pinjaman untuk kebutuhan pribadi seperti renovasi rumah, biaya pendidikan, atau keperluan mendesak lainnya.</p>
                            <div class="flex items-center text-kop-blue font-bold text-sm group-hover:text-kop-green transition-colors">
                                Pelajari Selengkapnya
                                <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </div>
                        </div>
                    </div>

                    <!-- Product 5 -->
                    <div class="bg-white rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.04)] hover:shadow-xl transition-all duration-300 border border-gray-100 group">
                        <div class="h-2 bg-gradient-to-r from-indigo-500 to-purple-400"></div>
                        <div class="p-8">
                            <div class="w-14 h-14 bg-indigo-50 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <svg class="w-7 h-7 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            </div>
                            <h4 class="font-bold text-gray-900 text-xl mb-3">Simpanan Pendidikan</h4>
                            <p class="text-gray-600 text-sm leading-relaxed mb-6">Persiapkan masa depan pendidikan anak dengan tabungan khusus yang memberi imbal hasil menarik setiap tahun.</p>
                            <div class="flex items-center text-kop-blue font-bold text-sm group-hover:text-kop-green transition-colors">
                                Pelajari Selengkapnya
                                <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </div>
                        </div>
                    </div>

                    <!-- Product 6 -->
                    <div class="bg-white rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.04)] hover:shadow-xl transition-all duration-300 border border-gray-100 group">
                        <div class="h-2 bg-gradient-to-r from-rose-500 to-pink-400"></div>
                        <div class="p-8">
                            <div class="w-14 h-14 bg-rose-50 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <svg class="w-7 h-7 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8V7m0 10v1m9-9a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h4 class="font-bold text-gray-900 text-xl mb-3">Simpanan Sukarela</h4>
                            <p class="text-gray-600 text-sm leading-relaxed mb-6">Fleksibel setor dan tarik kapan saja tanpa denda. Cocok untuk dana darurat dengan akses mudah dan cepat.</p>
                            <div class="flex items-center text-kop-blue font-bold text-sm group-hover:text-kop-green transition-colors">
                                Pelajari Selengkapnya
                                <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================ -->
        <!-- PROMO / PENAWARAN MENARIK -->
        <!-- ============================================ -->
        <section id="promo" class="py-24 pt-36 bg-gradient-to-br from-kop-blueDark via-kop-blue to-blue-800 relative overflow-hidden">
            <div class="custom-shape-divider-top">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="fill-white"></path>
                </svg>
            </div>
            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(rgba(255,255,255,0.3) 1px, transparent 1px); background-size: 30px 30px;"></div>
            <!-- Clean promo background -->
            
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <span class="text-kop-accent font-bold tracking-widest uppercase text-sm">Penawaran Spesial</span>
                    <h2 class="text-3xl md:text-5xl font-extrabold text-white mt-4 mb-4">Promo Menarik Untuk Anda</h2>
                    <p class="text-blue-200 text-lg max-w-2xl mx-auto">Manfaatkan penawaran terbaik kami yang tersedia dalam waktu terbatas.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Promo 1 -->
                    <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-white/15 hover:bg-white/15 transition-all duration-300 group">
                        <div class="bg-gradient-to-r from-kop-accent to-yellow-300 text-kop-blueDark text-xs font-extrabold px-3 py-1 rounded-full inline-block mb-5">TERBATAS</div>
                        <h4 class="text-2xl font-extrabold text-white mb-3">Bunga Spesial 0.5%</h4>
                        <p class="text-blue-200 text-sm leading-relaxed mb-6">Khusus anggota baru, nikmati bunga pinjaman mulai dari 0.5%/bulan untuk pinjaman pertama Anda hingga Rp 50 Juta.</p>
                        <div class="flex items-center gap-2 text-kop-accent font-bold text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Berlaku s/d 31 Desember 2026
                        </div>
                    </div>

                    <!-- Promo 2 -->
                    <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-white/15 hover:bg-white/15 transition-all duration-300 group">
                        <div class="bg-gradient-to-r from-green-400 to-emerald-300 text-kop-blueDark text-xs font-extrabold px-3 py-1 rounded-full inline-block mb-5">GRATIS</div>
                        <h4 class="text-2xl font-extrabold text-white mb-3">Bebas Biaya Admin</h4>
                        <p class="text-blue-200 text-sm leading-relaxed mb-6">Daftar menjadi anggota baru sekarang dan nikmati pembebasan biaya administrasi untuk pembukaan simpanan pertama.</p>
                        <div class="flex items-center gap-2 text-green-400 font-bold text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Berlaku untuk pendaftaran online
                        </div>
                    </div>

                    <!-- Promo 3 -->
                    <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-white/15 hover:bg-white/15 transition-all duration-300 group">
                        <div class="bg-gradient-to-r from-rose-400 to-pink-300 text-kop-blueDark text-xs font-extrabold px-3 py-1 rounded-full inline-block mb-5">BONUS</div>
                        <h4 class="text-2xl font-extrabold text-white mb-3">Referral Reward</h4>
                        <p class="text-blue-200 text-sm leading-relaxed mb-6">Ajak teman atau keluarga menjadi anggota dan dapatkan bonus simpanan senilai Rp 100.000 untuk setiap referral yang berhasil.</p>
                        <div class="flex items-center gap-2 text-rose-400 font-bold text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path></svg>
                            Tanpa batas jumlah referral
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-shape-divider-bottom">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="fill-white"></path>
                </svg>
            </div>
        </section>

        <!-- ============================================ -->
        <!-- CARA BERGABUNG (Steps) -->
        <!-- ============================================ -->
        <section class="py-24 pt-32 bg-white relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <span class="text-kop-green font-bold tracking-widest uppercase text-sm">Mudah & Cepat</span>
                    <h2 class="text-3xl md:text-5xl font-extrabold text-kop-blue mt-4 mb-4">Cara Bergabung</h2>
                    <p class="text-gray-600 text-lg max-w-2xl mx-auto">Hanya 4 langkah sederhana untuk menjadi bagian dari keluarga besar Sarasehan Koperasi Mandiri.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <!-- Step 1 -->
                    <div class="text-center group">
                        <div class="relative mx-auto w-20 h-20 bg-blue-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-kop-blue transition-colors duration-300">
                            <span class="text-3xl font-black text-kop-blue group-hover:text-white transition-colors">1</span>
                            <div class="absolute -top-2 -right-2 w-6 h-6 bg-kop-accent rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path></svg>
                            </div>
                        </div>
                        <h4 class="font-bold text-gray-900 text-lg mb-2">Daftar Online</h4>
                        <p class="text-gray-500 text-sm leading-relaxed">Isi formulir pendaftaran anggota secara online di website kami.</p>
                    </div>

                    <!-- Step 2 -->
                    <div class="text-center group">
                        <div class="relative mx-auto w-20 h-20 bg-green-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-kop-green transition-colors duration-300">
                            <span class="text-3xl font-black text-kop-green group-hover:text-white transition-colors">2</span>
                        </div>
                        <h4 class="font-bold text-gray-900 text-lg mb-2">Verifikasi Data</h4>
                        <p class="text-gray-500 text-sm leading-relaxed">Tim kami akan memverifikasi data Anda dalam waktu 1x24 jam kerja.</p>
                    </div>

                    <!-- Step 3 -->
                    <div class="text-center group">
                        <div class="relative mx-auto w-20 h-20 bg-amber-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-kop-accent transition-colors duration-300">
                            <span class="text-3xl font-black text-kop-accent group-hover:text-white transition-colors">3</span>
                        </div>
                        <h4 class="font-bold text-gray-900 text-lg mb-2">Simpanan Awal</h4>
                        <p class="text-gray-500 text-sm leading-relaxed">Bayar simpanan pokok & wajib pertama melalui transfer bank atau tunai.</p>
                    </div>

                    <!-- Step 4 -->
                    <div class="text-center group">
                        <div class="relative mx-auto w-20 h-20 bg-indigo-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-indigo-600 transition-colors duration-300">
                            <span class="text-3xl font-black text-indigo-600 group-hover:text-white transition-colors">4</span>
                        </div>
                        <h4 class="font-bold text-gray-900 text-lg mb-2">Akses Member Area</h4>
                        <p class="text-gray-500 text-sm leading-relaxed">Login ke dashboard dan mulai kelola simpanan serta ajukan pinjaman.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================ -->
        <!-- TESTIMONIALS -->
        <!-- ============================================ -->
        <section class="py-24 bg-kop-warm relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <span class="text-kop-green font-bold tracking-widest uppercase text-sm">Testimoni</span>
                    <h2 class="text-3xl md:text-5xl font-extrabold text-kop-blue mt-4 mb-4">Apa Kata Anggota Kami</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Testimonial 1 -->
                    <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 hover:shadow-lg transition-shadow">
                        <div class="flex items-center gap-1 mb-4">
                            <svg class="w-5 h-5 text-kop-accent" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg class="w-5 h-5 text-kop-accent" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg class="w-5 h-5 text-kop-accent" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg class="w-5 h-5 text-kop-accent" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg class="w-5 h-5 text-kop-accent" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        </div>
                        <p class="text-gray-600 text-sm leading-relaxed mb-6 italic">"Prosesnya sangat cepat dan mudah. Pinjaman untuk modal usaha saya cair dalam waktu kurang dari sehari. Bunga pinjaman juga sangat ringan dibanding tempat lain."</p>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-kop-blue rounded-full flex items-center justify-center text-white font-bold text-sm">BW</div>
                            <div>
                                <p class="font-bold text-gray-900 text-sm">Budi Wijaya</p>
                                <p class="text-gray-500 text-xs">Pengusaha UMKM, Denpasar</p>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 hover:shadow-lg transition-shadow">
                        <div class="flex items-center gap-1 mb-4">
                            <svg class="w-5 h-5 text-kop-accent" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg class="w-5 h-5 text-kop-accent" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg class="w-5 h-5 text-kop-accent" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg class="w-5 h-5 text-kop-accent" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg class="w-5 h-5 text-kop-accent" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        </div>
                        <p class="text-gray-600 text-sm leading-relaxed mb-6 italic">"Sudah 5 tahun menjadi anggota dan selalu puas. SHU yang dibagikan setiap tahun benar-benar transparan. Saya bisa melihat laporan keuangan secara detail di dashboard."</p>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-kop-green rounded-full flex items-center justify-center text-white font-bold text-sm">SP</div>
                            <div>
                                <p class="font-bold text-gray-900 text-sm">Sari Pertiwi</p>
                                <p class="text-gray-500 text-xs">Guru SD, Badung</p>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 hover:shadow-lg transition-shadow">
                        <div class="flex items-center gap-1 mb-4">
                            <svg class="w-5 h-5 text-kop-accent" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg class="w-5 h-5 text-kop-accent" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg class="w-5 h-5 text-kop-accent" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg class="w-5 h-5 text-kop-accent" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg class="w-5 h-5 text-kop-accent" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        </div>
                        <p class="text-gray-600 text-sm leading-relaxed mb-6 italic">"Simpanan berjangka di sini memberikan imbal hasil yang jauh lebih baik daripada deposito bank. Ditambah SHU tahunan yang lumayan besar. Sangat direkomendasikan!"</p>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-kop-accent rounded-full flex items-center justify-center text-white font-bold text-sm">MH</div>
                            <div>
                                <p class="font-bold text-gray-900 text-sm">Made Hartawan</p>
                                <p class="text-gray-500 text-xs">Pensiunan PNS, Gianyar</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================ -->
        <!-- KALKULATOR PINJAMAN -->
        <!-- ============================================ -->
        <section id="kalkulator" class="py-24 bg-white relative overflow-hidden">
            <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-blue-50/60 to-transparent"></div>
            
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <span class="text-kop-accent font-bold tracking-widest uppercase text-sm">Alat Finansial</span>
                    <h2 class="text-3xl md:text-5xl font-extrabold text-kop-blue mt-4 mb-4">Kalkulator Simulasi Pinjaman</h2>
                    <div class="w-24 h-1.5 bg-kop-accent mx-auto rounded-full mb-6"></div>
                    <p class="text-gray-600 text-lg max-w-2xl mx-auto">Hitung estimasi cicilan pinjaman Anda berdasarkan sistem bunga menurun (efektif). Transparan dan tanpa biaya tersembunyi.</p>
                </div>

                <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="p-6 md:p-10 border-b border-gray-100 bg-gray-50/50">
                        <form id="simulasiForm" class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                                <label class="md:col-span-1 text-sm font-bold text-gray-700">Besar Pinjaman</label>
                                <div class="md:col-span-3 flex items-center shadow-sm rounded-lg">
                                    <span class="px-4 py-3 bg-gray-100 border border-r-0 border-gray-300 rounded-l-lg font-semibold text-gray-600">Rp</span>
                                    <input type="number" id="loanAmount" class="w-full px-4 py-3 border border-gray-300 rounded-r-lg focus:ring-2 focus:ring-kop-green focus:border-kop-green outline-none" placeholder="Contoh: 20000000" required>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                                <label class="md:col-span-1 text-sm font-bold text-gray-700">Bunga / Tahun (%)</label>
                                <div class="md:col-span-3">
                                    <input type="number" id="loanRate" step="0.1" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kop-green focus:border-kop-green outline-none shadow-sm" placeholder="Contoh: 6" required>
                                    <p class="text-xs text-gray-500 mt-1.5">*Sektor Riil (5%), Simpan Pinjam (7%), atau sesuai kebijakan.</p>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                                <label class="md:col-span-1 text-sm font-bold text-gray-700">Lama Pinjaman</label>
                                <div class="md:col-span-3 flex items-center shadow-sm rounded-lg">
                                    <input type="number" id="loanTenor" class="w-full px-4 py-3 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-kop-green focus:border-kop-green outline-none" placeholder="Contoh: 12" required>
                                    <span class="px-4 py-3 bg-gray-100 border border-l-0 border-gray-300 rounded-r-lg font-semibold text-gray-600">Bulan</span>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center pt-2">
                                <div class="md:col-span-1"></div>
                                <div class="md:col-span-3">
                                    <button type="submit" class="bg-kop-blue hover:bg-kop-blueDark text-white font-bold py-3.5 px-8 rounded-lg transition duration-300 shadow-lg w-full md:w-auto flex items-center justify-center">
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
                                <li>Perhitungan menggunakan metode bunga <span class="font-semibold">menurun (efektif)</span>.</li>
                                <li>Tabel ini hanya <span class="font-semibold">simulasi estimasi</span>, dapat berubah sesuai kebijakan.</li>
                                <li>Untuk pengajuan resmi, silakan hubungi kantor Sarasehan Koperasi Mandiri.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================ -->
        <!-- CTA BANNER -->
        <!-- ============================================ -->
        <section class="py-20 bg-gradient-to-r from-kop-green via-emerald-600 to-kop-green relative overflow-hidden">
            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(rgba(255,255,255,0.4) 1px, transparent 1px); background-size: 20px 20px;"></div>
            <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-6">Siap Bergabung Bersama Kami?</h2>
                <p class="text-lg text-green-100 mb-10 max-w-2xl mx-auto">Ribuan anggota telah merasakan manfaatnya. Daftarkan diri Anda sekarang dan mulai perjalanan menuju kemandirian finansial.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}" class="px-10 py-4 bg-white text-kop-green font-extrabold text-lg rounded-xl shadow-xl hover:shadow-2xl hover:-translate-y-0.5 transform transition">
                        Daftar Sekarang — Gratis!
                    </a>
                    <a href="https://wa.me/6281234567890" target="_blank" class="px-10 py-4 border-2 border-white/30 text-white font-bold text-lg rounded-xl hover:bg-white/10 transition flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        Konsultasi via WhatsApp
                    </a>
                </div>
            </div>
        </section>

        <!-- ============================================ -->
        <!-- FAQ SECTION -->
        <!-- ============================================ -->
        <section id="faq" class="py-24 bg-kop-warm">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <span class="text-kop-green font-bold tracking-widest uppercase text-sm">Bantuan</span>
                    <h2 class="text-3xl md:text-5xl font-extrabold text-kop-blue mt-4 mb-4">Pertanyaan yang Sering Diajukan</h2>
                </div>

                <div class="space-y-4">
                    <!-- FAQ 1 -->
                    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                        <button onclick="toggleFaq(this)" class="w-full flex items-center justify-between px-6 py-5 text-left">
                            <span class="font-bold text-gray-900">Apa syarat untuk menjadi anggota koperasi?</span>
                            <svg class="faq-chevron w-5 h-5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="faq-answer px-6 text-gray-600 text-sm leading-relaxed">
                            Syaratnya sangat mudah: WNI berusia minimal 17 tahun, memiliki KTP yang masih berlaku, mengisi formulir pendaftaran, dan membayar simpanan pokok sebesar Rp 100.000 serta simpanan wajib pertama Rp 50.000.
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                        <button onclick="toggleFaq(this)" class="w-full flex items-center justify-between px-6 py-5 text-left">
                            <span class="font-bold text-gray-900">Berapa lama proses pencairan pinjaman?</span>
                            <svg class="faq-chevron w-5 h-5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="faq-answer px-6 text-gray-600 text-sm leading-relaxed">
                            Setelah dokumen lengkap dan diverifikasi, pencairan pinjaman dilakukan maksimal 1x24 jam kerja. Untuk pinjaman di bawah Rp 10 Juta, prosesnya bisa lebih cepat (same-day).
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                        <button onclick="toggleFaq(this)" class="w-full flex items-center justify-between px-6 py-5 text-left">
                            <span class="font-bold text-gray-900">Bagaimana cara membayar angsuran?</span>
                            <svg class="faq-chevron w-5 h-5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="faq-answer px-6 text-gray-600 text-sm leading-relaxed">
                            Anda dapat membayar angsuran melalui transfer bank (BCA, BNI, BRI, Mandiri), datang langsung ke kantor, atau melalui fitur upload bukti pembayaran di Member Area website kami.
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                        <button onclick="toggleFaq(this)" class="w-full flex items-center justify-between px-6 py-5 text-left">
                            <span class="font-bold text-gray-900">Apakah simpanan saya aman?</span>
                            <svg class="faq-chevron w-5 h-5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="faq-answer px-6 text-gray-600 text-sm leading-relaxed">
                            Ya, 100% aman. Koperasi kami berbadan hukum dan diawasi langsung oleh Kementerian Koperasi dan UKM RI. Laporan keuangan disusun secara transparan dan diaudit setiap tahun melalui Rapat Anggota Tahunan (RAT).
                        </div>
                    </div>

                    <!-- FAQ 5 -->
                    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                        <button onclick="toggleFaq(this)" class="w-full flex items-center justify-between px-6 py-5 text-left">
                            <span class="font-bold text-gray-900">Apa itu SHU dan bagaimana cara mendapatkannya?</span>
                            <svg class="faq-chevron w-5 h-5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="faq-answer px-6 text-gray-600 text-sm leading-relaxed">
                            SHU (Sisa Hasil Usaha) adalah pembagian laba koperasi yang diberikan kepada seluruh anggota secara proporsional berdasarkan kontribusi simpanan dan transaksi selama satu tahun buku. SHU dibagikan setiap akhir tahun setelah RAT.
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================ -->
        <!-- FOOTER -->
        <!-- ============================================ -->
        <footer class="bg-kop-blueDark text-white pt-16 pb-8 border-t-4 border-kop-green">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
                    <div class="col-span-1 md:col-span-2">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-11 h-11 bg-kop-green rounded-xl flex items-center justify-center shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path></svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-extrabold text-white leading-none">SARASEHAN KOPERASI MANDIRI</h2>
                                <p class="text-[10px] uppercase text-gray-400 font-bold leading-none mt-1">Badan Hukum No: 123.456/BH/KDK</p>
                            </div>
                        </div>
                        <p class="text-gray-400 text-sm max-w-md mt-4 leading-relaxed">
                            Koperasi Simpan Pinjam yang berkomitmen memajukan kesejahteraan anggota dengan prinsip kekeluargaan, gotong royong, dan transparansi keuangan secara digital.
                        </p>
                        <div class="flex gap-3 mt-6">
                            <a href="#" class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center hover:bg-kop-green transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center hover:bg-kop-green transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738a.36.36 0 01.083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.359-.631-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24 12.017 24c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/></svg>
                            </a>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-bold text-white mb-4 uppercase text-sm">Informasi</h4>
                        <ul class="space-y-2.5 text-sm text-gray-400">
                            <li><a href="#tentang" class="hover:text-white transition">Profil Koperasi</a></li>
                            <li><a href="#" class="hover:text-white transition">Struktur Organisasi</a></li>
                            <li><a href="#" class="hover:text-white transition">Laporan SHU Tahunan</a></li>
                            <li><a href="#faq" class="hover:text-white transition">FAQ</a></li>
                            <li><a href="#" class="hover:text-white transition">Syarat & Ketentuan</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold text-white mb-4 uppercase text-sm">Hubungi Kami</h4>
                        <ul class="space-y-3 text-sm text-gray-400">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                Jl. Nusa Kambangan No. 123, Denpasar Barat, Bali
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                (021) 1234-5678
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                info@sarasehankoperasimandiri.com
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Senin - Jumat, 08.00 - 16.00 WITA
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-gray-700/50 pt-8 text-center text-xs text-gray-500 flex flex-col md:flex-row justify-between items-center gap-4">
                    <p>&copy; {{ date('Y') }} Koperasi Simpan Pinjam Sarasehan. Hak Cipta Dilindungi Undang-Undang.</p>
                    <p>Diawasi oleh Kementerian Koperasi dan UKM Republik Indonesia</p>
                </div>
            </div>
        </footer>
        
        <!-- Floating WhatsApp -->
        <a href="https://wa.me/6281234567890" target="_blank" class="fixed bottom-6 right-6 bg-kop-green hover:bg-kop-greenDark text-white px-5 py-3.5 rounded-full shadow-2xl transition-all duration-300 z-50 flex items-center font-bold text-sm hover:-translate-y-0.5 transform" aria-label="Chat WhatsApp">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
            Butuh Bantuan?
        </a>

        <!-- ============================================ -->
        <!-- SCRIPTS -->
        <!-- ============================================ -->
        <script>
            // Navbar scroll effect
            const mainNav = document.getElementById('mainNav');
            const navTitle = document.getElementById('navTitle');
            const navSub = document.getElementById('navSub');
            const navLogin = document.getElementById('navLogin');
            const navLinks = document.querySelectorAll('.nav-link');
            
            window.addEventListener('scroll', () => {
                if (window.scrollY > 80) {
                    mainNav.classList.remove('nav-transparent');
                    mainNav.classList.add('nav-solid');
                    mainNav.style.top = '0';
                    navTitle.classList.remove('text-white');
                    navTitle.classList.add('text-kop-blue');
                    navSub.classList.remove('text-gray-300');
                    navSub.classList.add('text-gray-500');
                    if (navLogin) { navLogin.classList.remove('text-white'); navLogin.classList.add('text-kop-blue'); }
                    navLinks.forEach(l => { l.classList.remove('text-white/90'); l.classList.add('text-gray-600'); });
                } else {
                    mainNav.classList.add('nav-transparent');
                    mainNav.classList.remove('nav-solid');
                    mainNav.style.top = '36px';
                    navTitle.classList.add('text-white');
                    navTitle.classList.remove('text-kop-blue');
                    navSub.classList.add('text-gray-300');
                    navSub.classList.remove('text-gray-500');
                    if (navLogin) { navLogin.classList.add('text-white'); navLogin.classList.remove('text-kop-blue'); }
                    navLinks.forEach(l => { l.classList.add('text-white/90'); l.classList.remove('text-gray-600'); });
                }
            });

            // FAQ accordion
            function toggleFaq(btn) {
                const answer = btn.nextElementSibling;
                const chevron = btn.querySelector('.faq-chevron');
                
                // Close others
                document.querySelectorAll('.faq-answer.open').forEach(a => {
                    if (a !== answer) {
                        a.classList.remove('open');
                        a.previousElementSibling.querySelector('.faq-chevron').classList.remove('rotated');
                    }
                });
                
                answer.classList.toggle('open');
                chevron.classList.toggle('rotated');
            }

            // Calculator
            document.getElementById('simulasiForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const amount = parseFloat(document.getElementById('loanAmount').value);
                const rate = parseFloat(document.getElementById('loanRate').value);
                const tenor = parseInt(document.getElementById('loanTenor').value);
                
                if (isNaN(amount) || isNaN(rate) || isNaN(tenor) || amount <= 0 || tenor <= 0) return;

                let sisaHutang = amount;
                let tableHTML = `
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
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
                                <td class="px-4 py-3 text-sm text-gray-500 text-center">-</td>
                                <td class="px-4 py-3 text-sm text-gray-500 text-right">-</td>
                                <td class="px-4 py-3 text-sm text-gray-500 text-right">-</td>
                                <td class="px-4 py-3 text-sm text-gray-500 text-right">-</td>
                                <td class="px-4 py-3 text-sm font-semibold text-gray-800 text-right">Rp ${sisaHutang.toLocaleString('id-ID')}</td>
                            </tr>
                `;

                const pokokBase = Math.ceil(amount / tenor / 1000) * 1000;

                for (let i = 1; i <= tenor; i++) {
                    let pokok = (i === tenor) ? sisaHutang : Math.min(pokokBase, sisaHutang);
                    let bunga = Math.round(sisaHutang * (rate / 100) / 12);
                    let total = pokok + bunga;
                    
                    sisaHutang -= pokok;
                    if (sisaHutang < 0) sisaHutang = 0;
                    
                    tableHTML += `
                        <tr class="hover:bg-blue-50/30 transition">
                            <td class="px-4 py-3 text-sm font-medium text-gray-900">${i}</td>
                            <td class="px-4 py-3 text-sm text-gray-600 text-right">Rp ${pokok.toLocaleString('id-ID')}</td>
                            <td class="px-4 py-3 text-sm text-gray-600 text-right">Rp ${bunga.toLocaleString('id-ID')}</td>
                            <td class="px-4 py-3 text-sm font-bold text-kop-blue text-right">Rp ${total.toLocaleString('id-ID')}</td>
                            <td class="px-4 py-3 text-sm font-medium text-gray-800 text-right">Rp ${sisaHutang.toLocaleString('id-ID')}</td>
                        </tr>
                    `;
                }

                tableHTML += `</tbody></table>`;
                document.getElementById('simulationResult').innerHTML = tableHTML;
                document.getElementById('resultSection').classList.remove('hidden');
                
                setTimeout(() => {
                    document.getElementById('resultSection').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }, 100);
            });
            
            document.getElementById('closeResult').addEventListener('click', function() {
                document.getElementById('resultSection').classList.add('hidden');
            });
        </script>

    </body>
</html>
