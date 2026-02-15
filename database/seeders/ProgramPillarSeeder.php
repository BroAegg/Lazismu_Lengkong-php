<?php

namespace Database\Seeders;

use App\Models\ProgramPillar;
use Illuminate\Database\Seeder;

class ProgramPillarSeeder extends Seeder
{
    public function run(): void
    {
        $pillars = [
            [
                'name' => 'Pilar Pendidikan',
                'slug' => 'pendidikan',
                'description' => 'Program beasiswa, bantuan pendidikan, dan pengembangan keilmuan',
                'icon' => 'fas fa-graduation-cap',
                'color' => '#2196F3',
                'sort_order' => 1,
            ],
            [
                'name' => 'Pilar Kesehatan',
                'slug' => 'kesehatan',
                'description' => 'Program layanan kesehatan, ambulans, dan pengobatan gratis',
                'icon' => 'fas fa-heartbeat',
                'color' => '#E91E63',
                'sort_order' => 2,
            ],
            [
                'name' => 'Pilar Ekonomi',
                'slug' => 'ekonomi',
                'description' => 'Program pemberdayaan ekonomi, UMKM, dan kemandirian mustahik',
                'icon' => 'fas fa-chart-line',
                'color' => '#FF9800',
                'sort_order' => 3,
            ],
            [
                'name' => 'Pilar Dakwah',
                'slug' => 'dakwah',
                'description' => 'Program dakwah, kajian, dan pengembangan Islam',
                'icon' => 'fas fa-mosque',
                'color' => '#4CAF50',
                'sort_order' => 4,
            ],
            [
                'name' => 'Pilar Sosial Kemanusiaan',
                'slug' => 'sosial-kemanusiaan',
                'description' => 'Program tanggap bencana, bantuan sosial, dan kemanusiaan',
                'icon' => 'fas fa-hands-helping',
                'color' => '#9C27B0',
                'sort_order' => 5,
            ],
            [
                'name' => 'Pilar Lingkungan',
                'slug' => 'lingkungan',
                'description' => 'Program pelestarian lingkungan dan kebencanaan',
                'icon' => 'fas fa-leaf',
                'color' => '#009688',
                'sort_order' => 6,
            ],
        ];

        foreach ($pillars as $pillar) {
            ProgramPillar::create($pillar);
        }
    }
}
