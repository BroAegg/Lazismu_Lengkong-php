# 📖 Panduan Pengguna - LAZISMU Lengkong

Panduan lengkap untuk donatur menggunakan sistem donasi online LAZISMU Lengkong.

---

## 📋 Daftar Isi

- [Cara Berdonasi](#cara-berdonasi)
- [Mendaftar Akun](#mendaftar-akun)
- [Login ke Dashboard](#login-ke-dashboard)
- [Melihat Riwayat Donasi](#melihat-riwayat-donasi)
- [Program Donasi](#program-donasi)
- [FAQ](#faq)

---

## 💰 Cara Berdonasi

### Donasi Tanpa Login (Guest)

Anda dapat berdonasi **tanpa perlu membuat akun** terlebih dahulu.

#### Langkah-langkah:

1. **Buka halaman donasi**
   - Kunjungi: `https://lazismu-lengkong.org/donasi`
   - Atau klik tombol **"Donasi Sekarang"** di homepage

2. **Pilih jenis donasi**
   - **Zakat Mal** - Zakat harta kekayaan
   - **Zakat Fitrah** - Zakat bulan Ramadhan
   - **Zakat Penghasilan** - Zakat dari gaji/pendapatan
   - **Infaq/Sedekah** - Infaq untuk berbagai kebutuhan
   - **Wakaf Produktif** - Wakaf yang produktif

3. **Pilih kategori detail (opsional)**
   - Setiap jenis donasi memiliki sub-kategori
   - Contoh Zakat Mal: Emas/Perak, Perdagangan, Pertanian, dll.
   - Contoh Infaq: Pendidikan, Kesehatan, Ekonomi, dll.

4. **Pilih program (opsional)**
   - Jika ingin menyalurkan ke program tertentu
   - Lihat daftar program aktif dengan target dan progress
   - Atau pilih **"Tidak ada (Dana Bebas)"** untuk dana umum

5. **Isi data donatur**
   ```
   Nama Lengkap    : [nama Anda]
   Email           : [email untuk invoice]
   No. HP          : [nomor WhatsApp aktif]
   ```

6. **Masukkan nominal**
   - Minimal: Rp 10.000
   - Masukkan jumlah yang ingin didonasikan
   - Sistem akan menghitung otomatis:
     - **Amil (untuk Zakat)**: 12.5% (maksimal sesuai syariah)
     - **Amil (selain Zakat)**: 0%
     - **Jumlah Bersih**: yang akan disalurkan ke mustahik

7. **Pilih metode pembayaran**
   - Transfer Bank
   - QRIS (coming soon)
   - E-Wallet (coming soon)

8. **Klik "Donasi Sekarang"**
   - Sistem akan generate **invoice unik**: `LZM-20260216-0001`
   - Anda akan diarahkan ke halaman sukses

9. **Halaman Sukses**
   - Catat nomor invoice Anda
   - Lihat detail donasi (nama, nominal, metode pembayaran)
   - Instruksi transfer bank ditampilkan
   - Screenshoot atau simpan invoice

10. **Transfer pembayaran**
    - Transfer sesuai nominal ke rekening yang tertera
    - Upload bukti transfer (coming soon)

11. **Konfirmasi (opsional)**
    - WhatsApp ke: 0812-3456-7890
    - Format: `Invoice: LZM-20260216-0001 sudah transfer`

---

## 📝 Mendaftar Akun

Dengan mendaftar, Anda dapat:
- ✅ Melihat riwayat donasi
- ✅ Download invoice kapan saja
- ✅ Tracking status verifikasi
- ✅ Melihat program yang didukung

#### Langkah Registrasi:

1. **Buka halaman register**
   - Kunjungi: `https://lazismu-lengkong.org/register`
   - Atau klik **"Daftar"** di halaman login

2. **Isi form registrasi**
   ```
   Nama Lengkap    : [nama sesuai KTP]
   Email           : [email valid untuk login]
   No. HP          : [08xx-xxxx-xxxx]
   Password        : [minimal 8 karakter]
   Konfirmasi Pass : [ulangi password]
   ```

3. **Klik "Daftar"**
   - Sistem akan membuat akun dengan role **DONATUR**
   - Anda langsung login otomatis

4. **Lengkapi profil**
   - Masuk ke menu **"Profil"**
   - Tambahkan alamat lengkap
   - Upload foto profil (opsional)

---

## 🔐 Login ke Dashboard

#### Langkah Login:

1. **Buka halaman login**
   - Kunjungi: `https://lazismu-lengkong.org/login`

2. **Masukkan kredensial**
   ```
   Email/No. HP : [email atau nomor HP Anda]
   Password     : [password saat daftar]
   ```

3. **Centang "Ingat Saya"** (opsional)
   - Agar tidak perlu login berulang

4. **Klik "Masuk"**

5. **Dashboard tampil**
   - Lihat statistik donasi Anda
   - Riwayat donasi terbaru
   - Program yang didukung

---

## 📊 Melihat Riwayat Donasi

Setelah login, Anda dapat melihat semua donasi yang pernah dilakukan.

#### Fitur Dashboard:

### 1. Statistik Personal

```
┌─────────────────────────────────────┐
│  📊 Total Donasi Anda               │
│  Rp 5.000.000                       │
└─────────────────────────────────────┘

┌─────────────────────────────────────┐
│  🎯 Program yang Didukung           │
│  3 Program                          │
└─────────────────────────────────────┘

┌─────────────────────────────────────┐
│  📝 Total Transaksi                 │
│  12 Donasi                          │
└─────────────────────────────────────┘
```

### 2. Riwayat Donasi Terbaru

Tabel riwayat 5 donasi terakhir:

| Tanggal | Kategori | Jumlah | Status | Aksi |
|---------|----------|--------|--------|------|
| 15 Feb 2026 | Zakat Mal | Rp 1.000.000 | ✅ Verified | Detail |
| 10 Feb 2026 | Infaq Pendidikan | Rp 500.000 | ⏳ Pending | Detail |
| 05 Feb 2026 | Wakaf | Rp 2.000.000 | ✅ Verified | Detail |

**Status Badge:**
- 🟢 **Verified** - Donasi sudah diverifikasi dan akan disalurkan
- 🟡 **Pending** - Menunggu verifikasi admin
- 🔴 **Rejected** - Ditolak (lihat catatan untuk alasan)

### 3. Program yang Didukung

Grid program yang pernah Anda dukung:

```
┌────────────────────────────────────┐
│  Beasiswa Anak Yatim               │
│  Target: Rp 150.000.000            │
│  Terkumpul: Rp 95.000.000          │
│  ████████████░░░░░░░ 63%           │
│  Donasi Anda: Rp 1.000.000         │
└────────────────────────────────────┘
```

---

## 🎯 Program Donasi

### Melihat Daftar Program

1. **Buka halaman program**
   - Kunjungi: `https://lazismu-lengkong.org/program`

2. **Daftar program ditampilkan**
   - Card program dengan foto
   - Progress bar pencapaian
   - Target dan terkumpul
   - Jumlah donatur

3. **Klik "Lihat Detail"** untuk info lengkap

### Detail Program

Halaman detail program menampilkan:

- **Banner Program** - Foto/gambar program
- **Judul & Deskripsi** - Penjelasan lengkap program
- **Pillar** - Kategori program (5M Muhammadiyah)
- **Target Dana** - Jumlah yang dibutuhkan
- **Terkumpul** - Dana yang sudah masuk
- **Progress Bar** - Visual persentase pencapaian
- **Jumlah Donatur** - Berapa orang sudah berdonasi
- **Periode** - Tanggal mulai - tanggal akhir
- **Tombol Donasi** - Langsung donasi ke program ini

### Pilar Program (5M Muhammadiyah)

| Icon | Pilar | Contoh Program |
|------|-------|----------------|
| 💼 | **Ekonomi** | UMKM, Modal Usaha, Pelatihan Wirausaha |
| 📚 | **Pendidikan** | Beasiswa, Sekolah, Perpustakaan |
| ⚕️ | **Kesehatan** | Klinik Gratis, Bantuan Medis, Ambulans |
| 🤲 | **Kemanusiaan** | Bencana Alam, Bantuan Darurat |
| 🕌 | **Dakwah** | Masjid, Kajian, Buku Islami |

---

## ❓ FAQ (Frequently Asked Questions)

### Umum

**Q: Apakah harus punya akun untuk berdonasi?**  
A: Tidak. Anda bisa berdonasi sebagai guest tanpa registrasi. Namun dengan akun, Anda bisa tracking riwayat donasi.

**Q: Berapa minimal donasi?**  
A: Minimal donasi adalah **Rp 10.000**.

**Q: Apakah ada biaya admin?**  
A: Tidak ada biaya admin. Untuk zakat, amil 12.5% sudah sesuai syariah (maksimal 1/8).

**Q: Donasi saya untuk apa saja?**  
A: Tergantung jenis:
- **Zakat** → Disalurkan ke 8 asnaf (fakir, miskin, dll)
- **Infaq/Sedekah** → Untuk program yang dipilih atau dana bebas
- **Wakaf** → Aset produktif jangka panjang

### Pembayaran

**Q: Metode pembayaran apa saja yang tersedia?**  
A: Saat ini tersedia:
- Transfer Bank (BCA, Mandiri, BNI, BSI)
- QRIS (segera hadir)
- E-Wallet (segera hadir)

**Q: Berapa lama verifikasi donasi?**  
A: Maksimal 1x24 jam setelah konfirmasi transfer.

**Q: Invoice saya hilang, bagaimana?**  
A: 
- Login ke dashboard → lihat riwayat donasi
- Atau hubungi WhatsApp: 0812-3456-7890

**Q: Bisa bayar tunai di kantor?**  
A: Bisa. Kunjungi kantor LAZISMU Lengkong di:
```
Jl. Lengkong Besar No. 25
Kecamatan Lengkong, Kota Bandung
Buka: Senin - Jumat, 08.00 - 16.00 WIB
```

### Zakat

**Q: Berapa nisab zakat mal?**  
A: Nisab zakat mal setara **85 gram emas**. Jika harta Anda mencapai nisab dan sudah 1 tahun (haul), wajib zakat 2.5%.

**Q: Bagaimana hitung zakat penghasilan?**  
A: 2.5% dari penghasilan bersih per bulan. Nisab: Rp 6.000.000/bulan (setara 85 gram emas).

**Q: Kapan bayar zakat fitrah?**  
A: Mulai awal Ramadhan hingga sebelum shalat Idul Fitri. Besaran: 3.5 liter beras atau setara uang.

### Program

**Q: Bisa pilih program tertentu?**  
A: Ya, saat donasi pilih program dari dropdown. Atau pilih "Tidak ada (Dana Bebas)" untuk dana umum.

**Q: Apakah ada laporan penyaluran?**  
A: Ya, laporan penyaluran dipublikasikan setiap bulan di website dan media sosial.

**Q: Program sudah mencapai target, kemana dana saya?**  
A: Dana akan dialihkan ke program sejenis atau dana bebas sesuai kebijakan syariah.

### Akun

**Q: Lupa password?**  
A: Klik **"Lupa Password?"** di halaman login → masukkan email → ikuti instruksi reset.

**Q: Ganti email/nomor HP?**  
A: Login → Profil → Edit Profil → Update data → Simpan.

**Q: Hapus akun?**  
A: Hubungi admin via email: admin@lazismulengkong.org

---

## 📞 Kontak & Bantuan

### Kantor LAZISMU Lengkong

```
📍 Alamat:
Jl. Lengkong Besar No. 25
Kecamatan Lengkong, Kota Bandung 40261

📞 Telepon:
(022) 123-4567

📱 WhatsApp:
0812-3456-7890

✉️ Email:
info@lazismulengkong.org

🕐 Jam Operasional:
Senin - Jumat: 08.00 - 16.00 WIB
Sabtu: 08.00 - 12.00 WIB
Minggu & Libur: Tutup
```

### Media Sosial

- Instagram: [@lazismulengkong](https://instagram.com/lazismulengkong)
- Facebook: [LAZISMU Lengkong](https://facebook.com/lazismulengkong)
- YouTube: [LAZISMU Lengkong](https://youtube.com/@lazismulengkong)
- TikTok: [@lazismulengkong](https://tiktok.com/@lazismulengkong)

---

## 🙏 Semoga Berkah

Terima kasih telah mempercayai **LAZISMU Lengkong** sebagai mitra penyaluran zakat, infaq, sedekah, dan wakaf Anda.

> **"Perumpamaan (nafkah yang dikeluarkan oleh) orang-orang yang menafkahkan hartanya di jalan Allah adalah serupa dengan sebutir benih yang menumbuhkan tujuh bulir, pada tiap-tiap bulir seratus biji. Allah melipat gandakan (ganjaran) bagi siapa yang Dia kehendaki. Dan Allah Maha Luas (karunia-Nya) lagi Maha Mengetahui."**  
> — QS. Al-Baqarah: 261

---

**Last Updated:** Februari 2026  
**Version:** 1.0.0
