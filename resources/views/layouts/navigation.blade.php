@php
    $user = Auth::user();
@endphp

<nav x-data="{ open: false }" class="bg-white border-b border-blue-200 shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="text-blue-700 font-bold text-xl">
                    Perpustakaan
                </a>
            </div>

            <!-- Menu Links (Center) -->
            <div class="hidden sm:flex sm:ms-10 space-x-8 justify-center flex-1">
                @if($user->role === 'admin')
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                                class="text-blue-600 hover:text-blue-800 relative group">
                        Dashboard
                        <span class="absolute left-1/2 -bottom-1 w-0 h-0.5 bg-blue-600 transition-all group-hover:w-1/2 group-hover:-translate-x-1/2"></span>
                    </x-nav-link>

                    <x-nav-link :href="route('admin.buku.index')" :active="request()->routeIs('admin.buku.*')" 
                                class="text-blue-600 hover:text-blue-800 relative group">
                        Manajemen Buku
                        <span class="absolute left-1/2 -bottom-1 w-0 h-0.5 bg-blue-600 transition-all group-hover:w-1/2 group-hover:-translate-x-1/2"></span>
                    </x-nav-link>

                    <x-nav-link :href="route('admin.pinjaman.index')" :active="request()->routeIs('admin.pinjaman.*')" 
                                class="text-blue-600 hover:text-blue-800 relative group">
                        Daftar Peminjaman
                        <span class="absolute left-1/2 -bottom-1 w-0 h-0.5 bg-blue-600 transition-all group-hover:w-1/2 group-hover:-translate-x-1/2"></span>
                    </x-nav-link>

                @elseif($user->role === 'siswa')
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                                class="text-blue-600 hover:text-blue-800 relative group">
                        Dashboard
                        <span class="absolute left-1/2 -bottom-1 w-0 h-0.5 bg-blue-600 transition-all group-hover:w-1/2 group-hover:-translate-x-1/2"></span>
                    </x-nav-link>

                    <x-nav-link :href="route('siswa.buku.index')" :active="request()->routeIs('siswa.buku.*')" 
                                class="text-blue-600 hover:text-blue-800 relative group">
                        Pinjam Buku
                        <span class="absolute left-1/2 -bottom-1 w-0 h-0.5 bg-blue-600 transition-all group-hover:w-1/2 group-hover:-translate-x-1/2"></span>
                    </x-nav-link>

                    <x-nav-link :href="route('siswa.loans.me')" :active="request()->routeIs('siswa.loans.*')" 
                                class="text-blue-600 hover:text-blue-800 relative group">
                        Pinjaman Saya
                        <span class="absolute left-1/2 -bottom-1 w-0 h-0.5 bg-blue-600 transition-all group-hover:w-1/2 group-hover:-translate-x-1/2"></span>
                    </x-nav-link>
                @endif
            </div>

            <!-- User Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-blue-200 text-sm font-medium rounded-md text-blue-600 bg-white hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-blue-200 transition">
                            <div>{{ $user->name }}</div>
                            <svg class="ml-1 h-4 w-4 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-blue-700 hover:bg-blue-50">
                            Profile
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" 
                                onclick="event.preventDefault(); this.closest('form').submit();" 
                                class="text-blue-700 hover:bg-blue-50">
                                Log Out
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-blue-500 hover:text-blue-700 hover:bg-blue-50 focus:outline-none focus:bg-blue-50 focus:text-blue-700 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open}" class="inline-flex" 
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open}" class="hidden" 
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Responsive Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t border-blue-100">
        <div class="pt-2 pb-3 space-y-1">
            @if($user->role === 'admin')
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-blue-600 hover:bg-blue-50">Dashboard</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.buku.index')" :active="request()->routeIs('admin.buku.*')" class="text-blue-600 hover:bg-blue-50">Manajemen Buku</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.pinjaman.index')" :active="request()->routeIs('admin.pinjaman.*')" class="text-blue-600 hover:bg-blue-50">Daftar Peminjaman</x-responsive-nav-link>
            @elseif($user->role === 'siswa')
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-blue-600 hover:bg-blue-50">Dashboard</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('siswa.buku.index')" :active="request()->routeIs('siswa.buku.*')" class="text-blue-600 hover:bg-blue-50">Pinjam Buku</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('siswa.loans.me')" :active="request()->routeIs('siswa.loans.*')" class="text-blue-600 hover:bg-blue-50">Pinjaman Saya</x-responsive-nav-link>
            @endif
        </div>
        <div class="pt-4 pb-1 border-t border-blue-100">
            <div class="px-4">
                <div class="font-medium text-base text-blue-700">{{ $user->name }}</div>
                <div class="font-medium text-sm text-blue-500">{{ $user->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-blue-600 hover:bg-blue-50">Profile</x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" 
                        onclick="event.preventDefault(); this.closest('form').submit();" 
                        class="text-blue-600 hover:bg-blue-50">Log Out</x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
