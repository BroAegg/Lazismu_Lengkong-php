{{-- Public Navbar (Transparent, scrolls to white) --}}
<nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 py-4 bg-transparent backdrop-blur-sm" id="navbar">
    <div class="container mx-auto px-5 flex items-center justify-between max-w-[1200px]">
        {{-- Logo --}}
        <a href="{{ route('beranda') }}" class="flex flex-col items-center gap-1 group relative">
            <img src="{{ asset('assets/images/lazismuasli.png') }}" alt="Lazismu Logo"
                 class="h-10 w-auto transition-all duration-300 filter brightness-0 invert" id="navbar-logo">
            <span class="text-[0.625rem] font-normal tracking-wide text-white/70 transition-colors duration-300" id="navbar-logo-sub"
                  style="font-family: 'Lato', sans-serif;">lengkong</span>
        </a>

        {{-- Desktop Nav Links --}}
        <ul class="hidden lg:flex items-center gap-8">
            <li>
                <a href="{{ route('beranda') }}"
                   class="text-[0.9375rem] font-medium text-white/90 hover:text-white relative py-2 nav-link-effect {{ request()->routeIs('beranda') ? 'text-white after:w-full' : '' }}">
                    Beranda
                </a>
            </li>
            <li>
                <a href="{{ route('kalkulator') }}"
                   class="text-[0.9375rem] font-medium text-white/90 hover:text-white relative py-2 nav-link-effect {{ request()->routeIs('kalkulator') ? 'text-white after:w-full' : '' }}">
                    Kalkulator Zakat
                </a>
            </li>
            <li>
                <a href="{{ route('program.index') }}"
                   class="text-[0.9375rem] font-medium text-white/90 hover:text-white relative py-2 nav-link-effect {{ request()->routeIs('program.*') ? 'text-white after:w-full' : '' }}">
                    Program
                </a>
            </li>
            <li>
                <a href="{{ route('tentang-kami') }}"
                   class="text-[0.9375rem] font-medium text-white/90 hover:text-white relative py-2 nav-link-effect {{ request()->routeIs('tentang-kami') ? 'text-white after:w-full' : '' }}">
                    Tentang Kami
                </a>
            </li>
            <li>
                <a href="{{ route('kontak') }}"
                   class="text-[0.9375rem] font-medium text-white/90 hover:text-white relative py-2 nav-link-effect {{ request()->routeIs('kontak') ? 'text-white after:w-full' : '' }}">
                    Kontak
                </a>
            </li>
            <li>
                @auth
                    <a href="{{ auth()->user()->role->dashboardPath() }}"
                       class="px-5 py-2.5 text-white/90 hover:text-white font-medium hover:scale-105 transition-transform">
                        <i class="fas fa-user mr-1"></i> {{ auth()->user()->name }}
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="px-5 py-2.5 text-white/90 hover:text-white font-medium hover:scale-105 transition-transform">
                        Masuk
                    </a>
                @endauth
            </li>
            <li>
                <a href="{{ route('donasi') }}"
                   class="flex items-center justify-center gap-2 px-6 py-2.5 bg-gradient-to-r from-primary-500 to-accent-500 text-white font-semibold rounded-lg transition-transform hover:-translate-y-0.5 shadow-orange-glow">
                    Donasi Sekarang
                </a>
            </li>
        </ul>

        {{-- Mobile Hamburger --}}
        <button class="lg:hidden flex flex-col gap-[5px] p-2" id="mobile-menu-btn" aria-label="Toggle navigation">
            <span class="w-[25px] h-[3px] bg-white rounded-sm transition-all"></span>
            <span class="w-[25px] h-[3px] bg-white rounded-sm transition-all"></span>
            <span class="w-[25px] h-[3px] bg-white rounded-sm transition-all"></span>
        </button>
    </div>
</nav>
