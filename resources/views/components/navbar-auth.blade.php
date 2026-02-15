{{-- Authenticated Navbar (Desktop) --}}
<nav class="hidden lg:block fixed top-0 left-0 right-0 bg-white shadow-sm z-50 py-4">
    <div class="container mx-auto px-5 flex items-center justify-between max-w-[1200px]">
        <a href="{{ route('beranda') }}" class="flex flex-col items-center gap-1 group relative">
            <img src="{{ asset('assets/images/lazismuasli.png') }}" alt="Lazismu Logo" class="h-10 w-auto">
            <span class="text-[0.625rem] font-normal tracking-wide text-gray-500" style="font-family: 'Lato', sans-serif;">lengkong</span>
        </a>

        <ul class="flex items-center gap-8">
            <li><a href="{{ route('beranda') }}" class="text-sm font-medium text-gray-600 hover:text-primary-500 transition-colors">Beranda</a></li>
            <li><a href="{{ route('program.index') }}" class="text-sm font-medium text-gray-600 hover:text-primary-500 transition-colors">Program</a></li>
            <li><a href="{{ route('kalkulator') }}" class="text-sm font-medium text-gray-600 hover:text-primary-500 transition-colors">Kalkulator</a></li>
            <li>
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="flex items-center gap-3 cursor-pointer hover:bg-gray-50 px-3 py-1.5 rounded-lg transition-colors">
                        <div class="w-8 h-8 rounded-full bg-primary-500/20 flex items-center justify-center text-primary-500 font-bold text-xs">
                            {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 2)) }}
                        </div>
                        <span class="text-sm font-bold text-dark-500">{{ auth()->user()->name ?? 'User' }}</span>
                        <i class="fas fa-chevron-down text-xs text-gray-400 transition-transform" :class="{ 'rotate-180': open }"></i>
                    </button>
                    <div x-show="open" @click.away="open = false" x-transition
                         class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-floating border border-gray-100 py-2 z-50">
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-600 hover:bg-gray-50 hover:text-primary-500">
                            <i class="fas fa-th-large w-4"></i> Dashboard
                        </a>
                        <a href="{{ route('akun') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-600 hover:bg-gray-50 hover:text-primary-500">
                            <i class="fas fa-user-cog w-4"></i> Pengaturan
                        </a>
                        <div class="border-t border-gray-100 my-1"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-red-500 hover:bg-red-50">
                                <i class="fas fa-sign-out-alt w-4"></i> Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
