{{-- Mobile Slide-out Menu --}}
<div class="fixed top-0 right-0 w-[85%] max-w-[320px] h-screen bg-white shadow-2xl flex flex-col items-start px-8 pt-24 pb-10 gap-2 transition-all duration-500 lg:hidden z-[100] translate-x-full"
     id="mobile-menu">
    <div class="w-full flex justify-between items-center mb-10">
        <span class="text-xs font-bold text-gray-400 tracking-widest uppercase">Menu Navigasi</span>
        <button id="close-menu" class="text-gray-400 hover:text-primary-500" onclick="document.getElementById('mobile-menu').classList.add('translate-x-full'); document.getElementById('menu-backdrop').classList.add('hidden'); document.body.classList.remove('overflow-hidden');">
            <i class="fas fa-times text-xl"></i>
        </button>
    </div>

    <a href="{{ route('beranda') }}" class="text-lg font-bold text-gray-800 py-3 w-full border-b border-gray-50 flex items-center justify-between group">
        Beranda <i class="fas fa-chevron-right text-xs text-gray-300 group-hover:text-primary-500 transition-colors"></i>
    </a>
    <a href="{{ route('kalkulator') }}" class="text-lg font-bold text-gray-800 py-3 w-full border-b border-gray-50 flex items-center justify-between group">
        Kalkulator <i class="fas fa-chevron-right text-xs text-gray-300 group-hover:text-primary-500 transition-colors"></i>
    </a>
    <a href="{{ route('program') }}" class="text-lg font-bold text-gray-800 py-3 w-full border-b border-gray-50 flex items-center justify-between group">
        Program <i class="fas fa-chevron-right text-xs text-gray-300 group-hover:text-primary-500 transition-colors"></i>
    </a>
    <a href="{{ route('tentang-kami') }}" class="text-lg font-bold text-gray-800 py-3 w-full border-b border-gray-50 flex items-center justify-between group">
        Tentang Kami <i class="fas fa-chevron-right text-xs text-gray-300 group-hover:text-primary-500 transition-colors"></i>
    </a>
    <a href="{{ route('kontak') }}" class="text-lg font-bold text-gray-800 py-3 w-full border-b border-gray-50 flex items-center justify-between group">
        Kontak <i class="fas fa-chevron-right text-xs text-gray-300 group-hover:text-primary-500 transition-colors"></i>
    </a>

    @auth
        <a href="{{ auth()->user()->role->dashboardPath() }}" class="w-full flex items-center justify-center gap-2 px-6 py-3 mt-4 text-gray-600 font-semibold rounded-xl border border-gray-200 hover:bg-gray-50 hover:text-primary-500 transition-all">
            <i class="fas fa-th-large"></i> Dashboard
        </a>
    @else
        <a href="{{ route('login') }}" class="w-full flex items-center justify-center gap-2 px-6 py-3 mt-4 text-gray-600 font-semibold rounded-xl border border-gray-200 hover:bg-gray-50 hover:text-primary-500 transition-all">
            <i class="fas fa-sign-in-alt"></i> Masuk Akun
        </a>
    @endauth

    <a href="{{ route('donasi') }}" class="w-full flex items-center justify-center gap-2 px-6 py-4 mt-2 bg-gradient-to-r from-primary-500 to-accent-500 text-white font-bold rounded-xl shadow-lg shadow-orange-200">
        <i class="fas fa-heart"></i> Donasi Sekarang
    </a>
</div>
