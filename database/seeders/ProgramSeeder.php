<?php

namespace Database\Seeders;

use App\Models\Program;
use App\Models\ProgramPillar;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $pillars = ProgramPillar::pluck('id', 'slug');

        // Program Ramadan 1447 H — Lazismu Lengkong
        $programs = [
            [
                'pillar_id'        => $pillars['sosial-kemanusiaan'] ?? 5,
                'title'            => 'Kado Ramadhan',
                'slug'             => 'kado-ramadhan',
                'description'      => 'Sebarkan kebahagiaan Ramadhan kepada anak yatim dan dhuafa melalui paket kado berisi kebutuhan pokok, pakaian baru, dan perlengkapan ibadah.',
                'content'          => '<h3>Tentang Program</h3><p>Ramadhan adalah bulan keberkahan. Kami mengajak Anda berbagi kebahagiaan kepada ratusan anak yatim dan keluarga dhuafa binaan Lazismu Lengkong.</p><h3>Isi Paket Kado</h3><ul><li>Pakaian baru (koko/gamis)</li><li>Perlengkapan ibadah (sajadah, tasbih)</li><li>Sembako pilihan</li><li>Uang saku lebaran</li></ul>',
                'image'            => 'programs/kado-ramadhan.jpg',
                'target_amount'    => 50000000.00,
                'collected_amount' => 12500000.00,
                'donor_count'      => 87,
                'psak_fund_type'   => 'DANA_INFAQ_SEDEKAH_TIDAK_TERIKAT',
                'start_date'       => '2026-02-01',
                'end_date'         => '2026-03-30',
                'is_featured'      => true,
                'is_active'        => true,
            ],
            [
                'pillar_id'        => $pillars['dakwah'] ?? 4,
                'title'            => 'Back to Masjid Ramadhan',
                'slug'             => 'back-to-masjid-ramadhan',
                'description'      => 'Hidupkan kembali semangat beribadah di masjid-masjid Kecamatan Lengkong dengan program kajian, tarawih, dan pemberdayaan jamaah selama Ramadhan 1447 H.',
                'content'          => '<h3>Tentang Program</h3><p>Masjid adalah jantung peradaban Islam. Program Back to Masjid hadir untuk menghidupkan kembali kegiatan ibadah dan dakwah di masjid-masjid binaan Muhammadiyah Lengkong.</p><h3>Kegiatan</h3><ul><li>Kajian Ramadhan setiap malam</li><li>Tarawih berjamaah</li><li>Buka puasa bersama</li><li>Pemberdayaan remaja masjid</li></ul>',
                'image'            => 'programs/back-to-masjid.jpg',
                'target_amount'    => 30000000.00,
                'collected_amount' => 7500000.00,
                'donor_count'      => 42,
                'psak_fund_type'   => 'DANA_INFAQ_SEDEKAH_TIDAK_TERIKAT',
                'start_date'       => '2026-02-01',
                'end_date'         => '2026-04-05',
                'is_featured'      => true,
                'is_active'        => true,
            ],
            [
                'pillar_id'        => $pillars['sosial-kemanusiaan'] ?? 5,
                'title'            => 'Tebar Takjil',
                'slug'             => 'tebar-takjil',
                'description'      => 'Berbagi hidangan berbuka puasa gratis kepada ribuan orang yang berpuasa di jalanan, masjid, dan titik-titik strategis Kecamatan Lengkong setiap hari Ramadhan.',
                'content'          => '<h3>Tentang Program</h3><p>Memberikan takjil adalah salah satu amalan terbaik di bulan Ramadhan. Barangsiapa memberi makan orang yang berbuka puasa, maka ia mendapat pahala seperti pahala orang yang berpuasa.</p><h3>Detail</h3><ul><li>500 paket takjil per hari</li><li>30 hari penuh selama Ramadhan</li><li>Titik distribusi strategis di Lengkong</li></ul>',
                'image'            => 'programs/tebar-takjil.jpg',
                'target_amount'    => 25000000.00,
                'collected_amount' => 5000000.00,
                'donor_count'      => 63,
                'psak_fund_type'   => 'DANA_INFAQ_SEDEKAH_TIDAK_TERIKAT',
                'start_date'       => '2026-02-15',
                'end_date'         => '2026-03-30',
                'is_featured'      => true,
                'is_active'        => true,
            ],
            [
                'pillar_id'        => $pillars['sosial-kemanusiaan'] ?? 5,
                'title'            => 'Mudikmu Aman',
                'slug'             => 'mudikmu-aman',
                'description'      => 'Program kepedulian untuk keselamatan pemudik Lebaran — menyediakan posko istirahat, makanan gratis, dan bantuan darurat di jalur mudik warga Kecamatan Lengkong.',
                'content'          => '<h3>Tentang Program</h3><p>Mudik adalah tradisi indah yang menyatukan keluarga. Lazismu Lengkong hadir memastikan perjalanan mudik Anda dan keluarga lebih aman dan penuh berkah.</p><h3>Layanan</h3><ul><li>Posko istirahat pemudik</li><li>Makanan dan minuman gratis</li><li>Cek kesehatan gratis</li><li>Bantuan darurat kendaraan mogok</li></ul>',
                'image'            => 'programs/mudikmu-aman.jpg',
                'target_amount'    => 20000000.00,
                'collected_amount' => 3000000.00,
                'donor_count'      => 28,
                'psak_fund_type'   => 'DANA_INFAQ_SEDEKAH_TIDAK_TERIKAT',
                'start_date'       => '2026-03-15',
                'end_date'         => '2026-04-10',
                'is_featured'      => true,
                'is_active'        => true,
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
