@extends('layouts.app')
@section('title', 'Kebijakan Privasi - Lazismu Lengkong')
@section('content')
<section class="relative bg-dark-500 pt-40 pb-20"><div class="relative container mx-auto px-5 max-w-[1200px] text-center"><h1 class="text-3xl md:text-5xl font-bold text-white mb-4">Kebijakan Privasi</h1><p class="text-white/70">Terakhir diperbarui: {{ now()->translatedFormat('d F Y') }}</p></div></section>
<section class="py-20 bg-white">
    <div class="container mx-auto px-5 max-w-[800px] prose prose-sm max-w-none text-gray-600">
        <h2>1. Informasi yang Kami Kumpulkan</h2>
        <p>Kami mengumpulkan informasi yang Anda berikan secara langsung saat mendaftar, berdonasi, atau menghubungi kami, termasuk nama, email, nomor telepon, dan alamat.</p>
        <h2>2. Penggunaan Informasi</h2>
        <p>Informasi Anda digunakan untuk memproses donasi, mengirimkan kuitansi, laporan penyaluran, dan komunikasi terkait program.</p>
        <h2>3. Keamanan Data</h2>
        <p>Kami menerapkan langkah-langkah keamanan teknis dan organisasi untuk melindungi data pribadi Anda dari akses tidak sah.</p>
        <h2>4. Hak Anda</h2>
        <p>Anda berhak mengakses, memperbarui, atau menghapus data pribadi Anda melalui halaman Pengaturan Akun atau menghubungi kami.</p>
        <h2>5. Kontak</h2>
        <p>Jika ada pertanyaan terkait privasi, silakan hubungi kami di <a href="mailto:sapa@lazismulengkong.org">sapa@lazismulengkong.org</a>.</p>
    </div>
</section>
@endsection
