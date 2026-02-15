{{-- Footer --}}
<footer class="bg-dark-500 text-white pt-20 pb-10">
    <div class="container mx-auto px-5 max-w-[1200px]">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            {{-- Brand --}}
            <div>
                <a href="{{ route('beranda') }}" class="flex flex-col items-start gap-1 mb-6">
                    <img src="{{ asset('assets/images/lazismuasli.png') }}" alt="Lazismu Logo" class="h-10 w-auto filter brightness-0 invert">
                    <span class="text-[0.625rem] font-normal tracking-wide text-white/70 ml-1" style="font-family: 'Lato', sans-serif;">lengkong</span>
                </a>
                <p class="text-gray-400 mb-6 leading-relaxed">
                    Lembaga Amil Zakat Nasional tingkat Kantor Layanan (KL) di bawah naungan Muhammadiyah Lengkong. Menghimpun dan menyalurkan dana ZISKA secara profesional, transparan, dan amanah.
                </p>
                <div class="flex gap-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-white/5 hover:bg-primary-500 flex items-center justify-center transition-colors"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="w-10 h-10 rounded-full bg-white/5 hover:bg-primary-500 flex items-center justify-center transition-colors"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="w-10 h-10 rounded-full bg-white/5 hover:bg-primary-500 flex items-center justify-center transition-colors"><i class="fab fa-youtube"></i></a>
                    <a href="https://wa.me/6281234567890" target="_blank" class="w-10 h-10 rounded-full bg-white/5 hover:bg-primary-500 flex items-center justify-center transition-colors"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div>
                <h4 class="text-lg font-bold mb-6">Tautan Cepat</h4>
                <ul class="space-y-4">
                    <li><a href="{{ route('beranda') }}" class="text-gray-400 hover:text-primary-500 transition-colors">Beranda</a></li>
                    <li><a href="{{ route('program.index') }}" class="text-gray-400 hover:text-primary-500 transition-colors">Program Kebaikan</a></li>
                    <li><a href="{{ route('kalkulator') }}" class="text-gray-400 hover:text-primary-500 transition-colors">Kalkulator Zakat</a></li>
                    <li><a href="{{ route('tentang-kami') }}" class="text-gray-400 hover:text-primary-500 transition-colors">Tentang Kami</a></li>
                    <li><a href="{{ route('kontak') }}" class="text-gray-400 hover:text-primary-500 transition-colors">Hubungi Kami</a></li>
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h4 class="text-lg font-bold mb-6">Kantor Layanan</h4>
                <ul class="space-y-4">
                    <li class="flex items-start gap-4">
                        <i class="fas fa-map-marker-alt text-primary-500 mt-1"></i>
                        <span class="text-gray-400">Jl. Buah Batu No. 59, Kec. Lengkong, Kota Bandung, Jawa Barat (Gedung Dakwah Muhammadiyah)</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <i class="fas fa-phone text-primary-500"></i>
                        <span class="text-gray-400">+62 812-3456-7890</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <i class="fas fa-envelope text-primary-500"></i>
                        <span class="text-gray-400">sapa@lazismulengkong.org</span>
                    </li>
                </ul>
            </div>

            {{-- Legal --}}
            <div>
                <h4 class="text-lg font-bold mb-6">Legalitas</h4>
                <div class="space-y-4">
                    <div class="p-4 bg-white/5 rounded-xl border border-white/10">
                        <strong class="block text-primary-500 mb-1">SK Kemenag RI</strong>
                        <span class="text-gray-400 text-sm">No. 730 Tahun 2016</span>
                    </div>
                    <div class="p-4 bg-white/5 rounded-xl border border-white/10">
                        <strong class="block text-primary-500 mb-1">NPWP</strong>
                        <span class="text-gray-400 text-sm">01.234.567.8-901.000</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom Bar --}}
        <div class="border-t border-white/10 pt-8 text-center md:text-left flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-gray-500 text-sm">&copy; {{ date('Y') }} Lazismu Lengkong. All rights reserved.</p>
            <div class="flex gap-6 text-sm text-gray-500">
                <a href="{{ route('kebijakan-privasi') }}" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="{{ route('syarat-ketentuan') }}" class="hover:text-white transition-colors">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
