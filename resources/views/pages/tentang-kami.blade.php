@extends('layouts.app')

@section('title', 'Lazismu Lengkong | Zakat, Infaq & Sedekah untuk Warga Lengkong')

@section('content')
<!-- Mobile Menu Backdrop -->
    <div class="fixed inset-0 bg-black/50 z-[55] opacity-0 invisible transition-all duration-300 lg:hidden"
        id="menuBackdrop"></div>

    <!-- Mobile Menu (Outside nav to avoid backdrop-blur inheritance) -->
    <div class="fixed top-0 right-[-100%] w-[85%] max-w-[320px] h-screen bg-white shadow-2xl flex flex-col items-start px-8 pt-24 pb-10 gap-2 transition-all duration-500 lg:hidden z-[100]"
        id="mobileMenu">
        <div class="w-full flex justify-between items-center mb-10">
            <span class="text-xs font-bold text-gray-400 tracking-widest uppercase">Menu Navigasi</span>
            <button id="closeMenu" class="text-gray-400 hover:text-primary"><i
                    class="fas fa-times text-xl"></i></button>
        </div>
        <a href="#beranda"
            class="text-lg font-bold text-gray-800 py-3 w-full border-b border-gray-50 flex items-center justify-between group mobile-nav-link">
            Beranda <i
                class="fas fa-chevron-right text-xs text-gray-300 group-hover:text-primary transition-colors"></i>
        </a>
        <a href="#kalkulator"
            class="text-lg font-bold text-gray-800 py-3 w-full border-b border-gray-50 flex items-center justify-between group mobile-nav-link">
            Kalkulator <i
                class="fas fa-chevron-right text-xs text-gray-300 group-hover:text-primary transition-colors"></i>
        </a>
        <a href="#program"
            class="text-lg font-bold text-gray-800 py-3 w-full border-b border-gray-50 flex items-center justify-between group mobile-nav-link">
            Program <i
                class="fas fa-chevron-right text-xs text-gray-300 group-hover:text-primary transition-colors"></i>
        </a>
        <a href="#tentang"
            class="text-lg font-bold text-gray-800 py-3 w-full border-b border-gray-50 flex items-center justify-between group mobile-nav-link">
            Tentang Kami <i
                class="fas fa-chevron-right text-xs text-gray-300 group-hover:text-primary transition-colors"></i>
        </a>
        <a href="#kontak"
            class="text-lg font-bold text-gray-800 py-3 w-full border-b border-gray-50 flex items-center justify-between group mobile-nav-link">
            Kontak <i class="fas fa-chevron-right text-xs text-gray-300 group-hover:text-primary transition-colors"></i>
        </a>

        <a href="{{ route('login') }}"
            class="w-full flex items-center justify-center gap-2 px-6 py-3 mt-4 text-gray-600 font-semibold rounded-xl border border-gray-200 hover:bg-gray-50 hover:text-primary transition-all mobile-nav-link">
            <i class="fas fa-sign-in-alt"></i> Masuk Akun
        </a>

        <a href="#donasi"
            class="btn-primary w-full flex items-center justify-center gap-2 px-6 py-4 mt-2 text-white font-bold rounded-xl shadow-lg shadow-orange-200 mobile-nav-link">
            <i class="fas fa-heart"></i> Donasi Sekarang
        </a>
    </div>

    <!-- Hero Section -->
    <!-- Page Header -->
    <section class="relative pt-40 pb-20 bg-gray-900 overflow-hidden">
        <div class="absolute inset-0 bg-no-repeat bg-center bg-cover opacity-30" style="background-image: url('{{ asset('assets/images/hero-bg.png') }}')">
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-gray-900/50 via-gray-900/80 to-gray-900"></div>
        <div class="container mx-auto px-5 relative z-10 text-center max-w-[1200px]">
            <span
                class="inline-block px-4 py-1 rounded-full bg-primary/20 text-[#FFB347] text-sm font-bold border border-primary/30 mb-6"
                data-aos="fade-up">PROFIL LEMBAGA</span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6" data-aos="fade-up" data-aos-delay="100">
                Tentang Kami</h1>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                Mengenal lebih dekat Lazismu Lengkong, sejarah pengabdian, dan semangat kami dalam mengelola amanah
                umat.</p>
        </div>
    </section>





    <!-- Authority & Trust Section -->
    <section class="py-24 bg-[#FAFAFA]" id="tentang">
        <div class="container mx-auto px-5 max-w-[1200px]">
            <div class="text-center mb-16" data-aos="fade-up">
                <span
                    class="inline-block px-4 py-2 bg-gradient-to-r from-[#F7941D] to-[#F15A24] text-white text-sm font-semibold rounded-full mb-4">Mengapa
                    Lazismu Lengkong?</span>
                <h2 class="text-[clamp(1.75rem,4vw,2.5rem)] font-extrabold text-[#1A1A2E] mb-4 leading-tight">Amanah
                    yang Berakar, Dampak yang Melebar</h2>
                <p class="text-lg text-gray-600 max-w-[700px] mx-auto">
                    Kami bukan sekadar penyalur, kami adalah pengelola ekosistem kebaikan di bawah
                    PCM Muhammadiyah Lengkong dengan amal usaha yang nyata.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <!-- Card 1: THE ROOT (Dark/Standout) -->
                <div class="bg-gradient-to-br from-[#1A1A2E] to-[#2D2D44] p-8 rounded-2xl shadow-2xl relative overflow-hidden group transform hover:-translate-y-2 transition-all duration-300 border border-white/5"
                    data-aos="fade-up" data-aos-delay="100">

                    <!-- Ambient Glow -->
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-primary/20 rounded-full blur-3xl -mr-16 -mt-16 pointer-events-none">
                    </div>

                    <div
                        class="absolute top-4 right-4 bg-white/10 backdrop-blur-md text-[#FFB347] px-3 py-1 rounded-full text-xs font-bold border border-white/10 shadow-lg">
                        <i class="fas fa-history mr-1"></i> Akar Sejarah
                    </div>

                    <div
                        class="w-16 h-16 bg-gradient-to-br from-primary to-accent text-white rounded-2xl flex items-center justify-center text-3xl mb-6 shadow-lg shadow-orange-glow/50 group-hover:scale-110 transition-transform duration-500">
                        <i class="fas fa-landmark"></i>
                    </div>

                    <h3 class="text-xl font-bold text-white mb-4">LKSA Taman Harapan</h3>
                    <p class="text-white/80 mb-6 leading-relaxed">
                        Panti asuhan Muhammadiyah <strong>tertua di Jawa Barat</strong>. Sejarah membuktikan, ini adalah
                        <span class="text-[#FFB347] font-semibold">akar amanah</span> yang kokoh tak tergoyahkan sejak
                        era kolonial.
                    </p>

                    <ul class="space-y-3">
                        <li
                            class="flex items-center gap-3 text-white/90 font-medium text-sm group-hover:pl-2 transition-all">
                            <i class="fas fa-check-circle text-primary"></i> Berdiri sejak masa perjuangan
                        </li>
                        <li
                            class="flex items-center gap-3 text-white/90 font-medium text-sm group-hover:pl-2 transition-all delay-75">
                            <i class="fas fa-check-circle text-primary"></i> Melahirkan ribuan alumni
                        </li>
                        <li
                            class="flex items-center gap-3 text-white/90 font-medium text-sm group-hover:pl-2 transition-all delay-150">
                            <i class="fas fa-check-circle text-primary"></i> Pondasi kepercayaan umat
                        </li>
                    </ul>
                </div>

                <!-- Card 2: THE BRANCH (Light/Impact) -->
                <div class="bg-white p-8 rounded-2xl shadow-card hover:shadow-card-hover hover:-translate-y-2 transition-all duration-300 border border-gray-100 group relative overflow-hidden"
                    data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-gray-100 to-gray-200 group-hover:from-primary group-hover:to-accent transition-all duration-500">
                    </div>

                    <div
                        class="w-16 h-16 bg-gray-50 text-gray-400 border border-gray-100 rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:bg-primary/10 group-hover:text-primary group-hover:border-primary/20 transition-all duration-300">
                        <i class="fas fa-graduation-cap"></i>
                    </div>

                    <h3 class="text-xl font-bold text-[#1A1A2E] mb-4 group-hover:text-primary transition-colors">
                        Pendidikan Terintegrasi</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed text-sm">
                        Dari akar yang kuat, tumbuh <strong>sekolah-sekolah Muhammadiyah</strong> (SD-SMA) yang
                        mencerahkan masa depan generasi penerus bangsa.
                    </p>

                    <ul class="space-y-3">
                        <li class="flex items-center gap-3 text-gray-600 font-medium text-sm">
                            <i class="fas fa-check text-green-500"></i> Kurikulum Islam Berkemajuan
                        </li>
                        <li class="flex items-center gap-3 text-gray-600 font-medium text-sm">
                            <i class="fas fa-check text-green-500"></i> Beasiswa Yatim & Dhuafa
                        </li>
                        <li class="flex items-center gap-3 text-gray-600 font-medium text-sm">
                            <i class="fas fa-check text-green-500"></i> Fasilitas Modern
                        </li>
                    </ul>
                </div>

                <!-- Card 3: THE FRUIT (Light/Impact) -->
                <div class="bg-white p-8 rounded-2xl shadow-card hover:shadow-card-hover hover:-translate-y-2 transition-all duration-300 border border-gray-100 group relative overflow-hidden"
                    data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-gray-100 to-gray-200 group-hover:from-primary group-hover:to-accent transition-all duration-500">
                    </div>

                    <div
                        class="w-16 h-16 bg-gray-50 text-gray-400 border border-gray-100 rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:bg-primary/10 group-hover:text-primary group-hover:border-primary/20 transition-all duration-300">
                        <i class="fas fa-mosque"></i>
                    </div>

                    <h3 class="text-xl font-bold text-[#1A1A2E] mb-4 group-hover:text-primary transition-colors">Dakwah
                        Sosial</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed text-sm">
                        Buah dari amanah adalah <strong>manfaat yang dirasakan masyarakat</strong> luas melalui program
                        dakwah, bantuan sosial, dan pemberdayaan ekonomi.
                    </p>

                    <ul class="space-y-3">
                        <li class="flex items-center gap-3 text-gray-600 font-medium text-sm">
                            <i class="fas fa-check text-green-500"></i> Kajian Rutin Masjid
                        </li>
                        <li class="flex items-center gap-3 text-gray-600 font-medium text-sm">
                            <i class="fas fa-check text-green-500"></i> Santunan Sembako Rutin
                        </li>
                        <li class="flex items-center gap-3 text-gray-600 font-medium text-sm">
                            <i class="fas fa-check text-green-500"></i> Bantuan Kesehatan
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Trust Badges -->
            <div class="flex flex-wrap justify-center gap-8 md:gap-16 opacity-70 grayscale hover:grayscale-0 transition-all duration-500"
                data-aos="fade-up" data-aos-delay="400">
                <div class="flex flex-col items-center gap-2 group">
                    <i class="fas fa-shield-alt text-4xl text-gray-400 group-hover:text-primary transition-colors"></i>
                    <span class="text-sm font-semibold text-gray-500 group-hover:text-gray-800">Terdaftar Kemenag
                        RI</span>
                </div>
                <div class="flex flex-col items-center gap-2 group">
                    <i
                        class="fas fa-balance-scale text-4xl text-gray-400 group-hover:text-primary transition-colors"></i>
                    <span class="text-sm font-semibold text-gray-500 group-hover:text-gray-800">Audit Syariah</span>
                </div>
                <div class="flex flex-col items-center gap-2 group">
                    <i
                        class="fas fa-file-contract text-4xl text-gray-400 group-hover:text-primary transition-colors"></i>
                    <span class="text-sm font-semibold text-gray-500 group-hover:text-gray-800">Laporan
                        Transparan</span>
                </div>
                <div class="flex flex-col items-center gap-2 group">
                    <img src="{{ asset('assets/images/logo-muhammadiyah.png') }}" alt="Muhammadiyah"
                        class="h-10 w-auto opacity-60 group-hover:opacity-100 transition-opacity"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='block'">
                    <i
                        class="fas fa-star-and-crescent text-4xl text-gray-400 group-hover:text-primary hidden transition-colors"></i>
                    <span class="text-sm font-semibold text-gray-500 group-hover:text-gray-800">Persyarikatan
                        Muhammadiyah</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi Misi -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-5 max-w-[1000px]">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="bg-orange-50 p-10 rounded-3xl border border-orange-100" data-aos="fade-right">
                    <div
                        class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center text-primary text-3xl mb-6">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-[#1A1A2E] mb-4">Visi</h3>
                    <p class="text-gray-700 leading-relaxed font-medium">
                        Menjadi Lembaga Amil Zakat Terpercaya, Amanah, dan Profesional dalam Mengelola ZISKA untuk
                        Kesejahteraan Umat di Kecamatan Lengkong.
                    </p>
                </div>
                <div class="bg-blue-50 p-10 rounded-3xl border border-blue-100" data-aos="fade-left">
                    <div
                        class="w-16 h-16 bg-blue-600/10 rounded-2xl flex items-center justify-center text-blue-600 text-3xl mb-6">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-[#1A1A2E] mb-4">Misi</h3>
                    <ul class="space-y-3 text-gray-700">
                        <li class="flex gap-3"><i class="fas fa-check-circle text-blue-500 mt-1"></i> <span>Optimalisasi
                                penghimpunan ZISKA (Zakat, Infaq, Sedekah, Kemanusiaan).</span></li>
                        <li class="flex gap-3"><i class="fas fa-check-circle text-blue-500 mt-1"></i> <span>Penyaluran
                                yang tepat sasaran, transparan, & berdampak bagi Mustahik.</span></li>
                        <li class="flex gap-3"><i class="fas fa-check-circle text-blue-500 mt-1"></i> <span>Sinergi
                                dengan amal usaha Muhammadiyah dalam dakwah sosial.</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Struktur / Kantor Info -->
    <section class="py-20 bg-gray-50 border-t border-gray-200">
        <div class="container mx-auto px-5 text-center">
            <h3 class="text-2xl font-bold text-[#1A1A2E] mb-8">Struktur & Legalitas</h3>
            <p class="text-gray-600 max-w-2xl mx-auto mb-12">Beroperasi di bawah Kantor Layanan (KL) Lazismu Kota
                Bandung
                dengan pengawasan ketat, memastikan setiap rupiah yang Anda titipkan tersampaikan sesuai syariat dan
                regulasi.</p>
            <!-- Placeholder for Org Chart or Text List -->
            <div class="flex flex-wrap justify-center gap-4">
                <span
                    class="px-6 py-3 bg-white rounded-full shadow-sm text-sm font-bold text-gray-700 border border-gray-200 flex items-center gap-2"><i
                        class="fas fa-file-signature text-primary"></i> SK KL Lazismu Lengkong</span>
                <span
                    class="px-6 py-3 bg-white rounded-full shadow-sm text-sm font-bold text-gray-700 border border-gray-200 flex items-center gap-2"><i
                        class="fas fa-search-dollar text-primary"></i> Audit Syariah & Keuangan</span>
            </div>
        </div>
    </section>

    <!-- CTA Simple -->
    <section class="py-16 bg-[#1A1A2E] relative overflow-hidden">
        <div class="container mx-auto px-5 text-center relative z-10">
            <h2 class="text-3xl font-bold text-white mb-6">Siap Berkolaborasi dalam Kebaikan?</h2>
            <div class="flex justify-center gap-4">
                <a href="{{ route('kontak') }}"
                    class="px-8 py-3 bg-primary text-white font-bold rounded-xl hover:bg-primary-dark transition-all">Hubungi
                    Kami</a>
                <a href="{{ route('program.index') }}"
                    class="px-8 py-3 bg-white/10 text-white font-bold rounded-xl hover:bg-white/20 transition-all backdrop-blur-sm">Lihat
                    Program</a>
            </div>
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
