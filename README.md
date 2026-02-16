# 🕌 LAZISMU Lengkong - Sistem Manajemen Donasi

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=flat&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=flat&logo=mysql)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.x-06B6D4?style=flat&logo=tailwindcss)
![Alpine.js](https://img.shields.io/badge/Alpine.js-3.x-8BC0D0?style=flat&logo=alpinedotjs)

> **Sistem Manajemen Zakat, Infaq, Sedekah & Wakaf berbasis web untuk LAZISMU (Lembaga Amil Zakat Infaq dan Sedekah Muhammadiyah) Cabang Lengkong, Kota Bandung.**

Dibangun dengan Laravel 12 dan mengikuti **standar akuntansi PSAK 109** untuk pelaporan keuangan lembaga amil zakat.

---

## 📋 Daftar Isi

- [Fitur Utama](#-fitur-utama)
- [Quick Start](#-quick-start)
- [Akun Testing](#-akun-testing)
- [Struktur Database](#-struktur-database)
- [Role & Permission](#-role--permission)
- [URL Routes](#-url-routes)
- [Tech Stack](#-tech-stack)
- [Dokumentasi](#-dokumentasi)
- [Deployment](#-deployment)
- [Developer](#-developer)

---

## ✨ Fitur Utama

### 🎁 Untuk Donatur
- ✅ **Donasi Tanpa Login** - Guest dapat berdonasi langsung tanpa registrasi
- ✅ **Dashboard Personal** - Tracking riwayat donasi lengkap dengan statistik
- ✅ **Multi Kategori** - Zakat (Mal, Fitrah, Penghasilan), Infaq, Sedekah, Wakaf
- ✅ **Invoice Otomatis** - Generate invoice format `LZM-YYYYMMDD-XXXX`
- ✅ **Program Donasi** - Lihat dan dukung program-program pilihan
- ✅ **Progress Real-time** - Monitor pencapaian target program

### 👨‍💼 Untuk Admin
- ✅ **Verifikasi Donasi** - Workflow approve/reject dengan catatan
- ✅ **Manajemen Program** - CRUD program dengan upload gambar
- ✅ **Manajemen User** - Kelola user dengan 5 tingkat role
- ✅ **Laporan PSAK 109** - Generate laporan keuangan sesuai standar
- ✅ **Export PDF** - Download laporan dalam format PDF
- ✅ **Role-Based Access** - Kontrol akses berdasarkan jabatan
- ✅ **Filter & Search** - Cari donasi berdasarkan status, kategori, nama

### ⚙️ Sistem
- ✅ **6 Dana PSAK 109** - Zakat, Infaq/Sedekah, Dana Amil, Dana Non-Halal, DSKL, APBN
- ✅ **8 Asnaf** - Fakir, Miskin, Amil, Mualaf, Riqab, Gharim, Sabilillah, Ibnu Sabil
- ✅ **Amil Calculation** - Otomatis hitung amil 12.5% untuk zakat (0% lainnya)
- ✅ **Responsive Design** - Mobile-friendly dengan bottom navigation
- ✅ **Authentication** - Laravel Breeze dengan custom branded UI

---

## 🚀 Quick Start

### Persyaratan Sistem
```bash
PHP >= 8.2
Composer >= 2.0
MySQL >= 8.0
Node.js >= 18.x
Git
```

### Instalasi

```bash
# 1. Clone repository
git clone https://github.com/yourusername/lazismulengkong.git
cd lazismulengkong

# 2. Install dependencies
composer install
npm install

# 3. Setup environment
cp .env.example .env
php artisan key:generate

# 4. Konfigurasi database di .env
# DB_DATABASE=lazismu_lengkong
# DB_USERNAME=root
# DB_PASSWORD=

# 5. Migrate dan seed database
php artisan migrate --seed

# 6. Link storage untuk upload
php artisan storage:link

# 7. Build assets
npm run build

# 8. Jalankan server
php artisan serve
```

**Akses aplikasi:** `http://127.0.0.1:8000`

---

## 👥 Akun Testing

### 🔑 Admin (Kepala Kantor)
```
Email    : kepala@lazismulengkong.org
Password : password123
Akses    : Full admin access
```

### 🔑 Staff Administrasi
```
Email    : admin@lazismulengkong.org
Password : password123
Akses    : Donation, user management, reports
```

### 🔑 Fund Rising
```
Email    : fundraising@lazismulengkong.org
Password : password123
Akses    : Donation, programs
```

### 🔑 Staff Pelayanan
```
Email    : pelayanan@lazismulengkong.org
Password : password123
Akses    : Donation verification
```

### 🔑 Donatur Regular
```
Email    : ahmad@example.com
Password : password123
Akses    : User dashboard
```

---

## 📊 Struktur Database

### Core Tables (15 Tables)
```
users                    - User accounts dengan role-based access
donations                - Transaksi donasi dengan invoice tracking
programs                 - Program donasi dan penggalangan dana
donation_categories      - Kategori dan sub-kategori donasi
pillars                  - Pilar program (5M Muhammadiyah)
settings                 - Konfigurasi sistem (nisab, bank, contact)
distributions            - Penyaluran dana ke asnaf
amil_distributions       - Pembagian dana amil
donation_distributions   - Relasi donasi ke distribusi
donation_program         - Relasi many-to-many donasi-program
```

📖 **Detail lengkap:** [ARCHITECTURE.md](ARCHITECTURE.md)

---

## 🔐 Role & Permission

| Role | Dashboard | Donasi | Program | Users | Reports |
|------|:---------:|:------:|:-------:|:-----:|:-------:|
| **Kepala Kantor** | ✅ | ✅ | ✅ | ✅ | ✅ |
| **Administrasi** | ✅ | ✅ | ✅ | ✅ | ✅ |
| **Fund Rising** | ✅ | ✅ | ✅ | ❌ | ❌ |
| **Staff Pelayanan** | ✅ | ✅ | ✅ | ❌ | ❌ |
| **Donatur** | 👤 User Dashboard | View Only | View Only | ❌ | ❌ |

---

## 📱 URL Routes

### Public Routes
```
/                       - Homepage dengan statistik real-time
/program                - Daftar program donasi
/program/{slug}         - Detail program
/donasi                 - Form donasi (guest allowed)
/donasi/sukses/{invoice}- Payment success page
```

### Authentication
```
/login                  - Custom branded login page
/register               - Registrasi donatur baru
/logout                 - Logout user
/password/reset         - Reset password
```

### User Dashboard
```
/dashboard              - Personal donation stats
/profile                - Edit profile & password
```

### Admin Panel
```
/admin/dashboard        - Admin statistics overview
/admin/donasi           - Donation management list
/admin/donasi/{id}      - Verify/reject donation detail
/admin/donasi/{id}/verify   - POST verify donation
/admin/donasi/{id}/reject   - POST reject donation
/admin/program          - Program CRUD
/admin/users            - User management (restricted)
/admin/laporan          - PSAK 109 reports
/admin/laporan/pdf      - Export PDF report
```

---

## 🛠️ Tech Stack

### Backend
- **Laravel 12.x** - PHP Framework
- **MySQL 8.0+** - Database
- **Laravel Breeze** - Authentication scaffolding
- **DomPDF** - PDF generation for reports

### Frontend
- **Blade Templates** - Server-side rendering
- **TailwindCSS 3.x** - Utility-first CSS
- **Alpine.js 3.x** - Lightweight JavaScript framework
- **Vite** - Frontend tooling & bundler

### Libraries
- **barryvdh/laravel-dompdf** - PDF export
- **Laravel Enums** - Type-safe status management
- **Intervention Image** - Image processing (future)

---

## 📖 Dokumentasi

- 📘 [**ARCHITECTURE.md**](ARCHITECTURE.md) - Arsitektur sistem, ERD, business flow
- 📗 [**INSTALLATION.md**](INSTALLATION.md) - Panduan instalasi detail *(coming soon)*
- 📙 [**USER_GUIDE.md**](USER_GUIDE.md) - Panduan untuk donatur *(coming soon)*
- 📕 [**ADMIN_GUIDE.md**](ADMIN_GUIDE.md) - Panduan untuk admin *(coming soon)*
- 📔 [**DEMO_GUIDE.md**](DEMO_GUIDE.md) - Panduan demo presentasi
- 📓 [**LAZISMU_LENGKONG.md**](LAZISMU_LENGKONG.md) - Dokumentasi lengkap project

---

## 🚀 Deployment

### Production Checklist
- [ ] Set `APP_ENV=production` dan `APP_DEBUG=false` di `.env`
- [ ] Configure production database credentials
- [ ] Run `php artisan config:cache`
- [ ] Run `php artisan route:cache`
- [ ] Run `php artisan view:cache`
- [ ] Run `php artisan storage:link`
- [ ] Setup queue worker dengan supervisor
- [ ] Configure automated backup system
- [ ] Setup SSL certificate (HTTPS)
- [ ] Configure CDN for static assets
- [ ] Setup error monitoring (Sentry/Bugsnag)

📖 **Detail lengkap:** [INSTALLATION.md](INSTALLATION.md)

---

## 📄 License

**Proprietary** - LAZISMU Muhammadiyah Cabang Lengkong, Kota Bandung

---

## 👨‍💻 Developer

Dikembangkan dengan ❤️ untuk **LAZISMU Lengkong**, Kota Bandung

**Version:** 1.0.0  
**Last Updated:** Februari 2026  
**Laravel:** 12.x  
**PHP:** 8.2+

---

## 🤝 Contributing

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
