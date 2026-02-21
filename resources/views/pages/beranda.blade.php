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
                            Sudah Tahu Berapa <span class="text-primary">Zakat Anda?</span>
                        </h2>
                        <p class="text-lg text-white/80 mb-8 leading-relaxed">
                            Jangan ragu. Gunakan alat bantu hitung kami untuk mengetahui kewajiban zakat maal atau
                            profesi Anda dengan akurat sesuai nisab. Hanya butuh 1 menit.
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
                        Amanah yang Berakar, <br><span class="text-primary">Dampak yang Melebar.</span>
                    </h2>
                    <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                        Kami bukan sekadar penyalur, kami adalah pengelola ekosistem kebaikan di bawah naungan
                        Muhammadiyah Lengkong. Dari <strong>Panti Asuhan Taman Harapan</strong> yang bersejarah hingga
                        puluhan sekolah yang mencerahkan bangsa.
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

    <!-- Programs Section -->
    <section class="py-24 bg-white" id="program">
        <div class="container mx-auto px-5 max-w-[1200px]">
            <div class="text-center mb-16" data-aos="fade-up">
                <span
                    class="inline-block px-4 py-2 bg-gradient-to-r from-[#F7941D] to-[#F15A24] text-white text-sm font-semibold rounded-full mb-4">Pilih
                    Paket Kebaikan Anda</span>
                <h2 class="text-[clamp(1.75rem,4vw,2.5rem)] font-extrabold text-[#1A1A2E] mb-4 leading-tight">Program
                    Unggulan</h2>
                <p class="text-lg text-gray-600 max-w-[700px] mx-auto">
                    Berbagai pilihan program untuk menyalurkan zakat, infaq, dan sedekah Anda
                    sesuai dengan fokus kebaikan yang diinginkan.
                </p>
            </div>

            @if($featuredPrograms->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($featuredPrograms as $index => $program)
                <div class="bg-white rounded-2xl shadow-lg hover:-translate-y-2 hover:shadow-2xl transition-all duration-300 flex flex-col overflow-hidden group border border-gray-100 {{ $index === 0 ? 'lg:col-span-1 border-2 border-primary/20 shadow-[0_15px_40px_rgba(247,148,29,0.15)]' : '' }}"
                    data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    
                    @if($index === 0)
                    <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-primary to-accent"></div>
                    @endif
                    
                    <div class="p-6 pb-4 border-b border-gray-100 flex justify-between items-start {{ $index === 0 ? 'bg-orange-50/30' : 'bg-gray-50 group-hover:bg-orange-50/30' }} transition-colors">
                        <div class="w-12 h-12 {{ $index === 0 ? 'bg-gradient-to-br from-primary to-accent text-white shadow-lg shadow-orange-200' : 'bg-white text-primary shadow-sm' }} rounded-xl flex items-center justify-center text-xl">
                            <i class="fas fa-hand-holding-heart"></i>
                        </div>
                        @if($index === 0)
                        <span class="px-3 py-1 bg-red-100 text-red-600 text-xs font-bold rounded-full flex items-center gap-1">
                            <i class="fas fa-fire"></i> Populer
                        </span>
                        @else
                        <span class="px-3 py-1 bg-primary/10 text-primary text-xs font-bold rounded-full">
                            {{ $program->pillar->name ?? 'Program' }}
                        </span>
                        @endif
                    </div>
                    
                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="text-lg font-bold text-[#1A1A2E] mb-3 group-hover:text-primary transition-colors line-clamp-2 min-h-[3.5rem]">
                            {{ $program->title }}
                        </h3>
                        <p class="text-gray-600 text-sm mb-6 flex-1 leading-relaxed line-clamp-3">
                            {{ $program->description }}
                        </p>
                        
                        @if($program->target_amount)
                        <div class="mb-6">
                            <span class="text-xs text-gray-400 block mb-1">Target Donasi</span>
                            <strong class="text-xl {{ $index === 0 ? 'text-primary' : 'text-[#1A1A2E]' }}">
                                Rp {{ number_format($program->target_amount, 0, ',', '.') }}
                            </strong>
                        </div>
                        
                        @if($program->collected_amount > 0)
                        <div class="mb-6">
                            <div class="flex justify-between text-xs font-bold mb-2">
                                <span class="text-gray-600">
                                    Rp {{ number_format($program->collected_amount, 0, ',', '.') }} terkumpul
                                </span>
                                <span class="text-primary">
                                    {{ $program->target_amount > 0 ? round(($program->collected_amount / $program->target_amount) * 100) : 0 }}%
                                </span>
                            </div>
                            <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-primary to-accent rounded-full" 
                                     style="width: {{ $program->target_amount > 0 ? min(($program->collected_amount / $program->target_amount) * 100, 100) : 0 }}%"></div>
                            </div>
                        </div>
                        @endif
                        @endif
                        
                        <a href="{{ route('program.show', $program->slug) }}"
                            class="btn-primary w-full py-3 rounded-xl text-white font-semibold flex items-center justify-center gap-2 hover:shadow-lg hover:shadow-orange-200 transition-all">
                            <i class="fas fa-heart"></i> Donasi Sekarang
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-12" data-aos="fade-up">
                <a href="{{ route('program') }}" 
                   class="inline-flex items-center gap-2 px-8 py-3 border-2 border-primary text-primary font-bold rounded-xl hover:bg-primary hover:text-white transition-all">
                    Lihat Semua Program <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            @else
            <div class="text-center py-20">
                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-box-open text-4xl text-gray-400"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3">Belum Ada Program</h3>
                <p class="text-gray-600 mb-8">Program unggulan akan ditampilkan di sini setelah ditambahkan melalui CMS.</p>
                @auth
                    @if(auth()->user()->role !== 'USER')
                    <a href="{{ route('admin.program.create') }}" 
                       class="inline-flex items-center gap-2 px-8 py-3 bg-primary text-white font-bold rounded-xl hover:shadow-lg hover:shadow-orange-200 transition-all">
                        <i class="fas fa-plus"></i> Tambah Program Pertama
                    </a>
                    @endif
                @endauth
            </div>
            @endif
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
                    Sempurnakan Ibadah, Mulai Dampak Nyata
                </h2>
                <p class="text-lg text-gray-600 max-w-[700px] mx-auto mb-10">
                    Ramadan hanya 30 hari, namun dampak di Taman Harapan bertahan selamanya. Berapapun angka Anda, bagi
                    mereka itu adalah doa yang terkabul.
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
