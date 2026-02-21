<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $program->title }} - Lazismu Lengkong</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Lato:wght@400;700&display=swap"
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
                    },
                    boxShadow: {
                        'card': '0 4px 20px rgba(0, 0, 0, 0.05)',
                        'nav': '0 -4px 20px rgba(0,0,0,0.05)',
                        'floating': '0 8px 30px rgba(0,0,0,0.12)',
                    }
                }
            }
        }
    </script>
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #ddd;
            border-radius: 4px;
        }

        .pb-safe {
            padding-bottom: env(safe-area-inset-bottom, 1rem);
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 font-sans antialiased pb-24 lg:pb-0">

    <!-- Desktop Navbar -->
    <nav class="hidden lg:block fixed top-0 left-0 right-0 bg-white shadow-sm z-50 py-4">
        <div class="container mx-auto px-5 flex items-center justify-between max-w-[1200px]">
            <a href="{{ route('beranda') }}" class="flex flex-col items-center gap-1 group relative">
                <img src="{{ asset('assets/images/lazismuasli.png') }}" alt="Lazismu Logo" class="h-10 w-auto">
                <span class="text-[0.625rem] font-normal tracking-wide text-gray-500 logo-text-sub"
                    style="font-family: 'Lato', sans-serif;">lengkong</span>
            </a>

            <ul class="flex items-center gap-8">
                <li><a href="{{ route('beranda') }}"
                        class="text-sm font-medium text-gray-600 hover:text-primary transition-colors">Beranda</a></li>
                <li><a href="{{ route('program') }}"
                        class="text-sm font-medium text-primary transition-colors font-bold">Program</a></li>
                <li><a href="{{ route('kalkulator') }}"
                        class="text-sm font-medium text-gray-600 hover:text-primary transition-colors">Kalkulator</a>
                </li>
                <!-- Guest State -->
                <li><a href="{{ route('login') }}"
                        class="text-sm font-medium text-gray-600 hover:text-primary transition-colors">Masuk</a></li>
                <li><a href="{{ route('donasi') }}"
                        class="bg-primary text-white px-5 py-2 rounded-lg font-bold shadow-lg hover:shadow-orange-200 transition-all text-sm">Donasi
                        Sekarang</a></li>
            </ul>
        </div>
    </nav>

    <!-- Mobile Header (Back & Share) -->
    <header
        class="lg:hidden fixed top-0 left-0 right-0 z-40 p-4 flex justify-between items-center transition-all duration-300"
        id="mobileHeader">
        <a href="javascript:history.back()"
            class="w-10 h-10 bg-white/80 backdrop-blur-md rounded-full flex items-center justify-center shadow-sm text-gray-700 hover:bg-white transition-colors">
            <i class="fas fa-arrow-left"></i>
        </a>
        <button onclick="shareLink()"
            class="w-10 h-10 bg-white/80 backdrop-blur-md rounded-full flex items-center justify-center shadow-sm text-gray-700 hover:bg-white transition-colors">
            <i class="fas fa-share-alt"></i>
        </button>
    </header>

    <!-- Main Content -->
    <main class="lg:pt-28 max-w-[1200px] mx-auto lg:px-5 lg:flex lg:gap-8 lg:items-start">

        <!-- Left Column: Content -->
        <div class="w-full lg:w-2/3 bg-white lg:rounded-2xl lg:shadow-sm lg:border lg:border-gray-100 overflow-hidden">
            <!-- Hero Image -->
            <div class="relative h-[280px] md:h-[400px] lg:h-[450px]">
                @php
                $heroImages = [
                    'kado-ramadhan'           => 'https://images.unsplash.com/photo-1609220136736-443140cffec6?w=1200&q=80',
                    'back-to-masjid-ramadhan' => 'https://images.unsplash.com/photo-1542816417-0983c9c9ad53?w=1200&q=80',
                    'tebar-takjil'            => 'https://images.unsplash.com/photo-1563245372-f21724e3856d?w=1200&q=80',
                    'mudikmu-aman'            => 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=1200&q=80',
                ];
                $heroImg = $heroImages[$program->slug]
                    ?? ($program->image && str_starts_with($program->image, 'http') ? $program->image : null)
                    ?? 'https://images.unsplash.com/photo-1609220136736-443140cffec6?w=1200&q=80';
                @endphp
                <img src="{{ $heroImg }}" alt="{{ $program->title }}"
                    class="w-full h-full object-cover">
                <div
                    class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6 lg:hidden">
                    <span
                        class="inline-block px-3 py-1 bg-primary text-white text-xs font-bold rounded-full mb-2">{{ $program->pillar->name ?? 'Program' }}</span>
                </div>
            </div>

            <div class="p-6">
                <!-- Title & stats (Desktop Only header usually, but here mixed) -->
                <h1 class="text-2xl lg:text-3xl font-bold text-[#1A1A2E] mb-2 leading-tight">{{ $program->title }}</h1>
                <div class="flex items-center gap-2 text-sm text-gray-500 mb-6">
                    <i class="fas fa-map-marker-alt text-primary"></i> Lengkong, Kota Bandung
                    <span class="mx-1">•</span>
                    <span class="text-green-600 font-medium"><i
                            class="fas fa-check-circle mr-1"></i>Terverifikasi</span>
                </div>

                <!-- Progress Bar (Visible on Desktop here, Mobile has separate card) -->
                <div class="lg:hidden mb-8">
                    <div class="flex justify-between items-end mb-2">
                        <div>
                            <span class="text-2xl font-bold text-primary">Rp {{ number_format($program->collected_amount, 0, ',', '.') }}</span>
                            <span class="text-xs text-gray-400 block">terkumpul dari Rp {{ number_format($program->target_amount, 0, ',', '.') }}</span>
                        </div>
                        <span class="font-bold text-gray-700">{{ $program->progress_percent }}%</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-2.5 mb-2">
                        <div class="bg-primary h-2.5 rounded-full" style="width: {{ min($program->progress_percent, 100) }}%"></div>
                    </div>
                    <div class="flex justify-between text-xs text-gray-500">
                        <span><strong>{{ $program->donor_count }}</strong> Donatur</span>
                        @if($program->days_left)
                        <span><strong>{{ $program->days_left }}</strong> Hari lagi</span>
                        @else
                        <span class="text-gray-400">Tanpa batas waktu</span>
                        @endif
                    </div>
                </div>

                <!-- Tabs -->
                <div class="border-b border-gray-100 mb-6 sticky top-[70px] lg:static bg-white z-30">
                    <div class="flex gap-8 overflow-x-auto hide-scrollbar">
                        <button onclick="switchTab('cerita')" id="tab-cerita"
                            class="pb-3 border-b-2 border-primary text-primary font-bold whitespace-nowrap transition-colors">Cerita</button>
                        <button onclick="switchTab('kabar')" id="tab-kabar"
                            class="pb-3 border-b-2 border-transparent text-gray-500 font-medium whitespace-nowrap hover:text-gray-800 transition-colors">Kabar
                            Terbaru <span
                                class="bg-red-500 text-white text-[10px] px-1.5 rounded-full ml-1">2</span></button>
                        <button onclick="switchTab('donatur')" id="tab-donatur"
                            class="pb-3 border-b-2 border-transparent text-gray-500 font-medium whitespace-nowrap hover:text-gray-800 transition-colors">Donatur
                            <span
                                class="bg-gray-100 text-gray-600 text-[10px] px-1.5 rounded-full ml-1">{{ $program->donor_count }}</span></button>
                    </div>
                </div>

                <!-- Tab Content: Cerita -->
                <div id="content-cerita"
                    class="tab-content prose prose-orange max-w-none text-gray-600 leading-relaxed">
                    {!! $program->content ?? '<p class="text-gray-500 italic">Belum ada deskripsi program.</p>' !!}
                </div>

                <!-- Tab Content: Kabar Terbaru -->
                <div id="content-kabar" class="tab-content hidden space-y-6">
                    <!-- Update Item -->
                    <div class="relative pl-8 border-l-2 border-gray-100 pb-8 last:pb-0">
                        <div
                            class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-primary border-4 border-white shadow-sm">
                        </div>
                        <span class="text-xs text-slate-400 mb-1 block">10 Februari 2026</span>
                        <h4 class="font-bold text-gray-800 text-lg mb-2">Penyaluran Tahap 1: Jumat Berkah</h4>
                        <p class="text-gray-600 text-sm mb-4">Alhamdulillah, telah disalurkan 150 paket nasi box untuk
                            santri di Ponpes Al-Amanah Lengkong. Terima kasih Orang Baik!</p>
                        <img src="https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?w=600&q=80"
                            class="rounded-lg w-full max-w-md object-cover h-48">
                    </div>

                    <!-- Update Item -->
                    <div class="relative pl-8 border-l-2 border-gray-100">
                        <div
                            class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-gray-300 border-4 border-white shadow-sm">
                        </div>
                        <span class="text-xs text-slate-400 mb-1 block">01 Februari 2026</span>
                        <h4 class="font-bold text-gray-800 text-lg mb-2">Kampanye Dimulai</h4>
                        <p class="text-gray-600 text-sm">Bismillah, kampanye ini resmi dibuka. Mohon doa dan
                            dukungannya.</p>
                    </div>
                </div>

                <!-- Tab Content: Donatur -->
                <div id="content-donatur" class="tab-content hidden">
                    <div class="space-y-4">
                        @forelse($program->donations as $donation)
                        <!-- Donor Item -->
                        <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-xl">
                            <div class="w-10 h-10 rounded-full {{ ['bg-blue-100 text-blue-600', 'bg-orange-100 text-primary', 'bg-green-100 text-green-600', 'bg-purple-100 text-purple-600'][($loop->index) % 4] }} flex items-center justify-center font-bold text-sm">
                                {{ strtoupper(substr($donation->donor_name ?? 'H', 0, 1)) }}
                            </div>
                            <div class="flex-1">
                                <h5 class="font-bold text-gray-800 text-sm">{{ $donation->donor_name ?? 'Hamba Allah' }}</h5>
                                <p class="text-xs text-gray-500 mb-1">
                                    Berdonasi <strong>Rp {{ number_format($donation->amount, 0, ',', '.') }}</strong> • {{ $donation->created_at->diffForHumans() }}
                                </p>
                                @if($donation->notes)
                                <p class="text-xs text-gray-600 italic">"{{ $donation->notes }}"</p>
                                @endif
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-12">
                            <i class="fas fa-heart text-4xl text-gray-300 mb-3"></i>
                            <p class="text-gray-500">Belum ada donatur</p>
                            <p class="text-sm text-gray-400">Jadilah yang pertama berdonasi!</p>
                        </div>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>

        <!-- Right Column: Sticky Donation Card (Desktop) -->
        <div class="hidden lg:block w-1/3 relative">
            <div class="sticky top-24 bg-white rounded-2xl shadow-floating border border-gray-100 p-6">
                <h3 class="font-bold text-lg mb-4 text-[#1A1A2E]">Target Donasi</h3>

                <div class="flex items-end gap-2 mb-2">
                    <span class="text-3xl font-extrabold text-primary">Rp {{ number_format($program->collected_amount / 1000000, 1) }}jt</span>
                    <span class="text-sm text-gray-400 mb-1.5">terkumpul</span>
                </div>

                <div class="w-full bg-gray-100 rounded-full h-3 mb-4">
                    <div class="bg-primary h-3 rounded-full relative" style="width: {{ min($program->progress_percent, 100) }}%">
                        <div class="absolute right-0 -top-1 w-5 h-5 bg-white border-4 border-primary rounded-full">
                        </div>
                    </div>
                </div>

                <div class="flex justify-between text-sm text-gray-500 mb-6">
                    <span><strong>{{ $program->progress_percent }}%</strong> tercapai</span>
                    <span><strong>Rp {{ number_format($program->target_amount / 1000000, 0) }}jt</strong> target</span>
                </div>

                <a href="{{ route('donasi') }}"
                    class="block w-full bg-gradient-to-r from-[#F7941D] to-[#F15A24] text-white font-bold text-center py-4 rounded-xl shadow-lg shadow-orange-200 hover:shadow-orange-glow hover:-translate-y-1 transition-all duration-300 mb-4">
                    Donasi Sekarang
                </a>

                <button onclick="shareLink()"
                    class="w-full py-3 text-gray-600 font-bold border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors flex items-center justify-center gap-2">
                    <i class="fas fa-share-alt"></i> Bagikan
                </button>

                <div class="mt-6 pt-6 border-t border-gray-100">
                    <h4 class="font-bold text-sm mb-3">Donatur Terbaru</h4>
                    <div class="flex -space-x-2 overflow-hidden mb-2">
                        <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white"
                            src="https://ui-avatars.com/api/?name=Hamba+Allah&background=random" alt="" />
                        <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white"
                            src="https://ui-avatars.com/api/?name=Ahmad+Dahlan&background=random" alt="" />
                        <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white"
                            src="https://ui-avatars.com/api/?name=Siti+Aisyah&background=random" alt="" />
                        <div
                            class="h-8 w-8 rounded-full ring-2 ring-white bg-gray-100 flex items-center justify-center text-xs font-bold text-gray-500">
                            +242</div>
                    </div>
                    <p class="text-xs text-gray-400">Jadilah 5 orang pertama yang berdonasi hari ini!</p>
                </div>
            </div>
        </div>

    </main>

    <!-- Mobile Sticky Donation Button -->
    <div
        class="fixed bottom-0 left-0 right-0 bg-white shadow-[0_-4px_20px_rgba(0,0,0,0.1)] p-4 lg:hidden z-50 flex items-center gap-4 pb-safe">
        <div class="flex-1">
            <span class="block text-xs text-gray-500">Terkumpul</span>
            <span class="block text-lg font-bold text-primary">Rp {{ number_format($program->collected_amount, 0, ',', '.') }}</span>
        </div>
        <a href="{{ route('donasi') }}"
            class="flex-1 bg-gradient-to-r from-[#F7941D] to-[#F15A24] text-white font-bold py-3 rounded-xl shadow-lg text-center">
            Donasi
        </a>
    </div>

    <script>
        // Tab Logic
        function switchTab(tabName) {
            // Hide all contents
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            // Show selected content
            document.getElementById('content-' + tabName).classList.remove('hidden');

            // Reset tab styles
            document.querySelectorAll('button[id^="tab-"]').forEach(tab => {
                tab.classList.remove('border-primary', 'text-primary');
                tab.classList.add('border-transparent', 'text-gray-500');
            });

            // Set active tab style
            const activeTab = document.getElementById('tab-' + tabName);
            activeTab.classList.remove('border-transparent', 'text-gray-500');
            activeTab.classList.add('border-primary', 'text-primary');
        }

        // Header Background on Scroll (Mobile)
        const mobileHeader = document.getElementById('mobileHeader');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                mobileHeader.classList.add('bg-white', 'shadow-sm');
                mobileHeader.querySelectorAll('a, button').forEach(el => {
                    el.classList.remove('bg-white/80', 'backdrop-blur-md');
                    el.classList.add('bg-gray-50');
                });
            } else {
                mobileHeader.classList.remove('bg-white', 'shadow-sm');
                mobileHeader.querySelectorAll('a, button').forEach(el => {
                    el.classList.add('bg-white/80', 'backdrop-blur-md');
                    el.classList.remove('bg-gray-50');
                });
            }
        });

        // Share Logic
        function shareLink() {
            if (navigator.share) {
                navigator.share({
                    title: 'Sedekah Makan Santri Yatim - Lazismu Lengkong',
                    text: 'Bantu sediakan makanan bergizi untuk santri yatim & dhuafa di Kecamatan Lengkong.',
                    url: window.location.href,
                });
            } else {
                alert('Tautan telah disalin!');
            }
        }
    </script>
</body>
