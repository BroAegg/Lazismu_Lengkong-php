<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Lazismu Lengkong - Lembaga Amil Zakat Infaq Sedekah Muhammadiyah Kecamatan Lengkong, Kota Bandung. Tunaikan zakat, infaq dan sedekah Anda untuk warga Lengkong.">
    <meta name="keywords"
        content="lazismu, zakat, infaq, sedekah, lengkong, bandung, muhammadiyah, panti taman harapan, ramadan">
    <meta name="author" content="Aegner & Revan - Lazismu Lengkong">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://lazismulengkong.org/">
    <meta property="og:title" content="Lazismu Lengkong - Zakat Untuk Tetangga Terdekat">
    <meta property="og:description"
        content="Tunaikan zakat, infaq dan sedekah Anda untuk warga Kecamatan Lengkong & Kota Bandung melalui Lazismu Lengkong.">
    <meta property="og:image" content="{{ asset('assets/images/og-image.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://lazismulengkong.org/">
    <meta property="twitter:title" content="Lazismu Lengkong - Zakat Untuk Tetangga Terdekat">
    <meta property="twitter:description"
        content="Tunaikan zakat, infaq dan sedekah Anda untuk warga Kecamatan Lengkong & Kota Bandung.">

    <title>@yield('title', 'Lazismu Lengkong | Zakat, Infaq & Sedekah untuk Warga Lengkong')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Amiri:wght@400;700&family=Lato:wght@300;400;700&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#F7941D',
                        secondary: '#00A651',
                        accent: '#F15A24',
                        dark: {
                            100: '#D5D5DC',
                            200: '#ABABBC',
                            300: '#81819C',
                            400: '#57577C',
                            500: '#1A1A2E',
                        },
                    },
                    fontFamily: {
                        'jakarta': ['Plus Jakarta Sans', 'sans-serif'],
                        'amiri': ['Amiri', 'serif'],
                        'lato': ['Lato', 'sans-serif'],
                    },
                },
            },
        }
    </script>

    <style>
        /* ============================================ */
        /* OVERFLOW FIX - CRITICAL                      */
        /* ============================================ */

        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        html {
            overflow-x: hidden !important;
            width: 100%;
            max-width: 100vw;
        }

        body {
            overflow-x: hidden !important;
            width: 100%;
            max-width: 100vw;
            position: relative;
        }

        /* Container Width Fix - Mobile Only */
        @media (max-width: 1024px) {
            .container {
                padding-left: 1.25rem;
                padding-right: 1.25rem;
            }
        }

        @media (max-width: 640px) {
            section {
                overflow-x: hidden;
            }

            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #FAFAFA;
        }

        ::-webkit-scrollbar-thumb {
            background: #F7941D;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #E67E22;
        }

        /* Navbar scrolled state */
        #navbar.scrolled {
            background: white !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding-top: 0.75rem !important;
            padding-bottom: 0.75rem !important;
        }

        #navbar.scrolled .logo-img {
            filter: none !important;
        }

        #navbar.scrolled .logo-text-sub {
            color: #6B7280 !important;
        }

        #navbar.scrolled .toggle-bar {
            background: #1A1A2E !important;
        }

        #navbar.scrolled .nav-link {
            color: #1A1A2E !important;
        }

        #navbar.scrolled .nav-link:hover {
            color: #F7941D !important;
        }

        ::selection {
            background: rgba(247, 148, 29, 0.2);
            color: #F7941D;
        }

        /* Utility for Text Gradients */
        .text-gradient {
            background: linear-gradient(135deg, #F7941D 0%, #F15A24 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Primary Button Utility */
        .btn-primary {
            background: linear-gradient(135deg, #F7941D 0%, #F15A24 100%);
            box-shadow: 0 4px 15px rgba(247, 148, 29, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(247, 148, 29, 0.5);
        }

        /* Nav Link Active State */
        .nav-link.active {
            color: #F7941D !important;
        }

        .nav-link.active::after {
            width: 100%;
        }

        /* Hero Height Fix for Mobile Browser Chrome */
        #beranda {
            min-height: 100vh;
            min-height: 100svh;
        }

        @media (max-width: 768px) {
            .logo-container {
                gap: 0.25rem;
            }

            .logo-img {
                height: 2.25rem;
            }

            .logo-text-sub {
                font-size: 0.55rem !important;
            }
        }

        /* Swiper Navigation Mobile */
        @media (max-width: 640px) {

            .swiper-button-next,
            .swiper-button-prev {
                display: none !important;
            }

            .swiper-pagination {
                bottom: 120px !important;
            }
        }

        /* Stats Bar Mobile */
        .stats-card-mobile {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            width: 100%;
            max-width: 100vw;
            gap: 0.75rem;
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 0.75rem 0.5rem;
            text-align: center;
        }

        .stats-item-mobile strong {
            display: block;
            color: white;
            font-size: 1rem;
            font-weight: 700;
        }

        .stats-item-mobile span {
            display: block;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        /* Form Steps Mobile */
        @media (max-width: 480px) {
            .step-indicator {
                width: 1.5rem !important;
                height: 1.5rem !important;
                font-size: 0.75rem !important;
            }
        }

        /* Swiper Customization */
        .swiper-pagination {
            bottom: 120px !important;
            left: 50% !important;
            transform: translateX(-50%);
            width: auto !important;
            z-index: 15;
        }

        @media (max-width: 1024px) {
            .swiper-pagination {
                bottom: 80px !important;
            }
        }

        .swiper-pagination-bullet {
            background: white;
            opacity: 0.5;
            width: 10px;
            height: 10px;
            transition: all 0.3s;
        }

        .swiper-pagination-bullet-active {
            background: #F7941D;
            opacity: 1;
            width: 30px;
            border-radius: 5px;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: white;
            transition: color 0.3s;
        }

        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            color: #F7941D;
        }

        /* Bottom Nav Safe Area */
        .pb-safe {
            padding-bottom: env(safe-area-inset-bottom, 1rem);
        }
    </style>

    @stack('styles')
</head>

<body class="font-sans text-gray-800 bg-white overflow-x-hidden antialiased pb-20 lg:pb-0">
    <!-- Navbar -->
    @include('components.navbar')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- Bottom Navigation (Mobile) -->
    @include('components.bottom-nav')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 100,
        });

        // Swiper Hero Slider (fade effect, matching original)
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 0,
            effect: "fade",
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        // Navbar Scroll Effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Mobile Menu
        const mobileMenu = document.getElementById('mobileMenu');
        const menuBackdrop = document.getElementById('menuBackdrop');
        const closeMenu = document.getElementById('closeMenu');
        const mobileMenuTrigger = document.getElementById('mobileMenuTrigger');
        const mobileLinks = document.querySelectorAll('.mobile-nav-link');

        function openMenuHandler() {
            if (mobileMenu) {
                mobileMenu.style.right = '0';
                menuBackdrop.classList.remove('invisible', 'opacity-0');
                menuBackdrop.classList.add('visible', 'opacity-100');
                document.body.classList.add('overflow-hidden');
            }
        }

        function closeMenuHandler() {
            if (mobileMenu) {
                mobileMenu.style.right = '-100%';
                menuBackdrop.classList.add('invisible', 'opacity-0');
                menuBackdrop.classList.remove('visible', 'opacity-100');
                document.body.classList.remove('overflow-hidden');
            }
        }

        if (mobileMenuTrigger) mobileMenuTrigger.addEventListener('click', openMenuHandler);
        if (closeMenu) closeMenu.addEventListener('click', closeMenuHandler);
        if (menuBackdrop) menuBackdrop.addEventListener('click', closeMenuHandler);
        mobileLinks.forEach(link => link.addEventListener('click', closeMenuHandler));

        // Handle old Toggle if it still exists
        const oldToggle = document.getElementById('navbarToggleHidden');
        if (oldToggle) oldToggle.addEventListener('click', openMenuHandler);

        // ============================================
        // COUNT UP ANIMATION
        // ============================================
        function animateCountUp() {
            const counters = document.querySelectorAll('.count-up');
            counters.forEach(counter => {
                const target = parseFloat(counter.getAttribute('data-target'));
                const prefix = counter.getAttribute('data-prefix') || '';
                const suffix = counter.getAttribute('data-suffix') || '';
                const isDecimal = counter.getAttribute('data-decimal') === 'true';
                const duration = 2000;
                const startTime = performance.now();

                function easeOutQuart(t) {
                    return 1 - Math.pow(1 - t, 4);
                }

                function updateCounter(currentTime) {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    const easedProgress = easeOutQuart(progress);
                    const currentValue = target * easedProgress;

                    if (isDecimal) {
                        counter.textContent = prefix + currentValue.toFixed(1) + suffix;
                    } else {
                        counter.textContent = prefix + Math.floor(currentValue).toLocaleString('id-ID') + suffix;
                    }

                    if (progress < 1) {
                        requestAnimationFrame(updateCounter);
                    }
                }
                requestAnimationFrame(updateCounter);
            });
        }

        window.addEventListener('load', () => {
            setTimeout(animateCountUp, 500);
        });

        // Back to Top
        const bttBtn = document.getElementById('backToTop');
        if (bttBtn) {
            window.addEventListener('scroll', () => {
                if (window.scrollY > 500) {
                    bttBtn.classList.remove('opacity-0', 'invisible');
                    bttBtn.classList.add('opacity-100', 'visible');
                } else {
                    bttBtn.classList.add('opacity-0', 'invisible');
                    bttBtn.classList.remove('opacity-100', 'visible');
                }
            });
            bttBtn.addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }
    </script>

    @stack('scripts')
</body>

</html>
