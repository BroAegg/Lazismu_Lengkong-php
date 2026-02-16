<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Laravel'))</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        
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
        
        <!-- Alpine.js -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        
        @stack('styles')
    </head>
    <body class="font-sans antialiased">
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
        
        @stack('scripts')
    </body>
</html>
