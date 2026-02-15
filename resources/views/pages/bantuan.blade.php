@extends('layouts.app')
@section('title', 'Bantuan - Lazismu Lengkong')
@section('content')
<section class="relative bg-dark-500 pt-40 pb-20"><div class="relative container mx-auto px-5 max-w-[1200px] text-center"><h1 class="text-3xl md:text-5xl font-bold text-white mb-4">Pusat Bantuan</h1><p class="text-white/70">Temukan jawaban atas pertanyaan Anda</p></div></section>
<section class="py-20 bg-white">
    <div class="container mx-auto px-5 max-w-[800px]">
        <div x-data="{ open: null }" class="space-y-3">
            @foreach([
                ['Bagaimana cara berdonasi?', 'Pilih program atau kategori donasi, masukkan nominal, pilih metode pembayaran, lalu lanjutkan pembayaran. Anda bisa berdonasi tanpa login, namun riwayat donasi hanya tersedia untuk pengguna terdaftar.'],
                ['Apakah donasi saya aman?', 'Ya, setiap transaksi donasi dilindungi dan diverifikasi oleh tim administrasi kami. Dana disalurkan sesuai kategori yang Anda pilih.'],
                ['Bagaimana cara menghitung zakat?', 'Gunakan fitur Kalkulator Zakat di menu utama. Masukkan data aset/penghasilan Anda dan sistem akan menghitung otomatis berdasarkan ketentuan syariah.'],
                ['Bagaimana saya mendapatkan kuitansi donasi?', 'Setelah donasi diverifikasi, Anda dapat mengunduh kuitansi pdf dari halaman dashboard > riwayat donasi.'],
                ['Siapa saja penerima manfaat?', 'Penerima manfaat (mustahik) terdiri dari 8 asnaf sesuai ketentuan syariah: fakir, miskin, amil, mualaf, riqab, gharimin, fisabilillah, dan ibnu sabil.'],
            ] as $i => [$q, $a])
            <div class="border border-gray-100 rounded-2xl overflow-hidden">
                <button @click="open = open === {{ $i }} ? null : {{ $i }}" class="w-full flex items-center justify-between p-5 text-left">
                    <span class="font-semibold text-dark-500">{{ $q }}</span>
                    <i class="fas fa-chevron-down text-gray-400 transition-transform" :class="{ 'rotate-180': open === {{ $i }} }"></i>
                </button>
                <div x-show="open === {{ $i }}" x-collapse class="px-5 pb-5 text-gray-600 text-sm leading-relaxed">{{ $a }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
