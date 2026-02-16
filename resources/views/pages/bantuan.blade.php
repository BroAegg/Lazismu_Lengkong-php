@extends('layouts.app')

@section('title', 'Bantuan - Lazismu Lengkong')

@section('content')
<!-- Page Header -->
    <header class="bg-[#1A1A2E] pt-36 pb-24 text-white relative overflow-hidden">
        <div
            class="absolute top-0 right-0 w-96 h-96 bg-primary/10 rounded-full blur-3xl -mr-32 -mt-32 pointer-events-none">
        </div>
        <div class="container mx-auto px-5 relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Pusat Bantuan</h1>
            <p class="text-lg text-gray-400 max-w-2xl mx-auto">Kami siap membantu menjawab pertanyaan Anda.</p>
        </div>
    </header>

    <!-- Content -->
    <main class="container mx-auto px-5 relative z-20 mb-20 -mt-16">
        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 max-w-4xl mx-auto">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                <!-- Contact Card -->
                <div class="p-6 bg-orange-50 rounded-xl border border-orange-100 flex items-start gap-4">
                    <div
                        class="w-12 h-12 bg-primary text-white rounded-full flex items-center justify-center shrink-0 text-xl">
                        <i class="fab fa-whatsapp"></i></div>
                    <div>
                        <h3 class="font-bold text-lg mb-1">WhatsApp Center</h3>
                        <p class="text-sm text-gray-600 mb-2">Respon cepat di jam kerja (08.00 - 16.00).</p>
                        <a href="#" class="text-primary font-semibold hover:underline">Chat Sekarang &rarr;</a>
                    </div>
                </div>
                <!-- Email Card -->
                <div class="p-6 bg-blue-50 rounded-xl border border-blue-100 flex items-start gap-4">
                    <div
                        class="w-12 h-12 bg-[#1A1A2E] text-white rounded-full flex items-center justify-center shrink-0 text-xl">
                        <i class="fas fa-envelope"></i></div>
                    <div>
                        <h3 class="font-bold text-lg mb-1">Email Support</h3>
                        <p class="text-sm text-gray-600 mb-2">sapa@lazismulengkong.org</p>
                        <a href="mailto:sapa@lazismulengkong.org"
                            class="text-[#1A1A2E] font-semibold hover:underline">Kirim Email &rarr;</a>
                    </div>
                </div>
            </div>

            <h3 class="text-2xl font-bold mb-6 text-gray-800">Pertanyaan Sering Diajukan (FAQ)</h3>

            <div class="space-y-4">
                <details class="group bg-gray-50 rounded-xl overflow-hidden cursor-pointer" open>
                    <summary
                        class="flex items-center justify-between p-5 font-medium text-gray-900 group-hover:bg-gray-100 transition-colors">
                        Bagaimana cara berdonasi di Lazismu Lengkong?
                        <i
                            class="fas fa-chevron-down transform group-open:rotate-180 transition-transform text-gray-400"></i>
                    </summary>
                    <div class="px-5 pb-5 text-gray-600">
                        Anda dapat berdonasi dengan mudah melalui situs ini. Klik tombol "Donasi Sekarang", pilih
                        program donasi, masukkan nominal, dan pilih metode pembayaran (QRIS, Transfer Bank, atau
                        E-Wallet).
                    </div>
                </details>

                <details class="group bg-gray-50 rounded-xl overflow-hidden cursor-pointer">
                    <summary
                        class="flex items-center justify-between p-5 font-medium text-gray-900 group-hover:bg-gray-100 transition-colors">
                        Apakah donasi saya bisa diverifikasi otomatis?
                        <i
                            class="fas fa-chevron-down transform group-open:rotate-180 transition-transform text-gray-400"></i>
                    </summary>
                    <div class="px-5 pb-5 text-gray-600">
                        Ya, jika Anda menggunakan pembayaran digital (QRIS/Virtual Account), donasi akan terverifikasi
                        otomatis. Untuk transfer manual, harap lampirkan bukti transfer.
                    </div>
                </details>

                <details class="group bg-gray-50 rounded-xl overflow-hidden cursor-pointer">
                    <summary
                        class="flex items-center justify-between p-5 font-medium text-gray-900 group-hover:bg-gray-100 transition-colors">
                        Saya lupa password akun saya, bagaimana solusinya?
                        <i
                            class="fas fa-chevron-down transform group-open:rotate-180 transition-transform text-gray-400"></i>
                    </summary>
                    <div class="px-5 pb-5 text-gray-600">
                        Silakan buka halaman Login, lalu klik link "Lupa Password?". Masukkan email Anda, dan kami akan
                        mengirimkan instruksi untuk mengatur ulang kata sandi Anda.
                    </div>
                </details>
            </div>

        </div>
    </main>

    <!-- Footer -->
@endsection
