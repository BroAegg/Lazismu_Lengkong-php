<!-- Navbar -->
<nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 py-4 bg-transparent backdrop-blur-sm"
    id="navbar">
    <div class="container mx-auto px-5 flex items-center justify-between max-w-[1200px]">
        <a href="{{ route('beranda') }}" class="flex flex-col items-center gap-1 group relative logo-container">
            <!-- Logo Image -->
            <img src="{{ asset('assets/images/lazismuasli.png') }}" alt="Lazismu Logo"
                class="h-10 w-auto transition-all duration-300 logo-img filter brightness-0 invert">
            <!-- Lengkong text below logo -->
            <span class="text-[0.625rem] font-normal tracking-wide text-white/70 logo-text-sub transition-colors duration-300"
                style="font-family: 'Lato', sans-serif;">
                lengkong
            </span>
        </a>

        <!-- Mobile Menu Button -->
        <button class="lg:hidden flex flex-col gap-[5px] p-2" id="menuBtn" aria-label="Toggle navigation">
            <span class="w-[25px] h-[3px] bg-white rounded-sm transition-all"></span>
            <span class="w-[25px] h-[3px] bg-white rounded-sm transition-all"></span>
            <span class="w-[25px] h-[3px] bg-white rounded-sm transition-all"></span>
        </button>

        <ul class="hidden lg:flex items-center gap-8" id="navbarMenu">
            <li><a href="{{ route('beranda') }}"
                    class="text-[0.9375rem] font-medium text-white/90 hover:text-white relative py-2 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-[2px] after:bg-primary after:transition-all hover:after:w-full nav-link {{ request()->is('/') ? 'active' : '' }}">Beranda</a>
            </li>
            <li><a href="{{ route('kalkulator') }}"
                    class="text-[0.9375rem] font-medium text-white/90 hover:text-white relative py-2 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-[2px] after:bg-primary after:transition-all hover:after:w-full nav-link {{ request()->is('kalkulator*') ? 'active' : '' }}">Kalkulator
                    Zakat</a></li>
            <li><a href="{{ route('program') }}"
                    class="text-[0.9375rem] font-medium text-white/90 hover:text-white relative py-2 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-[2px] after:bg-primary after:transition-all hover:after:w-full nav-link {{ request()->is('program*') ? 'active' : '' }}">Program</a>
            </li>
            <li><a href="{{ route('tentang-kami') }}"
                    class="text-[0.9375rem] font-medium text-white/90 hover:text-white relative py-2 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-[2px] after:bg-primary after:transition-all hover:after:w-full nav-link {{ request()->is('tentang-kami') ? 'active' : '' }}">Tentang
                    Kami</a></li>
            <li><a href="{{ route('kontak') }}"
                    class="text-[0.9375rem] font-medium text-white/90 hover:text-white relative py-2 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-[2px] after:bg-primary after:transition-all hover:after:w-full nav-link {{ request()->is('kontak') ? 'active' : '' }}">Kontak</a>
            </li>
            @auth
            <li><a href="{{ route('dashboard') }}"
                    class="px-5 py-2.5 text-white/90 hover:text-white font-medium hover:scale-105 transition-transform nav-link">Dashboard</a>
            </li>
            @else
            <li><a href="{{ route('login') }}"
                    class="px-5 py-2.5 text-white/90 hover:text-white font-medium hover:scale-105 transition-transform nav-link">Masuk</a>
            </li>
            @endauth
            <li><a href="{{ route('donasi') }}"
                    class="btn-primary flex items-center justify-center gap-2 px-6 py-2.5 text-white font-semibold rounded-lg transition-transform hover:-translate-y-0.5">Donasi
                    Sekarang</a></li>
        </ul>
    </div>
</nav>

<!-- Mobile Menu Backdrop -->
<div class="fixed inset-0 bg-black/50 z-[55] opacity-0 invisible transition-all duration-300 lg:hidden"
    id="menuBackdrop"></div>

<!-- Mobile Menu -->
<div class="fixed top-0 right-[-100%] w-[85%] max-w-[320px] h-screen bg-white shadow-2xl flex flex-col items-start px-8 pt-24 pb-10 gap-2 transition-all duration-500 lg:hidden z-[100]"
    id="mobileMenu">
    <div class="w-full flex justify-between items-center mb-10">
        <span class="text-xs font-bold text-gray-400 tracking-widest uppercase">Menu Navigasi</span>
        <button id="closeMenu" class="text-gray-400 hover:text-primary"><i
                class="fas fa-times text-xl"></i></button>
    </div>
    <a href="{{ route('beranda') }}"
        class="text-lg font-bold text-gray-800 py-3 w-full border-b border-gray-50 flex items-center justify-between group mobile-nav-link">
        Beranda <i
            class="fas fa-chevron-right text-xs text-gray-300 group-hover:text-primary transition-colors"></i>
    </a>
    <a href="{{ route('kalkulator') }}"
        class="text-lg font-bold text-gray-800 py-3 w-full border-b border-gray-50 flex items-center justify-between group mobile-nav-link">
        Kalkulator <i
            class="fas fa-chevron-right text-xs text-gray-300 group-hover:text-primary transition-colors"></i>
    </a>
    <a href="{{ route('program') }}"
        class="text-lg font-bold text-gray-800 py-3 w-full border-b border-gray-50 flex items-center justify-between group mobile-nav-link">
        Program <i
            class="fas fa-chevron-right text-xs text-gray-300 group-hover:text-primary transition-colors"></i>
    </a>
    <a href="{{ route('tentang-kami') }}"
        class="text-lg font-bold text-gray-800 py-3 w-full border-b border-gray-50 flex items-center justify-between group mobile-nav-link">
        Tentang Kami <i
            class="fas fa-chevron-right text-xs text-gray-300 group-hover:text-primary transition-colors"></i>
    </a>
    <a href="{{ route('kontak') }}"
        class="text-lg font-bold text-gray-800 py-3 w-full border-b border-gray-50 flex items-center justify-between group mobile-nav-link">
        Kontak <i class="fas fa-chevron-right text-xs text-gray-300 group-hover:text-primary transition-colors"></i>
    </a>

    @auth
    <a href="{{ route('dashboard') }}"
        class="w-full flex items-center justify-center gap-2 px-6 py-3 mt-4 text-gray-600 font-semibold rounded-xl border border-gray-200 hover:bg-gray-50 hover:text-primary transition-all mobile-nav-link">
        <i class="fas fa-user"></i> Dashboard
    </a>
    @else
    <a href="{{ route('login') }}"
        class="w-full flex items-center justify-center gap-2 px-6 py-3 mt-4 text-gray-600 font-semibold rounded-xl border border-gray-200 hover:bg-gray-50 hover:text-primary transition-all mobile-nav-link">
        <i class="fas fa-sign-in-alt"></i> Masuk Akun
    </a>
    @endauth

    <a href="{{ route('donasi') }}"
        class="btn-primary w-full flex items-center justify-center gap-2 px-6 py-4 mt-2 text-white font-bold rounded-xl shadow-lg shadow-orange-200 mobile-nav-link">
        <i class="fas fa-heart"></i> Donasi Sekarang
    </a>
</div>

@push('scripts')
<script>
    // Navbar scroll behavior
    const navbar = document.getElementById('navbar');
    if (navbar) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    }
    
    // Mobile Menu Toggle
    const menuBtn = document.getElementById('menuBtn');
    const closeMenu = document.getElementById('closeMenu');
    const mobileMenu = document.getElementById('mobileMenu');
    const menuBackdrop = document.getElementById('menuBackdrop');
    
    if (menuBtn) {
        menuBtn.addEventListener('click', () => {
            mobileMenu.style.right = '0';
            menuBackdrop.style.opacity = '1';
            menuBackdrop.style.visibility = 'visible';
        });
    }
    
    if (closeMenu) {
        closeMenu.addEventListener('click', () => {
            mobileMenu.style.right = '-100%';
            menuBackdrop.style.opacity = '0';
            menuBackdrop.style.visibility = 'invisible';
        });
    }
    
    if (menuBackdrop) {
        menuBackdrop.addEventListener('click', () => {
            mobileMenu.style.right = '-100%';
            menuBackdrop.style.opacity = '0';
            menuBackdrop.style.visibility = 'invisible';
        });
    }
</script>
@endpush

@push('styles')
<style>
    .btn-primary {
        background: linear-gradient(135deg, #F7941D 0%, #F15A24 100%);
        box-shadow: 0 4px 15px rgba(247, 148, 29, 0.4);
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(247, 148, 29, 0.5);
    }
    .text-primary {
        color: #F7941D;
    }
    .bg-primary {
        background-color: #F7941D;
    }
    /* Navbar scrolled state - WHITE background, not dark */
    #navbar.scrolled {
        background: white !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        padding-top: 0.75rem !important;
        padding-bottom: 0.75rem !important;
    }
    /* Logo scrolled state - REMOVE filter (show original colors) */
    #navbar.scrolled .logo-img {
        filter: none !important;
    }
    #navbar.scrolled .logo-text-sub {
        color: #6B7280 !important; /* text-gray-500 */
    }
    #navbar.scrolled .toggle-bar {
        background: #1A1A2E !important;
    }
    /* Nav links scrolled state - DARK text */
    #navbar.scrolled .nav-link {
        color: #1A1A2E !important;
    }
    #navbar.scrolled .nav-link:hover {
        color: #F7941D !important;
    }
    /* Nav link active state */
    .nav-link.active {
        color: #F7941D !important;
    }
    .nav-link.active::after {
        width: 100%;
    }
    /* Mobile nav link hover */
    .mobile-nav-link:hover {
        color: #F7941D;
    }
</style>
@endpush
