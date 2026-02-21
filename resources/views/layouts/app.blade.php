<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Laravel'))</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Amiri:wght@400;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">

        <!-- AOS Animation -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
        
        <!-- Swiper CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

        <!-- Tailwind CSS CDN with Custom Config -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: {
                                DEFAULT: '#F7941D',
                                light: '#FFB347',
                                dark: '#E67E22',
                            },
                            secondary: {
                                DEFAULT: '#00A651',
                                light: '#2ECC71',
                                dark: '#27AE60',
                            },
                            accent: {
                                DEFAULT: '#F15A24',
                                light: '#FF7043',
                            },
                            dark: {
                                DEFAULT: '#1A1A2E',
                                light: '#2D2D44',
                            },
                            light: '#FAFAFA',
                        },
                        fontFamily: {
                            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                            arabic: ['Amiri', 'serif'],
                        },
                        borderRadius: {
                            'xl': '12px',
                            '2xl': '16px',
                            '3xl': '24px',
                        },
                        boxShadow: {
                            'sm': '0 2px 4px rgba(0, 0, 0, 0.05)',
                            'DEFAULT': '0 4px 6px rgba(0, 0, 0, 0.1)',
                            'md': '0 8px 16px rgba(0, 0, 0, 0.1)',
                            'lg': '0 16px 32px rgba(0, 0, 0, 0.15)',
                            'xl': '0 24px 48px rgba(0, 0, 0, 0.2)',
                            'card': '0 10px 40px rgba(0, 0, 0, 0.05)',
                            'card-hover': '0 15px 50px rgba(247, 148, 29, 0.12)',
                            'orange-glow': '0 4px 15px rgba(247, 148, 29, 0.4)',
                            'orange-glow-hover': '0 6px 20px rgba(247, 148, 29, 0.5)',
                        },
                        backgroundImage: {
                            'gradient-primary': 'linear-gradient(135deg, #F7941D 0%, #F15A24 100%)',
                            'gradient-card': 'linear-gradient(135deg, rgba(247, 148, 29, 0.1) 0%, rgba(241, 90, 36, 0.1) 100%)',
                            'gradient-dark': 'linear-gradient(135deg, #1A1A2E 0%, #2D2D44 100%)',
                            'gradient-hero': 'linear-gradient(135deg, rgba(26, 26, 46, 0.92) 0%, rgba(45, 45, 68, 0.88) 50%, rgba(61, 30, 109, 0.85) 100%)',
                        },
                        animation: {
                            'float': 'float 4s ease-in-out infinite',
                            'float-fast': 'float 3s ease-in-out infinite',
                            'pulse-slow': 'pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                            'scroll': 'scroll 30s linear infinite',
                            'fade-in': 'fadeIn 0.3s ease-out forwards',
                            'bounce-slow': 'bounce 2s infinite',
                        },
                        keyframes: {
                            float: {
                                '0%, 100%': { transform: 'translateY(0)' },
                                '50%': { transform: 'translateY(-20px)' },
                            },
                            scroll: {
                                '0%': { transform: 'translateX(0)' },
                                '100%': { transform: 'translateX(-50%)' },
                            },
                            fadeIn: {
                                '0%': { opacity: '0', transform: 'translateY(10px)' },
                                '100%': { opacity: '1', transform: 'translateY(0)' },
                            }
                        }
                    }
                }
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
            /* Text Gradient Utility */
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
            /* ============================================ */
            /* GLOBAL RESPONSIVE FIXES                      */
            /* ============================================ */
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
            /* Stats Bar Responsive */
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
        </style>
        
        @stack('styles')
        @livewireStyles
    </head>
    <body class="font-sans text-gray-800 bg-white overflow-x-hidden antialiased pb-20 lg:pb-0">
        <div class="min-h-screen @if(request()->is('dashboard*', 'profile*', 'admin*')) bg-gray-100 @endif">
            @if(request()->is('dashboard*', 'profile*'))
                {{-- User dashboard - use Breeze navigation --}}
                @include('layouts.navigation')
            @elseif(!request()->is('login', 'register', 'password/*', 'admin*'))
                {{-- Public pages - use custom navbar --}}
                <x-public-navbar />
            @endif

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                @yield('content')
                @isset($slot)
                    {{ $slot }}
                @endisset
            </main>
            
            @if(!request()->is('login', 'register', 'password/*', 'admin*', 'dashboard*', 'profile*'))
                {{-- Public pages - use custom footer --}}
                <x-footer />
            @endif
        </div>
        
        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        
        <!-- AOS Animation JS -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init({
                duration: 800,
                easing: 'ease-out-cubic',
                once: true,
                offset: 50,
            });
        </script>
        
        @stack('scripts')
        @livewireScripts
    </body>
</html>
