<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Masuk' }} | Lazismu Lengkong</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Amiri:wght@400;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @stack('styles')
</head>
<body class="font-sans antialiased min-h-screen bg-white">

    <div class="min-h-screen flex">
        {{-- Left Side — Emotional Hook (Desktop Only) --}}
        <div class="hidden lg:flex w-1/2 relative overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ $backgroundImage ?? 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=1920&q=80' }}')"></div>
            <div class="absolute inset-0 bg-gradient-to-br from-[#1A1A2E]/90 via-[#1A1A2E]/80 to-primary/40"></div>
            <div class="relative z-10 flex flex-col justify-center px-16 text-white">
                <a href="{{ route('beranda') }}" class="flex flex-col items-start gap-1 mb-12">
                    <img src="{{ asset('assets/images/lazismuasli.png') }}" alt="Lazismu Logo" class="h-10 w-auto filter brightness-0 invert">
                    <span class="text-[0.625rem] font-normal tracking-wide text-white/70 ml-1" style="font-family: 'Lato', sans-serif;">lengkong</span>
                </a>
                <h1 class="text-4xl font-extrabold leading-tight mb-6">
                    {!! $heroTitle ?? 'Bergabung dengan <span class="text-primary-300">1.200+ Donatur</span> Lazismu Lengkong' !!}
                </h1>
                <p class="text-lg text-white/80 leading-relaxed mb-8">
                    {{ $heroSubtitle ?? 'Setiap donasi Anda adalah nafas bagi puluhan anak yatim dan dhuafa di Panti Taman Harapan.' }}
                </p>
                @if(isset($trustBadges) && $trustBadges)
                <div class="flex gap-4">
                    <div class="flex items-center gap-2 px-4 py-2 bg-white/10 rounded-xl border border-white/20">
                        <i class="fas fa-shield-alt text-primary-300"></i>
                        <span class="text-sm font-medium">Amanah</span>
                    </div>
                    <div class="flex items-center gap-2 px-4 py-2 bg-white/10 rounded-xl border border-white/20">
                        <i class="fas fa-chart-line text-primary-300"></i>
                        <span class="text-sm font-medium">Transparan</span>
                    </div>
                    <div class="flex items-center gap-2 px-4 py-2 bg-white/10 rounded-xl border border-white/20">
                        <i class="fas fa-check-circle text-primary-300"></i>
                        <span class="text-sm font-medium">Terverifikasi</span>
                    </div>
                </div>
                @endif
            </div>
        </div>

        {{-- Right Side — Form --}}
        <div class="w-full lg:w-1/2 flex flex-col justify-center items-center px-6 sm:px-12 lg:px-16 py-12">
            {{-- Mobile Logo --}}
            <div class="lg:hidden mb-8 flex flex-col items-center">
                <a href="{{ route('beranda') }}">
                    <img src="{{ asset('assets/images/lazismuasli.png') }}" alt="Lazismu Logo" class="h-12 w-auto">
                </a>
            </div>

            <div class="w-full max-w-md">
                @yield('content')
            </div>
        </div>
    </div>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireScripts
    @stack('scripts')
</body>
</html>
