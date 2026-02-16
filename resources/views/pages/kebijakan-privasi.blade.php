@extends('layouts.app')

@section('title', 'Kebijakan Privasi - Lazismu Lengkong')

@section('content')
<!-- Page Header -->
    <header class="bg-[#1A1A2E] pt-36 pb-24 text-white relative overflow-hidden">
        <div
            class="absolute top-0 right-0 w-96 h-96 bg-primary/10 rounded-full blur-3xl -mr-32 -mt-32 pointer-events-none">
        </div>
        <div class="container mx-auto px-5 relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Kebijakan Privasi</h1>
            <p class="text-lg text-gray-400 max-w-2xl mx-auto">Komitmen kami untuk melindungi data pribadi dan
                kepercayaan Anda.</p>
        </div>
    </header>

    <!-- Content -->
    <main class="container mx-auto px-5 relative z-20 mb-20 -mt-16">
        <div
            class="bg-white rounded-2xl shadow-xl p-8 md:p-12 max-w-4xl mx-auto prose prose-lg prose-orange text-gray-600">
            <p class="lead">Terakhir diperbarui: <strong>11 Februari 2026</strong></p>

            <h3>1. Pendahuluan</h3>
            <p>Lazismu Lengkong ("Kami") menghargai privasi Anda. Kebijakan Privasi ini menjelaskan bagaimana kami
                mengumpulkan, menggunakan, dan melindungi informasi pribadi yang Anda berikan melalui situs web kami.
            </p>

            <h3>2. Informasi yang Kami Kumpulkan</h3>
            <p>Kami dapat mengumpulkan informasi pribadi berikut ketika Anda mendaftar, berdonasi, atau menghubungi
                kami:</p>
            <ul>
                <li>Nama lengkap</li>
                <li>Alamat email</li>
                <li>Nomor telepon / WhatsApp</li>
                <li>Informasi transaksi donasi (namun kami <strong>tidak</strong> menyimpan detail kartu kredit/debit
                    secara penuh, pemrosesan dilakukan oleh Payment Gateway terpercaya).</li>
            </ul>

            <h3>3. Penggunaan Informasi</h3>
            <p>Informasi yang kami kumpulkan digunakan untuk:</p>
            <ul>
                <li>Memproses dan memverifikasi donasi Anda.</li>
                <li>Mengirimkan bukti donasi dan laporan penyaluran dana.</li>
                <li>Menghubungi Anda terkait layanan atau kampanye kemanusiaan (jika Anda setuju).</li>
                <li>Meningkatkan kualitas layanan situs web kami.</li>
            </ul>

            <h3>4. Keamanan Data</h3>
            <p>Kami menerapkan langkah-langkah keamanan teknis dan organisasi yang sesuai untuk melindungi data pribadi
                Anda dari akses yang tidak sah, perubahan, pengungkapan, atau penghancuran.</p>

            <h3>5. Hak Anda</h3>
            <p>Anda berhak untuk meminta akses, koreksi, atau penghapusan data pribadi Anda yang kami simpan. Silakan
                hubungi kami melalui halaman <a href="{{ route('kontak') }}">Kontak</a> jika Anda memiliki permintaan tersebut.
            </p>
        </div>
    </main>

    <!-- Footer -->
@endsection
