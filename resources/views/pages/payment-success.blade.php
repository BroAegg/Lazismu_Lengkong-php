<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Kasih - Lazismu Lengkong</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Amiri:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { DEFAULT: '#F7941D', light: '#FFB347', dark: '#E67E22' },
                        secondary: { DEFAULT: '#00A651', light: '#2ECC71', dark: '#27AE60' },
                        dark: { DEFAULT: '#1A1A2E', light: '#2D2D44' },
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        arabic: ['Amiri', 'serif'],
                    },
                    boxShadow: {
                        'card': '0 4px 20px rgba(0, 0, 0, 0.05)',
                        'nav': '0 -4px 20px rgba(0,0,0,0.05)',
                    },
                    animation: {
                        'check-bounce': 'checkBounce 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55) forwards',
                    },
                    keyframes: {
                        checkBounce: {
                            '0%': { transform: 'scale(0)' },
                            '80%': { transform: 'scale(1.1)' },
                            '100%': { transform: 'scale(1)' },
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 text-gray-800 font-sans antialiased flex items-center justify-center min-h-screen p-6">

    <div class="max-w-md w-full text-center">
        <!-- Success Animation -->
        <div class="mb-8">
            <div
                class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto animate-check-bounce mb-4">
                <i class="fas fa-check text-4xl text-green-500"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-900 mb-2">Terima Kasih!</h1>
            <p class="text-gray-500">Donasi Anda sedang kami verifikasi.</p>
        </div>

        <!-- Invoice Details -->
        <div class="bg-white rounded-2xl shadow-card p-6 border border-gray-100 mb-6">
            <h3 class="font-bold text-sm text-gray-700 mb-4 text-left">Detail Donasi</h3>
            <div class="space-y-3">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Invoice</span>
                    <span class="font-mono font-bold text-primary">{{ $donation->invoice_number }}</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Kategori</span>
                    <span class="font-bold text-gray-800">{{ $donation->category->name }}</span>
                </div>
                @if($donation->program)
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Program</span>
                    <span class="font-bold text-gray-800">{{ $donation->program->title }}</span>
                </div>
                @endif
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Nominal</span>
                    <span class="font-bold text-gray-800">Rp {{ number_format($donation->amount, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Metode</span>
                    <span class="font-bold text-gray-800">{{ str_replace('_', ' ', $donation->payment_method) }}</span>
                </div>
                <div class="flex justify-between text-sm pt-3 border-t">
                    <span class="text-gray-500">Status</span>
                    <span class="px-2 py-1 bg-yellow-100 text-yellow-700 text-xs font-bold rounded-full">{{ $donation->status }}</span>
                </div>
            </div>
        </div>

        <!-- Doa Card -->
        <div class="bg-white rounded-2xl shadow-card p-6 border border-green-100 relative overflow-hidden mb-6">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-green-400 to-green-600"></div>
            <p class="font-arabic text-xl leading-loose text-gray-800 mb-4 text-center">
                آجَرَكَ اللَّهُ فِيما أعْطَيْتَ، وَجَعَلَهُ لَكَ طَهُوراً، وَبَارَكَ لَكَ فِيما أَبْقَيْتَ
            </p>
            <p class="text-sm text-gray-600 italic leading-relaxed text-center">
                "Semoga Allah memberikan pahala kepadamu pada barang yang engkau berikan (zakatkan) dan semoga Allah
                menjadikannya penyuci bagimu, dan semoga Allah memberkahimu pada harta yang masih ada."
            </p>

            <div class="mt-6 pt-4 border-t border-gray-100 flex justify-center gap-4">
                <button
                    class="text-xs font-bold text-gray-400 hover:text-green-600 flex items-center gap-1 transition-colors">
                    <i class="far fa-copy"></i> Salin Doa
                </button>
                <button
                    class="text-xs font-bold text-gray-400 hover:text-green-600 flex items-center gap-1 transition-colors">
                    <i class="fas fa-share-alt"></i> Bagikan Doa
                </button>
            </div>
        </div>

        <!-- Next Steps -->
        <div class="space-y-3">
            <a href="https://wa.me/?text=Alhamdulillah%20saya%20sudah%20berdonasi%20di%20Lazismu%20Lengkong.%20Yuk%20ikut%20bantu%20juga!"
                target="_blank"
                class="block w-full bg-green-500 text-white font-bold py-3.5 rounded-xl shadow-lg hover:bg-green-600 hover:shadow-green-200 transition-all flex items-center justify-center gap-2">
                <i class="fab fa-whatsapp text-lg"></i>
                Konfirmasi via WhatsApp
            </a>

            <a href="{{ route('beranda') }}"
                class="block w-full bg-white text-gray-700 font-bold py-3.5 rounded-xl border border-gray-200 hover:bg-gray-50 transition-all">
                Kembali ke Beranda
            </a>
        </div>

        <p class="mt-8 text-xs text-center text-gray-400">
            Dibuat pada: <span class="font-mono text-gray-500">{{ $donation->created_at->format('d M Y, H:i') }}</span>
        </p>
    </div>

</body>
