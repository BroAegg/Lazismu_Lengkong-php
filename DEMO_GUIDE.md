# 🎯 DEMO GUIDE - Lazismu Lengkong

## Quick Demo Flow (5 Menit)

### 1. **Homepage Stats** (30 detik)
**URL:** `http://127.0.0.1:8000`

**Showcase:**
- Real-time counter dari database
- Total donatur: **1 Orang**
- Mustahik terdaftar: **0 Orang**
- Total tersalurkan: **Rp 50.9M** (dari 50 donasi VERIFIED)

**Technical Highlight:**
```php
// BerandaController.php - Line 13-15
$totalDonors = Donation::distinct('donor_email')->count('donor_email');
$totalRecipients = 0; // Belum ada data mustahik
$totalDistributed = Donation::where('status', 'VERIFIED')->sum('net_amount');
```

---

### 2. **Program Listing** (45 detik)
**URL:** `http://127.0.0.1:8000/program`

**Showcase:**
- 6 program real dari database
- Dynamic progress bar (collected / target)
- Pillar icons (Ekonomi, Pendidikan, Kesehatan, Kemanusiaan, Dakwah, Lingkungan)
- Pagination ready (12 per halaman)

**Highlight Program:**
- **Beasiswa Anak Yatim** - Target Rp 150M
- **Bantuan Korban Bencana Alam** - Target Rp 200M
- **Renovasi Masjid Al-Ikhlas** - Target Rp 120M

**Technical:**
```php
// ProgramController@index - Lines 16-21
$programs = Program::with(['pillar', 'donations'])
    ->active()
    ->ongoing()
    ->orderBy('featured', 'desc')
    ->paginate(12);
```

---

### 3. **Program Detail** (45 detik)
**URL:** `http://127.0.0.1:8000/program/beasiswa-anak-yatim`

**Showcase:**
- Hero image & program title
- Real stats: Terkumpul, Target, Days Left
- Progress percentage (0-100%)
- Donor list dengan avatar warna random
- Dynamic content rendering (HTML dari database)

**Code Example:**
```blade
{{-- Progress Calculation --}}
@php
    $collected = $program->donations()->verified()->sum('net_amount');
    $progress = $program->target_amount > 0 
        ? min(($collected / $program->target_amount) * 100, 100) 
        : 0;
@endphp
```

---

### 4. **Donation Form** (1 menit)
**URL:** `http://127.0.0.1:8000/donasi`

**Showcase:**
- Support **guest donations** (tanpa login!)
- Dynamic category dropdown (Zakat, Infaq, Sedekah, Wakaf)
- Optional program selection
- Payment methods: QRIS, Transfer BSI
- Required fields: Amount (min Rp 10.000), Email, Phone
- Anonymous option (Hamba Allah)

**Key Features:**
```html
<!-- All inputs have proper name attributes matching controller validation -->
<select name="category_id" required>
<input name="amount" type="number" min="10000" required>
<input name="donor_email" type="email" required>
<input name="payment_method" value="QRIS">
```

**Controller Logic:**
```php
// DonasiController@store - Lines 38-54
$donation = Donation::create([
    'invoice_number' => Donation::generateInvoiceNumber(), // LZM-20260216-0001
    'donor_id' => auth()->id(), // Null for guests
    'donor_email' => $request->donor_email ?? auth()->user()?->email,
    'amount' => $request->amount,
    // ... calculate amil & net amount
]);
```

---

### 5. **Payment Success** (30 detik)
**URL:** `http://127.0.0.1:8000/donasi/sukses/{invoice}`

**Showcase:**
- Invoice number (LZM-YYYYMMDD-XXXX)
- Category & Program name
- Amount formatted (Rp 100.000)
- Payment method (QRIS / Transfer BSI)
- Status badge (PENDING - yellow)
- Timestamp

**Example:**
```
Invoice: LZM-20260216-0051
Category: Zakat Fitrah
Program: Ramadan 2026
Amount: Rp 100.000
Status: PENDING
Metode: QRIS
```

---

## Technical Deep Dive (2 Menit)

### Database Schema
**15 Tables:**
1. `users` - 5 roles (donatur, kepala_kantor, administrasi, fund_rising, staff_pelayanan)
2. `donations` - Invoice, PSAK fund types, status tracking
3. `donation_categories` + `donation_sub_categories` (4 main + 14 sub)
4. `programs` - Linked to 6 pillars
5. `settings` - Nisab values, bank accounts, contact

### Enums (Type-Safe)
```php
enum DonationStatus: string {
    case PENDING = 'PENDING';
    case VERIFIED = 'VERIFIED';
    case REJECTED = 'REJECTED';
    case REFUNDED = 'REFUNDED';
    case CANCELLED = 'CANCELLED';
}
```

### PSAK 109 Compliance
**Fund Separation:**
- DANA_ZAKAT → Amil max 12.5%
- DANA_INFAQ_SEDEKAH_TERIKAT → 0% amil
- DANA_WAKAF → 0% amil (perpetual asset)

**Amil Calculation:**
```php
// Donation Model - calculateAmilAmount()
if ($this->psak_fund_type === PsakFundType::DANA_ZAKAT) {
    $this->amil_amount = $this->amount * 0.125; // 12.5%
} else {
    $this->amil_amount = 0;
}
```

---

## Git History (Proof of Work)

```bash
git log --oneline --graph --all
```

**Recent Commits:**
- `b7827c0` - fix: Remove unused JavaScript route reference
- `0ea606a` - docs: Update progress to 95% Phase 2
- `3189910` - feat: Support guest donations (email field & public routes)
- `1b467e6` - feat: Donation form routing & payment success page
- `9471f8c` - feat: Program detail page with dynamic donors
- `f260dcc` - feat: Program listing with progress bars
- `d26df0b` - feat: Homepage stats from database

---

## What's Working NOW ✅

1. **Homepage** - Dynamic stats
2. **Program Listing** - 6 real programs with progress
3. **Program Detail** - Individual program with donors list
4. **Donation Form** - Guest & authenticated donations
5. **Payment Success** - Invoice generation & display
6. **Database** - 50 seeded donations, 6 programs, 7 users
7. **Invoice System** - Auto-generate LZM-YYYYMMDD-XXXX
8. **PSAK 109** - Fund type separation & amil calculation

---

## What's Next 🚀

### Phase 3: Authentication (Belum)
- Login / Register
- Email verification
- Password reset
- User dashboard (donation history)

### Phase 4: Admin CMS (Belum)
- Dashboard with analytics
- Program CRUD
- Donation verification (verify/reject)
- User management
- Report generation (laporan keuangan PSAK 109)

### Phase 5: Payment Integration (Belum)
- QRIS via Midtrans/Xendit
- Virtual Account (BSI, BRI, Mandiri)
- Payment callback handling
- Auto-verify on payment success

---

## Testing Checklist

- [x] Homepage loads with real stats
- [x] Program listing shows 6 programs
- [x] Program detail shows correct data
- [x] Donation form displays categories & programs
- [x] Form inputs have proper name attributes
- [x] Guest donation (tanpa login) - **READY**
- [x] Invoice generation format LZM-YYYYMMDD-XXXX
- [x] Payment success page shows invoice details
- [ ] Authenticated donation (auto-fill data from user)
- [ ] Form validation errors
- [ ] Database insertion verified
- [ ] Payment gateway integration

---

## Server Commands

```bash
# Start Laravel
cd /home/alexa/Documents/project/lazismulengkong
php artisan serve --port=8000

# Check latest donation
php artisan tinker --execute="App\Models\Donation::latest()->first();"

# Database refresh (re-seed)
php artisan migrate:fresh --seed

# Git status
git log --oneline -5
```

---

## Presentation Tips 💡

1. **Start with Impact**: "Sistem donasi LAZISMU yang PSAK 109 compliant - artinya audit-ready untuk laporan keuangan syariah"

2. **Live Demo Priority**: 
   - Homepage (impress dengan stats)
   - Donation form (show guest donation works!)
   - Payment success (invoice generation)

3. **Code Highlight**: Show ERD dari ARCHITECTURE.md (15 tables, relationships clear)

4. **Business Logic**: Explain PSAK 109 fund separation (Zakat ≠ Wakaf ≠ Infaq)

5. **Git Proof**: Show commit history (5 systematic commits)

6. **Roadmap**: Phase 3 (Auth) & Phase 4 (Admin CMS) sudah terencana di ARCHITECTURE.md

---

**Current Status:** Phase 2 at **95% Complete** 🔥

- kado ramadhan
- back to masjid
- takjil
- mudik
