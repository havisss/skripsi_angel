<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Tailwind CDN Fallback (Since NPM is missing) -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[#f4f7f6] text-gray-800">
        <div class="flex h-screen overflow-hidden">
            
            <!-- Sidebar -->
            <aside class="w-64 bg-white border-r border-gray-200 flex flex-col transition-all duration-300 hidden md:flex shadow-sm z-20">
                <!-- Sidebar Header / Logo -->
                <div class="h-20 flex items-center px-6 border-b border-gray-100">
                    <div class="w-10 h-10 rounded-xl bg-orange-100 flex items-center justify-center mr-3 shadow-inner">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h1 class="text-sm font-bold text-gray-800 tracking-wide">KOPERASI</h1>
                        <p class="text-[10px] text-gray-500 uppercase tracking-widest">Sejahtera</p>
                    </div>
                </div>

                <!-- Sidebar Navigation -->
                <div class="flex-1 overflow-y-auto py-6 px-4">
                    <p class="px-4 text-xs font-bold text-gray-400 uppercase tracking-wider mb-4">Menu Utama</p>
                    <nav class="space-y-1">
                        @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('admin.dashboard') ? 'bg-orange-50 text-orange-600 font-bold rounded-xl' : 'text-gray-500 hover:text-gray-800 hover:bg-gray-50 rounded-xl transition' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            Admin Dashboard
                        </a>
                        
                        <p class="px-4 text-xs font-bold text-gray-400 uppercase tracking-wider mt-6 mb-4">Manajemen Koperasi</p>
                        
                        <!-- Pegawai -->
                        <a href="{{ route('admin.pegawai.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('admin.pegawai.*') ? 'bg-orange-50 text-orange-600 font-bold rounded-xl' : 'text-gray-500 hover:text-gray-800 hover:bg-gray-50 rounded-xl transition' }}">
                            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                            Pegawai
                        </a>

                        <a href="{{ route('admin.savings.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('admin.savings.index') ? 'bg-orange-50 text-orange-600 font-bold rounded-xl' : 'text-gray-500 hover:text-gray-800 hover:bg-gray-50 rounded-xl transition' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Verifikasi Simpanan
                        </a>
                        <a href="{{ route('admin.loans.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('admin.loans.index') ? 'bg-orange-50 text-orange-600 font-bold rounded-xl' : 'text-gray-500 hover:text-gray-800 hover:bg-gray-50 rounded-xl transition' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                            Kelola Pinjaman
                        </a>
                        
                        <p class="px-4 text-xs font-bold text-gray-400 uppercase tracking-wider mt-6 mb-4">Laporan & Master</p>
                        <a href="{{ route('admin.users.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('admin.users.index') ? 'bg-orange-50 text-orange-600 font-bold rounded-xl' : 'text-gray-500 hover:text-gray-800 hover:bg-gray-50 rounded-xl transition' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            Data Anggota
                        </a>
                        <a href="{{ route('admin.rules.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('admin.rules.*') ? 'bg-orange-50 text-orange-600 font-bold rounded-xl' : 'text-gray-500 hover:text-gray-800 hover:bg-gray-50 rounded-xl transition' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Master Paket
                        </a>
                        <a href="{{ route('admin.reports.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('admin.reports.*') ? 'bg-orange-50 text-orange-600 font-bold rounded-xl' : 'text-gray-500 hover:text-gray-800 hover:bg-gray-50 rounded-xl transition' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            Laporan & Export
                        </a>
                        @else
                        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('dashboard') ? 'bg-orange-50 text-orange-600 font-bold rounded-xl' : 'text-gray-500 hover:text-gray-800 hover:bg-gray-50 rounded-xl transition' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            Dashboard
                        </a>
                        @endif
                        
                        @if(Auth::user()->role === 'member')
                        <p class="px-4 text-xs font-bold text-gray-400 uppercase tracking-wider mt-6 mb-4">Layanan Nasabah</p>
                        
                        <a href="{{ route('savings.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('savings.index') ? 'bg-orange-50 text-orange-600 font-bold rounded-xl' : 'text-gray-500 hover:text-gray-800 hover:bg-gray-50 rounded-xl transition' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Simpanan Online
                        </a>

                        <a href="{{ route('loans.create') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('loans.create') ? 'bg-orange-50 text-orange-600 font-bold rounded-xl' : 'text-gray-500 hover:text-gray-800 hover:bg-gray-50 rounded-xl transition' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Pengajuan Pinjaman
                        </a>

                        <a href="{{ route('loans.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('loans.index') ? 'bg-orange-50 text-orange-600 font-bold rounded-xl' : 'text-gray-500 hover:text-gray-800 hover:bg-gray-50 rounded-xl transition' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                            Detail Pinjaman
                        </a>
                        
                        <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('profile.edit') ? 'bg-orange-50 text-orange-600 font-bold rounded-xl' : 'text-gray-500 hover:text-gray-800 hover:bg-gray-50 rounded-xl transition' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Kelola Akun
                        </a>
                        @endif

                        @if(Auth::user()->role === 'admin')
                        <p class="px-4 text-xs font-bold text-gray-400 uppercase tracking-wider mt-6 mb-4">Manajemen Koperasi</p>
                        
                        <a href="{{ route('admin.savings.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('admin.savings.index') ? 'bg-orange-50 text-orange-600 font-bold rounded-xl' : 'text-gray-500 hover:text-gray-800 hover:bg-gray-50 rounded-xl transition' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Verifikasi Simpanan
                        </a>

                        <a href="{{ route('admin.loans.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('admin.loans.index') ? 'bg-orange-50 text-orange-600 font-bold rounded-xl' : 'text-gray-500 hover:text-gray-800 hover:bg-gray-50 rounded-xl transition' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                            Kelola Pinjaman
                        </a>
                        @endif
                    </nav>
                </div>
            </aside>

            <!-- Main Content Area -->
            <div class="flex-1 flex flex-col overflow-hidden relative">
                
                <!-- Topbar -->
                <header class="h-20 bg-white/80 backdrop-blur-md border-b border-gray-100 flex items-center justify-between px-8 z-10 sticky top-0">
                    
                    <!-- Mobile Menu Button & Page Title -->
                    <div class="flex items-center">
                        <button class="md:hidden text-gray-500 hover:text-gray-900 focus:outline-none mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                        </button>
                        @isset($header)
                            <h2 class="text-xl font-bold text-gray-800">{{ $header }}</h2>
                        @endisset
                    </div>
                    
                    <!-- User Profile & Actions -->
                    <div class="flex items-center space-x-6">
                        
                        <!-- Notifications -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" @click.away="open = false" class="text-gray-400 hover:text-orange-500 transition relative">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                                @if(Auth::user()->unreadNotifications->count() > 0)
                                    <span class="absolute top-0 right-0 inline-flex items-center justify-center px-1.5 py-0.5 text-[9px] font-bold leading-none text-white bg-red-500 rounded-full transform translate-x-1/4 -translate-y-1/4">
                                        {{ Auth::user()->unreadNotifications->count() }}
                                    </span>
                                @endif
                            </button>

                            <!-- Dropdown -->
                            <div x-cloak x-show="open" style="display: none;" class="absolute right-0 mt-3 w-80 bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden z-50">
                                <div class="px-4 py-3 border-b border-gray-50 bg-gray-50/50 flex justify-between items-center">
                                    <h3 class="font-bold text-gray-800 text-sm">Notifikasi</h3>
                                    @if(Auth::user()->unreadNotifications->count() > 0)
                                        <span class="text-xs bg-orange-100 text-orange-600 px-2 py-0.5 rounded font-bold">{{ Auth::user()->unreadNotifications->count() }} Baru</span>
                                    @endif
                                </div>
                                <div class="max-h-80 overflow-y-auto">
                                    @forelse(Auth::user()->unreadNotifications as $notification)
                                        <form action="{{ route('notifications.read', $notification->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="w-full text-left px-4 py-3 border-b border-gray-50 hover:bg-orange-50/50 transition">
                                                <p class="text-xs font-bold text-gray-800 mb-1">{{ $notification->data['title'] ?? 'Notifikasi Baru' }}</p>
                                                <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed">{{ $notification->data['message'] ?? '' }}</p>
                                                <p class="text-[10px] text-gray-400 mt-2">{{ $notification->created_at->diffForHumans() }}</p>
                                            </button>
                                        </form>
                                    @empty
                                        <div class="px-4 py-6 text-center">
                                            <svg class="w-8 h-8 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                                            <p class="text-xs text-gray-400 font-medium">Belum ada notifikasi baru.</p>
                                        </div>
                                    @endforelse
                                </div>
                                <div class="px-4 py-2 border-t border-gray-50 bg-gray-50/50 text-center">
                                    <a href="{{ route('notifications.index') }}" class="text-xs font-bold text-orange-500 hover:text-orange-600 transition">Lihat Semua Notifikasi</a>
                                </div>
                            </div>
                        </div>

                        <div class="h-8 w-px bg-gray-200"></div>

                        <!-- Profile -->
                            <div class="flex items-center space-x-3 cursor-pointer">
                                @if(Auth::user()->profile_photo)
                                    <img class="w-10 h-10 rounded-full object-cover shadow-md border border-gray-200" src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="{{ Auth::user()->name }}">
                                @else
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-r from-orange-400 to-orange-500 flex items-center justify-center text-white font-bold shadow-md">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </div>
                                @endif
                                <div class="hidden md:block text-left">
                                <p class="text-sm font-bold text-gray-800">{{ Auth::user()->name }}</p>
                                <p class="text-[10px] font-bold text-orange-500 uppercase tracking-wider">{{ Auth::user()->role }}</p>
                            </div>
                            
                            <!-- Logout Button -->
                            <form method="POST" action="{{ route('logout') }}" class="ml-2">
                                @csrf
                                <button type="submit" class="text-gray-400 hover:text-red-500 transition bg-gray-50 hover:bg-red-50 p-2 rounded-lg" title="Logout">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </header>

                <!-- Page Content -->
                <main class="flex-1 overflow-x-hidden overflow-y-auto p-6 md:p-8 bg-[#f8f9fa]">
                    <div class="max-w-7xl mx-auto w-full">
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
