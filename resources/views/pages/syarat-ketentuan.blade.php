@extends('layouts.app')
@section('title', 'Syarat & Ketentuan - Lazismu Lengkong')
@section('content')
<section class="relative bg-dark-500 pt-40 pb-20"><div class="relative container mx-auto px-5 max-w-[1200px] text-center"><h1 class="text-3xl md:text-5xl font-bold text-white mb-4">Syarat & Ketentuan</h1><p class="text-white/70">Terakhir diperbarui: {{ now()->translatedFormat('d F Y') }}</p></div></section>
<section class="py-20 bg-white">
    <div class="container mx-auto px-5 max-w-[800px] prose prose-sm max-w-none text-gray-600">
        <h2>1. Ketentuan Umum</h2>
        <p>Dengan menggunakan layanan Lazismu Lengkong, Anda menyetujui syarat dan ketentuan yang berlaku. Layanan ini diperuntukkan bagi pengguna yang berusia minimal 17 tahun.</p>
        <h2>2. Donasi</h2>
        <p>Setiap donasi yang masuk akan diverifikasi oleh tim administrasi. Donasi yang telah diverifikasi tidak dapat dibatalkan kecuali dalam kondisi tertentu yang disetujui oleh pihak pengelola.</p>
        <h2>3. Penyaluran Dana</h2>
        <p>Dana disalurkan sesuai kategori yang dipilih donatur dan ketentuan syariah yang berlaku. Laporan penyaluran dapat diakses secara transparan melalui platform.</p>
        <h2>4. Akun Pengguna</h2>
        <p>Pengguna bertanggung jawab atas keamanan akun dan password mereka. Segera laporkan jika terjadi aktivitas mencurigakan.</p>
        <h2>5. Perubahan Ketentuan</h2>
        <p>Lazismu Lengkong berhak mengubah syarat dan ketentuan ini sewaktu-waktu dengan pemberitahuan melalui platform.</p>
    </div>
</section>
@endsection
