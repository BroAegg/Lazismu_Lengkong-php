@extends('layouts.app')

@section('title', 'Syarat & Ketentuan - Lazismu Lengkong')

@section('content')
<!-- Page Header -->
    <header class="bg-[#1A1A2E] pt-36 pb-24 text-white relative overflow-hidden">
        <div
            class="absolute top-0 right-0 w-96 h-96 bg-primary/10 rounded-full blur-3xl -mr-32 -mt-32 pointer-events-none">
        </div>
        <div class="container mx-auto px-5 relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Syarat & Ketentuan</h1>
            <p class="text-lg text-gray-400 max-w-2xl mx-auto">Ketentuan penggunaan platform digital Lazismu Lengkong.
            </p>
        </div>
    </header>

    <!-- Content -->
    <main class="container mx-auto px-5 relative z-20 mb-20 -mt-16">
        <div
            class="bg-white rounded-2xl shadow-xl p-8 md:p-12 max-w-4xl mx-auto prose prose-lg prose-orange text-gray-600">
            <h3>1. Ketentuan Umum</h3>
            <p>Dengan mengakses atau menggunakan situs web Lazismu Lengkong, Anda setuju untuk terikat oleh Syarat dan
                Ketentuan ini. Jika Anda tidak setuju dengan bagian mana pun dari ketentuan ini, Anda tidak
                diperkenankan menggunakan layanan kami.</p>

            <h3>2. Layanan Donasi</h3>
            <p>Lazismu Lengkong menyediakan platform untuk memudahkan penyaluran Zakat, Infaq, Shadaqah, dan Wakaf
                (ZISWAF). Kami menjamin bahwa setiap dana yang masuk akan dikelola dan disalurkan sesuai dengan syariat
                Islam dan peraturan perundang-undangan yang berlaku di Indonesia.</p>

            <h3>3. Akun Pengguna</h3>
            <p>Untuk fitur tertentu, Anda mungkin perlu mendaftar akun. Anda bertanggung jawab untuk menjaga kerahasiaan
                informasi akun dan password Anda. Lazismu Lengkong tidak bertanggung jawab atas kerugian yang timbul
                akibat penyalahgunaan akun Anda oleh pihak lain.</p>

            <h3>4. Kebijakan Pengembalian Dana (Refund)</h3>
            <p>Secara umum, donasi yang telah disalurkan bersifat final dan tidak dapat dikembalikan (non-refundable),
                karena akad donasi (hibah/sedekah) telah terjadi seketika saat transaksi berhasil. Namun, jika terjadi
                kesalahan teknis (misal: double transfer), harap hubungi layanan pelanggan kami dalam waktu 2x24 jam.
            </p>

            <h3>5. Perubahan Ketentuan</h3>
            <p>Lazismu Lengkong berhak untuk mengubah syarat dan ketentuan ini sewaktu-waktu. Perubahan akan berlaku
                efektif segera setelah diposting di halaman ini.</p>
        </div>
    </main>

    <!-- Footer -->
@endsection
