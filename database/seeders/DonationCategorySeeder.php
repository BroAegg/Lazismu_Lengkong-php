<?php

namespace Database\Seeders;

use App\Enums\PsakFundType;
use App\Models\DonationCategory;
use App\Models\DonationSubCategory;
use Illuminate\Database\Seeder;

class DonationCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Zakat',
                'slug' => 'zakat',
                'description' => 'Kewajiban harta bagi Muslim yang memenuhi syarat (nisab & haul)',
                'icon' => 'fas fa-mosque',
                'psak_fund_type' => PsakFundType::DANA_ZAKAT->value,
                'color' => '#00A651',
                'sort_order' => 1,
                'subs' => [
                    ['name' => 'Zakat Fitrah', 'slug' => 'zakat-fitrah', 'description' => 'Zakat jiwa di bulan Ramadhan, wajib bagi setiap Muslim', 'icon' => 'fas fa-moon', 'psak_fund_type' => PsakFundType::DANA_ZAKAT->value],
                    ['name' => 'Zakat Maal', 'slug' => 'zakat-maal', 'description' => 'Zakat harta kekayaan (tabungan, investasi, dll)', 'icon' => 'fas fa-coins', 'psak_fund_type' => PsakFundType::DANA_ZAKAT->value],
                    ['name' => 'Zakat Penghasilan', 'slug' => 'zakat-penghasilan', 'description' => 'Zakat profesi dari pendapatan rutin (gaji, honorarium)', 'icon' => 'fas fa-briefcase', 'psak_fund_type' => PsakFundType::DANA_ZAKAT->value],
                    ['name' => 'Zakat Emas & Perak', 'slug' => 'zakat-emas-perak', 'description' => 'Zakat kepemilikan emas/perak yang mencapai nisab', 'icon' => 'fas fa-ring', 'psak_fund_type' => PsakFundType::DANA_ZAKAT->value],
                    ['name' => 'Zakat Perdagangan', 'slug' => 'zakat-perdagangan', 'description' => 'Zakat atas aset usaha/perdagangan', 'icon' => 'fas fa-store', 'psak_fund_type' => PsakFundType::DANA_ZAKAT->value],
                    ['name' => 'Zakat Pertanian', 'slug' => 'zakat-pertanian', 'description' => 'Zakat hasil pertanian, perkebunan, dan peternakan', 'icon' => 'fas fa-seedling', 'psak_fund_type' => PsakFundType::DANA_ZAKAT->value],
                ],
            ],
            [
                'name' => 'Infaq & Sedekah',
                'slug' => 'infaq-sedekah',
                'description' => 'Pemberian sukarela di jalan Allah, tanpa batas minimal',
                'icon' => 'fas fa-hand-holding-heart',
                'psak_fund_type' => PsakFundType::DANA_INFAQ_SEDEKAH_TIDAK_TERIKAT->value,
                'color' => '#F7941D',
                'sort_order' => 2,
                'subs' => [
                    ['name' => 'Infaq Umum', 'slug' => 'infaq-umum', 'description' => 'Infaq bebas tanpa peruntukan khusus', 'icon' => 'fas fa-donate', 'psak_fund_type' => PsakFundType::DANA_INFAQ_SEDEKAH_TIDAK_TERIKAT->value, 'restriction_type' => 'TIDAK_TERIKAT'],
                    ['name' => 'Infaq Pendidikan', 'slug' => 'infaq-pendidikan', 'description' => 'Infaq untuk beasiswa dan sarana pendidikan', 'icon' => 'fas fa-graduation-cap', 'psak_fund_type' => PsakFundType::DANA_INFAQ_SEDEKAH_TERIKAT->value, 'restriction_type' => 'TERIKAT'],
                    ['name' => 'Infaq Kesehatan', 'slug' => 'infaq-kesehatan', 'description' => 'Infaq untuk kesehatan dan pengobatan', 'icon' => 'fas fa-heartbeat', 'psak_fund_type' => PsakFundType::DANA_INFAQ_SEDEKAH_TERIKAT->value, 'restriction_type' => 'TERIKAT'],
                    ['name' => 'Infaq Dakwah', 'slug' => 'infaq-dakwah', 'description' => 'Infaq untuk kegiatan dakwah dan syiar Islam', 'icon' => 'fas fa-bullhorn', 'psak_fund_type' => PsakFundType::DANA_INFAQ_SEDEKAH_TERIKAT->value, 'restriction_type' => 'TERIKAT'],
                    ['name' => 'Infaq Bencana', 'slug' => 'infaq-bencana', 'description' => 'Infaq tanggap darurat bencana alam', 'icon' => 'fas fa-hands-helping', 'psak_fund_type' => PsakFundType::DANA_INFAQ_SEDEKAH_TERIKAT->value, 'restriction_type' => 'TERIKAT'],
                    ['name' => 'Sedekah Jariyah', 'slug' => 'sedekah-jariyah', 'description' => 'Sedekah yang pahalanya terus mengalir', 'icon' => 'fas fa-water', 'psak_fund_type' => PsakFundType::DANA_INFAQ_SEDEKAH_TERIKAT->value, 'restriction_type' => 'TERIKAT'],
                    ['name' => 'Fidyah', 'slug' => 'fidyah', 'description' => 'Pengganti puasa bagi yang berhalangan tetap', 'icon' => 'fas fa-utensils', 'psak_fund_type' => PsakFundType::DANA_INFAQ_SEDEKAH_TIDAK_TERIKAT->value, 'restriction_type' => 'TIDAK_TERIKAT'],
                    ['name' => 'Qurban & Aqiqah', 'slug' => 'qurban-aqiqah', 'description' => 'Penyembelihan hewan untuk ibadah qurban/aqiqah', 'icon' => 'fas fa-drumstick-bite', 'psak_fund_type' => PsakFundType::DANA_INFAQ_SEDEKAH_TERIKAT->value, 'restriction_type' => 'TERIKAT'],
                ],
            ],
            [
                'name' => 'Wakaf',
                'slug' => 'wakaf',
                'description' => 'Menyerahkan harta untuk kepentingan umat yang dikelola dengan prinsip abadi',
                'icon' => 'fas fa-landmark',
                'psak_fund_type' => PsakFundType::DANA_WAKAF->value,
                'color' => '#2196F3',
                'sort_order' => 3,
                'subs' => [
                    ['name' => 'Wakaf Uang', 'slug' => 'wakaf-uang', 'description' => 'Wakaf berupa uang tunai yang dikelola produktif', 'icon' => 'fas fa-money-bill-wave', 'psak_fund_type' => PsakFundType::DANA_WAKAF->value],
                    ['name' => 'Wakaf Quran', 'slug' => 'wakaf-quran', 'description' => 'Wakaf mushaf Al-Quran untuk masjid dan pesantren', 'icon' => 'fas fa-book-open', 'psak_fund_type' => PsakFundType::DANA_WAKAF->value],
                    ['name' => 'Wakaf Produktif', 'slug' => 'wakaf-produktif', 'description' => 'Wakaf aset produktif (tanah, bangunan, alat usaha)', 'icon' => 'fas fa-building', 'psak_fund_type' => PsakFundType::DANA_WAKAF->value],
                ],
            ],
            [
                'name' => 'Kedermawanan Sosial',
                'slug' => 'kedermawanan-sosial',
                'description' => 'Donasi kemanusiaan untuk masyarakat yang membutuhkan',
                'icon' => 'fas fa-users',
                'psak_fund_type' => PsakFundType::DANA_INFAQ_SEDEKAH_TIDAK_TERIKAT->value,
                'color' => '#9C27B0',
                'sort_order' => 4,
                'subs' => [
                    ['name' => 'Bantuan Kemanusiaan', 'slug' => 'bantuan-kemanusiaan', 'description' => 'Bantuan langsung untuk masyarakat terdampak', 'icon' => 'fas fa-hand-holding-medical', 'psak_fund_type' => PsakFundType::DANA_INFAQ_SEDEKAH_TIDAK_TERIKAT->value, 'restriction_type' => 'TIDAK_TERIKAT'],
                    ['name' => 'Pemberdayaan Ekonomi', 'slug' => 'pemberdayaan-ekonomi', 'description' => 'Program ekonomi produktif untuk mustahik', 'icon' => 'fas fa-chart-line', 'psak_fund_type' => PsakFundType::DANA_INFAQ_SEDEKAH_TERIKAT->value, 'restriction_type' => 'TERIKAT'],
                    ['name' => 'CSR Partnership', 'slug' => 'csr-partnership', 'description' => 'Kerjasama CSR dengan perusahaan/lembaga', 'icon' => 'fas fa-handshake', 'psak_fund_type' => PsakFundType::DANA_INFAQ_SEDEKAH_TERIKAT->value, 'restriction_type' => 'TERIKAT'],
                ],
            ],
        ];

        foreach ($categories as $catData) {
            $subs = $catData['subs'];
            unset($catData['subs']);

            $category = DonationCategory::create($catData);

            foreach ($subs as $i => $sub) {
                $sub['category_id'] = $category->id;
                $sub['sort_order'] = $i + 1;
                $sub['restriction_type'] = $sub['restriction_type'] ?? null;
                DonationSubCategory::create($sub);
            }
        }
    }
}
