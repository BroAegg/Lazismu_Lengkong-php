<?php

namespace Database\Seeders;

use App\Models\Program;
use App\Models\ProgramPillar;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $pillars = ProgramPillar::pluck('id', 'slug');

        $programs = [
            [
                'pillar_id' => $pillars['pendidikan'] ?? null,
                'title' => 'Beasiswa Anak Yatim & Dhuafa',
                'slug' => 'beasiswa-anak-yatim-dhuafa',
                'description' => 'Program beasiswa pendidikan untuk anak yatim dan keluarga tidak mampu dari SD hingga Perguruan Tinggi',
                'content' => '<h3>Tentang Program</h3><p>Program beasiswa ini ditujukan untuk membantu anak-anak yatim dan dhuafa yang berprestasi namun terkendala biaya pendidikan. Dana akan digunakan untuk biaya SPP, seragam, buku, dan kebutuhan sekolah lainnya.</p><h3>Manfaat Program</h3><ul><li>Bantuan SPP bulanan</li><li>Perlengkapan sekolah lengkap</li><li>Bimbingan belajar gratis</li><li>Pendampingan akademik</li></ul>',
                'image' => 'programs/beasiswa-anak-yatim.jpg',
                'target_amount' => 150000000.00,
                'collected_amount' => 87500000.00,
                'donor_count' => 245,
                'psak_fund_type' => 'DANA_INFAQ_SEDEKAH_TIDAK_TERIKAT',
                'start_date' => Carbon::now()->subMonths(3),
                'end_date' => Carbon::now()->addMonths(9),
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'pillar_id' => $pillars['kesehatan'] ?? null,
                'title' => 'Bantuan Pengobatan Gratis',
                'slug' => 'bantuan-pengobatan-gratis',
                'description' => 'Layanan kesehatan dan pengobatan gratis untuk masyarakat tidak mampu termasuk operasi dan rawat inap',
                'content' => '<h3>Tentang Program</h3><p>Program ini menyediakan akses layanan kesehatan gratis bagi masyarakat kurang mampu yang membutuhkan pengobatan namun terkendala biaya.</p><h3>Layanan Tersedia</h3><ul><li>Konsultasi dokter umum & spesialis</li><li>Obat-obatan gratis</li><li>Biaya operasi & rawat inap</li><li>Pemeriksaan laboratorium</li></ul>',
                'image' => 'programs/pengobatan-gratis.jpg',
                'target_amount' => 200000000.00,
                'collected_amount' => 142300000.00,
                'donor_count' => 387,
                'psak_fund_type' => 'DANA_INFAQ_SEDEKAH_TIDAK_TERIKAT',
                'start_date' => Carbon::now()->subMonths(6),
                'end_date' => null,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'pillar_id' => $pillars['ekonomi'] ?? null,
                'title' => 'Pemberdayaan UMKM Mustahik',
                'slug' => 'pemberdayaan-umkm-mustahik',
                'description' => 'Program modal usaha dan pelatihan untuk mustahik agar mandiri secara ekonomi',
                'content' => '<h3>Tentang Program</h3><p>Program ini memberikan bantuan modal usaha disertai pelatihan kewirausahaan kepada keluarga mustahik untuk memulai atau mengembangkan usaha kecil.</p><h3>Fasilitas Program</h3><ul><li>Modal usaha Rp 3-10 juta</li><li>Pelatihan bisnis & manajemen</li><li>Pendampingan UMKM</li><li>Akses pasar produk</li></ul>',
                'image' => 'programs/umkm-mustahik.jpg',
                'target_amount' => 100000000.00,
                'collected_amount' => 58700000.00,
                'donor_count' => 156,
                'psak_fund_type' => 'DANA_ZAKAT',
                'start_date' => Carbon::now()->subMonths(2),
                'end_date' => Carbon::now()->addMonths(10),
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'pillar_id' => $pillars['sosial-dakwah'] ?? null,
                'title' => 'Santunan Anak Yatim Bulanan',
                'slug' => 'santunan-anak-yatim-bulanan',
                'description' => 'Santunan rutin bulanan untuk 150 anak yatim binaan Lazismu Lengkong',
                'content' => '<h3>Tentang Program</h3><p>Program santunan bulanan ini memberikan bantuan finansial kepada 150 anak yatim yang menjadi binaan Lazismu Lengkong untuk memenuhi kebutuhan sehari-hari.</p><h3>Rincian Bantuan</h3><ul><li>Santunan Rp 300.000/anak/bulan</li><li>Bingkisan sembako setiap bulan</li><li>Paket lebaran & ulang tahun</li><li>Kegiatan mentoring rutin</li></ul>',
                'image' => 'programs/santunan-yatim.jpg',
                'target_amount' => 54000000.00,
                'collected_amount' => 45600000.00,
                'donor_count' => 128,
                'psak_fund_type' => 'DANA_ZAKAT',
                'start_date' => Carbon::now()->startOfYear(),
                'end_date' => Carbon::now()->endOfYear(),
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'pillar_id' => $pillars['kemanusiaan'] ?? null,
                'title' => 'Tanggap Bencana Alam',
                'slug' => 'tanggap-bencana-alam',
                'description' => 'Dana siaga untuk respons cepat bantuan kemanusiaan saat terjadi bencana alam',
                'content' => '<h3>Tentang Program</h3><p>Dana ini disiapkan untuk mobilisasi cepat bantuan kemanusiaan ketika terjadi bencana alam di wilayah Kota Bandung dan sekitarnya.</p><h3>Bentuk Bantuan</h3><ul><li>Distribusi sembako & air bersih</li><li>Tenda & selimut pengungsi</li><li>Layanan medis darurat</li><li>Trauma healing anak-anak</li></ul>',
                'image' => 'programs/tanggap-bencana.jpg',
                'target_amount' => 75000000.00,
                'collected_amount' => 23400000.00,
                'donor_count' => 89,
                'psak_fund_type' => 'DANA_INFAQ_SEDEKAH_TIDAK_TERIKAT',
                'start_date' => Carbon::now()->subMonth(),
                'end_date' => null,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'pillar_id' => $pillars['infrastruktur'] ?? null,
                'title' => 'Renovasi Masjid Al-Hikmah',
                'slug' => 'renovasi-masjid-al-hikmah',
                'description' => 'Program renovasi dan perluasan Masjid Al-Hikmah untuk meningkatkan kenyamanan ibadah jamaah',
                'content' => '<h3>Tentang Program</h3><p>Masjid Al-Hikmah yang berlokasi di Kecamatan Lengkong membutuhkan renovasi menyeluruh untuk meningkatkan kapasitas dan kenyamanan jamaah.</p><h3>Rencana Renovasi</h3><ul><li>Perluasan ruang sholat</li><li>Perbaikan sound system</li><li>Renovasi kamar mandi</li><li>Pengadaan AC & karpet baru</li></ul>',
                'image' => 'programs/renovasi-masjid.jpg',
                'target_amount' => 250000000.00,
                'collected_amount' => 127800000.00,
                'donor_count' => 312,
                'psak_fund_type' => 'DANA_WAKAF',
                'start_date' => Carbon::now()->subMonths(4),
                'end_date' => Carbon::now()->addMonths(8),
                'is_featured' => true,
                'is_active' => true,
            ],
        ];

        foreach ($programs as $program) {
            Program::updateOrCreate(
                ['slug' => $program['slug']],
                $program
            );
        }

        $this->command->info('✓ Programs seeded successfully!');
    }
}
