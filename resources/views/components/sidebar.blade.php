{{-- Dashboard Sidebar (Desktop) --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-32">
    {{-- Profile Card --}}
    <div class="flex flex-col items-center mb-6">
        <div class="w-20 h-20 rounded-full bg-gray-100 mb-3 overflow-hidden">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'User') }}&background=random&color=fff"
                 alt="User" class="w-full h-full object-cover">
        </div>
        <h3 class="font-bold text-lg text-dark-500">{{ auth()->user()->name ?? 'User' }}</h3>
        <p class="text-xs text-gray-500 mb-2">{{ auth()->user()->email ?? '' }}</p>
        <span class="px-3 py-1 bg-orange-100 text-orange-600 text-xs font-bold rounded-full">
            {{ auth()->user()->role?->label() ?? 'Member' }}
        </span>
    </div>

    {{-- Navigation --}}
    <nav class="space-y-1">
        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium transition-colors {{ request()->routeIs('dashboard') ? 'bg-orange-50 text-primary-500' : 'text-gray-600 hover:bg-gray-50' }}">
            <i class="fas fa-th-large w-5"></i> Dashboard
        </a>
        <a href="{{ route('donasi') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium transition-colors {{ request()->routeIs('donasi') ? 'bg-orange-50 text-primary-500' : 'text-gray-600 hover:bg-gray-50' }}">
            <i class="fas fa-heart w-5"></i> Donasi
        </a>
        <a href="#"
           class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-xl transition-colors">
            <i class="fas fa-history w-5"></i> Riwayat Donasi
        </a>
        <a href="{{ route('kalkulator') }}"
           class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-xl transition-colors">
            <i class="fas fa-calculator w-5"></i> Kalkulator Zakat
        </a>
        <a href="{{ route('akun') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium transition-colors {{ request()->routeIs('akun') ? 'bg-orange-50 text-primary-500' : 'text-gray-600 hover:bg-gray-50' }}">
            <i class="fas fa-cog w-5"></i> Pengaturan
        </a>

        {{-- Admin Links (Staff Only) --}}
        @if(auth()->user()->role?->isStaff())
        <div class="pt-4 mt-4 border-t border-gray-100">
            <p class="text-xs font-bold text-gray-400 tracking-wider uppercase mb-3 px-4">Admin Panel</p>
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="fas fa-shield-alt w-5"></i> Dashboard Admin
            </a>
            <a href="{{ route('admin.donations.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.donations.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="fas fa-inbox w-5"></i> Kelola Donasi
            </a>
            <a href="{{ route('admin.program.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.program.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="fas fa-layer-group w-5"></i> Kelola Program
            </a>
            @if(auth()->user()->role->value === 'kepala_kantor' || auth()->user()->role->value === 'administrasi')
            <a href="{{ route('admin.users.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.users.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="fas fa-users w-5"></i> Kelola User
            </a>
            <a href="{{ route('admin.reports.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.reports.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="fas fa-chart-bar w-5"></i> Laporan
            </a>
            <a href="{{ route('admin.settings.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.settings.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="fas fa-cog w-5"></i> Pengaturan CMS
            </a>
            @endif
        </div>
        @endif

        {{-- Logout --}}
        <div class="pt-4 mt-4 border-t border-gray-100">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-red-500 hover:bg-red-50 rounded-xl transition-colors">
                    <i class="fas fa-sign-out-alt w-5"></i> Keluar
                </button>
            </form>
        </div>
    </nav>
</div>
