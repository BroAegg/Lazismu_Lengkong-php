<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Dashboard' }} | Lazismu Lengkong</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Amiri:wght@400;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @stack('styles')
</head>
<body class="font-sans antialiased bg-[#FAFAFA] text-gray-800">

    {{-- Desktop Authenticated Navbar --}}
    @include('components.navbar-auth')

    {{-- Mobile Header --}}
    <header class="bg-[#1A1A2E] text-white pt-8 pb-16 px-6 rounded-b-[2rem] relative shadow-lg lg:hidden">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-lg font-bold">{{ $title ?? 'Dashboard' }}</h1>
            <button class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-colors">
                <i class="fas fa-bell text-sm"></i>
            </button>
        </div>
        <div class="flex items-center gap-4">
            <div class="w-16 h-16 rounded-full bg-gradient-to-br from-primary-500 to-orange-600 p-0.5">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'User') }}&background=random&color=fff"
                     alt="User" class="w-full h-full rounded-full border-2 border-[#1A1A2E]">
            </div>
            <div>
                <h2 class="text-xl font-bold">{{ auth()->user()->name ?? 'User' }}</h2>
                <span class="inline-block px-2.5 py-0.5 bg-orange-500/20 border border-orange-500/30 text-orange-300 rounded-full text-[10px] font-bold tracking-wider uppercase">
                    {{ auth()->user()->role?->label() ?? 'Member' }}
                </span>
            </div>
        </div>
    </header>

    {{-- Main Content --}}
    <main class="pt-4 lg:pt-28 pb-28 lg:pb-12">
        <div class="container mx-auto px-5 max-w-[1200px]">
            <div class="lg:grid lg:grid-cols-12 lg:gap-8">
                {{-- Desktop Sidebar --}}
                <div class="hidden lg:block lg:col-span-3">
                    @include('components.sidebar')
                </div>

                {{-- Content Area --}}
                <div class="lg:col-span-9">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>

    {{-- Flash Messages --}}
    @if(session('success'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
         class="fixed top-20 right-4 z-[100] bg-green-500 text-white px-6 py-3 rounded-xl shadow-lg flex items-center gap-3 animate-fade-in">
        <i class="fas fa-check-circle"></i>
        <span>{{ session('success') }}</span>
    </div>
    @endif

    {{-- Dashboard Mobile Bottom Nav --}}
    @include('components.mobile-bottom-nav')

    @livewireScripts
    @stack('scripts')
</body>
</html>
