<?php

namespace Database\Seeders;

use App\Models\Program;
use App\Models\ProgramPillar;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DemoProgramSeeder extends Seeder
{
    public function run(): void
    {
        $pillars = ProgramPillar::all()->keyBy('slug');
        
        $programs = [
            [
                'title' => 'Kado Lebaran Yatim',
                'slug' => 'kado-lebaran-yatim',
                'pillar_id' => $pillars['sosial-kemanusiaan']->id,
                'description' => 'Kebahagiaan di hari Fitri untuk adik-adik di LKSA Taman Harapan. Paket lengkap baju baru, sepatu, dan THR.',
                'target_amount' => 17500000, // 50 paket x 350rb
                'collected_amount' => 11900000, // 34 paket terkumpul
                'start_date' => now()->subDays(10),
                'end_date' => now()->addDays(20),
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Beasiswa Sang Surya',
                'slug' => 'beasiswa-sang-surya',
                'pillar_id' => $pillars['pendidikan']->id,
                'description' => 'Patungan bantu SPP & alat tulis siswa SD/SMP/SMA Muhammadiyah Lengkong yang kurang mampu.',
                'target_amount' => 30000000, // 120 siswa x 250rb
                'collected_amount' => 18500000,
                'start_date' => now()->subDays(5),
                'end_date' => now()->addDays(55),
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Iftar On The Road',
                'slug' => 'iftar-on-the-road',
                'pillar_id' => $pillars['sosial-kemanusiaan']->id,
                'description' => 'Paket buka puasa sehat untuk pekerja sektor informal Lengkong: ojol, pedagang kaki lima, dan pemulung.',
                'target_amount' => 25000000, // 1000 paket x 25rb
                'collected_amount' => 8750000,
                'start_date' => now()->subDays(3),
                'end_date' => now()->addDays(27),
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Renovasi Panti Taman Harapan',
                'slug' => 'renovasi-panti-taman-harapan',
                'pillar_id' => $pillars['sosial-kemanusiaan']->id,
                'description' => 'Perbaikan atap bocor, cat dinding, dan renovasi kamar mandi LKSA Taman Harapan agar anak-anak yatim lebih nyaman.',
                'target_amount' => 50000000,
                'collected_amount' => 12300000,
                'start_date' => now()->subDays(15),
                'end_date' => now()->addDays(45),
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Santunan Dhuafa Lengkong',
                'slug' => 'santunan-dhuafa-lengkong',
                'pillar_id' => $pillars['dakwah']->id,
                'description' => 'Program rutin santunan sembako dan uang tunai untuk 100 KK dhuafa di wilayah Kecamatan Lengkong.',
                'target_amount' => 20000000,
                'collected_amount' => 15600000,
                'start_date' => now()->subDays(20),
                'end_date' => now()->addDays(10),
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Gerakan Wakaf Quran',
                'slug' => 'gerakan-wakaf-quran',
                'pillar_id' => $pillars['dakwah']->id,
                'description' => 'Mewakafkan Al-Quran untuk masjid-masjid dan mushola di Lengkong yang membutuhkan.',
                'target_amount' => 10000000,
                'collected_amount' => 7200000,
                'start_date' => now()->subDays(7),
                'end_date' => now()->addDays(53),
                'is_active' => true,
                'is_featured' => true,
            ],
        ];

        foreach ($programs as $program) {
            Program::create($program);
        }
        
        echo "✅ 6 program demo berhasil dibuat!\n";
    }
}
