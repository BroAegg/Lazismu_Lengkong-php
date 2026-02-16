# 🏗️ Lazismu Lengkong - System Architecture & Planning

**Last Updated:** February 16, 2026  
**Purpose:** Dokumentasi arsitektur sistem dan alur bisnis untuk pemahaman sebelum development

---

## 📋 TABLE OF CONTENTS
1. [Business Process Flow](#business-process-flow)
2. [Entity Relationship Diagram (ERD)](#entity-relationship-diagram-erd)
3. [User Journey Flow](#user-journey-flow)
4. [System Architecture](#system-architecture)
5. [Role & Permission Matrix](#role--permission-matrix)
6. [Data Flow Diagram](#data-flow-diagram)

---

## 🔄 BUSINESS PROCESS FLOW

### A. Alur Bisnis Lazismu (Real World)

```
┌─────────────────────────────────────────────────────────────┐
│  ALUR LAZISMU (LEMBAGA AMIL ZAKAT)                         │
└─────────────────────────────────────────────────────────────┘

1. PENERIMAAN DANA (Input)
   ┌──────────────┐
   │   DONATUR    │ → Bayar Zakat/Infaq/Sedekah/Wakaf
   └──────┬───────┘
          │
          ▼
   ┌──────────────────────────┐
   │   LAZISMU LENGKONG       │
   │   (Lembaga Amil)         │
   │                          │
   │  • Terima Dana           │
   │  • Catat Transaksi       │
   │  • Pisahkan Dana by Type │
   └──────┬───────────────────┘
          │
          ▼
   ┌────────────────────────────────────────┐
   │  PEMISAHAN DANA (PSAK 109)            │
   │                                        │
   │  ┌─────────────┐  ┌─────────────┐    │
   │  │ DANA ZAKAT  │  │ DANA INFAQ  │    │
   │  │ (Terikat)   │  │ (Bebas/     │    │
   │  │             │  │  Terikat)   │    │
   │  └─────────────┘  └─────────────┘    │
   │                                        │
   │  ┌─────────────┐  ┌─────────────┐    │
   │  │ DANA WAKAF  │  │ DANA AMIL   │    │
   │  │ (Produktif) │  │ (12.5% max) │    │
   │  └─────────────┘  └─────────────┘    │
   └────────┬───────────────────────────────┘
            │
            ▼

2. PENYALURAN DANA (Output)
   ┌──────────────────────────────────────┐
   │  MUSTAHIK (Penerima)                │
   │                                      │
   │  ZAKAT → 8 Asnaf:                   │
   │    1. Fakir                          │
   │    2. Miskin                         │
   │    3. Amil (pengurus)                │
   │    4. Muallaf                        │
   │    5. Riqab (budak/hamba sahaya)    │
   │    6. Gharimin (berhutang)          │
   │    7. Fisabilillah (pejuang)        │
   │    8. Ibnu Sabil (musafir)          │
   │                                      │
   │  INFAQ → Program:                   │
   │    • Pendidikan (beasiswa)          │
   │    • Kesehatan (bantuan medis)      │
   │    • Ekonomi (UMKM)                 │
   │    • Sosial & Dakwah                │
   │    • Kemanusiaan (bencana)          │
   │    • Infrastruktur (masjid, dll)    │
   └──────────────────────────────────────┘

3. PELAPORAN
   • Laporan Bulanan ke Donatur
   • Laporan Tahunan ke Kemenag
   • Audit Syariah & Keuangan
```

### B. Aturan Dana PSAK 109 (Standar Akuntansi)

```
┌──────────────────────────────────────────────────────┐
│  DANA ZAKAT (Tidak Boleh Dicampur!)                │
├──────────────────────────────────────────────────────┤
│  • Hanya untuk 8 asnaf                              │
│  • Amil maksimal 12.5% (1/8)                        │
│  • Tidak boleh untuk operasional umum               │
│  • Harus segera disalurkan (max 1 tahun)           │
└──────────────────────────────────────────────────────┘

┌──────────────────────────────────────────────────────┐
│  DANA INFAQ/SEDEKAH TERIKAT                         │
├──────────────────────────────────────────────────────┤
│  • Sesuai permintaan donatur                        │
│  • Contoh: "Untuk beasiswa" → harus ke beasiswa     │
│  • Tidak boleh dialihkan ke program lain           │
└──────────────────────────────────────────────────────┘

┌──────────────────────────────────────────────────────┐
│  DANA INFAQ/SEDEKAH TIDAK TERIKAT                   │
├──────────────────────────────────────────────────────┤
│  • Lazismu bebas alokasikan                         │
│  • Bisa untuk program apa saja                      │
│  • Bisa untuk operasional (gaji, listrik, dll)     │
└──────────────────────────────────────────────────────┘

┌──────────────────────────────────────────────────────┐
│  DANA WAKAF (Pokok Tidak Boleh Habis!)             │
├──────────────────────────────────────────────────────┤
│  • Pokok dana harus dijaga (investasi)              │
│  • Yang disalurkan: HASIL/MANFAAT                   │
│  • Contoh: Uang Rp 100jt → Beli tanah               │
│            Tanah disewakan → Hasil sewa disalurkan  │
└──────────────────────────────────────────────────────┘

┌──────────────────────────────────────────────────────┐
│  DANA AMIL (Operasional)                            │
├──────────────────────────────────────────────────────┤
│  • Dari potongan donasi (zakat max 12.5%)          │
│  • Untuk gaji pegawai, listrik, internet, etc      │
│  • Harus dilaporkan terpisah                        │
└──────────────────────────────────────────────────────┘
```

---

## 🗄️ ENTITY RELATIONSHIP DIAGRAM (ERD)

### Database Schema (15 Tables)

```
┌─────────────────────────────────────────────────────────────────┐
│                     DATABASE: lazismu                           │
└─────────────────────────────────────────────────────────────────┘


╔═══════════════════╗         ╔════════════════════════╗
║     USERS         ║         ║   DONATION_CATEGORIES  ║
╠═══════════════════╣         ╠════════════════════════╣
║ id (PK)           ║         ║ id (PK)                ║
║ name              ║         ║ name                   ║
║ email (unique)    ║         ║ slug (unique)          ║
║ phone             ║         ║ description            ║
║ password          ║         ║ icon                   ║
║ role (enum)       ║         ║ psak_fund_type (enum)  ║
║ avatar            ║         ║ color                  ║
║ address           ║         ║ sort_order             ║
║ is_active         ║         ║ is_active              ║
║ created_at        ║         ║ created_at             ║
╚═══════════╤═══════╝         ╚══════════╤═════════════╝
            │                            │
            │                            │
            │    ╔═══════════════════════╧════════════════╗
            │    ║  DONATION_SUB_CATEGORIES               ║
            │    ╠════════════════════════════════════════╣
            │    ║ id (PK)                                ║
            │    ║ category_id (FK) ──────────────────────┤
            │    ║ name                                   ║
            │    ║ slug                                   ║
            │    ║ description                            ║
            │    ║ sort_order                             ║
            │    ╚════════════════════════════════════════╝
            │
            │
            │    ╔════════════════════════╗
            │    ║   PROGRAM_PILLARS      ║
            │    ╠════════════════════════╣
            │    ║ id (PK)                ║
            │    ║ name                   ║
            │    ║ slug (unique)          ║
            │    ║ description            ║
            │    ║ icon                   ║
            │    ║ color                  ║
            │    ║ sort_order             ║
            │    ║ is_active              ║
            │    ╚═══════════╤════════════╝
            │                │
            │                │
            │    ╔═══════════╧═══════════════════╗
            │    ║       PROGRAMS                ║
            │    ╠═══════════════════════════════╣
            │    ║ id (PK)                       ║
            │    ║ pillar_id (FK) ───────────────┤
            │    ║ title                         ║
            │    ║ slug (unique)                 ║
            │    ║ description                   ║
            │    ║ content (HTML)                ║
            │    ║ image                         ║
            │    ║ target_amount (decimal)       ║
            │    ║ collected_amount (decimal)    ║
            │    ║ donor_count                   ║
            │    ║ psak_fund_type (enum)         ║
            │    ║ start_date                    ║
            │    ║ end_date                      ║
            │    ║ is_featured                   ║
            │    ║ is_active                     ║
            │    ╚═══════════╤═══════════════════╝
            │                │
            │                │
            └────────────────┼─────────────────────────────┐
                             │                             │
                             │                             │
         ╔═══════════════════╧═════════════════════════════╧═══════════╗
         ║                    DONATIONS                                ║
         ╠═════════════════════════════════════════════════════════════╣
         ║ id (PK)                                                     ║
         ║ invoice_number (unique)  <- "LZM-20260216-0001"             ║
         ║ donor_id (FK) ──────────────────┐ (nullable - bisa anonim)  ║
         ║ donor_name                      │                            ║
         ║ donor_email                     │                            ║
         ║ donor_phone                     │                            ║
         ║ category_id (FK) ───────────────┼──────────────┐             ║
         ║ sub_category_id (FK) ───────────┼──────────────┼─────┐       ║
         ║ program_id (FK) ────────────────┼──────────────┼─────┼───┐   ║
         ║ amount (decimal)                │              │     │   │   ║
         ║ amil_amount (12.5%)             │              │     │   │   ║
         ║ net_amount (sisanya)            │              │     │   │   ║
         ║ payment_method (enum)           │              │     │   │   ║
         ║ payment_proof (image)           │              │     │   │   ║
         ║ status (enum) <- pending/verified/failed       │     │   │   ║
         ║ psak_fund_type (enum)           │              │     │   │   ║
         ║ message                         │              │     │   │   ║
         ║ is_anonymous                    │              │     │   │   ║
         ║ verified_by (FK) ───────────────┤              │     │   │   ║
         ║ verified_at                     │              │     │   │   ║
         ║ notes                           │              │     │   │   ║
         ║ created_at                      │              │     │   │   ║
         ╚═════════════════════════════════╧══════════════╧═════╧═══╧═══╝
                                           │              │     │   │
                                           │              │     │   │
         Relationships:                    │              │     │   │
         • donor_id → users.id            │              │     │   │
         • category_id → donation_categories.id           │   │
         • sub_category_id → donation_sub_categories.id ──┘   │
         • program_id → programs.id ──────────────────────────┘
         • verified_by → users.id (staff)


         ╔════════════════════════╗
         ║      MUSTAHIK          ║  <- Penerima Bantuan
         ╠════════════════════════╣
         ║ id (PK)                ║
         ║ name                   ║
         ║ nik                    ║
         ║ phone                  ║
         ║ address                ║
         ║ category (8 asnaf)     ║
         ║ is_verified            ║
         ║ verified_at            ║
         ╚═══════════╤════════════╝
                     │
                     │
         ╔═══════════╧═══════════════════════╗
         ║       DISTRIBUTIONS               ║  <- Penyaluran Dana
         ╠═══════════════════════════════════╣
         ║ id (PK)                           ║
         ║ program_id (FK) ───────────────┐  ║
         ║ mustahik_id (FK) ──────────────┼──║
         ║ amount                         │  ║
         ║ distribution_date              │  ║
         ║ description                    │  ║
         ║ proof_photo                    │  ║
         ║ distributed_by (FK users)      │  ║
         ╚════════════════════════════════╧══╝


         ╔═════════════════════════════╗
         ║   ZAKAT_CALCULATIONS        ║  <- History Kalkulator
         ╠═════════════════════════════╣
         ║ id (PK)                     ║
         ║ user_id (FK) ───────────┐   ║
         ║ zakat_type              │   ║
         ║ assets_value            │   ║
         ║ nisab_value             │   ║
         ║ zakat_amount            │   ║
         ║ created_at              │   ║
         ╚═════════════════════════╧═══╝


         ╔════════════════╗
         ║   SETTINGS     ║  <- Konfigurasi App
         ╠════════════════╣
         ║ id (PK)        ║
         ║ key (unique)   ║  <- "nisab_emas", "harga_emas_per_gram"
         ║ value          ║
         ║ type           ║  <- string, number, boolean
         ║ group          ║  <- zakat, payment, contact
         ║ description    ║
         ╚════════════════╝


         ╔═══════════════════╗
         ║  ACTIVITY_LOG     ║  <- Audit Trail (Spatie)
         ╠═══════════════════╣
         ║ id (PK)           ║
         ║ log_name          ║
         ║ description       ║
         ║ subject_type      ║
         ║ subject_id        ║
         ║ causer_type       ║
         ║ causer_id         ║
         ║ properties (JSON) ║
         ║ created_at        ║
         ╚═══════════════════╝
```

---

## 👥 USER JOURNEY FLOW

### Journey 1: Donatur Baru (Belum Register)

```
START → Buka website (beranda)
   │
   ├─→ Lihat stats (berapa yang sudah tersalur)
   │
   ├─→ Lihat program unggulan
   │
   ├─→ Klik "Donasi Sekarang"
   │
   ▼
Halaman DONASI
   │
   ├─→ Pilih kategori (Zakat/Infaq/Sedekah/Wakaf)
   │
   ├─→ Pilih sub-kategori (Zakat Maal/Fitrah/dll)
   │
   ├─→ (Opsional) Pilih program spesifik
   │
   ├─→ Input nominal
   │
   ├─→ Isi data diri (nama, email, HP)
   │
   ├─→ Pilih metode pembayaran (Transfer/QRIS)
   │
   ▼
Sistem Generate Invoice
   │
   ├─→ Invoice Number: LZM-20260216-0001
   │
   ├─→ Status: PENDING
   │
   ▼
Halaman INSTRUKSI PEMBAYARAN
   │
   ├─→ Tampilkan no rekening
   │
   ├─→ Upload bukti transfer
   │
   ▼
DONE → Tunggu verifikasi staff
```

### Journey 2: Donatur Terdaftar (Sudah Login)

```
START → Login
   │
   ▼
Dashboard User
   │
   ├─→ Lihat history donasi
   │
   ├─→ Lihat total yang sudah didonasikan
   │
   ├─→ Klik "Donasi Lagi"
   │
   ▼
Halaman DONASI (Data sudah auto-fill)
   │
   ├─→ Pilih program
   │
   ├─→ Input nominal
   │
   ├─→ Bayar
   │
   ▼
DONE → Langsung ke payment
```

### Journey 3: Staff Verifikasi Donasi

```
START → Login sebagai ADMINISTRASI
   │
   ▼
Admin Dashboard
   │
   ├─→ Lihat notif: 5 donasi pending
   │
   ├─→ Klik "Kelola Donasi"
   │
   ▼
Halaman LIST DONASI
   │
   ├─→ Filter: Status = PENDING
   │
   ├─→ Klik detail donasi #LZM-20260216-0001
   │
   ▼
Detail Donasi
   │
   ├─→ Lihat data donatur
   │
   ├─→ Lihat bukti transfer
   │
   ├─→ Cek rekening bank (manual)
   │
   ├─→ Klik "Verifikasi" atau "Tolak"
   │
   ▼
Jika VERIFIKASI:
   │
   ├─→ Status jadi VERIFIED
   │
   ├─→ collected_amount di program bertambah
   │
   ├─→ Send email kwitansi ke donatur (optional)
   │
   ▼
DONE
```

---

## 🏛️ SYSTEM ARCHITECTURE

### Tech Stack

```
┌──────────────────────────────────────────────┐
│           FRONTEND (View Layer)              │
├──────────────────────────────────────────────┤
│  • Blade Templates (Laravel)                 │
│  • Tailwind CSS (via CDN)                    │
│  • Alpine.js (interactivity)                 │
│  • Swiper.js (slider)                        │
│  • AOS (scroll animation)                    │
│  • Font Awesome (icons)                      │
└──────────────────┬───────────────────────────┘
                   │
                   ▼
┌──────────────────────────────────────────────┐
│          BACKEND (Laravel 12)                │
├──────────────────────────────────────────────┤
│  • Controllers (MVC)                         │
│  • Models (Eloquent ORM)                     │
│  • Middleware (Auth, CheckRole)              │
│  • Livewire (reactive components)            │
│  • Enums (UserRole, DonationStatus, etc)     │
│  • Seeders (sample data)                     │
└──────────────────┬───────────────────────────┘
                   │
                   ▼
┌──────────────────────────────────────────────┐
│            DATABASE (MySQL)                  │
├──────────────────────────────────────────────┤
│  • 15 Tables                                 │
│  • Foreign Keys (relational)                 │
│  • Indexes (performance)                     │
│  • PSAK 109 compliant structure              │
└──────────────────────────────────────────────┘


┌──────────────────────────────────────────────┐
│        EXTERNAL SERVICES (Optional)          │
├──────────────────────────────────────────────┤
│  • Midtrans (payment gateway)                │
│  • Mailtrap/SMTP (email)                     │
│  • WhatsApp API (notifications)              │
│  • Storage (S3/local for images)             │
└──────────────────────────────────────────────┘
```

### Folder Structure

```
lazismulengkong/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── BerandaController.php     ← Homepage
│   │   │   ├── ProgramController.php     ← List & detail program
│   │   │   ├── DonasiController.php      ← Handle donation
│   │   │   ├── DashboardController.php   ← User dashboard
│   │   │   ├── AuthController.php        ← Login/Register
│   │   │   └── Admin/
│   │   │       ├── AdminDashboardController.php
│   │   │       ├── AdminDonationController.php
│   │   │       └── AdminProgramController.php
│   │   └── Middleware/
│   │       ├── CheckRole.php             ← Role-based access
│   │       └── LogActivity.php           ← Audit trail
│   │
│   ├── Models/
│   │   ├── User.php                      ← User + relations
│   │   ├── Donation.php                  ← Donation + scopes
│   │   ├── Program.php                   ← Program + calculated fields
│   │   ├── DonationCategory.php
│   │   └── ...
│   │
│   ├── Enums/
│   │   ├── UserRole.php                  ← 5 roles
│   │   ├── DonationStatus.php            ← PENDING/VERIFIED/etc
│   │   ├── PaymentMethod.php
│   │   └── PsakFundType.php              ← Dana Zakat/Infaq/etc
│   │
│   └── Livewire/
│       ├── DonationForm.php              ← Form donasi reactive
│       └── ZakatCalculator.php           ← Kalkulator zakat
│
├── database/
│   ├── migrations/                       ← 15 migration files
│   └── seeders/                          ← Sample data
│
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php             ← Public layout
│       │   └── admin.blade.php           ← Admin layout
│       ├── components/
│       │   ├── navbar.blade.php
│       │   ├── footer.blade.php
│       │   └── bottom-nav.blade.php
│       ├── pages/                        ← Public pages
│       │   ├── beranda.blade.php
│       │   ├── program.blade.php
│       │   ├── donasi.blade.php
│       │   └── dashboard.blade.php
│       └── admin/                        ← Admin pages
│           ├── dashboard.blade.php
│           └── donations/index.blade.php
│
└── routes/
    └── web.php                           ← All routes defined
```

---

## 🔐 ROLE & PERMISSION MATRIX

```
┌──────────────────┬─────────┬──────────┬────────────┬───────────────┬──────┐
│   FITUR          │ KEPALA  │  ADMIN   │   FUND     │     STAFF     │ USER │
│                  │ KANTOR  │          │  RISING    │   PELAYANAN   │      │
├──────────────────┼─────────┼──────────┼────────────┼───────────────┼──────┤
│ Lihat Beranda    │    ✓    │    ✓     │     ✓      │       ✓       │  ✓   │
│ Lihat Program    │    ✓    │    ✓     │     ✓      │       ✓       │  ✓   │
│ Donasi           │    ✓    │    ✓     │     ✓      │       ✓       │  ✓   │
│ User Dashboard   │    ✓    │    ✓     │     ✓      │       ✓       │  ✓   │
├──────────────────┼─────────┼──────────┼────────────┼───────────────┼──────┤
│ Admin Dashboard  │    ✓    │    ✓     │     ✓      │       ✓       │  ✗   │
│ Input Donasi     │    ✓    │    ✓     │     ✓      │       ✗       │  ✗   │
│ Verifikasi Dana  │    ✓    │    ✓     │     ✗      │       ✓       │  ✗   │
│ Manage Program   │    ✓    │    ✓     │     ✗      │       ✗       │  ✗   │
│ Manage User      │    ✓    │    ✓     │     ✗      │       ✗       │  ✗   │
│ View Reports     │    ✓    │    ✓     │     ✓      │       ✓       │  ✗   │
│ Export PDF       │    ✓    │    ✓     │     ✗      │       ✗       │  ✗   │
│ Edit Settings    │    ✓    │    ✗     │     ✗      │       ✗       │  ✗   │
│ Approve Laporan  │    ✓    │    ✗     │     ✗      │       ✗       │  ✗   │
└──────────────────┴─────────┴──────────┴────────────┴───────────────┴──────┘

Legend:
✓ = Boleh akses
✗ = Tidak boleh akses
```

---

## 🔄 DATA FLOW DIAGRAM

### Flow: Donasi Baru → Verifikasi → Penyaluran

```
┌─────────────┐
│   DONATUR   │
└──────┬──────┘
       │ 1. Isi form donasi
       │    (kategori, nominal, data diri)
       ▼
┌──────────────────────────┐
│  DonasiController        │
│  • Validate input        │
│  • Generate invoice      │
│  • Calculate amil (12.5%)│
│  • Store to DB           │
│  • Status: PENDING       │
└──────┬───────────────────┘
       │ 2. Redirect ke payment
       ▼
┌──────────────────────────┐
│  Payment Page            │
│  • Show rekening bank    │
│  • Upload bukti transfer │
└──────┬───────────────────┘
       │ 3. Upload proof
       ▼
┌──────────────────────────┐
│  DONATIONS table         │
│  • invoice_number        │
│  • amount: 1,000,000     │
│  • amil_amount: 125,000  │
│  • net_amount: 875,000   │
│  • status: PENDING       │
│  • payment_proof: xxx.jpg│
└──────┬───────────────────┘
       │
       │ 4. Staff cek
       ▼
┌──────────────────────────┐
│  AdminDonationController │
│  • List pending          │
│  • View detail           │
│  • Check bank statement  │
│  • Click "Verifikasi"    │
└──────┬───────────────────┘
       │ 5. Update status
       ▼
┌──────────────────────────┐
│  Update Donation         │
│  • status: VERIFIED      │
│  • verified_by: admin_id │
│  • verified_at: now()    │
└──────┬───────────────────┘
       │ 6. Trigger update
       ▼
┌──────────────────────────┐
│  Update Program          │
│  • collected_amount += net_amount│
│  • donor_count += 1              │
└──────┬───────────────────┘
       │ 7. Send notification (optional)
       ▼
┌──────────────────────────┐
│  Email Kwitansi          │
│  • PDF receipt           │
│  • Thank you message     │
└──────────────────────────┘


Kemudian untuk PENYALURAN:
┌──────────────────────────┐
│  Admin/Staff             │
│  • Pilih program         │
│  • Pilih mustahik        │
│  • Input nominal salur   │
│  • Upload foto bukti     │
└──────┬───────────────────┘
       │
       ▼
┌──────────────────────────┐
│  DISTRIBUTIONS table     │
│  • program_id            │
│  • mustahik_id           │
│  • amount                │
│  • distribution_date     │
│  • proof_photo           │
└──────────────────────────┘
```

---

## 📊 SUMMARY: Development Phases

```
PHASE 1: Foundation (DONE ✓)
├─ Setup Laravel ✓
├─ Create migrations (15 tables) ✓
├─ Create models + relationships ✓
├─ Create seeders (realistic data) ✓
└─ HTML → Blade conversion (21 files) ✓

PHASE 2: Public Pages (85% DONE 🔥)
├─ Beranda with dynamic stats ✓ (commit: d26df0b)
├─ Program list & detail ✓ (commit: f260dcc, 9471f8c)
├─ Donation form flow ✓ (commit: 1b467e6) - routing & success page
├─ Form input binding (IN PROGRESS) - adding name attributes
└─ Static pages (kontak, tentang)

PHASE 3: Authentication
├─ Login/Register
├─ Password reset
└─ User dashboard

PHASE 4: Admin CMS
├─ Admin layout
├─ Manage programs (CRUD)
├─ Manage donations (verify/reject)
├─ Manage users
└─ Reports & export

PHASE 5: Enhancement
├─ Zakat calculator (Livewire)
├─ Email notifications
├─ Payment gateway (Midtrans)
└─ WhatsApp integration
```

---

## 🎯 Current Progress (Feb 16, 2026)

**Last Completed:**
- Program listing page: Display 6 real programs from database with dynamic progress bars, pillar icons, and pagination
- Program detail page: Show individual program with real donors list, collected amounts, and dynamic content rendering
- Donation form routing: Fixed form action to proper controller, enhanced payment success page with invoice details

**Currently Working On:**
- Adding name attributes to form inputs (category_id, amount, donor_name, payment_method)
- Dynamic category & program dropdowns from controller data

**Next Priority:**
1. Complete donation form input binding
2. Test full donation flow (form → payment → success)
3. User authentication (login/register)
4. User dashboard with donation history

**Git Commits:**
- `d26df0b` - Homepage stats integration
- `f260dcc` - Program listing dynamic
- `9471f8c` - Program detail dynamic
- `1b467e6` - Donation form route fix & payment success page
- `291e53f` - Architecture documentation

---

**Paham sekarang bro alurnya?** 😊

Next: Kita lanjut ngoding **Program Pages** dengan pemahaman yang jelas dari ERD & flow di atas!
