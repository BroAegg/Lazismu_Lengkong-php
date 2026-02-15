@extends('layouts.app')

@section('title', 'Beranda - Lazismu Lengkong')

@section('content')
{{-- ═══════════════════════════════════════════ --}}
{{-- HERO SECTION with Swiper --}}
{{-- ═══════════════════════════════════════════ --}}
<section id="beranda" class="relative min-h-screen overflow-hidden">
    <div class="swiper hero-swiper h-screen">
        <div class="swiper-wrapper">
            {{-- Slide 1 --}}
            <div class="swiper-slide relative">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1585036156171-384164a8c055?w=1600')"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-dark-500/90 via-dark-500/70 to-transparent"></div>
                <div class="relative z-10 flex items-center h-full">
                    <div class="container mx-auto px-5 max-w-[1200px]">
                        <div class="max-w-xl" data-aos="fade-right">
                            <span class="inline-block px-4 py-2 bg-primary-500/20 text-primary-300 rounded-full text-sm font-semibold mb-4 border border-primary-500/30">
                                <i class="fas fa-mosque mr-1"></i> Lembaga Amil Zakat Nasional
                            </span>
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                                Bersama <span class="text-primary-500">Lazismu</span>, Salurkan Kebaikan
                            </h1>
                            <p class="text-lg text-white/70 mb-8 leading-relaxed">
                                Menghimpun dan menyalurkan dana ZISKA secara profesional, transparan, dan amanah untuk umat.
                            </p>
                            <a href="{{ route('donasi') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-primary-500 to-accent-500 text-white font-bold rounded-xl shadow-orange-glow hover:-translate-y-1 transition-all text-lg">
                                <i class="fas fa-heart"></i> Donasi Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Slide 2 --}}
            <div class="swiper-slide relative">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=1600')"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-dark-500/90 via-dark-500/70 to-transparent"></div>
                <div class="relative z-10 flex items-center h-full">
                    <div class="container mx-auto px-5 max-w-[1200px]">
                        <div class="max-w-xl">
                            <span class="inline-block px-4 py-2 bg-secondary-500/20 text-secondary-300 rounded-full text-sm font-semibold mb-4 border border-secondary-500/30">
                                <i class="fas fa-calculator mr-1"></i> Kalkulator Zakat
                            </span>
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                                Hitung <span class="text-secondary-500">Zakat</span> Anda dengan Mudah
                            </h1>
                            <p class="text-lg text-white/70 mb-8 leading-relaxed">
                                Gunakan kalkulator zakat kami untuk menghitung kewajiban zakat Anda secara akurat.
                            </p>
                            <a href="{{ route('kalkulator') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-secondary-500 to-secondary-600 text-white font-bold rounded-xl shadow-lg hover:-translate-y-1 transition-all text-lg">
                                <i class="fas fa-calculator"></i> Hitung Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Slide 3 --}}
            <div class="swiper-slide relative">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=1600')"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-dark-500/90 via-dark-500/70 to-transparent"></div>
                <div class="relative z-10 flex items-center h-full">
                    <div class="container mx-auto px-5 max-w-[1200px]">
                        <div class="max-w-xl">
                            <span class="inline-block px-4 py-2 bg-primary-500/20 text-primary-300 rounded-full text-sm font-semibold mb-4 border border-primary-500/30">
                                <i class="fas fa-hands-helping mr-1"></i> Program Kebaikan
                            </span>
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                                Berbagi untuk <span class="text-primary-500">Sesama</span>
                            </h1>
                            <p class="text-lg text-white/70 mb-8 leading-relaxed">
                                Setiap kebaikan yang diberikan akan kembali berlipat ganda. Mari berbagi.
                            </p>
                            <a href="{{ route('program.index') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-primary-500 to-accent-500 text-white font-bold rounded-xl shadow-orange-glow hover:-translate-y-1 transition-all text-lg">
                                <i class="fas fa-arrow-right"></i> Lihat Program
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Stats Bar (Desktop) --}}
    <div class="hidden lg:block absolute bottom-12 right-12 z-20 bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 p-6 w-[280px]">
        <div class="space-y-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-primary-500/20 rounded-lg flex items-center justify-center"><i class="fas fa-coins text-primary-500"></i></div>
                <div><p class="text-xs text-white/60">Total Terkumpul</p><p class="text-lg font-bold text-white count-up" data-target="{{ $stats['total_donasi'] ?? 0 }}">Rp 0</p></div>
            </div>
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-secondary-500/20 rounded-lg flex items-center justify-center"><i class="fas fa-users text-secondary-500"></i></div>
                <div><p class="text-xs text-white/60">Total Donatur</p><p class="text-lg font-bold text-white count-up" data-target="{{ $stats['total_donatur'] ?? 0 }}">0</p></div>
            </div>
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center"><i class="fas fa-hand-holding-heart text-blue-400"></i></div>
                <div><p class="text-xs text-white/60">Program Aktif</p><p class="text-lg font-bold text-white count-up" data-target="{{ $stats['total_program'] ?? 0 }}">0</p></div>
            </div>
        </div>
    </div>

    {{-- Stats (Mobile) --}}
    <div class="lg:hidden absolute bottom-0 left-0 right-0 z-20 bg-white/10 backdrop-blur-lg border-t border-white/20 px-4 py-4">
        <div class="grid grid-cols-3 gap-3 text-center">
            <div><p class="text-lg font-bold text-white count-up" data-target="{{ $stats['total_donasi'] ?? 0 }}">0</p><p class="text-[0.65rem] text-white/60">Terkumpul</p></div>
            <div><p class="text-lg font-bold text-white count-up" data-target="{{ $stats['total_donatur'] ?? 0 }}">0</p><p class="text-[0.65rem] text-white/60">Donatur</p></div>
            <div><p class="text-lg font-bold text-white count-up" data-target="{{ $stats['total_program'] ?? 0 }}">0</p><p class="text-[0.65rem] text-white/60">Program</p></div>
        </div>
    </div>

    {{-- Wave Divider --}}
    <div class="absolute bottom-0 left-0 right-0 z-10">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,64L60,58.7C120,53,240,43,360,48C480,53,600,75,720,80C840,85,960,75,1080,64C1200,53,1320,43,1380,37.3L1440,32L1440,120L1380,120C1320,120,1200,120,1080,120C960,120,840,120,720,120C600,120,480,120,360,120C240,120,120,120,60,120L0,120Z" fill="white"/>
        </svg>
    </div>
</section>

{{-- ═══════════════════════════════════════════ --}}
{{-- KALKULATOR TEASER --}}
{{-- ═══════════════════════════════════════════ --}}
<section class="py-20 bg-white" data-aos="fade-up">
    <div class="container mx-auto px-5 max-w-[1200px]">
        <div class="bg-gradient-to-br from-dark-500 to-[#2d2d4e] rounded-3xl p-8 md:p-12 flex flex-col lg:flex-row items-center gap-8 overflow-hidden relative">
            <div class="lg:w-1/2 z-10">
                <div class="w-14 h-14 bg-primary-500/20 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-calculator text-primary-500 text-2xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-white mb-4">Hitung Zakat Anda</h2>
                <p class="text-white/70 mb-6 leading-relaxed">Tidak yakin berapa zakat yang harus dibayarkan? Gunakan kalkulator zakat kami untuk menghitung secara akurat berdasarkan harta dan penghasilan Anda.</p>
                <a href="{{ route('kalkulator') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-primary-500 to-accent-500 text-white font-bold rounded-xl shadow-orange-glow hover:-translate-y-1 transition-all">
                    <i class="fas fa-calculator"></i> Hitung Sekarang
                </a>
            </div>
            <div class="lg:w-1/2 relative">
                <div class="bg-white/5 rounded-2xl p-6 border border-white/10 backdrop-blur-sm">
                    <div class="flex items-center gap-2 mb-4"><div class="w-3 h-3 rounded-full bg-red-400"></div><div class="w-3 h-3 rounded-full bg-yellow-400"></div><div class="w-3 h-3 rounded-full bg-green-400"></div></div>
                    <div class="space-y-3">
                        <div class="h-4 bg-white/10 rounded w-3/4"></div>
                        <div class="h-4 bg-white/10 rounded w-1/2"></div>
                        <div class="h-8 bg-primary-500/30 rounded w-full mt-4"></div>
                        <div class="h-4 bg-white/10 rounded w-2/3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════ --}}
{{-- AUTHORITY / TRUST TEASER --}}
{{-- ═══════════════════════════════════════════ --}}
<section class="py-20 bg-gray-50" data-aos="fade-up">
    <div class="container mx-auto px-5 max-w-[1200px]">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="relative">
                <div class="rounded-3xl overflow-hidden shadow-card">
                    <img src="https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?w=600" alt="Lazismu Community" class="w-full h-[400px] object-cover">
                </div>
                <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-primary-500/20 rounded-2xl -z-10 rotate-12"></div>
            </div>
            <div>
                <span class="inline-block px-4 py-2 bg-primary-500/10 text-primary-500 rounded-full text-sm font-semibold mb-4">
                    <i class="fas fa-shield-alt mr-1"></i> Amanah & Transparan
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-dark-500 mb-4">Lembaga Zakat Terpercaya</h2>
                <p class="text-gray-600 mb-6 leading-relaxed">Lazismu Lengkong bernaung di bawah Muhammadiyah, mengelola dana ZISKA dengan prinsip syariah, akuntabilitas, dan transparansi penuh sesuai PSAK 109.</p>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-secondary-500"></i><span class="text-gray-700">Terdaftar di Kementerian Agama RI</span></li>
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-secondary-500"></i><span class="text-gray-700">Audit syariah & keuangan berkala</span></li>
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-secondary-500"></i><span class="text-gray-700">Laporan keuangan transparan & real-time</span></li>
                </ul>
                <a href="{{ route('tentang-kami') }}" class="text-primary-500 font-semibold hover:text-primary-600 transition-colors">
                    Pelajari Sejarah Kami <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════ --}}
{{-- FEATURED PROGRAMS --}}
{{-- ═══════════════════════════════════════════ --}}
<section id="program" class="py-20 bg-white" data-aos="fade-up">
    <div class="container mx-auto px-5 max-w-[1200px]">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-2 bg-primary-500/10 text-primary-500 rounded-full text-sm font-semibold mb-4">
                PROGRAM KEBAIKAN
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-dark-500">Salurkan Lewat Program Kami</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($featuredPrograms as $program)
            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-card hover:shadow-lg hover:-translate-y-1 transition-all group">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ $program->image ? asset('storage/' . $program->image) : 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=400' }}" alt="{{ $program->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-3 left-3">
                        <span class="px-3 py-1 bg-white/90 text-xs font-bold rounded-full" style="color: {{ $program->pillar?->color ?? '#F7941D' }}">
                            {{ $program->pillar?->name ?? 'Program' }}
                        </span>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-dark-500 mb-2 line-clamp-2">{{ $program->title }}</h3>
                    <p class="text-sm text-gray-500 mb-4 line-clamp-2">{{ $program->description }}</p>
                    @if($program->target_amount > 0)
                    <div class="mb-3">
                        <div class="flex justify-between text-xs mb-1">
                            <span class="text-gray-500">Terkumpul</span>
                            <span class="font-bold text-primary-500">{{ $program->progress_percent }}%</span>
                        </div>
                        <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-primary-500 to-accent-500 rounded-full" style="width: {{ $program->progress_percent }}%"></div>
                        </div>
                    </div>
                    @endif
                    <a href="{{ route('program.show', $program->slug) }}" class="block w-full text-center py-2.5 bg-gray-50 text-gray-700 font-semibold rounded-xl hover:bg-primary-500 hover:text-white transition-colors text-sm">
                        Donasi Sekarang
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <i class="fas fa-heart text-4xl text-gray-300 mb-4"></i>
                <p class="text-gray-500">Belum ada program tersedia saat ini.</p>
            </div>
            @endforelse
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('program.index') }}" class="inline-flex items-center gap-2 px-6 py-3 border-2 border-primary-500 text-primary-500 font-bold rounded-xl hover:bg-primary-500 hover:text-white transition-all">
                Lihat Semua Program <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════ --}}
{{-- DONATION CTA --}}
{{-- ═══════════════════════════════════════════ --}}
<section class="py-20 bg-gradient-to-r from-primary-500 to-accent-500" data-aos="fade-up">
    <div class="container mx-auto px-5 max-w-[1200px] text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Siap Berbagi Kebaikan?</h2>
        <p class="text-white/80 mb-8 max-w-lg mx-auto">Setiap rupiah yang Anda donasikan akan menjadi penolong bagi saudara kita yang membutuhkan.</p>
        <a href="{{ route('donasi') }}" class="inline-flex items-center gap-2 px-10 py-4 bg-white text-primary-500 font-bold rounded-xl shadow-lg hover:-translate-y-1 transition-all text-lg">
            <i class="fas fa-heart"></i> Donasi Sekarang
        </a>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.hero-swiper', {
            effect: 'fade',
            loop: true,
            autoplay: { delay: 6000, disableOnInteraction: false },
            speed: 1000,
        });
    });
</script>
@endpush
