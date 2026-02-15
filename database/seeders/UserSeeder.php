<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Kepala Kantor',
                'email' => 'kepala@lazismulengkong.org',
                'phone' => '081200000001',
                'password' => Hash::make('password'),
                'role' => UserRole::KEPALA_KANTOR,
            ],
            [
                'name' => 'Staff Administrasi',
                'email' => 'admin@lazismulengkong.org',
                'phone' => '081200000002',
                'password' => Hash::make('password'),
                'role' => UserRole::ADMINISTRASI,
            ],
            [
                'name' => 'Staff Fund Rising',
                'email' => 'fundraising@lazismulengkong.org',
                'phone' => '081200000003',
                'password' => Hash::make('password'),
                'role' => UserRole::FUND_RISING,
            ],
            [
                'name' => 'Staff Pelayanan',
                'email' => 'pelayanan@lazismulengkong.org',
                'phone' => '081200000004',
                'password' => Hash::make('password'),
                'role' => UserRole::STAFF_PELAYANAN,
            ],
            [
                'name' => 'Muzakki Demo',
                'email' => 'user@lazismulengkong.org',
                'phone' => '081200000005',
                'password' => Hash::make('password'),
                'role' => UserRole::USER,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
