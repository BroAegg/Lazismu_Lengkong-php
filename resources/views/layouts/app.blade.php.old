<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $metaDescription ?? 'Lazismu Lengkong - Lembaga Amil Zakat Infaq Sedekah Muhammadiyah Kecamatan Lengkong, Kota Bandung.' }}">
    <meta name="keywords" content="lazismu, zakat, infaq, sedekah, lengkong, bandung, muhammadiyah, panti taman harapan, ramadan">
    <meta name="author" content="Aegner & Revan - Lazismu Lengkong">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title ?? 'Lazismu Lengkong' }} | Zakat Untuk Tetangga Terdekat">
    <meta property="og:description" content="{{ $metaDescription ?? 'Tunaikan zakat, infaq dan sedekah Anda untuk warga Kecamatan Lengkong & Kota Bandung melalui Lazismu Lengkong.' }}">
    <meta property="og:image" content="{{ asset('assets/images/og-image.jpg') }}">

    <title>{{ $title ?? 'Lazismu Lengkong' }} | Zakat, Infaq & Sedekah</title>

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Amiri:wght@400;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    {{-- AOS Animation --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    {{-- Swiper CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    {{-- Vite Assets (Tailwind + App JS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Livewire Styles --}}
    @livewireStyles

    {{-- Page-specific styles --}}
    @stack('styles')
</head>
<body class="font-sans antialiased bg-[#FAFAFA] text-gray-800">

    {{-- Public Navbar --}}
    @include('components.navbar')

    {{-- Mobile Menu Backdrop --}}
    <div class="fixed inset-0 bg-black/50 z-[55] hidden transition-all duration-300 lg:hidden" id="menu-backdrop"></div>

    {{-- Mobile Slide-out Menu --}}
    @include('components.mobile-menu')

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

    {{-- WhatsApp Floating & Back to Top --}}
    @include('components.whatsapp-float')
    @include('components.back-to-top')

    {{-- Mobile Bottom Navigation --}}
    @include('components.mobile-bottom-nav')

    {{-- Flash Messages --}}
    @if(session('success'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
         class="fixed top-20 right-4 z-[100] bg-green-500 text-white px-6 py-3 rounded-xl shadow-lg flex items-center gap-3 animate-fade-in">
        <i class="fas fa-check-circle"></i>
        <span>{{ session('success') }}</span>
    </div>
    @endif

    @if(session('error'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
         class="fixed top-20 right-4 z-[100] bg-red-500 text-white px-6 py-3 rounded-xl shadow-lg flex items-center gap-3 animate-fade-in">
        <i class="fas fa-times-circle"></i>
        <span>{{ session('error') }}</span>
    </div>
    @endif

    {{-- Alpine.js (CDN) --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- AOS Init --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    {{-- Swiper JS --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    {{-- Livewire Scripts --}}
    @livewireScripts

    <script>
        AOS.init({ duration: 800, once: true, offset: 50 });
    </script>

    {{-- Page-specific scripts --}}
    @stack('scripts')
</body>
</html>
