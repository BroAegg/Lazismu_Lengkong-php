@extends('layouts.app')

@section('title', 'Kontak - Lazismu Lengkong')

@section('content')
<section class="relative bg-dark-500 pt-40 pb-20 overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=1600')"></div>
    <div class="relative container mx-auto px-5 max-w-[1200px] text-center">
        <span class="inline-block px-4 py-2 bg-primary-500/20 text-primary-300 rounded-full text-sm font-semibold mb-4 border border-primary-500/30">SILATURAHMI</span>
        <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">Hubungi Kami</h1>
        <p class="text-white/70 max-w-lg mx-auto">Kami siap membantu konsultasi zakat dan kebutuhan Anda</p>
    </div>
</section>

<section id="kontak" class="py-20 bg-white" data-aos="fade-up">
    <div class="container mx-auto px-5 max-w-[1200px]">
        <div class="grid lg:grid-cols-2 gap-12 items-start">
            <div>
                <span class="inline-block px-4 py-2 bg-primary-500/10 text-primary-500 rounded-full text-sm font-semibold mb-4">Kantor Layanan</span>
                <h2 class="text-3xl font-bold text-dark-500 mb-4">Butuh Konsultasi Zakat?</h2>
                <p class="text-gray-600 mb-8 leading-relaxed">Hubungi kami melalui kontak di bawah ini. Tim kami siap membantu Anda.</p>

                <div class="space-y-4">
                    <div class="flex items-start gap-4 p-5 bg-gray-50 rounded-2xl">
                        <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center shrink-0"><i class="fas fa-map-marker-alt text-primary-500"></i></div>
                        <div>
                            <h4 class="font-bold text-dark-500 mb-1">Kantor Layanan</h4>
                            <p class="text-sm text-gray-600">Jl. Buah Batu No. 59, Kec. Lengkong, Kota Bandung, Jawa Barat (Gedung Dakwah Muhammadiyah)</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 p-5 bg-gray-50 rounded-2xl">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center shrink-0"><i class="fab fa-whatsapp text-green-500 text-xl"></i></div>
                        <div>
                            <h4 class="font-bold text-dark-500 mb-1">WhatsApp Center</h4>
                            <p class="text-sm text-gray-600">+62 812-3456-7890 (24 Jam)</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 p-5 bg-gray-50 rounded-2xl">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center shrink-0"><i class="fas fa-clock text-blue-500"></i></div>
                        <div>
                            <h4 class="font-bold text-dark-500 mb-1">Jam Operasional</h4>
                            <p class="text-sm text-gray-600">Senin - Jumat: 08.00 - 16.00 WIB<br>Sabtu: 08.00 - 12.00 WIB</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative rounded-2xl overflow-hidden shadow-card h-[400px]">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.798!2d107.6261!3d-6.9175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwNTUnMDMuMCJTIDEwN8KwMzcnMzQuMCJF!5e0!3m2!1sen!2sid!4v1" width="100%" height="100%" style="border:0; filter:grayscale(100%); transition: filter 0.3s;" allowfullscreen loading="lazy" onmouseover="this.style.filter='none'" onmouseout="this.style.filter='grayscale(100%)'"></iframe>
                <div class="absolute bottom-4 left-4 right-4 bg-white/90 backdrop-blur-sm rounded-xl p-4 flex items-center gap-3">
                    <img src="{{ asset('assets/images/lazismuasli.png') }}" alt="Logo" class="h-8 w-auto">
                    <div>
                        <p class="font-bold text-dark-500 text-sm">Lokasi Lazismu Lengkong</p>
                        <p class="text-xs text-gray-500">Gedung Dakwah Muhammadiyah</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
