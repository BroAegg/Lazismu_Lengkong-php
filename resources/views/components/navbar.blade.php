<nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 py-4 bg-transparent"
        id="navbar">
        <div class="container mx-auto px-5 flex items-center justify-between max-w-[1200px]">
            <a href="{{ route('beranda') }}" class="flex flex-col items-center gap-1 group relative logo-container">
                <!-- Logo Image (already contains LAZISMU text) -->
                <img src="{{ asset('assets/images/lazismuasli.png') }}" alt="Lazismu Logo"
                    class="h-10 w-auto transition-all duration-300 logo-img filter brightness-0 invert">

                <!-- Lengkong text below logo -->
                <span
                    class="text-[0.625rem] font-normal tracking-wide text-white/70 logo-text-sub transition-colors duration-300"
                    style="font-family: 'Lato', sans-serif;">
                    lengkong
                </span>
            </a>

            <!-- Hamburger Menu Hidden (Replaced by Bottom Nav) -->
            <button class="hidden flex flex-col gap-[5px] p-2" id="navbarToggleHidden" aria-label="Toggle navigation"
                style="display: none;">
                <span class="w-[25px] h-[3px] bg-white rounded-sm transition-all toggle-bar"></span>
                <span class="w-[25px] h-[3px] bg-white rounded-sm transition-all toggle-bar"></span>
                <span class="w-[25px] h-[3px] bg-white rounded-sm transition-all toggle-bar"></span>
            </button>

            <ul class="hidden lg:flex items-center gap-8" id="navbarMenu">
                <li><a href="{{ route('beranda') }}"
                        class="text-[0.9375rem] font-medium text-white/90 hover:text-white relative py-2 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-[2px] after:bg-primary after:transition-all hover:after:w-full nav-link active">Beranda</a>
                </li>
                <li><a href="{{ route('kalkulator') }}"
                        class="text-[0.9375rem] font-medium text-white/90 hover:text-white relative py-2 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-[2px] after:bg-primary after:transition-all hover:after:w-full nav-link">Kalkulator
                        Zakat</a></li>
                <li><a href="{{ route('program') }}"
                        class="text-[0.9375rem] font-medium text-white/90 hover:text-white relative py-2 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-[2px] after:bg-primary after:transition-all hover:after:w-full nav-link">Program</a>
                </li>
                <li><a href="{{ route('tentang-kami') }}"
                        class="text-[0.9375rem] font-medium text-white/90 hover:text-white relative py-2 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-[2px] after:bg-primary after:transition-all hover:after:w-full nav-link">Tentang
                        Kami</a></li>
                <li><a href="{{ route('kontak') }}"
                        class="text-[0.9375rem] font-medium text-white/90 hover:text-white relative py-2 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-[2px] after:bg-primary after:transition-all hover:after:w-full nav-link">Kontak</a>
                </li>
                <li><a href="{{ route('login') }}"
                        class="px-5 py-2.5 text-white/90 hover:text-white font-medium hover:scale-105 transition-transform nav-link">Masuk</a>
                </li>
                <li><a href="{{ route('program') }}"
                        class="btn-primary flex items-center justify-center gap-2 px-6 py-2.5 text-white font-semibold rounded-lg transition-transform hover:-translate-y-0.5">
                        <i class="fas fa-hand-holding-heart"></i> Mulai Donasi</a></li>
            </ul>
        </div>
    </nav>