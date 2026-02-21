# 👨‍💼 Panduan Admin - LAZISMU Lengkong

Panduan lengkap untuk admin dan staff LAZISMU Lengkong dalam mengelola sistem donasi online.

> **Last Updated:** 22 Februari 2026

---

## 📋 Daftar Isi

- [Akses & Login](#akses--login)
- [Role & Permission](#role--permission)
- [Dashboard Admin](#dashboard-admin)
- [Manajemen Donasi](#manajemen-donasi)
- [Manajemen Program](#manajemen-program)
- [Manajemen User](#manajemen-user)
- [Laporan Keuangan](#laporan-keuangan)
- [Tips & Best Practices](#tips--best-practices)

---

## 🔐 Akses & Login

### URL Admin Panel

**Development:**
```
http://127.0.0.1:8000/admin/dashboard
```

**Production:**
```
https://lazismu-lengkong.org/admin/dashboard
```

### Login Admin

1. Buka `http://127.0.0.1:8000/login` (dev) atau URL production
2. Masukkan **email** kantor LAZISMU **atau nomor HP**
3. Masukkan password
4. Klik **"Masuk"** → otomatis redirect ke `/admin/dashboard`

**Catatan:** 
- Login bisa pakai **email** atau **nomor HP**
- Jika belum punya akun, hubungi Kepala Kantor atau Administrasi
- Jangan bagikan password ke pihak lain
- Ganti password secara berkala

### Default Credentials (Development Only)

> ⚠️ **WAJIB DIGANTI sebelum production!**

| Role | Email | Password |
|------|-------|----------|
| Kepala Kantor | `kepala@lazismulengkong.org` | `password` |
| Administrasi | `admin@lazismulengkong.org` | `password` |
| Fund Rising | `fundraising@lazismulengkong.org` | `password` |
| Staff Pelayanan | `pelayanan@lazismulengkong.org` | `password` |
| User/Donatur | `user@lazismulengkong.org` | `password` |

---

## 👥 Role & Permission

### 5 Level Akses

| No | Role | Akses Menu | Keterangan |
|----|------|------------|------------|
| 1️⃣ | **Kepala Kantor** | ✅ Semua | Full access semua fitur |
| 2️⃣ | **Administrasi** | ✅ Donasi, Program, Users, Laporan | Tidak bisa hapus Kepala Kantor |
| 3️⃣ | **Fund Rising** | ✅ Donasi, Program | Fokus penggalangan dana |
| 4️⃣ | **Staff Pelayanan** | ✅ Donasi, Program | Verifikasi donasi |
| 5️⃣ | **Donatur** | ❌ Tidak ada akses admin | User dashboard saja |

### Permission Matrix Detail

| Fitur | Kepala Kantor | Administrasi | Fund Rising | Staff Pelayanan |
|-------|:-------------:|:------------:|:-----------:|:---------------:|
| **Donasi** |
| - Lihat semua donasi | ✅ | ✅ | ✅ | ✅ |
| - Filter & search | ✅ | ✅ | ✅ | ✅ |
| - Verify donasi | ✅ | ✅ | ✅ | ✅ |
| - Reject donasi | ✅ | ✅ | ✅ | ✅ |
| **Program** |
| - Lihat program | ✅ | ✅ | ✅ | ✅ |
| - Tambah program | ✅ | ✅ | ✅ | ✅ |
| - Edit program | ✅ | ✅ | ✅ | ✅ |
| - Hapus program | ✅ | ✅ | ✅ | ✅ |
| - Upload gambar | ✅ | ✅ | ✅ | ✅ |
| **User Management** |
| - Lihat users | ✅ | ✅ | ❌ | ❌ |
| - Tambah user | ✅ | ✅ | ❌ | ❌ |
| - Edit user | ✅ | ✅ | ❌ | ❌ |
| - Hapus user | ✅ | ✅ | ❌ | ❌ |
| - Ubah role | ✅ | ✅ | ❌ | ❌ |
| **Laporan** |
| - Lihat laporan | ✅ | ✅ | ❌ | ❌ |
| - Export PDF | ✅ | ✅ | ❌ | ❌ |
| - Filter tanggal | ✅ | ✅ | ❌ | ❌ |

---

## 📊 Dashboard Admin

### URL: `/admin/dashboard`

Dashboard menampilkan statistik real-time dari database.

### Statistik Utama

```
┌─────────────────────────────────────┐
│  💰 TOTAL DONASI MASUK              │
│  Rp 125.450.000                     │
│  ↑ 15% dari bulan lalu              │
└─────────────────────────────────────┘

┌─────────────────────────────────────┐
│  ✅ DONASI TERVERIFIKASI             │
│  Rp 98.250.000                      │
│  156 transaksi                      │
└─────────────────────────────────────┘

┌─────────────────────────────────────┐
│  ⏳ MENUNGGU VERIFIKASI              │
│  Rp 27.200.000                      │
│  23 transaksi                       │
└─────────────────────────────────────┘

┌─────────────────────────────────────┐
│  👥 TOTAL DONATUR                    │
│  342 orang                          │
│  ↑ 28 donatur baru bulan ini        │
└─────────────────────────────────────┘
```

### Donasi Terbaru

Tabel 10 donasi terbaru yang perlu diverifikasi:

| Invoice | Donatur | Kategori | Jumlah | Status | Aksi |
|---------|---------|----------|--------|--------|------|
| LZM-20260216-0025 | Ahmad Fulan | Zakat Mal | Rp 5.000.000 | Pending | Verifikasi |
| LZM-20260216-0024 | Siti Aminah | Infaq | Rp 500.000 | Pending | Verifikasi |

---

## 💵 Manajemen Donasi

### URL: `/admin/donasi`

Halaman untuk mengelola semua donasi yang masuk.

### A. Daftar Donasi

#### Filter & Search

**Fitur filter:**
- 🔍 **Search**: Cari berdasarkan invoice atau nama donatur
- 📂 **Status**: Filter by PENDING / VERIFIED / REJECTED
- 🏷️ **Kategori**: Filter by kategori donasi

**Cara menggunakan:**
1. Ketik kata kunci di search box
2. Pilih status dari dropdown (opsional)
3. Pilih kategori dari dropdown (opsional)
4. Klik **"Filter"**
5. Klik **"Reset"** untuk clear filter

#### Tabel Donasi

Kolom yang ditampilkan:
- **Invoice**: Nomor unik donasi (LZM-YYYYMMDD-XXXX)
- **Donatur**: Nama atau email donatur
- **Kategori**: Jenis donasi (Zakat, Infaq, dll)
- **Jumlah**: Nominal donasi
- **Status**: Badge PENDING/VERIFIED/REJECTED
- **Tanggal**: Kapan donasi dibuat
- **Aksi**: Tombol "Detail"

#### Pagination

- Menampilkan 15 donasi per halaman
- Navigasi halaman di bawah tabel
- Total data ditampilkan

### B. Detail & Verifikasi Donasi

#### URL: `/admin/donasi/{id}`

Klik **"Detail"** di tabel untuk membuka halaman detail donasi.

#### Informasi Donasi

**Card Informasi:**
```
┌─────────────────────────────────────────────┐
│  Invoice: LZM-20260216-0025                 │
│  Status: ⏳ PENDING                          │
├─────────────────────────────────────────────┤
│  Donatur                                    │
│  Nama     : Ahmad Fulan                     │
│  Email    : ahmad@example.com               │
│  HP       : 0812-3456-7890                  │
├─────────────────────────────────────────────┤
│  Detail Donasi                              │
│  Kategori : Zakat Mal > Emas & Perak       │
│  Program  : Beasiswa Anak Yatim            │
│  Nominal  : Rp 5.000.000                   │
│  Amil     : Rp 625.000 (12.5%)             │
│  Bersih   : Rp 4.375.000                   │
├─────────────────────────────────────────────┤
│  Dana PSAK 109                              │
│  Jenis    : Dana Zakat                      │
│  Asnaf    : (belum disalurkan)             │
├─────────────────────────────────────────────┤
│  Pembayaran                                 │
│  Metode   : Transfer Bank                   │
│  Tanggal  : 16 Februari 2026, 10:30        │
└─────────────────────────────────────────────┘
```

#### Verifikasi Donasi

**Untuk donasi PENDING, ada 2 tombol aksi:**

##### 1. ✅ Verifikasi (Setujui)

Klik tombol hijau **"✅ Verifikasi Donasi"**

**Form yang muncul:**
```
┌─────────────────────────────────────┐
│  Catatan Verifikasi (opsional)      │
│  ┌───────────────────────────────┐  │
│  │ Contoh:                       │  │
│  │ Sudah cek mutasi rekening,    │  │
│  │ transfer masuk Rp 5.000.000   │  │
│  └───────────────────────────────┘  │
│                                     │
│  [Batalkan]  [✓ Konfirmasi]        │
└─────────────────────────────────────┘
```

**Proses verifikasi:**
1. Masukkan catatan (opsional, max 500 karakter)
2. Klik **"Konfirmasi"**
3. Sistem akan:
   - ✅ Update status → VERIFIED
   - ✅ Catat siapa yang verify (nama Anda)
   - ✅ Catat waktu verifikasi
   - ✅ Simpan catatan
   - ✅ **Otomatis update collected_amount di program** (jika ada)
   - ✅ **Otomatis increment donor_count di program**

**Notifikasi:**
```
✅ Donasi berhasil diverifikasi!
Dana akan segera disalurkan sesuai asnaf/program.
```

##### 2. ❌ Tolak (Reject)

Klik tombol merah **"❌ Tolak Donasi"**

**Form yang muncul:**
```
┌─────────────────────────────────────┐
│  Alasan Penolakan (wajib diisi) *   │
│  ┌───────────────────────────────┐  │
│  │ Contoh:                       │  │
│  │ Transfer tidak sesuai nominal │  │
│  │ atau bukti transfer tidak     │  │
│  │ valid                         │  │
│  └───────────────────────────────┘  │
│                                     │
│  [Batalkan]  [✗ Tolak Donasi]      │
└─────────────────────────────────────┘
```

**Proses reject:**
1. **WAJIB** masukkan alasan penolakan
2. Klik **"Tolak Donasi"**
3. Sistem akan:
   - ❌ Update status → REJECTED
   - ❌ Catat siapa yang reject
   - ❌ Catat waktu reject
   - ❌ Simpan alasan
   - ❌ **TIDAK** update program stats

**Validasi:**
- ⚠️ Catatan/alasan WAJIB diisi (minimal 10 karakter)
- ⚠️ Donasi yang sudah VERIFIED tidak bisa di-reject
- ⚠️ Konfirmasi double-check sebelum reject

**Notifikasi:**
```
✅ Donasi berhasil ditolak.
Alasan penolakan telah dicatat.
```

#### Tips Verifikasi

✅ **DO (Lakukan):**
- Cek mutasi rekening sebelum verify
- Cocokkan nominal transfer dengan invoice
- Tulis catatan untuk transparansi
- Verifikasi maksimal 1x24 jam setelah transfer

❌ **DON'T (Jangan):**
- Verifikasi tanpa cek mutasi
- Reject tanpa alasan jelas
- Reject donasi yang sudah verified
- Lupa konfirmasi ke donatur via WhatsApp

---

## 🎯 Manajemen Program

### URL: `/admin/program`

Mengelola program donasi/penggalangan dana.

### A. Daftar Program

Tabel menampilkan:
- **Judul Program**
- **Pillar** (Ekonomi, Pendidikan, Kesehatan, dll)
- **Target** - Dana yang dibutuhkan
- **Terkumpul** - Dana yang sudah masuk
- **Progress** - Persentase pencapaian
- **Status** - Aktif/Nonaktif
- **Aksi** - Edit / Hapus

### B. Tambah Program Baru

Klik tombol **"+ Tambah Program"**

#### Form Input:

```
1. Judul Program *
   ┌─────────────────────────────────────┐
   │ Beasiswa Anak Yatim 2026            │
   └─────────────────────────────────────┘
   Contoh: Bantuan Korban Bencana Alam

2. Slug (otomatis dari judul)
   beasiswa-anak-yatim-2026
   
3. Deskripsi Singkat *
   ┌─────────────────────────────────────┐
   │ Program beasiswa pendidikan untuk   │
   │ anak yatim dari keluarga kurang     │
   │ mampu di wilayah Lengkong.          │
   └─────────────────────────────────────┘

4. Deskripsi Lengkap
   ┌─────────────────────────────────────┐
   │ [Rich Text Editor]                  │
   │ - Latar belakang program            │
   │ - Target penerima manfaat           │
   │ - Rincian penggunaan dana           │
   └─────────────────────────────────────┘

5. Pillar *
   [Dropdown]
   ○ Ekonomi
   ● Pendidikan
   ○ Kesehatan
   ○ Kemanusiaan
   ○ Dakwah
   ○ Lingkungan

6. Target Dana *
   Rp ┌──────────────┐
      │ 150000000    │
      └──────────────┘
   Format: tanpa titik/koma, angka saja

7. Tanggal Mulai *
   ┌──────────────┐
   │ 2026-02-16   │
   └──────────────┘

8. Tanggal Akhir *
   ┌──────────────┐
   │ 2026-12-31   │
   └──────────────┘
   Harus setelah tanggal mulai

9. Upload Gambar *
   [Choose File] beasiswa.jpg
   Max: 2MB, Format: JPG/PNG

10. Status
    ☑ Aktif
    ☐ Featured (tampil di homepage)

11. Zona Donatur
    [Dropdown]
    ○ Lengkong
    ○ Bandung
    ○ Jawa Barat
    ● Indonesia
```

Klik **"Simpan Program"**

#### Validasi:
- Judul: wajib, max 255 karakter
- Target: wajib, minimal Rp 1.000.000
- Tanggal akhir harus > tanggal mulai
- Gambar: wajib, max 2MB

**Notifikasi:**
```
✅ Program berhasil ditambahkan!
Program akan tampil di halaman /program
```

### C. Edit Program

Klik **"Edit"** di tabel program.

**Form sama seperti tambah program**, tapi:
- Data sudah terisi
- Gambar tidak wajib (kecuali mau ganti)
- Collected amount & donor count **READ-ONLY** (otomatis dari donasi)

**Notifikasi:**
```
✅ Program berhasil diperbarui!
```

### D. Hapus Program

Klik **"Hapus"** → Konfirmasi popup.

**Konfirmasi:**
```
⚠️ Yakin hapus program ini?
Program: Beasiswa Anak Yatim 2026
Target: Rp 150.000.000
Terkumpul: Rp 95.000.000

Donasi yang sudah masuk tidak akan terhapus.

[Batal] [Hapus]
```

**Catatan:**
- Program terhapus dari database
- Donasi yang linked ke program **TETAP ADA**
- Relasi di `donation_program` tetap tersimpan untuk histori

---

## 👤 Manajemen User

### URL: `/admin/users`

**⚠️ Akses Terbatas:** Hanya **Kepala Kantor** dan **Administrasi**

### A. Daftar User

Tabel menampilkan:
- **Nama Lengkap**
- **Email**
- **No. HP**
- **Role**
- **Status** (Aktif/Nonaktif)
- **Terakhir Login**
- **Aksi** - Edit / Hapus

### B. Tambah User Baru

Klik **"+ Tambah User"**

#### Form Input:

```
1. Nama Lengkap *
   ┌─────────────────────────────────────┐
   │ Budi Santoso                        │
   └─────────────────────────────────────┘

2. Email *
   ┌─────────────────────────────────────┐
   │ budi@lazismulengkong.org            │
   └─────────────────────────────────────┘
   Harus unique, belum terdaftar

3. No. HP *
   ┌─────────────────────────────────────┐
   │ 0812-3456-7890                      │
   └─────────────────────────────────────┘
   Format: 08xx-xxxx-xxxx

4. Password *
   ┌─────────────────────────────────────┐
   │ ••••••••                            │
   └─────────────────────────────────────┘
   Minimal 8 karakter

5. Role *
   [Dropdown]
   ○ Donatur
   ○ Staff Pelayanan
   ● Fund Rising
   ○ Administrasi
   ○ Kepala Kantor

6. Status
   ☑ Aktif
```

Klik **"Simpan User"**

**Notifikasi:**
```
✅ User berhasil ditambahkan!
Login credentials dikirim via email.
```

### C. Edit User

Klik **"Edit"** di tabel user.

**Form sama seperti tambah**, tapi:
- Password **tidak wajib** (kosongkan jika tidak ubah)
- Email & HP bisa diubah (validasi unique)

**Khusus Role:**
- ⚠️ Tidak bisa edit role sendiri
- ⚠️ Administrasi tidak bisa ubah role Kepala Kantor

### D. Hapus User

Klik **"Hapus"** → Konfirmasi.

**Validasi:**
- ⚠️ Tidak bisa hapus akun sendiri
- ⚠️ Administrasi tidak bisa hapus Kepala Kantor
- ⚠️ Konfirmasi double-check

**Konfirmasi:**
```
⚠️ Yakin hapus user ini?
Nama: Budi Santoso
Email: budi@lazismulengkong.org
Role: Fund Rising

Data donasi user tidak akan terhapus.

[Batal] [Hapus]
```

---

## 📈 Laporan Keuangan

### URL: `/admin/laporan`

**⚠️ Akses Terbatas:** Hanya **Kepala Kantor** dan **Administrasi**

### A. Laporan PSAK 109

Standar akuntansi untuk Lembaga Amil Zakat sesuai **PSAK 109**.

#### Filter Periode

```
Tanggal Mulai:  ┌──────────────┐  
                │ 2026-01-01   │
                └──────────────┘

Tanggal Akhir:  ┌──────────────┐
                │ 2026-02-16   │
                └──────────────┘

[Filter] [Export PDF]
```

#### Laporan Penghimpunan

**Per Jenis Dana (6 Fund Types):**

| Jenis Dana | Jumlah Donasi | Total Gross | Total Amil | Total Bersih |
|------------|:-------------:|------------:|-----------:|-------------:|
| **Dana Zakat** | 45 | Rp 125.000.000 | Rp 15.625.000 | Rp 109.375.000 |
| **Dana Infaq/Sedekah** | 78 | Rp 89.500.000 | Rp 0 | Rp 89.500.000 |
| **Dana Wakaf** | 12 | Rp 45.000.000 | Rp 0 | Rp 45.000.000 |
| **Dana Amil** | - | Rp 15.625.000 | - | - |
| **Dana Non-Halal** | 0 | Rp 0 | Rp 0 | Rp 0 |
| **DSKL** | 2 | Rp 5.000.000 | Rp 0 | Rp 5.000.000 |
| **TOTAL** | **137** | **Rp 264.500.000** | **Rp 15.625.000** | **Rp 248.875.000** |

#### Laporan Penyaluran

**Per Asnaf (8 Categories):**

| Asnaf | Jumlah Penyaluran | Total Disalurkan |
|-------|:-----------------:|-----------------:|
| Fakir | 23 | Rp 45.000.000 |
| Miskin | 34 | Rp 67.500.000 |
| Amil | 7 | Rp 15.625.000 |
| Mualaf | 2 | Rp 3.000.000 |
| Riqab | 0 | Rp 0 |
| Gharim | 5 | Rp 8.500.000 |
| Fisabilillah | 12 | Rp 23.000.000 |
| Ibnu Sabil | 3 | Rp 4.500.000 |
| **TOTAL** | **86** | **Rp 167.125.000** |

#### Saldo Dana

```
Total Penghimpunan : Rp 248.875.000
Total Penyaluran   : Rp 167.125.000
──────────────────────────────────────
Saldo              : Rp 81.750.000
```

### B. Export PDF

Klik tombol **"📄 Export PDF"**

**Proses:**
1. Generate PDF menggunakan DomPDF
2. Format: A4 Portrait
3. Include:
   - Header LAZISMU Lengkong
   - Periode laporan
   - Tabel penghimpunan
   - Tabel penyaluran
   - Saldo akhir
   - Tanda tangan digital
4. Download otomatis: `laporan-lazismu-20260101-20260216.pdf`

**Penggunaan PDF:**
- Lampiran laporan bulanan
- Audit internal
- Laporan ke Kemenag
- Transparansi ke donatur

---

## 💡 Tips & Best Practices

### Untuk Semua Staff

✅ **DO:**
1. **Verifikasi cepat** - Maksimal 1x24 jam
2. **Tulis catatan** - Untuk audit trail
3. **Logout setelah selesai** - Keamanan akun
4. **Ganti password berkala** - Minimal 3 bulan sekali
5. **Konfirmasi ke donatur** - Via WhatsApp setelah verify

❌ **DON'T:**
1. Bagikan password ke orang lain
2. Verifikasi tanpa cek mutasi
3. Reject donasi tanpa alasan jelas
4. Edit data sembarangan
5. Hapus data tanpa backup

### Untuk Kepala Kantor / Administrasi

✅ **DO:**
1. **Review laporan mingguan** - Cek anomali data
2. **Backup database** - Setiap hari otomatis
3. **Monitor user activity** - Siapa login kapan
4. **Update settings** - Nisab, rekening bank
5. **Export laporan bulanan** - Untuk arsip

❌ **DON'T:**
1. Ubah role user tanpa persetujuan
2. Hapus data donasi/program yang sudah jalan
3. Lupa export laporan sebelum tutup buku
4. Abaikan donasi pending terlalu lama

### Untuk Fund Rising / Staff Pelayanan

✅ **DO:**
1. **Update program regular** - Progress dan foto
2. **Promosikan program aktif** - Media sosial
3. **Follow up donatur** - Terima kasih + update
4. **Catat feedback** - Untuk improvement
5. **Koordinasi tim** - Komunikasi internal

❌ **DON'T:**
1. Janji target yang tidak realistis
2. Upload gambar program tidak relevan
3. Lupa update collected amount
4. Abaikan pertanyaan donatur

---

## 🔒 Keamanan & Privasi

### Kebijakan Keamanan

1. **Password:**
   - Minimal 8 karakter
   - Kombinasi huruf, angka, simbol
   - Ganti setiap 3 bulan
   - Jangan gunakan password yang sama dengan akun lain

2. **Akses:**
   - Jangan login dari komputer publik
   - Logout setelah selesai
   - Jangan tinggalkan browser terbuka
   - Gunakan HTTPS (SSL)

3. **Data:**
   - Jangan bagikan data donatur ke pihak lain
   - Export laporan hanya untuk keperluan resmi
   - Simpan file sensitive di folder terenkripsi

### Jika Akun Dicurigai

**Langkah:**
1. **Segera logout** dari semua device
2. **Ganti password** immediately
3. **Hubungi Kepala Kantor** untuk investigasi
4. **Cek log aktivitas** di database
5. **Backup data** untuk forensik

---

## 📞 Support & Bantuan

### Hubungi IT Support

```
📧 Email: it@lazismulengkong.org
📱 WhatsApp: 0812-9999-9999
🕐 Jam: Senin-Jumat, 08.00-16.00 WIB
```

### Pelatihan Admin

Pelatihan rutin setiap bulan untuk:
- New features
- Best practices
- Troubleshooting
- Q&A session

---

**Last Updated:** Februari 2026  
**Version:** 1.0.0  
**Untuk:** Staff LAZISMU Lengkong
