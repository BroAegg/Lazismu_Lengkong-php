<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Lazismu Lengkong</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { DEFAULT: '#F7941D', light: '#FFB347', dark: '#E67E22' },
                        dark: { DEFAULT: '#1A1A2E', light: '#2D2D44' },
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    boxShadow: {
                        'card': '0 4px 20px rgba(0, 0, 0, 0.05)',
                        'nav': '0 -4px 20px rgba(0,0,0,0.05)',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 text-gray-800 font-sans pb-24 lg:pb-0 antialiased">

    <!-- Desktop Navbar -->
    <nav class="hidden lg:block fixed top-0 left-0 right-0 bg-white shadow-sm z-50 py-4">
        <div class="container mx-auto px-5 flex items-center justify-between max-w-[1200px]">
            <a href="{{ route('beranda') }}" class="flex flex-col items-center gap-1 group relative">
                <img src="{{ asset('assets/images/lazismuasli.png') }}" alt="Lazismu Logo" class="h-10 w-auto">
                <span class="text-[0.625rem] font-normal tracking-wide text-gray-500 logo-text-sub" style="font-family: 'Lato', sans-serif;">lengkong</span>
            </a>

            <ul class="flex items-center gap-8">
                <li><a href="{{ route('beranda') }}" class="text-sm font-medium text-gray-600 hover:text-primary transition-colors">Beranda</a></li>
                <li><a href="{{ route('program') }}" class="text-sm font-medium text-gray-600 hover:text-primary transition-colors">Program</a></li>
                <li><a href="{{ route('donasi') }}" class="text-sm font-medium text-primary font-bold">Dashboard</a></li>

                <!-- Logged In User -->
                <li>
                    <div class="flex items-center gap-3 cursor-pointer hover:bg-gray-50 px-3 py-1.5 rounded-lg transition-colors">
                        <div class="w-8 h-8 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold text-xs">
                            {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                        </div>
                        <span class="text-sm font-bold text-[#1A1A2E]">{{ auth()->user()->name }}</span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Mobile Header / Profile Card -->
    <header class="bg-[#1A1A2E] text-white pt-8 pb-16 px-6 rounded-b-[2rem] relative shadow-lg lg:hidden">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-lg font-bold">Akun Saya</h1>
            <button class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-colors">
                <i class="fas fa-bell text-sm"></i>
            </button>
        </div>

        <div class="flex items-center gap-4">
            <div class="w-16 h-16 rounded-full bg-gradient-to-br from-primary to-orange-600 p-0.5">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=F7941D&color=fff" alt="User" class="w-full h-full rounded-full border-2 border-[#1A1A2E]">
            </div>
            <div>
                <h2 class="text-xl font-bold">{{ auth()->user()->name }}</h2>
                <span class="inline-block px-2.5 py-0.5 bg-orange-500/20 border border-orange-500/30 text-orange-300 rounded-full text-[10px] font-bold tracking-wider uppercase">
                    {{ str_replace('_', ' ', auth()->user()->role->value) }}
                </span>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="px-6 lg:px-5 -mt-8 lg:mt-0 max-w-md lg:max-w-[1200px] mx-auto w-full relative z-10 lg:pt-32 lg:pb-12">

        <div class="lg:grid lg:grid-cols-12 lg:gap-8">
            <!-- Sidebar (Desktop Only) -->
            <div class="hidden lg:block lg:col-span-3">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-32">
                    <div class="flex flex-col items-center mb-6">
                        <div class="w-20 h-20 rounded-full bg-gray-100 mb-3 overflow-hidden">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=F7941D&color=fff" alt="User" class="w-full h-full object-cover">
                        </div>
                        <h3 class="font-bold text-lg text-[#1A1A2E]">{{ auth()->user()->name }}</h3>
                        <p class="text-xs text-gray-500 mb-2">{{ auth()->user()->email }}</p>
                        <span class="px-3 py-1 bg-orange-100 text-orange-600 text-xs font-bold rounded-full">
                            {{ ucwords(str_replace('_', ' ', auth()->user()->role->value)) }}
                        </span>
                    </div>

                    <nav class="space-y-1">
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 bg-orange-50 text-primary rounded-xl font-medium">
                            <i class="fas fa-th-large w-5"></i> Dashboard
                        </a>
                        <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-xl transition-colors">
                            <i class="fas fa-history w-5"></i> Riwayat Donasi
                        </a>
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-xl transition-colors">
                            <i class="fas fa-cog w-5"></i> Pengaturan
                        </a>
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
            </div>

            <!-- Content Area -->
            <div class="lg:col-span-9">
                <!-- Stats Card -->
                <div class="bg-white rounded-2xl p-6 shadow-card mb-6 flex lg:grid lg:grid-cols-3 justify-between items-center text-center lg:text-left divide-x lg:divide-x-0 divide-gray-100 lg:gap-6 border border-gray-100 lg:mb-8">
                    <div class="flex-1 px-2 lg:px-0 lg:flex lg:items-center lg:gap-4 lg:bg-orange-50 lg:p-6 lg:rounded-xl">
                        <div class="hidden lg:flex w-12 h-12 bg-white rounded-full items-center justify-center text-primary shadow-sm">
                            <i class="fas fa-wallet text-xl"></i>
                        </div>
                        <div>
                            <span class="block text-xs text-gray-400 mb-1">Total Donasi</span>
                            <span class="block text-primary font-bold text-lg lg:text-2xl">Rp {{ number_format($totalDonated, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    <div class="flex-1 px-2 lg:px-0 lg:flex lg:items-center lg:gap-4 lg:bg-blue-50 lg:p-6 lg:rounded-xl">
                        <div class="hidden lg:flex w-12 h-12 bg-white rounded-full items-center justify-center text-blue-500 shadow-sm">
                            <i class="fas fa-hand-holding-heart text-xl"></i>
                        </div>
                        <div>
                            <span class="block text-xs text-gray-400 mb-1">Program Diikuti</span>
                            <span class="block text-dark font-bold text-lg lg:text-2xl">{{ $programsSupported }}</span>
                        </div>
                    </div>
                    <div class="hidden lg:flex flex-1 items-center gap-4 bg-purple-50 p-6 rounded-xl">
                        <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-purple-500 shadow-sm">
                            <i class="fas fa-receipt text-xl"></i>
                        </div>
                        <div>
                            <span class="block text-xs text-gray-400 mb-1">Total Transaksi</span>
                            <span class="block text-dark font-bold text-2xl">{{ $totalDonations }}</span>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white rounded-2xl shadow-card overflow-hidden border border-gray-100 mb-6">
                    <div class="p-4 border-b border-gray-50 flex justify-between items-center">
                        <div class="text-xs font-bold text-gray-400 uppercase tracking-wider">Aktivitas Terakhir</div>
                        <a href="#" class="text-xs text-primary font-bold hover:underline">Lihat Semua</a>
                    </div>

                    @forelse($recentDonations as $donation)
                    <div class="p-4 border-b border-gray-50 hover:bg-gray-50 transition-colors flex items-center gap-4">
                        <div class="w-10 h-10 rounded-lg {{ $donation->status->value === 'VERIFIED' ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' }} flex items-center justify-center shrink-0">
                            <i class="fas {{ $donation->status->value === 'VERIFIED' ? 'fa-check' : 'fa-clock' }}"></i>
                        </div>
                        <div class="flex-grow">
                            <h4 class="text-sm font-bold text-gray-800">
                                {{ $donation->category->name }}
                                @if($donation->program)
                                    - {{ $donation->program->title }}
                                @endif
                            </h4>
                            <p class="text-xs text-gray-500">{{ $donation->created_at->format('l, d M Y') }}</p>
                        </div>
                        <div class="text-right">
                            <span class="font-bold text-sm text-gray-800 block">Rp {{ number_format($donation->amount, 0, ',', '.') }}</span>
                            <span class="text-xs {{ $donation->status->value === 'VERIFIED' ? 'text-green-600' : 'text-yellow-600' }} font-medium">
                                {{ $donation->status->value === 'VERIFIED' ? 'Terverifikasi' : 'Pending' }}
                            </span>
                        </div>
                    </div>
                    @empty
                    <div class="p-8 text-center">
                        <i class="fas fa-inbox text-4xl text-gray-300 mb-3"></i>
                        <p class="text-gray-400 text-sm">Belum ada aktivitas donasi</p>
                        <a href="{{ route('donasi') }}" class="inline-block mt-4 px-6 py-2 bg-primary text-white rounded-lg text-sm font-bold hover:bg-primary-dark transition-colors">
                            Mulai Donasi
                        </a>
                    </div>
                    @endforelse
                </div>

                <!-- Programs Supported -->
                @if($supportedPrograms->count() > 0)
                <div class="bg-white rounded-2xl shadow-card overflow-hidden border border-gray-100">
                    <div class="p-4 border-b border-gray-50">
                        <div class="text-xs font-bold text-gray-400 uppercase tracking-wider">Program yang Didukung</div>
                    </div>
                    <div class="p-4 grid grid-cols-1 lg:grid-cols-2 gap-4">
                        @foreach($supportedPrograms as $program)
                        <a href="{{ route('program.show', $program->slug) }}" class="block p-4 border border-gray-100 rounded-xl hover:border-primary hover:shadow-md transition-all group">
                            <div class="flex items-start gap-3">
                                <div class="w-12 h-12 rounded-lg bg-{{ $program->pillar->color ?? 'gray' }}-100 flex items-center justify-center text-{{ $program->pillar->color ?? 'gray' }}-600 shrink-0">
                                    <i class="{{ $program->pillar->icon ?? 'fas fa-heart' }} text-lg"></i>
                                </div>
                                <div class="flex-grow">
                                    <h4 class="text-sm font-bold text-gray-800 group-hover:text-primary transition-colors line-clamp-1">{{ $program->title }}</h4>
                                    <p class="text-xs text-gray-500 mt-1">
                                        Donasi Anda: Rp {{ number_format($program->donations->sum('amount'), 0, ',', '.') }}
                                    </p>
                                    @php
                                        $collected = $program->donations()->verified()->sum('net_amount');
                                        $progress = $program->target_amount > 0 ? min(($collected / $program->target_amount) * 100, 100) : 0;
                                    @endphp
                                    <div class="mt-2 bg-gray-100 rounded-full h-1.5 overflow-hidden">
                                        <div class="bg-primary h-full rounded-full transition-all duration-300" style="width: {{ $progress }}%"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>

    </main>

    <!-- Mobile Bottom Navigation -->
    <nav class="lg:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-gray-100 shadow-nav z-50">
        <div class="grid grid-cols-4 h-16">
            <a href="{{ route('beranda') }}" class="flex flex-col items-center justify-center gap-1 text-gray-400 hover:text-primary transition-colors">
                <i class="fas fa-home text-lg"></i>
                <span class="text-[10px] font-medium">Beranda</span>
            </a>
            <a href="{{ route('program') }}" class="flex flex-col items-center justify-center gap-1 text-gray-400 hover:text-primary transition-colors">
                <i class="fas fa-heart text-lg"></i>
                <span class="text-[10px] font-medium">Program</span>
            </a>
            <a href="{{ route('donasi') }}" class="flex flex-col items-center justify-center gap-1 text-gray-400 hover:text-primary transition-colors">
                <i class="fas fa-hand-holding-usd text-lg"></i>
                <span class="text-[10px] font-medium">Donasi</span>
            </a>
            <a href="{{ route('dashboard') }}" class="flex flex-col items-center justify-center gap-1 text-primary transition-colors">
                <i class="fas fa-user text-lg"></i>
                <span class="text-[10px] font-medium">Akun</span>
            </a>
        </div>
    </nav>

</body>
</html>
