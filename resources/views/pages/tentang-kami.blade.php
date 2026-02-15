@extends('layouts.app')

@section('title', 'Tentang Kami - Lazismu Lengkong')

@section('content')
{{-- Page Header --}}
<section class="relative bg-dark-500 pt-40 pb-20 overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?w=1600')"></div>
    <div class="relative container mx-auto px-5 max-w-[1200px] text-center">
        <span class="inline-block px-4 py-2 bg-primary-500/20 text-primary-300 rounded-full text-sm font-semibold mb-4 border border-primary-500/30">PROFIL LEMBAGA</span>
        <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">Tentang Kami</h1>
        <p class="text-white/70 max-w-lg mx-auto">Mengenal lebih dekat Lazismu Lengkong dan perjuangannya</p>
    </div>
</section>

{{-- Trust Cards --}}
<section id="tentang" class="py-20 bg-white" data-aos="fade-up">
    <div class="container mx-auto px-5 max-w-[1200px]">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
            <div class="bg-gradient-to-br from-dark-500 to-[#2d2d4e] rounded-2xl p-8 text-white">
                <div class="w-14 h-14 bg-primary-500/20 rounded-2xl flex items-center justify-center mb-6"><i class="fas fa-landmark text-primary-500 text-xl"></i></div>
                <span class="px-3 py-1 bg-primary-500/20 text-primary-300 text-xs font-bold rounded-full">Akar Sejarah</span>
                <h3 class="text-xl font-bold mt-4 mb-3">LKSA Taman Harapan</h3>
                <ul class="space-y-2 text-white/70 text-sm">
                    <li class="flex items-start gap-2"><i class="fas fa-check text-primary-500 mt-1"></i> Berdiri sejak era awal Muhammadiyah di Lengkong</li>
                    <li class="flex items-start gap-2"><i class="fas fa-check text-primary-500 mt-1"></i> Mengelola panti asuhan dan pemberdayaan dhuafa</li>
                    <li class="flex items-start gap-2"><i class="fas fa-check text-primary-500 mt-1"></i> Menjadi cikal bakal kantor layanan Lazismu</li>
                </ul>
            </div>
            <div class="bg-white rounded-2xl border border-gray-100 shadow-card p-8">
                <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center mb-6"><i class="fas fa-graduation-cap text-blue-500 text-xl"></i></div>
                <h3 class="text-xl font-bold text-dark-500 mb-3">Pendidikan Terintegrasi</h3>
                <ul class="space-y-2 text-gray-600 text-sm">
                    <li class="flex items-start gap-2"><i class="fas fa-check text-secondary-500 mt-1"></i> Beasiswa Sang Surya untuk pelajar berprestasi</li>
                    <li class="flex items-start gap-2"><i class="fas fa-check text-secondary-500 mt-1"></i> Pembinaan al-Quran dan tahfidz</li>
                    <li class="flex items-start gap-2"><i class="fas fa-check text-secondary-500 mt-1"></i> Pelatihan life skill anak panti</li>
                </ul>
            </div>
            <div class="bg-white rounded-2xl border border-gray-100 shadow-card p-8">
                <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center mb-6"><i class="fas fa-mosque text-green-500 text-xl"></i></div>
                <h3 class="text-xl font-bold text-dark-500 mb-3">Dakwah Sosial</h3>
                <ul class="space-y-2 text-gray-600 text-sm">
                    <li class="flex items-start gap-2"><i class="fas fa-check text-secondary-500 mt-1"></i> Program bantuan modal usaha mustahik</li>
                    <li class="flex items-start gap-2"><i class="fas fa-check text-secondary-500 mt-1"></i> Layanan ambulans gratis</li>
                    <li class="flex items-start gap-2"><i class="fas fa-check text-secondary-500 mt-1"></i> Santunan rutin & tanggap bencana</li>
                </ul>
            </div>
        </div>

        {{-- Trust Badges --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
            <div class="flex flex-col items-center text-center gap-3 p-4">
                <div class="w-14 h-14 bg-gray-100 rounded-2xl flex items-center justify-center"><i class="fas fa-certificate text-gray-400 text-xl"></i></div>
                <span class="text-sm font-medium text-gray-600">Terdaftar Kemenag</span>
            </div>
            <div class="flex flex-col items-center text-center gap-3 p-4">
                <div class="w-14 h-14 bg-gray-100 rounded-2xl flex items-center justify-center"><i class="fas fa-shield-alt text-gray-400 text-xl"></i></div>
                <span class="text-sm font-medium text-gray-600">Audit Syariah</span>
            </div>
            <div class="flex flex-col items-center text-center gap-3 p-4">
                <div class="w-14 h-14 bg-gray-100 rounded-2xl flex items-center justify-center"><i class="fas fa-chart-bar text-gray-400 text-xl"></i></div>
                <span class="text-sm font-medium text-gray-600">Laporan Transparan</span>
            </div>
            <div class="flex flex-col items-center text-center gap-3 p-4">
                <div class="w-14 h-14 bg-gray-100 rounded-2xl flex items-center justify-center"><i class="fas fa-users text-gray-400 text-xl"></i></div>
                <span class="text-sm font-medium text-gray-600">Persyarikatan Muhammadiyah</span>
            </div>
        </div>

        {{-- Visi Misi --}}
        <div class="grid md:grid-cols-2 gap-6">
            <div class="bg-gradient-to-br from-primary-500 to-accent-500 rounded-2xl p-8 text-white">
                <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center mb-6"><i class="fas fa-eye text-white text-xl"></i></div>
                <h3 class="text-xl font-bold mb-4">Visi</h3>
                <p class="text-white/90 leading-relaxed">Menjadi lembaga amil zakat yang amanah, profesional, dan memberikan dampak nyata bagi kesejahteraan umat di Kecamatan Lengkong dan sekitarnya.</p>
            </div>
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-8 text-white">
                <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center mb-6"><i class="fas fa-bullseye text-white text-xl"></i></div>
                <h3 class="text-xl font-bold mb-4">Misi</h3>
                <ul class="space-y-3 text-white/90">
                    <li class="flex items-start gap-2"><span class="w-6 h-6 bg-white/20 rounded-full flex items-center justify-center text-xs shrink-0">1</span> Menghimpun dan menyalurkan dana ZISKA secara akuntabel</li>
                    <li class="flex items-start gap-2"><span class="w-6 h-6 bg-white/20 rounded-full flex items-center justify-center text-xs shrink-0">2</span> Memberdayakan mustahik menjadi muzakki</li>
                    <li class="flex items-start gap-2"><span class="w-6 h-6 bg-white/20 rounded-full flex items-center justify-center text-xs shrink-0">3</span> Mengembangkan programfilantropi berbasis syariah dan data</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
