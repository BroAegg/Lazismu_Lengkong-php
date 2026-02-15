# 🕌 Lazismu Lengkong - Web ZIS Management

> Sistem Manajemen Zakat, Infaq, Sedekah & Wakaf (ZISKA) berbasis web untuk **Lazismu Muhammadiyah Kecamatan Lengkong, Kota Bandung**.

[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?logo=php)](https://php.net)
[![Livewire](https://img.shields.io/badge/Livewire-4.x-FB70A9?logo=livewire)](https://livewire.laravel.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind-4.0-06B6D4?logo=tailwindcss)](https://tailwindcss.com)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

---

## 📋 Daftar Isi

- [Tentang Project](#-tentang-project)
- [Tech Stack](#-tech-stack)
- [Struktur Database](#-struktur-database)
- [Roles & Akses](#-roles--akses)
- [Fitur Utama](#-fitur-utama)
- [Instalasi & Setup](#-instalasi--setup)
- [Struktur Folder](#-struktur-folder)
- [Routes](#-routes)
- [Kalkulator Zakat](#-kalkulator-zakat)
- [PSAK 109 Compliance](#-psak-109-compliance)
- [Panduan Development](#-panduan-development)
- [Konvensi & Style Guide](#-konvensi--style-guide)
- [Tim Pengembang](#-tim-pengembang)

---

## 🕌 Tentang Project

**Lazismu Lengkong** adalah platform web untuk menghimpun dan menyalurkan dana **Zakat, Infaq, Sedekah, dan Wakaf (ZISKA)** secara profesional, transparan, dan amanah. Dibangun di bawah naungan **Muhammadiyah Kecamatan Lengkong**.

### Target Pengguna
- **Muzakki** (Pemberi Zakat) — membayar zakat, infaq, sedekah online
- **Staff Lazismu** — mengelola donasi masuk, verifikasi, distribusi, laporan
- **Masyarakat Umum** — melihat program, transparansi penyaluran

### Brand Identity
| Elemen | Nilai |
|--------|-------|
| Primary Color | `#F7941D` (Orange Muhammadiyah) |
| Secondary Color | `#00A651` (Green Islam) |
| Accent Color | `#F15A24` (Deep Orange) |
| Dark Color | `#1A1A2E` (Dark Blue-Black) |
| Font Utama | Plus Jakarta Sans |
| Font Arab | Amiri |
| Font Sub | Lato |

---

## 🛠 Tech Stack

### Backend
| Teknologi | Versi | Fungsi |
|-----------|-------|--------|
| **Laravel** | 12.x | PHP Framework utama |
| **PHP** | 8.2+ | Server-side language |
| **MySQL** | 8.x | Database relational |
| **Livewire** | 4.x | Reactive components (kalkulator, form donasi) |
| **DomPDF** | 3.x | Generate kuitansi & laporan PDF |
| **Spatie ActivityLog** | 4.x | Audit trail donasi & user activity |

### Frontend
| Teknologi | Versi | Fungsi |
|-----------|-------|--------|
| **Tailwind CSS** | 4.0 | Utility-first CSS framework |
| **Alpine.js** | 3.x (CDN) | Lightweight JS interactivity |
| **Swiper.js** | 11 (CDN) | Hero slider & carousel |
| **AOS** | 2.3.1 (CDN) | Scroll animation |
| **Font Awesome** | 6.5.1 (CDN) | Icon library |
| **Vite** | 7.x | Build tool & HMR |

### Dev Tools
| Tool | Fungsi |
|------|--------|
| **Concurrently** | Jalankan `serve`, `queue`, `pail`, `vite` bersamaan |
| **Laravel Pail** | Real-time log viewer di terminal |

---

## 🗄 Struktur Database

### ERD Overview

```
users ─────────────┬─── donations ───── donation_categories
                   │         │              │
                   │         │              └── donation_sub_categories
                   │         │
                   │         └── programs ──── program_pillars
                   │
                   ├─── mustahik ──── distributions
                   │
                   └─── zakat_calculations
                   
settings (key-value store)
activity_log (spatie)
```

### Tabel Utama

#### `users`
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | BIGINT PK | Auto increment |
| name | VARCHAR | Nama lengkap |
| email | VARCHAR UNIQUE | Email login |
| phone | VARCHAR(20) UNIQUE | No HP (login alternatif) |
| password | VARCHAR | Hashed password |
| role | VARCHAR(30) | Enum: `user`, `kepala_kantor`, `administrasi`, `fund_rising`, `staff_pelayanan` |
| avatar | VARCHAR | Path foto profil |
| address | TEXT | Alamat |
| is_active | BOOLEAN | Status aktif |

#### `donation_categories` (4 kategori utama)
| ID | Nama | PSAK Fund Type |
|----|------|----------------|
| 1 | Zakat | DANA_ZAKAT |
| 2 | Infaq & Sedekah | DANA_INFAQ_SEDEKAH_TIDAK_TERIKAT |
| 3 | Wakaf | DANA_WAKAF |
| 4 | Kedermawanan Sosial | DANA_INFAQ_SEDEKAH_TIDAK_TERIKAT |

#### `donation_sub_categories` (22 sub-kategori)
**Zakat (6):** Fitrah, Maal, Penghasilan, Emas & Perak, Perdagangan, Pertanian
**Infaq & Sedekah (8):** Umum, Pendidikan, Kesehatan, Dakwah, Bencana, Sedekah Jariyah, Fidyah, Qurban & Aqiqah
**Wakaf (3):** Uang, Quran, Produktif
**Kedermawanan Sosial (3):** Bantuan Kemanusiaan, Pemberdayaan Ekonomi, CSR Partnership

#### `donations`
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| invoice_number | VARCHAR(30) UNIQUE | Format: `LZM-YYYYMMDD-XXXX` |
| donor_id | FK → users | NULL jika donatur tamu |
| category_id | FK → donation_categories | Kategori ZIS |
| sub_category_id | FK → donation_sub_categories | Sub-kategori |
| program_id | FK → programs | Program terkait (opsional) |
| amount | DECIMAL(15,2) | Jumlah donasi bruto |
| amil_amount | DECIMAL(15,2) | Bagian amil |
| net_amount | DECIMAL(15,2) | Netto setelah amil |
| payment_method | VARCHAR(30) | Enum: `QRIS`, `TRANSFER_BSI`, `TRANSFER_BRI`, `EWALLET`, `TUNAI` |
| status | VARCHAR(20) | Enum: `PENDING`, `VERIFIED`, `FAILED`, `REFUNDED`, `EXPIRED` |
| psak_fund_type | VARCHAR(50) | Jenis dana PSAK 109 |
| is_anonymous | BOOLEAN | Hamba Allah mode |

#### `programs`
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| pillar_id | FK → program_pillars | Pilar program |
| title, slug | VARCHAR | Judul & URL slug |
| target_amount | DECIMAL(15,2) | Target penghimpunan |
| collected_amount | DECIMAL(15,2) | Terkumpul (real-time) |
| donor_count | INTEGER | Jumlah donatur |
| is_featured | BOOLEAN | Tampil di homepage |

#### `program_pillars` (6 pilar)
1. Pilar Pendidikan
2. Pilar Kesehatan
3. Pilar Ekonomi
4. Pilar Dakwah
5. Pilar Sosial Kemanusiaan
6. Pilar Lingkungan

#### `mustahik`
Penerima manfaat zakat, dienumerasi berdasarkan 8 asnaf.

#### `distributions`
Pencatatan penyaluran dana ke mustahik, lengkap dengan bukti foto.

#### `zakat_calculations`
Riwayat kalkulasi zakat user (penghasilan, emas, fitrah).

#### `settings`
Key-value store untuk konfigurasi: harga emas, nisab, persentase amil, info organisasi, rekening bank.

---

## 👥 Roles & Akses

### Enum: `App\Enums\UserRole`

| Role | Label | Dashboard | Akses |
|------|-------|-----------|-------|
| `KEPALA_KANTOR` | Kepala Kantor | `/admin/dashboard` | Full access, user management, laporan |
| `ADMINISTRASI` | Staff Administrasi | `/admin/dashboard` | Kelola donasi, program, user, laporan |
| `FUND_RISING` | Fund Rising | `/admin/dashboard` | Kelola donasi, program |
| `STAFF_PELAYANAN` | Staff Pelayanan | `/admin/dashboard` | Verifikasi donasi, layanan mustahik |
| `USER` | Muzakki / Donatur | `/dashboard` | Donasi, kalkulator, riwayat, profil |

### Middleware
- **`CheckRole`** (`app/Http/Middleware/CheckRole.php`): Cek role user sebelum akses route
  ```php
  Route::middleware('role:kepala_kantor,administrasi')->group(...)
  ```
- **`LogActivity`** (`app/Http/Middleware/LogActivity.php`): Log semua POST/PUT/DELETE ke `activity_log`

---

## ✨ Fitur Utama

### Public (Tanpa Login)
- 🏠 **Homepage** — Hero slider, statistik, program unggulan, kategori donasi
- 🧮 **Kalkulator Zakat** — Hitung zakat penghasilan, emas, fitrah (Livewire)
- 📋 **Program** — Daftar program dengan filter pilar, progress bar
- 💳 **Donasi** — Form donasi dengan preset nominal, pilih metode bayar
- 📄 **Halaman Statis** — Tentang Kami, Kontak, Bantuan, Kebijakan Privasi, Syarat Ketentuan

### Authenticated (User/Muzakki)
- 📊 **Dashboard** — Ringkasan donasi pribadi, total, riwayat
- 👤 **Akun** — Ubah profil, password, upload avatar
- 📜 **Riwayat Donasi** — Daftar donasi dengan status
- 🧾 **Kuitansi** — Download kuitansi PDF setelah donasi diverifikasi

### Admin Panel (Staff)
- 📈 **Dashboard Admin** — Statistik real-time, grafik, recent activity
- 💰 **Kelola Donasi** — List, detail, verifikasi donasi masuk
- 🗂 **Kelola Program** — CRUD program dengan gambar & pilar
- 👥 **Kelola User** — CRUD user, assign role (Kepala Kantor & Administrasi only)
- 📊 **Laporan** — Laporan keuangan PSAK 109, export PDF (Kepala Kantor & Administrasi only)

### Upcoming (Pending Designer Meeting)
- 🎁 Kado Ramadhan
- 🕌 Back to Masjid
- 🥤 Takjil on the Road

---

## 🚀 Instalasi & Setup

### Prerequisites
- PHP 8.2+
- Composer 2.x
- Node.js 18+ & NPM
- MySQL 8.x
- XAMPP / Laragon / Docker

### Langkah Instalasi

```bash
# 1. Clone repository
git clone https://github.com/BroAegg/Lazismu_Lengkong-php.git
cd Lazismu_Lengkong-php

# 2. Install PHP dependencies
composer install

# 3. Install Node dependencies
npm install

# 4. Copy environment file
cp .env.example .env

# 5. Generate application key
php artisan key:generate

# 6. Konfigurasi database di .env
# DB_CONNECTION=mysql
# DB_DATABASE=lazismu_lengkong
# DB_USERNAME=root
# DB_PASSWORD=

# 7. Buat database
mysql -u root -e "CREATE DATABASE lazismu_lengkong CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# 8. Jalankan migrasi & seeder
php artisan migrate --seed

# 9. Link storage
php artisan storage:link

# 10. Build assets
npm run build

# 11. Jalankan server
php artisan serve
```

### Akun Demo (Seeder)

| Role | Email | Password |
|------|-------|----------|
| Kepala Kantor | kepala@lazismulengkong.org | password |
| Administrasi | admin@lazismulengkong.org | password |
| Fund Rising | fundraising@lazismulengkong.org | password |
| Staff Pelayanan | pelayanan@lazismulengkong.org | password |
| User (Muzakki) | user@lazismulengkong.org | password |

### Development Mode (Hot Reload)

```bash
npm run dev
# Menjalankan 4 proses bersamaan:
# - php artisan serve
# - php artisan queue:listen --tries=3
# - php artisan pail
# - vite (HMR)
```

---

## 📁 Struktur Folder

```
Lazismu_Lengkong-PHP/
├── app/
│   ├── Enums/
│   │   ├── UserRole.php            # 5 roles (KEPALA_KANTOR, dll)
│   │   ├── DonationStatus.php      # PENDING, VERIFIED, FAILED, dll
│   │   ├── PaymentMethod.php       # QRIS, TRANSFER_BSI, dll
│   │   ├── AsnafCategory.php       # 8 asnaf penerima zakat
│   │   ├── PsakFundType.php        # 6 jenis dana PSAK 109
│   │   └── RestrictionType.php     # TERIKAT, TIDAK_TERIKAT
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php       # Login, Register, Logout
│   │   │   ├── BerandaController.php    # Homepage
│   │   │   ├── ProgramController.php    # Program CRUD (public)
│   │   │   ├── DonasiController.php     # Donasi flow
│   │   │   ├── KalkulatorController.php # Kalkulator zakat
│   │   │   ├── DashboardController.php  # User dashboard
│   │   │   ├── AkunController.php       # Profile management
│   │   │   ├── HalamanController.php    # Static pages
│   │   │   └── Admin/
│   │   │       ├── AdminDashboardController.php
│   │   │       ├── AdminDonationController.php
│   │   │       ├── AdminProgramController.php
│   │   │       ├── AdminUserController.php
│   │   │       └── AdminReportController.php
│   │   └── Middleware/
│   │       ├── CheckRole.php       # Role-based access control
│   │       └── LogActivity.php     # Audit trail
│   ├── Livewire/
│   │   ├── ZakatCalculator.php     # Multi-step kalkulator
│   │   └── DonationForm.php        # Real-time donation form
│   ├── Models/
│   │   ├── User.php
│   │   ├── Donation.php
│   │   ├── DonationCategory.php
│   │   ├── DonationSubCategory.php
│   │   ├── Program.php
│   │   ├── ProgramPillar.php
│   │   ├── Mustahik.php
│   │   ├── Distribution.php
│   │   ├── ZakatCalculation.php
│   │   └── Setting.php
│   └── Services/
│       └── ZakatCalculatorService.php
├── database/
│   ├── migrations/        # 15 migration files
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── DonationCategorySeeder.php  # 4 kategori + 22 sub-kategori
│       ├── ProgramPillarSeeder.php     # 6 pilar program
│       ├── SettingSeeder.php           # Harga emas, nisab, info org
│       └── UserSeeder.php             # 5 akun demo
├── resources/
│   ├── css/app.css         # Tailwind 4 theme (brand colors, fonts)
│   ├── js/app.js           # Navbar scroll, count-up animation
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php     # Public layout (navbar, footer)
│       │   ├── auth.blade.php    # Split auth layout (login/register)
│       │   └── admin.blade.php   # Dashboard layout (sidebar)
│       ├── components/
│       │   ├── navbar.blade.php
│       │   ├── navbar-auth.blade.php
│       │   ├── sidebar.blade.php
│       │   ├── footer.blade.php
│       │   ├── mobile-menu.blade.php
│       │   ├── mobile-bottom-nav.blade.php
│       │   ├── whatsapp-float.blade.php
│       │   └── back-to-top.blade.php
│       ├── pages/                # Public & user pages
│       ├── auth/                 # Login, register, lupa password
│       ├── admin/                # Admin panel views
│       └── livewire/
│           ├── zakat-calculator.blade.php
│           └── donation-form.blade.php
├── routes/web.php          # All routes
├── public/build/           # Vite compiled assets
└── templates-reference/    # HTML template asli (read-only)
```

---

## 🔗 Routes

### Public Routes
| Method | URI | Name | Controller |
|--------|-----|------|------------|
| GET | `/` | beranda | BerandaController@index |
| GET | `/kalkulator-zakat` | kalkulator | KalkulatorController@index |
| GET | `/program` | program.index | ProgramController@index |
| GET | `/program/{slug}` | program.show | ProgramController@show |
| GET | `/donasi` | donasi | DonasiController@index |
| GET | `/donasi/{slug}` | donasi.show | DonasiController@show |
| GET | `/tentang-kami` | tentang-kami | HalamanController@tentangKami |
| GET | `/kontak` | kontak | HalamanController@kontak |
| GET | `/bantuan` | bantuan | HalamanController@bantuan |
| GET | `/kebijakan-privasi` | kebijakan-privasi | HalamanController |
| GET | `/syarat-ketentuan` | syarat-ketentuan | HalamanController |

### Auth Routes (Guest Only)
| Method | URI | Name | Controller |
|--------|-----|------|------------|
| GET | `/masuk` | login | AuthController@showLogin |
| POST | `/masuk` | login.attempt | AuthController@login |
| GET | `/daftar` | register | AuthController@showRegister |
| POST | `/daftar` | register.store | AuthController@register |
| GET | `/lupa-password` | password.request | AuthController@showForgotPassword |

### Authenticated Routes
| Method | URI | Name | Controller |
|--------|-----|------|------------|
| POST | `/keluar` | logout | AuthController@logout |
| GET | `/dashboard` | dashboard | DashboardController@index |
| GET | `/akun` | akun | AkunController@index |
| PUT | `/akun` | akun.update | AkunController@update |
| POST | `/donasi` | donasi.store | DonasiController@store |
| GET | `/donasi/sukses/{invoice}` | donasi.success | DonasiController@success |

### Admin Routes (Staff Only, prefixed `/admin`)
| Method | URI | Name | Middleware |
|--------|-----|------|------------|
| GET | `/admin/dashboard` | admin.dashboard | role:all_staff |
| GET | `/admin/donasi` | admin.donations.index | role:all_staff |
| PUT | `/admin/donasi/{id}/verify` | admin.donations.verify | role:all_staff |
| Resource | `/admin/program` | admin.program.* | role:all_staff |
| Resource | `/admin/users` | admin.users.* | role:kepala_kantor,administrasi |
| GET | `/admin/laporan` | admin.reports.index | role:kepala_kantor,administrasi |
| GET | `/admin/laporan/pdf` | admin.reports.pdf | role:kepala_kantor,administrasi |

---

## 🧮 Kalkulator Zakat

### Jenis Kalkulasi

#### 1. Zakat Penghasilan (Profesi)
```
Nisab  = 85 gram emas × harga_emas_per_gram (per tahun)
       = 85 × Rp1.200.000 = Rp102.000.000/tahun
       = Rp8.500.000/bulan

Wajib? = (penghasilan_bulanan >= nisab_bulanan)

Zakat  = 2.5% × penghasilan_bulanan
```

#### 2. Zakat Emas & Perak
```
Nisab  = 85 gram emas

Wajib? = (berat_emas >= 85 gram) DAN (sudah dimiliki >= 1 tahun/haul)

Zakat  = 2.5% × (berat_emas × harga_emas_per_gram)
```

#### 3. Zakat Fitrah
```
Per Jiwa = 3.5 kg beras × harga_beras_per_kg
         = 3.5 × Rp50.000 = Rp175.000
         (Atau mengikuti harga beras kualitas konsumsi)

Total    = jumlah_jiwa × per_jiwa
```

### Service: `App\Services\ZakatCalculatorService`
- Mengambil harga emas & beras dari tabel `settings`
- Menghitung nisab real-time
- Menyimpan riwayat ke `zakat_calculations`

### Livewire: `App\Livewire\ZakatCalculator`
- Multi-step form (pilih jenis → input data → hasil)
- Real-time calculation
- Tombol "Bayar Zakat" → redirect ke donasi

---

## 📊 PSAK 109 Compliance

### Jenis Dana (6 Fund Types)

| Kode Enum | Label PSAK | Sumber |
|-----------|------------|--------|
| `DANA_ZAKAT` | Dana Zakat | Zakat (semua jenis) |
| `DANA_INFAQ_SEDEKAH_TERIKAT` | Dana Infaq/Sedekah Terikat | Infaq dengan peruntukan tertentu |
| `DANA_INFAQ_SEDEKAH_TIDAK_TERIKAT` | Dana Infaq/Sedekah Tidak Terikat | Infaq bebas peruntukan |
| `DANA_AMIL` | Dana Amil | Bagian operasional amil (12.5% zakat, 20% infaq) |
| `DANA_WAKAF` | Dana Wakaf | Wakaf (uang, quran, produktif) |
| `DANA_NON_HALAL` | Dana Non-Halal | Bunga bank, sumber non-syariah |

### Business Rules
1. **Zakat → Asnaf Only**: Dana zakat hanya boleh disalurkan ke 8 kategori asnaf
2. **Amil Max 12.5%**: Bagian amil dari zakat maksimal 1/8 (12.5%)
3. **Terikat Restriction**: Dana infaq terikat harus disalurkan sesuai peruntukan
4. **Wakaf Principal**: Pokok wakaf tidak boleh berkurang, hanya hasil investasi yang disalurkan
5. **Audit Trail**: Setiap perubahan status donasi dan distribusi di-log via Spatie ActivityLog

### 8 Asnaf (Penerima Zakat)
1. **Fakir** — Tidak memiliki harta & pekerjaan
2. **Miskin** — Memiliki harta/pekerjaan tapi tidak mencukupi
3. **Amil** — Pengelola zakat
4. **Mualaf** — Baru memeluk Islam
5. **Riqab** — Memerdekakan budak
6. **Gharimin** — Orang yang terlilit hutang
7. **Fisabilillah** — Pejuang di jalan Allah
8. **Ibnu Sabil** — Musafir yang kehabisan bekal

---

## 🔧 Panduan Development

### Artisan Commands Penting

```bash
# Migrate & Seed
php artisan migrate:fresh --seed

# Clear semua cache
php artisan optimize:clear

# Buat controller
php artisan make:controller NamaController

# Buat Livewire component
php artisan make:livewire NamaComponent

# Buat model + migration
php artisan make:model NamaModel -m

# Build assets untuk production
npm run build

# Development dengan hot reload
npm run dev
```

### Environment Variables Penting

```env
APP_NAME="Lazismu Lengkong"
APP_URL=http://localhost:8000
APP_LOCALE=id

DB_CONNECTION=mysql
DB_DATABASE=lazismu_lengkong
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
QUEUE_CONNECTION=database
CACHE_STORE=database
```

---

## 📝 Konvensi & Style Guide

### PHP / Laravel
- **PHP 8.2** — Gunakan typed properties, enums, match expressions
- **Enum for Constants** — Semua konstanta pakai `App\Enums\*`
- **Controller Naming** — `NamaController.php` (singular)
- **Model Naming** — `Nama.php` (singular, PascalCase)
- **Migration Naming** — `create_namas_table` (plural snake_case)
- **View Naming** — `nama-halaman.blade.php` (kebab-case)

### Blade / Frontend
- **Layout**: `@extends('layouts.app')` untuk public, `@extends('layouts.admin')` untuk admin
- **Components**: `@include('components.nama')` untuk partials
- **Livewire**: `@livewire('nama-component')` atau `<livewire:nama-component />`
- **Tailwind Classes**: Gunakan brand classes (`text-primary-500`, `bg-secondary-500`)
- **Responsive**: Mobile-first, gunakan `lg:` prefix untuk desktop

### Git
- **Branch**: `main` (production), `develop` (development)
- **Commit Message**: `feat:`, `fix:`, `docs:`, `style:`, `refactor:`
- **`.gitignore`**: Jangan push `node_modules/`, `vendor/`, `.env`, `templates-reference/`

---

## 👨‍💻 Tim Pengembang

| Nama | Role | GitHub |
|------|------|--------|
| **Aegner (Aegg)** | Full-Stack Developer | [@BroAegg](https://github.com/BroAegg) |
| **Repan** | Partner Developer | - |

---

## 📄 Lisensi

Project ini dilisensikan di bawah [MIT License](LICENSE).

---

> *"Perumpamaan orang yang menginfakkan hartanya di jalan Allah seperti sebutir biji yang menumbuhkan tujuh tangkai, pada setiap tangkai ada seratus biji."*
> — **QS. Al-Baqarah: 261**
