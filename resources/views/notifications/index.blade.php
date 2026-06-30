<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Semua Notifikasi') }}
            </h2>
            @if(auth()->user()->unreadNotifications->count() > 0)
                <form action="{{ route('notifications.readAll') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition shadow-md shadow-orange-500/30">
                        Tandai Semua Dibaca
                    </button>
                </form>
            @endif
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">
                <div class="p-8 text-gray-900">
                    
                    @if(session('success'))
                        <div class="mb-6 bg-emerald-50 text-emerald-600 px-4 py-3 rounded-xl font-semibold border border-emerald-100 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($notifications->count() > 0)
                        <div class="space-y-4">
                            @foreach($notifications as $notification)
                                <div class="p-5 rounded-2xl border {{ $notification->read_at ? 'bg-gray-50 border-gray-100' : 'bg-blue-50/30 border-blue-100 shadow-sm' }} flex flex-col sm:flex-row sm:justify-between sm:items-center transition-all hover:shadow-md">
                                    <div class="flex items-start mb-4 sm:mb-0">
                                        <div class="mr-4 mt-1">
                                            @if($notification->read_at)
                                                <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-400">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                                                </div>
                                            @else
                                                <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 relative">
                                                    <span class="absolute top-0 right-0 block h-3 w-3 rounded-full bg-red-500 ring-2 ring-white"></span>
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            <h4 class="text-lg font-bold {{ $notification->read_at ? 'text-gray-600' : 'text-gray-900' }}">
                                                {{ $notification->data['title'] ?? 'Notifikasi' }}
                                            </h4>
                                            <p class="text-sm {{ $notification->read_at ? 'text-gray-500' : 'text-gray-700' }} mt-1">
                                                {{ $notification->data['message'] ?? '' }}
                                            </p>
                                            <span class="text-xs font-semibold {{ $notification->read_at ? 'text-gray-400' : 'text-blue-500' }} mt-2 block">
                                                {{ $notification->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <div class="flex-shrink-0 sm:ml-4 flex justify-end">
                                        @if(isset($notification->data['url']))
                                            @if(!$notification->read_at)
                                                <form action="{{ route('notifications.read', $notification->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="bg-white border-2 border-blue-100 text-blue-600 hover:bg-blue-50 hover:border-blue-200 px-5 py-2.5 rounded-xl text-sm font-bold transition">
                                                        Lihat Detail
                                                    </button>
                                                </form>
                                            @else
                                                <a href="{{ $notification->data['url'] }}" class="bg-white border-2 border-gray-100 text-gray-500 hover:bg-gray-50 px-5 py-2.5 rounded-xl text-sm font-bold transition inline-block">
                                                    Lihat Detail
                                                </a>
                                            @endif
                                        @elseif(!$notification->read_at)
                                            <form action="{{ route('notifications.read', $notification->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="bg-gray-100 text-gray-600 hover:bg-gray-200 px-4 py-2 rounded-xl text-sm font-semibold transition">
                                                    Tandai Dibaca
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="mt-8">
                            {{ $notifications->links() }}
                        </div>
                    @else
                        <div class="text-center py-16">
                            <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6 text-gray-300">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-700 mb-2">Belum Ada Notifikasi</h3>
                            <p class="text-gray-500">Anda tidak memiliki notifikasi saat ini.</p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
