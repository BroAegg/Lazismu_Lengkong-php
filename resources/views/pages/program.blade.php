@extends('layouts.app')

@section('title', 'Lazismu Lengkong | Zakat, Infaq & Sedekah untuk Warga Lengkong')

@section('content')
    <!-- Page Header -->
    <section class="relative pt-40 pb-20 bg-gray-900 overflow-hidden">
        <div class="absolute inset-0 bg-no-repeat bg-center bg-cover opacity-30" style="background-image: url('{{ asset('assets/images/hero-bg.png') }}')">
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-gray-900/50 via-gray-900/80 to-gray-900"></div>
        <div class="container mx-auto px-5 relative z-10 text-center max-w-[1200px]">
            <span
                class="inline-block px-4 py-1 rounded-full bg-primary/20 text-[#FFB347] text-sm font-bold border border-primary/30 mb-6"
                data-aos="fade-up">ZAKAT, INFAQ, SEDEKAH</span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6" data-aos="fade-up" data-aos-delay="100">
                Program Kebaikan</h1>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                Pilih ladang pahala Anda. Setiap program dirancang untuk memberikan dampak maksimal bagi penerima
                manfaat di Lengkong.
            </p>
        </div>
    </section>

    <section class="py-24 bg-white" id="program">
        <div class="container mx-auto px-5 max-w-[1200px]">
            <div class="text-center mb-16" data-aos="fade-up">
                <span
                    class="inline-block px-4 py-2 bg-gradient-to-r from-[#F7941D] to-[#F15A24] text-white text-sm font-semibold rounded-full mb-4">Pilih
                    Paket Kebaikan Anda</span>
                <h2 class="text-[clamp(1.75rem,4vw,2.5rem)] font-extrabold text-[#1A1A2E] mb-4 leading-tight">Program
                    Ramadan 1447 H</h2>
                <p class="text-lg text-gray-600 max-w-[700px] mx-auto">
                    Berbagai pilihan program untuk menyalurkan zakat, infaq, dan sedekah Anda
                    sesuai dengan fokus kebaikan yang diinginkan.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($programs as $index => $program)
                <!-- Program Card -->
                <div class="bg-white rounded-2xl shadow-lg hover:-translate-y-2 hover:shadow-2xl transition-all duration-300 flex flex-col overflow-hidden group border border-gray-100 {{ $program->is_featured ? 'lg:-translate-y-2 border-2 border-primary/20 relative' : '' }}"
                    data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 + 100 }}">
                    
                    @if($program->is_featured)
                    <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-primary to-accent"></div>
                    @endif
                    
                    <!-- Card Header -->
                    <div class="p-6 pb-4 border-b border-gray-100 flex justify-between items-start {{ $program->is_featured ? 'bg-orange-50/30' : 'bg-gray-50 group-hover:bg-orange-50/30' }} transition-colors">
                        <div class="w-12 h-12 {{ $program->is_featured ? 'bg-gradient-to-br from-primary to-accent text-white shadow-lg shadow-orange-200' : 'bg-white text-primary shadow-sm' }} rounded-xl flex items-center justify-center text-xl">
                            <i class="{{ $program->pillar->icon ?? 'fas fa-hand-holding-heart' }}"></i>
                        </div>
                        @if($program->is_featured)
                        <span class="px-3 py-1 bg-red-100 text-red-600 text-xs font-bold rounded-full flex items-center gap-1">
                            <i class="fas fa-fire"></i> Unggulan
                        </span>
                        @elseif($program->pillar)
                        <span class="px-3 py-1 text-xs font-bold rounded-full" style="background-color: {{ $program->pillar->color }}20; color: {{ $program->pillar->color }}">
                            {{ $program->pillar->name }}
                        </span>
                        @else
                        <span class="px-3 py-1 bg-gray-200 text-gray-600 text-xs font-bold rounded-full">
                            Program
                        </span>
                        @endif
                    </div>
                    
                    <!-- Card Body -->
                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="text-lg font-bold text-[#1A1A2E] mb-3 group-hover:text-primary transition-colors line-clamp-2">
                            {{ $program->title }}
                        </h3>
                        <p class="text-gray-600 text-sm mb-6 flex-1 leading-relaxed line-clamp-3">
                            {{ $program->description }}
                        </p>
                        
                        <!-- Stats -->
                        <div class="mb-6">
                            <div class="flex justify-between text-xs text-gray-500 mb-2">
                                <span>Terkumpul</span>
                                <span>{{ $program->donor_count }} donatur</span>
                            </div>
                            <div class="flex justify-between items-baseline mb-2">
                                <span class="text-sm font-bold text-primary">Rp {{ number_format($program->collected_amount, 0, ',', '.') }}</span>
                                <span class="text-xs text-gray-400">dari Rp {{ number_format($program->target_amount, 0, ',', '.') }}</span>
                            </div>
                            
                            <!-- Progress Bar -->
                            <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-primary to-accent rounded-full" style="width: {{ min($program->progress_percent, 100) }}%"></div>
                            </div>
                            <div class="flex justify-between text-xs font-bold mt-1">
                                <span class="text-gray-500">{{ $program->progress_percent }}%</span>
                                @if($program->days_left)
                                <span class="text-orange-500">{{ $program->days_left }} hari lagi</span>
                                @endif
                            </div>
                        </div>
                        
                        <!-- CTA Button -->
                        <a href="{{ route('program.show', $program->slug) }}"
                            class="btn-primary w-full py-3 rounded-xl text-white font-semibold flex items-center justify-center gap-2 hover:shadow-lg hover:shadow-orange-200 transition-all">
                            <i class="fas fa-info-circle"></i> Lihat Detail
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-16">
                    <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
                    <p class="text-xl text-gray-500">Belum ada program tersedia</p>
                </div>
                @endforelse
            </div>
            
            <!-- Pagination -->
            @if($programs->hasPages())
            <div class="mt-12">
                {{ $programs->links() }}
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

            <!-- Live Counter -->
            <div class="max-w-[900px] mx-auto mt-20" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-[#1A1A2E] rounded-3xl p-8 md:p-12 relative overflow-hidden shadow-2xl">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-primary/20 rounded-full blur-3xl -mr-20 -mt-20">
                    </div>
                    <div class="absolute bottom-0 left-0 w-64 h-64 bg-secondary/20 rounded-full blur-3xl -ml-20 -mb-20">
                    </div>

                    <div class="relative z-10 flex flex-col md:flex-row items-center gap-8 md:gap-12">
                        <div
                            class="flex items-center justify-center w-16 h-16 rounded-full bg-red-500/20 text-red-500 animate-[pulse_2s_infinite]">
                            <i class="fas fa-circle text-xl"></i>
                        </div>
                        <div class="flex-1 text-center md:text-left">
                            <span class="text-gray-400 text-sm font-bold uppercase tracking-wider mb-2 block">Update
                                Terkini</span>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                                <div>
                                    <strong class="block text-3xl md:text-4xl font-bold text-white mb-1">Rp 1.5
                                        M+</strong>
                                    <span class="text-gray-400 text-sm">Terkumpul Ramadan Ini</span>
                                </div>
                                <div>
                                    <strong class="block text-3xl md:text-4xl font-bold text-white mb-1">1,847</strong>
                                    <span class="text-gray-400 text-sm">Donatur Bergabung</span>
                                </div>
                                <div>
                                    <strong class="block text-3xl md:text-4xl font-bold text-white mb-1">76%</strong>
                                    <span class="text-gray-400 text-sm">Target Tercapai</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-primary text-white text-center">
        <div class="container mx-auto px-5" data-aos="zoom-in">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Siap Berbagi Kebaikan?</h2>
            <p class="text-xl opacity-90 mb-10 max-w-2xl mx-auto">
                Setiap rupiah yang Anda donasikan akan menjadi asa baru bagi mereka yang membutuhkan.
            </p>
            <a href="{{ route('donasi') }}"
                class="inline-block px-8 py-4 bg-white text-primary font-bold rounded-xl shadow-lg hover:-translate-y-1 transition-transform">
                <i class="fas fa-heart mr-2"></i> Donasi Sekarang
            </a>
        </div>
    </section>

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

    <!-- Footer -->
@endsection
