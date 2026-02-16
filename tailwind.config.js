import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

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
                sans: ['"Plus Jakarta Sans"', ...defaultTheme.fontFamily.sans],
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
                },
            },
        },
    },

    plugins: [forms],
};
