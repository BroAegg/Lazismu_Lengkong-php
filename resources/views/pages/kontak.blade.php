@extends('layouts.app')

@section('title', 'Lazismu Lengkong | Zakat, Infaq & Sedekah untuk Warga Lengkong')

@section('content')
    <!-- Hero Section -->
    <!-- Page Header -->
    <section class="relative pt-40 pb-20 bg-gray-900 overflow-hidden">
        <div class="absolute inset-0 bg-no-repeat bg-center bg-cover opacity-30" style="background-image: url('{{ asset('assets/images/hero-bg.png') }}')">
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-gray-900/50 via-gray-900/80 to-gray-900"></div>
        <div class="container mx-auto px-5 relative z-10 text-center max-w-[1200px]">
            <span
                class="inline-block px-4 py-1 rounded-full bg-primary/20 text-[#FFB347] text-sm font-bold border border-primary/30 mb-6"
                data-aos="fade-up">SILATURAHMI</span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6" data-aos="fade-up" data-aos-delay="100">
                Hubungi Kami</h1>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                Ada pertanyaan atau ingin berkonsultasi seputar ZIS? Tim kami siap membantu Anda dengan sepenuh hati.
            </p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-24 bg-[#FAFAFA]" id="kontak">
        <div class="container mx-auto px-5 max-w-[1200px]">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <span
                        class="inline-block px-4 py-2 bg-gradient-to-r from-[#F7941D] to-[#F15A24] text-white text-sm font-semibold rounded-full mb-4">Hubungi
                        Kami</span>
                    <h2 class="text-[clamp(1.75rem,4vw,2.5rem)] font-extrabold text-[#1A1A2E] mb-6 leading-tight">Butuh
                        Konsultasi Zakat?</h2>
                    <p class="text-lg text-gray-600 mb-10">
                        Tim Lazismu Lengkong siap membantu Anda menghitung zakat, menjawab pertanyaan seputar program,
                        atau menjemput donasi Anda.
                    </p>

                    <div class="space-y-6">
                        <div
                            class="flex items-start gap-6 bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-primary/50 transition-colors">
                            <div
                                class="w-12 h-12 bg-orange-50 text-primary rounded-xl flex items-center justify-center text-xl shrink-0">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <strong class="block text-[#1A1A2E] text-lg mb-1">Kantor Layanan</strong>
                                <p class="text-gray-600">Jl. Buah Batu No. 59, Kec. Lengkong, Kota Bandung, Jawa Barat
                                    40262</p>
                            </div>
                        </div>

                        <div
                            class="flex items-start gap-6 bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-primary/50 transition-colors">
                            <div
                                class="w-12 h-12 bg-green-50 text-green-600 rounded-xl flex items-center justify-center text-xl shrink-0">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <div>
                                <strong class="block text-[#1A1A2E] text-lg mb-1">WhatsApp Center</strong>
                                <p class="text-gray-600">+62 812-3456-7890 (Layanan 24 Jam)</p>
                            </div>
                        </div>

                        <div
                            class="flex items-start gap-6 bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-primary/50 transition-colors">
                            <div
                                class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center text-xl shrink-0">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <strong class="block text-[#1A1A2E] text-lg mb-1">Jam Operasional</strong>
                                <p class="text-gray-600">Senin - Jumat: 08.00 - 16.00 WIB</p>
                                <p class="text-gray-600">Sabtu: 08.00 - 12.00 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="h-[500px] bg-gray-200 rounded-[24px] overflow-hidden shadow-2xl relative group"
                    data-aos="fade-left">
                    <!-- Placeholder for Map -->
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15843.07827668631!2d107.6180556!3d-6.927500!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e62c12345678%3A0x1234567890abcdef!2sKecamatan%20Lengkong%2C%20Kota%20Bandung%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1625555555555!5m2!1sid!2sid"
                        class="w-full h-full border-0 grayscale group-hover:grayscale-0 transition-all duration-700"
                        allowfullscreen="" loading="lazy"></iframe>

                    <div
                        class="absolute bottom-6 left-6 right-6 p-4 bg-white/90 backdrop-blur-md rounded-xl shadow-lg border border-white/20">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('assets/images/logo-lazismu.png') }}" class="h-8"
                                onerror="this.style.display='none'">
                            <span class="text-sm font-bold text-[#1A1A2E]">Lokasi Lazismu Lengkong</span>
                        </div>
                    </div>
                </div>
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
