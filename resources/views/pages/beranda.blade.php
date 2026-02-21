@extends('layouts.app')

@section('title', 'Lazismu Lengkong | Zakat, Infaq & Sedekah untuk Warga Lengkong')

@push('styles')
<style>
    .gradient-primary {
        background: linear-gradient(135deg, #F7941D 0%, #F15A24 100%);
    }
    .shadow-orange-glow {
        box-shadow: 0 10px 30px rgba(247, 148, 29, 0.3);
    }
    .shadow-orange-glow-hover {
        box-shadow: 0 15px 40px rgba(247, 148, 29, 0.5);
    }
    .bg-gradient-primary {
        background: linear-gradient(135deg, #F7941D 0%, #F15A24 100%);
    }
</style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center overflow-hidden pt-20 bg-gray-900" id="beranda">
        <!-- Swiper Container -->
        <div class="swiper mySwiper w-full h-full absolute inset-0 z-0">
            <div class="swiper-wrapper">

                @php
                $heroConfigs = [
                    'kado-ramadhan' => [
                        'badge'       => 'KADO RAMADHAN 1447 H',
                        'badge_class' => 'bg-primary/20 text-[#FFB347] border-primary/30',
                        'bg_image'    => 'https://images.unsplash.com/photo-1609220136736-443140cffec6?w=1920&q=80',
                        'overlay'     => 'bg-[#1A1A2E]/85',
                        'accent'      => 'text-[#FFB347]',
                        'cta_icon'    => 'fas fa-gift',
                        'cta_label'   => 'Kirim Kado Sekarang',
                        'cta_class'   => 'bg-gradient-primary shadow-orange-glow hover:shadow-orange-glow-hover',
                        'bar_color'   => 'bg-[#F7941D]',
                    ],
                    'back-to-masjid-ramadhan' => [
                        'badge'       => 'BACK TO MASJID',
                        'badge_class' => 'bg-emerald-500/20 text-emerald-300 border-emerald-500/30',
                        'bg_image'    => 'https://images.unsplash.com/photo-1542816417-0983c9c9ad53?w=1920&q=80',
                        'overlay'     => 'bg-gradient-to-r from-emerald-900/90 via-emerald-900/80 to-transparent',
                        'accent'      => 'text-emerald-400',
                        'cta_icon'    => 'fas fa-mosque',
                        'cta_label'   => 'Makmurkan Masjid',
                        'cta_class'   => 'bg-emerald-600 hover:bg-emerald-500',
                        'bar_color'   => 'bg-emerald-400',
                    ],
                    'tebar-takjil' => [
                        'badge'       => 'TEBAR TAKJIL GRATIS',
                        'badge_class' => 'bg-amber-500/20 text-amber-300 border-amber-500/30',
                        'bg_image'    => 'https://images.unsplash.com/photo-1563245372-f21724e3856d?w=1920&q=80',
                        'overlay'     => 'bg-gradient-to-r from-[#1A1A2E]/88 via-[#1A1A2E]/75 to-transparent',
                        'accent'      => 'text-amber-400',
                        'cta_icon'    => 'fas fa-utensils',
                        'cta_label'   => 'Bagikan Takjil',
                        'cta_class'   => 'bg-amber-500 hover:bg-amber-400',
                        'bar_color'   => 'bg-amber-400',
                    ],
                    'mudikmu-aman' => [
                        'badge'       => 'MUDIKMU AMAN 1447 H',
                        'badge_class' => 'bg-blue-500/20 text-blue-300 border-blue-500/30',
                        'bg_image'    => 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=1920&q=80',
                        'overlay'     => 'bg-gradient-to-r from-blue-900/90 via-blue-900/80 to-transparent',
                        'accent'      => 'text-blue-400',
                        'cta_icon'    => 'fas fa-car-side',
                        'cta_label'   => 'Dukung Program',
                        'cta_class'   => 'bg-blue-600 hover:bg-blue-500',
                        'bar_color'   => 'bg-blue-400',
                    ],
                ];
                $defaultCfg = [
                    'badge'       => 'PROGRAM UNGGULAN',
                    'badge_class' => 'bg-primary/20 text-[#FFB347] border-primary/30',
                    'bg_image'    => 'https://images.unsplash.com/photo-1609220136736-443140cffec6?w=1920&q=80',
                    'overlay'     => 'bg-[#1A1A2E]/85',
                    'accent'      => 'text-[#FFB347]',
                    'cta_icon'    => 'fas fa-hand-holding-heart',
                    'cta_label'   => 'Donasi Sekarang',
                    'cta_class'   => 'bg-gradient-primary shadow-orange-glow hover:shadow-orange-glow-hover',
                    'bar_color'   => 'bg-[#F7941D]',
                ];
                @endphp

                @forelse($featuredPrograms as $program)
                @php $cfg = $heroConfigs[$program->slug] ?? $defaultCfg; @endphp

                <!-- Slide: {{ $program->title }} -->
                <div class="swiper-slide relative">
                    <!-- Background Image -->
                    <div class="absolute inset-0 bg-no-repeat bg-center bg-cover"
                         style="background-image: url('{{ $cfg['bg_image'] }}')"></div>
                    <!-- Overlay -->
                    <div class="absolute inset-0 {{ $cfg['overlay'] }}"></div>

                    <!-- Content -->
                    <div class="container mx-auto px-5 h-full flex items-center relative z-10 max-w-[1200px]">
                        <div class="w-full lg:w-2/3">

                            {{-- Badge / Program Tag --}}
                            <span class="inline-block px-4 py-1 rounded-full {{ $cfg['badge_class'] }} text-sm font-bold border mb-6">
                                {{ $cfg['badge'] }}
                            </span>

                            {{-- Title --}}
                            <h1 class="text-[clamp(2.5rem,5vw,3.5rem)] font-extrabold text-white leading-[1.15] mb-6">
                                {{ $program->title }}
                            </h1>

                            {{-- Description --}}
                            <p class="text-lg text-white/80 mb-6 leading-relaxed max-w-2xl">
                                {{ $program->description }}
                            </p>

                            {{-- Progress Bar --}}
                            @if($program->target_amount > 0)
                            @php $pct = min(100, round($program->collected_amount / $program->target_amount * 100)); @endphp
                            <div class="mb-8 max-w-sm">
                                <div class="flex justify-between text-white/70 text-sm mb-2">
                                    <span>Terkumpul:
                                        <strong class="text-white">Rp {{ number_format($program->collected_amount, 0, ',', '.') }}</strong>
                                    </span>
                                    <span class="{{ $cfg['accent'] }} font-bold">{{ $pct }}%</span>
                                </div>
                                <div class="h-1.5 bg-white/20 rounded-full overflow-hidden">
                                    <div class="h-full {{ $cfg['bar_color'] }} rounded-full transition-all duration-1000"
                                         style="width: {{ $pct }}%"></div>
                                </div>
                                <p class="text-white/50 text-xs mt-1">
                                    dari target Rp {{ number_format($program->target_amount, 0, ',', '.') }}
                                    &bull; {{ $program->donor_count }} donatur
                                </p>
                            </div>
                            @endif

                            {{-- CTA Buttons --}}
                            <div class="flex flex-wrap gap-4 mb-20">
                                <a href="{{ route('donasi.show', $program->slug) }}"
                                   class="px-8 py-4 {{ $cfg['cta_class'] }} rounded-xl text-white font-bold text-lg shadow-lg hover:-translate-y-1 transition-all duration-300 flex items-center gap-2">
                                    <i class="{{ $cfg['cta_icon'] }}"></i>
                                    {{ $cfg['cta_label'] }}
                                </a>
                                <a href="{{ route('program.show', $program->slug) }}"
                                   class="px-8 py-4 bg-white/10 backdrop-blur-sm border border-white/30 rounded-xl text-white font-bold text-lg hover:bg-white/20 transition-all duration-300 flex items-center gap-2">
                                    <i class="fas fa-info-circle"></i> Pelajari Program
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                @empty
                <!-- Fallback slide jika belum ada program -->
                <div class="swiper-slide relative">
                    <div class="absolute inset-0 bg-no-repeat bg-center bg-cover"
                         style="background-image: url('{{ asset('assets/images/hero-bg.png') }}')"></div>
                    <div class="absolute inset-0 bg-gray-900/85"></div>
                    <div class="container mx-auto px-5 h-full flex items-center relative z-10 max-w-[1200px]">
                        <div class="w-full lg:w-2/3">
                            <span class="inline-block px-4 py-1 rounded-full bg-primary/20 text-[#FFB347] text-sm font-bold border border-primary/30 mb-6">
                                LAZISMU LENGKONG
                            </span>
                            <h1 class="text-[clamp(2.5rem,5vw,3.5rem)] font-extrabold text-white leading-[1.15] mb-6">
                                Bersama, Kita <br><span class="text-[#FFB347]">Wujudkan Kebaikan.</span>
                            </h1>
                            <p class="text-lg text-white/80 mb-8 leading-relaxed max-w-2xl">
                                Zakat, Infaq, dan Sedekah Anda menjadi nyala harapan bagi masyarakat Lengkong yang membutuhkan.
                            </p>
                            <div class="flex flex-wrap gap-4 mb-20">
                                <a href="{{ route('program') }}"
                                   class="px-8 py-4 bg-gradient-primary rounded-xl text-white font-bold text-lg shadow-orange-glow hover:shadow-orange-glow-hover hover:-translate-y-1 transition-all duration-300 flex items-center gap-2">
                                    <i class="fas fa-hand-holding-heart"></i> Lihat Program
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforelse

            </div>

            <!-- Swiper Navigation -->
            <div class="swiper-button-next !text-white/50 hover:!text-white transition-colors"></div>
            <div class="swiper-button-prev !text-white/50 hover:!text-white transition-colors"></div>

            <!-- Swiper Pagination -->
            <div class="swiper-pagination"></div>
        </div>

        <!-- Static Wave Divider Region (Overlaying the Swiper) -->
        <div class="absolute bottom-0 left-0 right-0 pointer-events-none leading-none z-20">
            <!-- Stats Bar - Tablet/Desktop -->
            <div class="container mx-auto px-5 max-w-[1200px] mb-8 hidden md:block relative z-30">
                <div class="flex justify-end">
                    <div
                        class="flex gap-8 text-white/80 border-t border-white/10 pt-5 pb-5 backdrop-blur-md bg-black/20 rounded-xl px-8 pointer-events-auto hover:bg-black/30 transition-all duration-300 shadow-lg">
                        <div class="text-center">
                            <strong class="block text-white text-2xl font-bold count-up" data-target="{{ $stats['total_donatur'] }}"
                                data-suffix="+">0</strong>
                            <span class="text-sm">Donatur</span>
                        </div>
                        <div class="text-center border-l border-white/20 pl-8">
                            <strong class="block text-white text-2xl font-bold count-up" data-target="{{ $stats['total_program'] }}"
                                data-suffix="+">0</strong>
                            <span class="text-sm">Program</span>
                        </div>
                        <div class="text-center border-l border-white/20 pl-8">
                            <strong class="block text-white text-2xl font-bold count-up" data-target="{{ number_format($stats['total_tersalurkan'] / 1000000, 1, '.', '') }}"
                                data-prefix="Rp " data-suffix=" M" data-decimal="true">0</strong>
                            <span class="text-sm">Tersalurkan</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Bar - Mobile Only -->
            <div class="md:hidden relative z-30 pointer-events-auto">
                <div class="stats-card-mobile">
                    <div class="stats-item-mobile">
                        <strong class="count-up" data-target="{{ $stats['total_donatur'] }}" data-suffix="+">0</strong>
                        <span>Donatur</span>
                    </div>
                    <div class="stats-item-mobile border-l border-white/10">
                        <strong class="count-up" data-target="{{ $stats['total_program'] }}" data-suffix="+">0</strong>
                        <span>Program</span>
                    </div>
                    <div class="stats-item-mobile border-l border-white/10">
                        <strong class="count-up" data-target="{{ number_format($stats['total_tersalurkan'] / 1000000, 1, '.', '') }}" data-suffix="M" data-decimal="true">0</strong>
                        <span>Salur</span>
                    </div>
                </div>
            </div>

            <!-- Wave Divider -->
            <svg class="w-full h-[30px] sm:h-[60px] md:h-[100px] text-[#FAFAFA] fill-current" viewBox="0 0 1440 120"
                preserveAspectRatio="none">
                <path
                    d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,58.7C960,64,1056,64,1152,58.7C1248,53,1344,43,1392,37.3L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z">
                </path>
            </svg>
        </div>
    </section>



    <!-- Calculator Section -->
    <!-- Calculator Teaser Section -->
    <section class="py-20 bg-white" id="kalkulator">
        <div class="container mx-auto px-5 max-w-[1200px]">
            <div class="bg-gradient-to-br from-[#1A1A2E] to-[#2D2D44] rounded-[2.5rem] p-8 md:p-16 relative overflow-hidden shadow-2xl"
                data-aos="fade-up">
                <!-- Background Decoration -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-primary/20 rounded-full blur-3xl -mr-20 -mt-20"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-secondary/20 rounded-full blur-3xl -ml-20 -mb-20">
                </div>

                <div class="relative z-10 flex flex-col lg:flex-row items-center gap-12">
                    <div class="lg:w-1/2 text-center lg:text-left">
                        <span
                            class="inline-block px-4 py-2 bg-white/10 text-[#FFB347] text-sm font-bold rounded-full mb-6 border border-white/10">
                            <i class="fas fa-calculator mr-2"></i>Kalkulator Zakat
                        </span>
                        <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-6 leading-tight">
                            {{ \App\Models\Setting::get('beranda_kalkulator_heading', 'Sudah Tahu Berapa Zakat Anda?') }}
                        </h2>
                        <p class="text-lg text-white/80 mb-8 leading-relaxed">
                            {{ \App\Models\Setting::get('beranda_kalkulator_desc', 'Jangan ragu. Gunakan alat bantu hitung kami untuk mengetahui kewajiban zakat maal atau profesi Anda dengan akurat sesuai nisab. Hanya butuh 1 menit.') }}
                        </p>
                        <a href="{{ route('kalkulator') }}"
                            class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-[#F7941D] to-[#F15A24] text-white font-bold rounded-xl shadow-lg hover:shadow-orange-glow transition-all hover:-translate-y-1">
                            Hitung Sekarang <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                    <div class="lg:w-1/2 flex justify-center">
                        <img src="{{ asset('assets/images/calculator-mockup.png') }}" alt="Ilustrasi Kalkulator"
                            class="w-full max-w-md drop-shadow-2xl" onerror="this.style.display='none';">
                        <!-- Fallback Icon if image missing -->
                        <div
                            class="text-[10rem] text-white/10 absolute right-10 top-1/2 -translate-y-1/2 hidden lg:block">
                            <i class="fas fa-calculator"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Authority & Trust Teaser Section -->
    <section class="py-24 bg-[#FAFAFA]" id="tentang">
        <div class="container mx-auto px-5 max-w-[1200px]">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <!-- Image/Visual Side -->
                <div class="lg:w-1/2 relative" data-aos="fade-right">
                    <div class="absolute -top-10 -left-10 w-40 h-40 bg-orange-100 rounded-full blur-3xl opacity-60">
                    </div>
                    <div
                        class="relative rounded-[2rem] overflow-hidden shadow-2xl border-4 border-white transform rotate-3 hover:rotate-0 transition-all duration-500">
                        <img src="{{ asset('assets/images/about-collage.png') }}" alt="Lazismu Lengkong Activity" class="w-full h-auto"
                            onerror="this.src='https://images.unsplash.com/photo-1593113598332-cd288d649433?w=800&q=80'">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-8">
                            <p class="text-white font-bold text-lg"><i
                                    class="fas fa-map-marker-alt text-primary mr-2"></i>Kecamatan Lengkong, Kota Bandung
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Content Side -->
                <div class="lg:w-1/2" data-aos="fade-left">
                    <span
                        class="inline-block px-4 py-2 bg-gradient-to-r from-[#F7941D] to-[#F15A24] text-white text-sm font-semibold rounded-full mb-6">
                        Mengapa Lazismu Lengkong?
                    </span>
                    <h2 class="text-3xl md:text-5xl font-extrabold text-[#1A1A2E] mb-6 leading-tight">
                        {{ \App\Models\Setting::get('beranda_tentang_heading', 'Amanah yang Berakar, Dampak yang Melebar.') }}
                    </h2>
                    <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                        {{ \App\Models\Setting::get('beranda_tentang_desc', 'Kami bukan sekadar penyalur, kami adalah pengelola ekosistem kebaikan di bawah naungan Muhammadiyah Lengkong. Dari Panti Asuhan Taman Harapan yang bersejarah hingga puluhan sekolah yang mencerahkan bangsa.') }}
                    </p>

                    <ul class="space-y-4 mb-10">
                        <li class="flex items-center gap-4 group">
                            <div
                                class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center text-green-600 group-hover:scale-110 transition-transform">
                                <i class="fas fa-check"></i>
                            </div>
                            <span class="text-gray-700 font-medium">Terdaftar & Diawasi Kemenag RI</span>
                        </li>
                        <li class="flex items-center gap-4 group">
                            <div
                                class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center text-green-600 group-hover:scale-110 transition-transform">
                                <i class="fas fa-check"></i>
                            </div>
                            <span class="text-gray-700 font-medium">Audit Syariah & Keuangan Transparan</span>
                        </li>
                        <li class="flex items-center gap-4 group">
                            <div
                                class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center text-green-600 group-hover:scale-110 transition-transform">
                                <i class="fas fa-check"></i>
                            </div>
                            <span class="text-gray-700 font-medium">Bagian dari Persyarikatan Muhammadiyah</span>
                        </li>
                    </ul>

                    <a href="{{ route('tentang-kami') }}"
                        class="inline-flex items-center text-primary font-bold text-lg hover:underline underline-offset-4 decoration-2">
                        Pelajari Sejarah Kami <i class="fas fa-arrow-right ml-2 animate-bounce-slow text-sm"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-20 bg-white" id="cara-berdonasi">
        <div class="container mx-auto px-5 max-w-[1200px]">

            <!-- Section Header -->
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="inline-block px-4 py-2 bg-orange-50 text-orange-600 text-sm font-bold tracking-wide rounded-full mb-4 border border-orange-100">
                    <i class="fas fa-check-circle mr-2"></i>Mudah & Aman
                </span>
                <h2 class="text-3xl md:text-5xl font-extrabold text-[#1A1A2E] mb-6 leading-tight">
                    {{ \App\Models\Setting::get('beranda_cara_heading', 'Berdonasi Semudah 3 Langkah') }}
                </h2>
                <p class="text-lg md:text-xl text-gray-500 max-w-[700px] mx-auto leading-relaxed">
                    {{ \App\Models\Setting::get('beranda_cara_desc', 'Tidak perlu ribet. Pilih program, bayar, dan Anda langsung menjadi bagian dari kebaikan nyata.') }}
                </p>
            </div>

            <!-- 3 Steps Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-24 relative" data-aos="fade-up" data-aos-delay="100">
                <!-- Connector Line (Desktop) -->
                <div class="hidden md:block absolute top-[3.5rem] left-[16%] right-[16%] h-1 bg-gray-100 border-t-2 border-dashed border-gray-300 -z-10" aria-hidden="true"></div>

                <!-- Step 1 -->
                <div class="relative bg-white rounded-[2rem] p-8 border border-gray-100 shadow-xl shadow-gray-100/50 hover:shadow-2xl hover:shadow-orange-100/50 hover:-translate-y-2 transition-all duration-300 text-center group h-full">
                    <div class="relative w-24 h-24 mx-auto mb-8">
                        <div class="absolute inset-0 bg-orange-100/80 rounded-full animate-pulse-slow"></div>
                        <div class="relative w-full h-full bg-orange-50 rounded-full border-4 border-white shadow-sm flex items-center justify-center text-orange-500 text-4xl group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                            <i class="fas fa-hand-holding-heart"></i>
                        </div>
                        <div class="absolute -top-2 -right-2 w-10 h-10 bg-[#1A1A2E] text-white text-lg font-bold rounded-full border-4 border-white flex items-center justify-center shadow-md">1</div>
                    </div>
                    <h3 class="text-2xl font-bold text-[#1A1A2E] mb-4 group-hover:text-orange-600 transition-colors">
                        {{ \App\Models\Setting::get('beranda_cara_step1_title', 'Pilih Program') }}
                    </h3>
                    <p class="text-gray-500 leading-7 text-[1.05rem]">
                        {{ \App\Models\Setting::get('beranda_cara_step1_desc', 'Geser hero di atas, pilih program Ramadan yang paling dekat di hati Anda, lalu klik Donasi Sekarang.') }}
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="relative bg-white rounded-[2rem] p-8 border border-gray-100 shadow-xl shadow-gray-100/50 hover:shadow-2xl hover:shadow-emerald-100/50 hover:-translate-y-2 transition-all duration-300 text-center group h-full">
                    <div class="relative w-24 h-24 mx-auto mb-8">
                        <div class="absolute inset-0 bg-emerald-100/80 rounded-full animate-pulse-slow"></div>
                        <div class="relative w-full h-full bg-emerald-50 rounded-full border-4 border-white shadow-sm flex items-center justify-center text-emerald-500 text-4xl group-hover:bg-emerald-500 group-hover:text-white transition-colors duration-300">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <div class="absolute -top-2 -right-2 w-10 h-10 bg-[#1A1A2E] text-white text-lg font-bold rounded-full border-4 border-white flex items-center justify-center shadow-md">2</div>
                    </div>
                    <h3 class="text-2xl font-bold text-[#1A1A2E] mb-4 group-hover:text-emerald-600 transition-colors">
                        {{ \App\Models\Setting::get('beranda_cara_step2_title', 'Isi & Bayar') }}
                    </h3>
                    <p class="text-gray-500 leading-7 text-[1.05rem]">
                        {{ \App\Models\Setting::get('beranda_cara_step2_desc', 'Masukkan nama, jumlah donasi, dan pilih metode pembayaran: Transfer Bank, QRIS, atau Tunai.') }}
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="relative bg-white rounded-[2rem] p-8 border border-gray-100 shadow-xl shadow-gray-100/50 hover:shadow-2xl hover:shadow-blue-100/50 hover:-translate-y-2 transition-all duration-300 text-center group h-full">
                    <div class="relative w-24 h-24 mx-auto mb-8">
                        <div class="absolute inset-0 bg-blue-100/80 rounded-full animate-pulse-slow"></div>
                        <div class="relative w-full h-full bg-blue-50 rounded-full border-4 border-white shadow-sm flex items-center justify-center text-blue-500 text-4xl group-hover:bg-blue-500 group-hover:text-white transition-colors duration-300">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div class="absolute -top-2 -right-2 w-10 h-10 bg-[#1A1A2E] text-white text-lg font-bold rounded-full border-4 border-white flex items-center justify-center shadow-md">3</div>
                    </div>
                    <h3 class="text-2xl font-bold text-[#1A1A2E] mb-4 group-hover:text-blue-600 transition-colors">
                        {{ \App\Models\Setting::get('beranda_cara_step3_title', 'Terima Laporan') }}
                    </h3>
                    <p class="text-gray-500 leading-7 text-[1.05rem]">
                        {{ \App\Models\Setting::get('beranda_cara_step3_desc', 'Donasi Anda tercatat. Laporan penyaluran dikirim langsung ke WhatsApp & Email Anda secara berkala.') }}
                    </p>
                </div>

            </div>

            <!-- Live Donation Feed & CTA -->
            <div class="flex flex-col lg:flex-row gap-8 lg:gap-12 items-stretch" data-aos="fade-up" data-aos-delay="200">

                <!-- Left: Live Feed Card -->
                <div class="w-full lg:w-1/2 flex flex-col">
                    <div class="bg-white rounded-[2rem] border border-gray-100 p-8 shadow-xl shadow-gray-100/50 h-full relative overflow-hidden group">
                        <!-- Decorative bg -->
                        <div class="absolute top-0 right-0 w-64 h-64 bg-orange-50/50 rounded-full blur-3xl -mr-32 -mt-32 pointer-events-none"></div>
                        
                        <div class="relative z-10 flex items-center justify-between mb-8 border-b border-gray-100 pb-6">
                            <div class="flex items-center gap-4">
                                <div class="relative flex h-4 w-4">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-4 w-4 bg-green-500"></span>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-extrabold text-[#1A1A2E]">Donasi Terbaru</h3>
                                    <span class="text-sm text-gray-400 font-medium">Real-time update</span>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-2 rounded-full text-xs font-bold text-gray-500 uppercase tracking-wider border border-gray-100">
                                {{ date('d M Y') }}
                            </div>
                        </div>

                        <div class="space-y-4 max-h-[450px] overflow-y-auto pr-2 custom-scrollbar relative z-10" id="donationFeed">
                            @forelse($recentDonations as $donation)
                            <div class="flex items-center gap-5 p-5 bg-gray-50 rounded-2xl border border-gray-100 hover:border-orange-200 hover:bg-orange-50 transition-all duration-300 group/item">
                                <!-- Avatar -->
                                <div class="w-12 h-12 rounded-full bg-white border-2 border-white shadow-sm flex items-center justify-center text-lg shrink-0 group-hover/item:scale-110 transition-transform">
                                    <div class="w-full h-full rounded-full bg-gradient-to-br from-orange-100 to-orange-200 flex items-center justify-center text-orange-600 font-bold">
                                        {{ $donation->is_anonymous ? '🤲' : strtoupper(substr($donation->donor_name ?? 'D', 0, 1)) }}
                                    </div>
                                </div>
                                <!-- Info -->
                                <div class="flex-1 min-w-0">
                                    <p class="font-bold text-[#1A1A2E] text-base truncate group-hover/item:text-orange-600 transition-colors">
                                        {{ $donation->is_anonymous ? 'Hamba Allah' : ($donation->donor_name ?? 'Donatur') }}
                                    </p>
                                    <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                                        <i class="fas fa-clock text-gray-300"></i>
                                        <span>{{ $donation->created_at->diffForHumans() }}</span>
                                        <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                                        <span class="text-orange-500 font-medium truncate max-w-[120px]">
                                            {{ $donation->program?->title ?? 'Donasi Umum' }}
                                        </span>
                                    </div>
                                </div>
                                <!-- Amount -->
                                <div class="text-right shrink-0">
                                    <p class="font-extrabold text-orange-500 text-lg">Rp {{ number_format($donation->amount, 0, ',', '.') }}</p>
                                    <span class="text-[10px] uppercase font-bold text-gray-300 tracking-wider">Donasi</span>
                                </div>
                            </div>
                            @empty
                            <div class="flex flex-col items-center justify-center py-12 text-center h-full">
                                <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-4 text-gray-300 text-3xl animate-pulse">
                                    <i class="fas fa-hand-holding-heart"></i>
                                </div>
                                <h4 class="text-gray-900 font-bold text-lg mb-1">Belum Ada Donasi</h4>
                                <p class="text-gray-400 text-sm max-w-[200px]">Jadilah orang baik pertama hari ini yang menebar kebahagiaan.</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Right: Urgency CTA Box -->
                <div class="w-full lg:w-1/2 flex flex-col sticky top-24">
                    <div class="bg-[#1A1A2E] rounded-[2rem] p-8 md:p-10 text-white relative overflow-hidden h-full shadow-2xl shadow-gray-200 group">
                        <!-- Decorative Accents -->
                        <div class="absolute top-0 right-0 w-64 h-64 bg-primary/20 rounded-full blur-3xl -mr-20 -mt-20 group-hover:bg-primary/30 transition-colors duration-500"></div>
                        <div class="absolute bottom-0 left-0 w-40 h-40 bg-blue-500/10 rounded-full blur-3xl -ml-10 -mb-10"></div>
                        
                        <!-- Content -->
                        <div class="relative z-10 flex flex-col h-full justify-between">
                            <div>
                                <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 text-[#FFB347] text-xs font-bold rounded-full border border-white/10 mb-6 backdrop-blur-sm">
                                    <i class="fas fa-moon"></i> {{ \App\Models\Setting::get('beranda_cta_badge', 'RAMADAN 1447 H') }}
                                </div>
                                <h3 class="text-3xl md:text-4xl font-extrabold mb-6 leading-tight">
                                    {{ \App\Models\Setting::get('beranda_cta_heading', 'Setiap Rupiah Berlipat Pahalanya.') }}
                                </h3>
                                <p class="text-white/70 text-lg leading-relaxed mb-8 border-l-4 border-[#FFB347] pl-4">
                                    {{ \App\Models\Setting::get('beranda_cta_desc', 'Ramadan adalah bulan terbaik untuk beramal. Tidak ada waktu yang lebih tepat dari sekarang untuk mulai berbagi.') }}
                                </p>

                                <!-- Mini Stats -->
                                <div class="grid grid-cols-2 gap-4 mb-8">
                                    <div class="bg-white/5 rounded-2xl p-5 border border-white/5 hover:bg-white/10 transition-colors text-center">
                                        <strong class="block text-3xl font-extrabold text-[#FFB347] mb-1">{{ $stats['total_donatur'] }}+</strong>
                                        <span class="text-xs text-white/50 uppercase tracking-wider font-bold">Donatur Aktif</span>
                                    </div>
                                    <div class="bg-white/5 rounded-2xl p-5 border border-white/5 hover:bg-white/10 transition-colors text-center">
                                        <strong class="block text-3xl font-extrabold text-[#FFB347] mb-1">{{ $featuredPrograms->count() }}</strong>
                                        <span class="text-xs text-white/50 uppercase tracking-wider font-bold">Program Ramadan</span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <a href="{{ route('program') }}"
                                   class="relative overflow-hidden flex items-center justify-center gap-3 w-full py-5 bg-gradient-to-r from-[#F7941D] to-[#F15A24] text-white font-bold text-lg rounded-2xl shadow-lg shadow-orange-900/30 hover:-translate-y-1 hover:shadow-orange-900/50 transition-all duration-300 group/btn">
                                    <span class="relative z-10 font-bold tracking-wide">PILIH PROGRAM & DONASI</span>
                                    <i class="fas fa-arrow-right relative z-10 group-hover/btn:translate-x-1 transition-transform"></i>
                                    <div class="absolute inset-0 bg-white/20 translate-y-full group-hover/btn:translate-y-0 transition-transform duration-300"></div>
                                </a>
                                <p class="text-center text-white/30 text-xs mt-4 flex items-center justify-center gap-2">
                                    <i class="fas fa-shield-alt"></i> Aman · Transparan · Sesuai Syariah
                                </p>
                            </div>
                        </div>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Social Proof Section -->
    <section class="py-24 bg-[#FAFAFA] relative overflow-hidden">
        <div class="container mx-auto px-5 max-w-[1200px] relative z-20">
            <div class="text-center mb-16" data-aos="fade-up">
                <span
                    class="inline-block px-4 py-2 bg-gradient-to-r from-[#F7941D] to-[#F15A24] text-white text-sm font-semibold rounded-full mb-4">Testimoni</span>
                <h2 class="text-[clamp(1.75rem,4vw,2.5rem)] font-extrabold text-[#1A1A2E] mb-4 leading-tight">Apa Kata
                    Mereka?</h2>
                <p class="text-lg text-gray-600 max-w-[700px] mx-auto">
                    Anda tidak sendirian. Ribuan warga Bandung telah mempercayakan ZIS-nya melalui Lazismu Lengkong.
                </p>
            </div>

            <!-- Testimonial Marquee Slider -->
            <div class="overflow-hidden mb-20" data-aos="fade-up" data-aos-delay="200">
                <div class="flex gap-8 animate-scroll hover:[animation-play-state:paused] py-4">
                    <!-- Card 1 -->
                    <div
                        class="bg-white p-10 rounded-[2.5rem] shadow-xl w-[320px] border border-gray-100 shrink-0 flex flex-col justify-between hover:shadow-2xl transition-all duration-300">
                        <div>
                            <div
                                class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-primary mb-8">
                                <i class="fas fa-quote-left text-2xl"></i>
                            </div>
                            <p class="text-gray-600 leading-relaxed italic text-lg">
                                "Zakat di sini praktis banget, laporannya masuk ke WA, dan aku tau
                                uangnya dipake buat sekolahin adik-adik di panti yang keren itu."
                            </p>
                        </div>
                        <div class="flex items-center gap-4 pt-8 border-t border-gray-100 mt-8">
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center text-white shadow-lg shadow-orange-200">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <strong class="block text-[#1A1A2E]">Dinda Pratiwi</strong>
                                <span class="text-sm text-gray-500">Karyawan Swasta</span>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div
                        class="bg-white p-10 rounded-[2.5rem] shadow-xl w-[320px] border border-gray-100 shrink-0 flex flex-col justify-between hover:shadow-2xl transition-all duration-300">
                        <div>
                            <div
                                class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-primary mb-8">
                                <i class="fas fa-quote-left text-2xl"></i>
                            </div>
                            <p class="text-gray-600 leading-relaxed italic text-lg">
                                "Dari dulu keluarga kami percaya pada Taman Harapan.
                                Amanah dan akarnya kuat. Sudah 3 generasi berzakat di sini."
                            </p>
                        </div>
                        <div class="flex items-center gap-4 pt-8 border-t border-gray-100 mt-8">
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center text-white shadow-lg shadow-orange-200">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <strong class="block text-[#1A1A2E]">H. Bambang S.</strong>
                                <span class="text-sm text-gray-500">Tokoh Masyarakat</span>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div
                        class="bg-white p-10 rounded-[2.5rem] shadow-xl w-[320px] border border-gray-100 shrink-0 flex flex-col justify-between hover:shadow-2xl transition-all duration-300">
                        <div>
                            <div
                                class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-primary mb-8">
                                <i class="fas fa-quote-left text-2xl"></i>
                            </div>
                            <p class="text-gray-600 leading-relaxed italic text-lg">
                                "Alhamdulillah, melalui Lazismu Lengkong, modal usaha saya terbantu
                                sehingga bisa tetap berjualan di masa sulit."
                            </p>
                        </div>
                        <div class="flex items-center gap-4 pt-8 border-t border-gray-100 mt-8">
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center text-white shadow-lg shadow-orange-200">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <strong class="block text-[#1A1A2E]">Ibu Siti Aminah</strong>
                                <span class="text-sm text-gray-500">Pedagang Kecil</span>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div
                        class="bg-white p-10 rounded-[2.5rem] shadow-xl w-[320px] border border-gray-100 shrink-0 flex flex-col justify-between hover:shadow-2xl transition-all duration-300">
                        <div>
                            <div
                                class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-primary mb-8">
                                <i class="fas fa-quote-left text-2xl"></i>
                            </div>
                            <p class="text-gray-600 leading-relaxed italic text-lg">
                                "Senang zakat di Lazismu Lengkong karena kantornya dekat,
                                sejarah Pantinya jelas, dan laporannya transparan banget."
                            </p>
                        </div>
                        <div class="flex items-center gap-4 pt-8 border-t border-gray-100 mt-8">
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center text-white shadow-lg shadow-orange-200">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <strong class="block text-[#1A1A2E]">Kang Firman</strong>
                                <span class="text-sm text-gray-500">Alumni SMA Muh 4</span>
                            </div>
                        </div>
                    </div>

                    <!-- DUPLICATE Cards for seamless loop -->
                    <!-- Card 1 Duplicate -->
                    <div
                        class="bg-white p-10 rounded-[2.5rem] shadow-xl w-[320px] border border-gray-100 shrink-0 flex flex-col justify-between hover:shadow-2xl transition-all duration-300">
                        <div>
                            <div
                                class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-primary mb-8">
                                <i class="fas fa-quote-left text-2xl"></i>
                            </div>
                            <p class="text-gray-600 leading-relaxed italic text-lg">
                                "Zakat di sini praktis banget, laporannya masuk ke WA, dan aku tau
                                uangnya dipake buat sekolahin adik-adik di panti yang keren itu."
                            </p>
                        </div>
                        <div class="flex items-center gap-4 pt-8 border-t border-gray-100 mt-8">
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center text-white shadow-lg shadow-orange-200">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <strong class="block text-[#1A1A2E]">Dinda Pratiwi</strong>
                                <span class="text-sm text-gray-500">Karyawan Swasta</span>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 Duplicate -->
                    <div
                        class="bg-white p-10 rounded-[2.5rem] shadow-xl w-[320px] border border-gray-100 shrink-0 flex flex-col justify-between hover:shadow-2xl transition-all duration-300">
                        <div>
                            <div
                                class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-primary mb-8">
                                <i class="fas fa-quote-left text-2xl"></i>
                            </div>
                            <p class="text-gray-600 leading-relaxed italic text-lg">
                                "Dari dulu keluarga kami percaya pada Taman Harapan.
                                Amanah dan akarnya kuat. Sudah 3 generasi berzakat di sini."
                            </p>
                        </div>
                        <div class="flex items-center gap-4 pt-8 border-t border-gray-100 mt-8">
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center text-white shadow-lg shadow-orange-200">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <strong class="block text-[#1A1A2E]">H. Bambang S.</strong>
                                <span class="text-sm text-gray-500">Tokoh Masyarakat</span>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 Duplicate -->
                    <div
                        class="bg-white p-10 rounded-[2.5rem] shadow-xl w-[320px] border border-gray-100 shrink-0 flex flex-col justify-between hover:shadow-2xl transition-all duration-300">
                        <div>
                            <div
                                class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-primary mb-8">
                                <i class="fas fa-quote-left text-2xl"></i>
                            </div>
                            <p class="text-gray-600 leading-relaxed italic text-lg">
                                "Alhamdulillah, melalui Lazismu Lengkong, modal usaha saya terbantu
                                sehingga bisa tetap berjualan di masa sulit."
                            </p>
                        </div>
                        <div class="flex items-center gap-4 pt-8 border-t border-gray-100 mt-8">
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center text-white shadow-lg shadow-orange-200">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <strong class="block text-[#1A1A2E]">Ibu Siti Aminah</strong>
                                <span class="text-sm text-gray-500">Pedagang Kecil</span>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4 Duplicate -->
                    <div
                        class="bg-white p-10 rounded-[2.5rem] shadow-xl w-[320px] border border-gray-100 shrink-0 flex flex-col justify-between hover:shadow-2xl transition-all duration-300">
                        <div>
                            <div
                                class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-primary mb-8">
                                <i class="fas fa-quote-left text-2xl"></i>
                            </div>
                            <p class="text-gray-600 leading-relaxed italic text-lg">
                                "Senang zakat di Lazismu Lengkong karena kantornya dekat,
                                sejarah Pantinya jelas, dan laporannya transparan banget."
                            </p>
                        </div>
                        <div class="flex items-center gap-4 pt-8 border-t border-gray-100 mt-8">
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center text-white shadow-lg shadow-orange-200">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <strong class="block text-[#1A1A2E]">Kang Firman</strong>
                                <span class="text-sm text-gray-500">Alumni SMA Muh 4</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <!-- Donation CTA Section -->
    <section class="py-24 bg-white" id="donasi">
        <div class="container mx-auto px-5 max-w-[1200px]">
            <div class="text-center mb-16" data-aos="fade-up">
                <span
                    class="inline-block px-4 py-2 bg-gradient-to-r from-[#F7941D] to-[#F15A24] text-white text-sm font-semibold rounded-full mb-4">
                    Tunaikan Sekarang
                </span>
                <h2 class="text-[clamp(1.75rem,4vw,2.5rem)] font-extrabold text-[#1A1A2E] mb-4 leading-tight">
                    {{ \App\Models\Setting::get('beranda_finalcta_heading', 'Sempurnakan Ibadah, Mulai Dampak Nyata') }}
                </h2>
                <p class="text-lg text-gray-600 max-w-[700px] mx-auto mb-10">
                    {{ \App\Models\Setting::get('beranda_finalcta_desc', 'Ramadan hanya 30 hari, namun dampak di Taman Harapan bertahan selamanya. Berapapun angka Anda, bagi mereka itu adalah doa yang terkabul.') }}
                </p>

                <a href="{{ route('donasi') }}"
                    class="inline-flex items-center gap-3 px-10 py-5 bg-gradient-to-r from-[#F7941D] to-[#F15A24] text-white font-bold text-xl rounded-2xl shadow-xl shadow-orange-200 hover:shadow-orange-glow hover:-translate-y-1 transition-all duration-300">
                    <i class="fas fa-heart"></i> Donasi Sekarang
                </a>

                <p class="mt-6 text-sm text-gray-500 font-medium">
                    <i class="fas fa-shield-alt text-primary mr-1"></i> Transaksi Aman, Transparan & Sesuai Syariah
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <!-- Floating Buttons -->
    <a href="https://wa.me/6281234567890" target="_blank"
        class="fixed bottom-6 right-6 z-50 w-14 h-14 bg-[#25D366] text-white rounded-full flex items-center justify-center text-3xl shadow-[0_4px_12px_rgba(37,211,102,0.4)] hover:-translate-y-1 hover:shadow-[0_8px_24px_rgba(37,211,102,0.6)] transition-all animate-bounce-slow"
        aria-label="Chat WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <button id="backToTop"
        class="fixed bottom-24 right-6 z-40 w-10 h-10 bg-white text-[#1A1A2E] border border-gray-200 rounded-full flex items-center justify-center text-lg shadow-lg opacity-0 invisible hover:bg-primary hover:text-white hover:border-primary transition-all duration-300"
        aria-label="Back to Top">
        <i class="fas fa-chevron-up"></i>
    </button>
@endsection

@push('scripts')
<script>
    // Swiper Initialization
    if (typeof Swiper !== 'undefined') {
        const swiper = new Swiper(".mySwiper", {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            effect: "fade",
            fadeEffect: {
                crossFade: true
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
    }
    
    // Back to Top Button
    const backToTop = document.getElementById('backToTop');
    if (backToTop) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTop.style.opacity = '1';
                backToTop.style.visibility = 'visible';
            } else {
                backToTop.style.opacity = '0';
                backToTop.style.visibility = 'invisible';
            }
        });
        
        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
    
    // Smooth Scroll for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Count Up Animation
    function animateCountUp(element) {
        const target = parseFloat(element.getAttribute('data-target'));
        const prefix = element.getAttribute('data-prefix') || '';
        const suffix = element.getAttribute('data-suffix') || '';
        const isDecimal = element.getAttribute('data-decimal') === 'true';
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;

        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            const displayValue = isDecimal ? current.toFixed(1) : Math.floor(current);
            element.textContent = prefix + displayValue + suffix;
        }, 16);
    }

    // Trigger count animation when in viewport
    const countElements = document.querySelectorAll('.count-up');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && entry.target.textContent === '0') {
                animateCountUp(entry.target);
            }
        });
    }, { threshold: 0.5 });

    countElements.forEach(el => observer.observe(el));
</script>
@endpush
