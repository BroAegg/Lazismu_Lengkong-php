@extends('layouts.app')

@section('title', 'Kalkulator Zakat | Lazismu Lengkong')

@section('content')
    <!-- Page Header -->
    <section class="relative pt-40 pb-24 bg-[#1A1A2E] overflow-hidden">
        <div class="absolute inset-0 bg-no-repeat bg-center bg-cover opacity-10" style="background-image: url('{{ asset('assets/images/hero-bg.png') }}')"></div>
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-orange-500/10 rounded-full blur-[100px] -mr-48 -mt-48 pointer-events-none"></div>
        <div class="container mx-auto px-5 relative z-10 text-center max-w-[900px]">
            <span class="inline-block px-4 py-1.5 rounded-full bg-orange-500/20 text-[#FFB347] text-sm font-bold border border-orange-500/30 mb-6" data-aos="fade-up">
                <i class="fas fa-calculator mr-2"></i>HITUNG ZAKAT
            </span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 leading-tight" data-aos="fade-up" data-aos-delay="100">
                Kalkulator Zakat Syariah
            </h1>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                Hitung zakat Anda secara akurat sesuai Fiqh Zakat Jumhur Ulama. Pilih jenisnya, isi data, dan dapatkan nominal yang tepat.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-3 mt-8" data-aos="fade-up" data-aos-delay="300">
                <span class="flex items-center gap-2 px-4 py-2 bg-white/10 text-white/80 rounded-full text-xs font-medium border border-white/10">
                    <i class="fas fa-mosque text-orange-400"></i> Fatwa MUI No.3/2003
                </span>
                <span class="flex items-center gap-2 px-4 py-2 bg-white/10 text-white/80 rounded-full text-xs font-medium border border-white/10">
                    <i class="fas fa-coins text-yellow-400"></i> Nisab: 85g Emas
                </span>
                <span class="flex items-center gap-2 px-4 py-2 bg-white/10 text-white/80 rounded-full text-xs font-medium border border-white/10">
                    <i class="fas fa-shield-alt text-green-400"></i> 4 Jenis Zakat
                </span>
            </div>
        </div>
    </section>

    <!-- Calculator Section -->
    <section class="py-20 bg-[#FAFAFA]" id="kalkulator">
        <div class="container mx-auto px-5 max-w-[1200px]">
            <div class="flex flex-col lg:flex-row gap-10 items-start">

                <!-- Kalkulator Livewire -->
                <div class="w-full lg:w-[60%]" data-aos="fade-up">
                    <div class="bg-white rounded-[2rem] shadow-2xl shadow-gray-200/80 p-8 md:p-10 border border-gray-100">
                        @livewire('zakat-calculator')
                    </div>
                </div>

                <!-- Sidebar Info -->
                <div class="w-full lg:w-[40%] space-y-5" data-aos="fade-up" data-aos-delay="100">

                    <!-- Nisab Reference -->
                    <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-sm">
                        <h3 class="font-extrabold text-[#1A1A2E] mb-4 flex items-center gap-2">
                            <i class="fas fa-coins text-yellow-500"></i> Referensi Nisab 2026
                        </h3>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between py-2 border-b border-gray-50">
                                <span class="text-sm text-gray-500">Harga emas (estimasi)</span>
                                <span class="font-bold text-[#1A1A2E] text-sm">Rp 1.750.000/gr</span>
                            </div>
                            <div class="flex items-center justify-between py-2 border-b border-gray-50">
                                <span class="text-sm text-gray-500">Nisab (85g emas)</span>
                                <span class="font-extrabold text-orange-600 text-sm">± Rp 148.750.000</span>
                            </div>
                            <div class="flex items-center justify-between py-2 border-b border-gray-50">
                                <span class="text-sm text-gray-500">Setara gaji bersih/bln</span>
                                <span class="font-bold text-[#1A1A2E] text-sm">± Rp 12.396.000</span>
                            </div>
                            <div class="flex items-center justify-between py-2">
                                <span class="text-sm text-gray-500">Fitrah (uang)</span>
                                <span class="font-bold text-[#1A1A2E] text-sm">Rp 47.000 / jiwa</span>
                            </div>
                        </div>
                        <p class="text-[10px] text-gray-400 mt-4 italic">* Konfirmasi ke Baznas setempat untuk nilai terkini.</p>
                    </div>

                    <!-- Panduan Jenis Zakat -->
                    <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-sm">
                        <h3 class="font-extrabold text-[#1A1A2E] mb-4 flex items-center gap-2">
                            <i class="fas fa-book-open text-orange-500"></i> Jenis Zakat
                        </h3>
                        <div class="space-y-3">
                            <div class="flex items-start gap-3 p-3 bg-orange-50 rounded-xl">
                                <i class="fas fa-briefcase text-orange-500 mt-0.5 w-4 shrink-0"></i>
                                <div>
                                    <p class="text-sm font-bold text-[#1A1A2E]">Zakat Penghasilan</p>
                                    <p class="text-xs text-gray-500">2,5% dari gaji bersih/tahun.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 p-3 bg-blue-50 rounded-xl">
                                <i class="fas fa-piggy-bank text-blue-500 mt-0.5 w-4 shrink-0"></i>
                                <div>
                                    <p class="text-sm font-bold text-[#1A1A2E]">Zakat Maal (Harta)</p>
                                    <p class="text-xs text-gray-500">2,5% dari tabungan + investasi - hutang. Haul 1 tahun.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 p-3 bg-yellow-50 rounded-xl">
                                <i class="fas fa-coins text-yellow-600 mt-0.5 w-4 shrink-0"></i>
                                <div>
                                    <p class="text-sm font-bold text-[#1A1A2E]">Zakat Emas & Perak</p>
                                    <p class="text-xs text-gray-500">2,5% dari nilai emas/perak simpanan ≥ 85g.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 p-3 bg-green-50 rounded-xl">
                                <i class="fas fa-moon text-green-500 mt-0.5 w-4 shrink-0"></i>
                                <div>
                                    <p class="text-sm font-bold text-[#1A1A2E]">Zakat Fitrah</p>
                                    <p class="text-xs text-gray-500">Wajib tiap jiwa sebelum Sholat Idul Fitri.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CTA -->
                    <div class="bg-gradient-to-br from-[#1A1A2E] to-[#2D2D44] rounded-2xl p-6 text-white relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-orange-500/20 rounded-full blur-2xl -mr-8 -mt-8 pointer-events-none"></div>
                        <div class="relative z-10">
                            <p class="text-white/70 text-xs font-bold uppercase tracking-wider mb-3">Sudah tahu nominalnya?</p>
                            <h4 class="text-xl font-extrabold mb-3 leading-snug">Bayar Zakat Sekarang &<br>Raih Ketenangan Hati</h4>
                            <p class="text-white/60 text-xs leading-relaxed mb-5">Lazismu Lengkong menyalurkan zakat Anda kepada 8 asnaf yang berhak. Transparan & sesuai syariah.</p>
                            <a href="{{ route('donasi') }}"
                                class="flex items-center justify-center gap-2 w-full py-3.5 bg-gradient-to-r from-[#F7941D] to-[#F15A24] text-white font-bold rounded-xl text-sm shadow-lg shadow-orange-900/20 hover:-translate-y-0.5 transition-all">
                                <i class="fas fa-hand-holding-heart"></i> Bayar Zakat via Lazismu
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-5 max-w-[900px]">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-extrabold text-[#1A1A2E] mb-3">Pertanyaan Seputar Zakat</h2>
                <p class="text-gray-500">Hal-hal yang sering ditanyakan seputar zakat dan perhitungannya.</p>
            </div>

            <div class="space-y-4" data-aos="fade-up" data-aos-delay="100" x-data="{ open: null }">
                @foreach([
                    ['q' => 'Apa perbedaan Zakat Maal dan Zakat Penghasilan?', 'a' => 'Zakat Penghasilan (Profesi) dikenakan atas gaji/honorarium yang diterima, dibayar tiap bulan atau sekaligus setahun tanpa syarat haul. Sedangkan Zakat Maal dikenakan atas harta yang telah dimiliki selama ≥ 1 tahun (haul) seperti tabungan, deposito, dan investasi.'],
                    ['q' => 'Apakah emas perhiasan wajib dizakatkan?', 'a' => 'Menurut mayoritas ulama (jumhur), emas/perak yang dipakai sebagai perhiasan sehari-hari tidak wajib dizakatkan. Namun jika disimpan atau melebihi kebutuhan wajar, sebagian ulama mewajibkannya. Untuk kehati-hatian, dianjurkan tetap dizakatkan.'],
                    ['q' => 'Bagaimana jika gaji saya di bawah nisab?', 'a' => 'Jika penghasilan bersih per tahun belum mencapai nisab (±Rp 148 juta), zakat penghasilan belum wajib. Namun Anda dianjurkan untuk bersedekah atau infaq semampunya.'],
                    ['q' => 'Bolehkah zakat fitrah dibayar dengan uang?', 'a' => 'Mayoritas ulama madzhab Hanafi dan Majelis Ulama Indonesia (MUI) membolehkan pembayaran zakat fitrah dengan uang senilai 3,5 kg beras atau sesuai ketentuan Baznas setempat.'],
                    ['q' => 'Siapa saja yang berhak menerima zakat (asnaf)?', 'a' => 'Terdapat 8 golongan penerima zakat (asnaf) sesuai QS At-Taubah:60: Fakir, Miskin, Amil, Mualaf, Riqab, Gharimin, Fii Sabilillah, dan Ibnu Sabil.'],
                ] as $i => $faq)
                <div class="bg-gray-50 rounded-2xl border border-gray-100 overflow-hidden">
                    <button @click="open === {{ $i }} ? open = null : open = {{ $i }}"
                        class="w-full flex items-center justify-between p-5 text-left font-bold text-[#1A1A2E] hover:text-orange-600 transition-colors">
                        <span class="pr-4">{{ $faq['q'] }}</span>
                        <i class="fas fa-chevron-down text-sm text-gray-400 shrink-0 transition-transform duration-300"
                            :class="{ 'rotate-180': open === {{ $i }} }"></i>
                    </button>
                    <div x-show="open === {{ $i }}" x-collapse class="px-5 pb-5">
                        <p class="text-gray-600 text-sm leading-relaxed border-t border-gray-200 pt-4">{{ $faq['a'] }}</p>
                    </div>
                </div>
                @endforeach
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

@endsection
