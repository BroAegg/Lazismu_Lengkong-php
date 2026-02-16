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
                data-aos="fade-up">HITUNG ZAKAT</span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6" data-aos="fade-up" data-aos-delay="100">
                Kalkulator Zakat</h1>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                Hitung kewajiban zakat Anda dengan mudah dan akurat. Tunaikan hak mereka, bersihkan harta Anda.
            </p>
        </div>
    </section>

    <!-- Calculator Section -->
    <section class="py-24 bg-white" id="kalkulator">
        <div class="container mx-auto px-5 max-w-[1200px]">
            <div class="text-center mb-12" data-aos="fade-up">
                <span
                    class="inline-block px-4 py-2 bg-gradient-to-r from-[#F7941D] to-[#F15A24] text-white text-sm font-semibold rounded-full mb-4">Ramadan
                    Impact Calculator</span>
                <h2 class="text-[clamp(1.75rem,4vw,2.5rem)] font-extrabold text-[#1A1A2E] mb-4 leading-tight">Seberapa
                    Besar "Skor Dampak" Ramadan Anda?</h2>
                <p class="text-lg text-gray-600 max-w-[700px] mx-auto">
                    Ambil tes 1 menit untuk menghitung potensi zakat Anda dan lihat bagaimana
                    kontribusi Anda dapat mengubah kehidupan di Kecamatan Lengkong & Kota Bandung.
                </p>
            </div>

            <div class="max-w-[800px] mx-auto bg-white rounded-[24px] shadow-[0_24px_48px_rgba(0,0,0,0.2)] overflow-hidden border border-gray-100"
                data-aos="fade-up" data-aos-delay="200">
                <!-- Progress -->
                <div class="p-6 sm:p-8 bg-[#FAFAFA] border-b border-gray-200">
                    <div class="h-1.5 bg-gray-200 rounded-full overflow-hidden mb-4">
                        <div class="h-full bg-gradient-to-r from-[#F7941D] to-[#F15A24] rounded-full w-1/4 transition-all duration-300"
                            id="progressFill"></div>
                    </div>
                    <div class="flex justify-between">
                        <span
                            class="w-8 h-8 flex items-center justify-center rounded-full text-sm font-semibold bg-white border-2 border-primary text-primary transition-all step-indicator active"
                            data-step="1">1</span>
                        <span
                            class="w-8 h-8 flex items-center justify-center rounded-full text-sm font-semibold bg-white border-2 border-gray-200 text-gray-400 transition-all step-indicator"
                            data-step="2">2</span>
                        <span
                            class="w-8 h-8 flex items-center justify-center rounded-full text-sm font-semibold bg-white border-2 border-gray-200 text-gray-400 transition-all step-indicator"
                            data-step="3">3</span>
                        <span
                            class="w-8 h-8 flex items-center justify-center rounded-full text-sm font-semibold bg-white border-2 border-gray-200 text-gray-400 transition-all step-indicator"
                            data-step="4">4</span>
                    </div>
                </div>

                <!-- Form -->
                <form id="zakatCalculator" class="p-6 sm:p-10 relative min-h-[400px]">
                    <!-- Step 1 -->
                    <div class="calc-step active" data-step="1">
                        <div class="flex items-center gap-4 mb-8">
                            <span
                                class="text-6xl font-bold text-gray-100 absolute -top-4 -left-4 z-0 pointer-events-none">01</span>
                            <h3 class="text-xl font-bold text-gray-800 relative z-10 w-full pl-6">Siapa yang ingin Anda
                                bantu hari ini?</h3>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                            <label class="cursor-pointer relative group">
                                <input type="radio" name="focus" value="panti" class="peer sr-only" checked>
                                <div
                                    class="p-5 rounded-xl border-2 border-gray-200 hover:border-primary/50 peer-checked:border-primary peer-checked:bg-orange-50/50 transition-all h-full">
                                    <i
                                        class="fas fa-home text-2xl text-gray-400 mb-3 peer-checked:text-primary transition-colors"></i>
                                    <span class="block font-bold text-gray-800 mb-1">Adik-adik di Panti</span>
                                    <span class="text-sm text-gray-500">Panti asuhan tertua di Jabar</span>
                                </div>
                            </label>
                            <label class="cursor-pointer relative group">
                                <input type="radio" name="focus" value="pendidikan" class="peer sr-only">
                                <div
                                    class="p-5 rounded-xl border-2 border-gray-200 hover:border-primary/50 peer-checked:border-primary peer-checked:bg-orange-50/50 transition-all h-full">
                                    <i
                                        class="fas fa-graduation-cap text-2xl text-gray-400 mb-3 peer-checked:text-primary transition-colors"></i>
                                    <span class="block font-bold text-gray-800 mb-1">Siswa Muhammadiyah</span>
                                    <span class="text-sm text-gray-500">Beasiswa untuk generasi penerus</span>
                                </div>
                            </label>
                            <label class="cursor-pointer relative group">
                                <input type="radio" name="focus" value="dhuafa" class="peer sr-only">
                                <div
                                    class="p-5 rounded-xl border-2 border-gray-200 hover:border-primary/50 peer-checked:border-primary peer-checked:bg-orange-50/50 transition-all h-full">
                                    <i
                                        class="fas fa-hands-helping text-2xl text-gray-400 mb-3 peer-checked:text-primary transition-colors"></i>
                                    <span class="block font-bold text-gray-800 mb-1">Warga Dhuafa</span>
                                    <span class="text-sm text-gray-500">Bantuan langsung tetangga</span>
                                </div>
                            </label>
                            <label class="cursor-pointer relative group">
                                <input type="radio" name="focus" value="semua" class="peer sr-only">
                                <div
                                    class="p-5 rounded-xl border-2 border-gray-200 hover:border-primary/50 peer-checked:border-primary peer-checked:bg-orange-50/50 transition-all h-full">
                                    <i
                                        class="fas fa-hand-holding-heart text-2xl text-gray-400 mb-3 peer-checked:text-primary transition-colors"></i>
                                    <span class="block font-bold text-gray-800 mb-1">Semua yang Butuh</span>
                                    <span class="text-sm text-gray-500">Biarkan kami yang salurkan</span>
                                </div>
                            </label>
                        </div>
                        <div class="flex justify-end">
                            <button type="button" onclick="nextStep(1)"
                                class="btn-primary inline-flex items-center justify-center gap-2 px-8 py-3 text-white font-bold rounded-xl hover:-translate-y-1 transition-transform shadow-lg shadow-orange-200">
                                Lanjutkan <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Step 2: Asset Input -->
                    <div class="calc-step hidden" data-step="2">
                        <div class="flex items-center gap-4 mb-8">
                            <span
                                class="text-6xl font-bold text-gray-100 absolute -top-4 -left-4 z-0 pointer-events-none">02</span>
                            <h3 class="text-xl font-bold text-gray-800 relative z-10 w-full pl-6">Berapa estimasi nilai
                                aset/pendapatan Anda?</h3>
                        </div>
                        <div class="mb-8">
                            <div class="relative group">
                                <span
                                    class="absolute left-6 top-1/2 -translate-y-1/2 text-gray-400 font-bold text-xl group-focus-within:text-primary transition-colors">Rp</span>
                                <input type="text" id="assetAmount" name="asset" placeholder="Contoh: 100.000.000"
                                    class="w-full pl-16 pr-8 py-5 bg-gray-50 border-2 border-gray-200 rounded-2xl focus:border-primary focus:bg-white focus:outline-none transition-all text-2xl font-bold text-gray-800"
                                    required>
                            </div>
                            <p class="mt-4 flex items-center gap-2 text-gray-500 text-sm">
                                <i class="fas fa-info-circle text-primary"></i> Masukkan total tabungan, emas, atau
                                pendapatan setahun Anda
                            </p>

                            <div
                                class="mt-8 p-6 bg-orange-50 rounded-2xl border border-orange-100 flex items-center gap-6">
                                <div
                                    class="w-16 h-16 bg-white rounded-xl shadow-sm flex items-center justify-center text-primary text-2xl shrink-0">
                                    <i class="fas fa-coins font-bold"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-800 mb-1">Nisab Zakat 2026</p>
                                    <p class="text-gray-600 text-sm">± Rp 85.000.000 <span class="text-gray-400">(setara
                                            85 gram emas)</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between mt-12">
                            <button type="button" onclick="prevStep(2)"
                                class="px-6 py-3 border-2 border-gray-200 text-gray-500 font-bold rounded-xl hover:bg-gray-50 transition-colors">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </button>
                            <button type="button" onclick="nextStep(2)"
                                class="btn-primary px-8 py-3 text-white font-bold rounded-xl shadow-lg shadow-orange-200">
                                Lanjutkan <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Step 3: Style -->
                    <div class="calc-step hidden" data-step="3">
                        <div class="flex items-center gap-4 mb-8">
                            <span
                                class="text-6xl font-bold text-gray-100 absolute -top-4 -left-4 z-0 pointer-events-none">03</span>
                            <h3 class="text-xl font-bold text-gray-800 relative z-10 w-full pl-6">Apa gaya berbagi Anda?
                            </h3>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                            <label class="cursor-pointer">
                                <input type="radio" name="style" value="zakat" class="peer sr-only" checked>
                                <div
                                    class="p-6 rounded-2xl border-2 border-gray-200 peer-checked:border-primary peer-checked:bg-orange-50/50 transition-all h-full text-center group">
                                    <div
                                        class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center text-gray-400 mx-auto mb-4 group-hover:scale-110 transition-transform peer-checked:bg-white peer-checked:text-primary">
                                        <i class="fas fa-hand-holding-usd text-2xl"></i>
                                    </div>
                                    <span class="block font-bold text-gray-800 mb-2">Zakat Maal</span>
                                    <span class="text-sm text-gray-500 leading-relaxed">Sekali bayar, langsung tuntas
                                        (2.5% dari aset)</span>
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="style" value="infaq" class="peer sr-only">
                                <div
                                    class="p-6 rounded-2xl border-2 border-gray-200 peer-checked:border-primary peer-checked:bg-orange-50/50 transition-all h-full text-center group">
                                    <div
                                        class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center text-gray-400 mx-auto mb-4 group-hover:scale-110 transition-transform peer-checked:bg-white peer-checked:text-primary">
                                        <i class="fas fa-sync-alt text-2xl"></i>
                                    </div>
                                    <span class="block font-bold text-gray-800 mb-2">Infaq Rutin</span>
                                    <span class="text-sm text-gray-500 leading-relaxed">Sedekah harian selama 30 hari
                                        Ramadan</span>
                                </div>
                            </label>
                        </div>
                        <div class="flex justify-between mt-12">
                            <button type="button" onclick="prevStep(3)"
                                class="px-6 py-3 border-2 border-gray-200 text-gray-500 font-bold rounded-xl hover:bg-gray-50 transition-colors">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </button>
                            <button type="button" onclick="nextStep(3)"
                                class="btn-primary px-8 py-3 text-white font-bold rounded-xl shadow-lg shadow-orange-200">
                                Lanjutkan <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Step 4: Contact -->
                    <div class="calc-step hidden" data-step="4">
                        <div class="flex items-center gap-4 mb-8">
                            <span
                                class="text-6xl font-bold text-gray-100 absolute -top-4 -left-4 z-0 pointer-events-none">04</span>
                            <h3 class="text-xl font-bold text-gray-800 relative z-10 w-full pl-6">Ke mana laporan kami
                                kirim?</h3>
                        </div>
                        <div class="space-y-6 mb-8">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap</label>
                                <input type="text" id="donorName" name="name" placeholder="Masukkan nama Anda"
                                    class="w-full px-5 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-primary focus:bg-white focus:outline-none transition-all"
                                    required>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Nomor WhatsApp</label>
                                <div class="relative">
                                    <span
                                        class="absolute left-5 top-1/2 -translate-y-1/2 font-bold text-gray-400">+62</span>
                                    <input type="tel" id="donorWhatsapp" name="whatsapp" placeholder="8123456789"
                                        class="w-full pl-16 pr-5 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-primary focus:bg-white focus:outline-none transition-all"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between mt-12">
                            <button type="button" onclick="prevStep(4)"
                                class="px-6 py-3 border-2 border-gray-200 text-gray-500 font-bold rounded-xl hover:bg-gray-50 transition-colors">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </button>
                            <button type="submit"
                                class="btn-primary px-8 py-4 text-white font-bold text-lg rounded-xl shadow-xl shadow-orange-200 flex items-center gap-2">
                                <i class="fas fa-magic"></i> Lihat Skor Dampak Saya
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Result Section -->
                <div class="hidden p-8 sm:p-12 text-center" id="calcResult">
                    <div
                        class="w-24 h-24 bg-gradient-to-br from-primary to-accent text-white rounded-full flex items-center justify-center text-4xl mx-auto mb-6 shadow-xl shadow-orange-200 animate-bounce">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h3 class="text-2xl font-extrabold text-[#1A1A2E] mb-2">Luar Biasa, <span id="resultName"
                            class="text-primary">Sahabat</span>!</h3>
                    <p class="text-gray-500 font-bold uppercase tracking-widest text-sm mb-8" id="resultCategory">
                        Champion of Lengkong</p>

                    <div class="bg-gray-50 rounded-3xl p-8 mb-10 border border-gray-100">
                        <div class="mb-8">
                            <p class="text-sm text-gray-500 font-bold uppercase mb-2">Potensi Zakat & Infaq Anda</p>
                            <p class="text-4xl sm:text-5xl font-extrabold text-primary" id="resultZakat">Rp 0</p>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="bg-white p-5 rounded-2xl shadow-sm">
                                <i class="fas fa-utensils text-primary/40 text-2xl mb-3"></i>
                                <p class="text-2xl font-bold text-[#1A1A2E]" id="resultMeals">0</p>
                                <p class="text-xs text-gray-500 font-medium">Paket Sembako</p>
                            </div>
                            <div class="bg-white p-5 rounded-2xl shadow-sm">
                                <i class="fas fa-child text-primary/40 text-2xl mb-3"></i>
                                <p class="text-2xl font-bold text-[#1A1A2E]" id="resultOrphans">0</p>
                                <p class="text-xs text-gray-500 font-medium">Anak Panti Terbantu</p>
                            </div>
                            <div class="bg-white p-5 rounded-2xl shadow-sm">
                                <i class="fas fa-book text-primary/40 text-2xl mb-3"></i>
                                <p class="text-2xl font-bold text-[#1A1A2E]" id="resultStudents">0</p>
                                <p class="text-xs text-gray-500 font-medium">Beasiswa Siswa</p>
                            </div>
                        </div>
                    </div>

                    <div class="max-w-[600px] mx-auto mb-10 text-gray-600 leading-relaxed italic">
                        "Zakat bukan sekadar angka, tapi nyawa bagi mereka yang tinggal hanya beberapa kilometer dari
                        rumah Anda."
                    </div>

                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                        <a href="{{ route('donasi') }}"
                            class="btn-primary px-8 py-4 text-white font-bold rounded-xl text-lg shadow-xl shadow-orange-200">
                            <i class="fas fa-heart"></i> Wujudkan Dampaknya Sekarang
                        </a>
                        <button onclick="resetCalculator()"
                            class="px-8 py-4 border-2 border-gray-200 text-gray-600 font-bold rounded-xl hover:bg-gray-50 transition-all">
                            <i class="fas fa-redo"></i> Hitung Ulang
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Authority & Trust Section -->
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
