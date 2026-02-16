<!-- Bottom Navigation Bar (Mobile Only) -->
<div class="fixed bottom-0 left-0 right-0 bg-white shadow-[0_-4px_20px_rgba(0,0,0,0.05)] z-[60] px-6 py-3 lg:hidden flex justify-between items-center border-t border-gray-100 pb-safe">
    <a href="{{ route('beranda') }}" class="flex flex-col items-center gap-1 text-primary group">
        <i class="fas fa-home text-xl mb-0.5 group-hover:scale-110 transition-transform"></i>
        <span class="text-[0.65rem] font-medium">Beranda</span>
    </a>
    <a href="{{ route('program.index') }}" class="flex flex-col items-center gap-1 text-gray-400 group hover:text-primary transition-colors">
        <i class="fas fa-hand-holding-heart text-xl mb-0.5 group-hover:scale-110 transition-transform"></i>
        <span class="text-[0.65rem] font-medium">Program</span>
    </a>

    <!-- Center Donasi Button -->
    <div class="relative -top-8">
        <a href="{{ route('donasi') }}" class="flex items-center justify-center w-16 h-16 rounded-full bg-gradient-to-r from-[#F7941D] to-[#F15A24] text-white shadow-lg shadow-orange-200 hover:shadow-orange-glow transform hover:-translate-y-1 transition-all duration-300 ring-4 ring-white border border-orange-100">
            <i class="fas fa-heart text-2xl animate-pulse-slow"></i>
        </a>
        <span class="absolute -bottom-6 w-full text-center text-[0.65rem] font-bold text-gray-800">Donasi</span>
    </div>

    <a href="{{ route('kalkulator') }}" class="flex flex-col items-center gap-1 text-gray-400 group hover:text-primary transition-colors">
        <i class="fas fa-calculator text-xl mb-0.5 group-hover:scale-110 transition-transform"></i>
        <span class="text-[0.65rem] font-medium">Hitung</span>
    </a>
    <a href="{{ route('akun') }}" class="flex flex-col items-center gap-1 text-gray-400 group hover:text-primary transition-colors">
        <i class="fas fa-user text-xl mb-0.5 group-hover:scale-110 transition-transform"></i>
        <span class="text-[0.65rem] font-medium">Akun</span>
    </a>
</div>