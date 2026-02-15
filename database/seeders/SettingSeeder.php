<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // Zakat Settings
            ['key' => 'gold_price_per_gram', 'value' => '1200000', 'type' => 'integer', 'group' => 'zakat', 'description' => 'Harga emas per gram (Rp) untuk perhitungan nisab'],
            ['key' => 'silver_price_per_gram', 'value' => '15000', 'type' => 'integer', 'group' => 'zakat', 'description' => 'Harga perak per gram (Rp)'],
            ['key' => 'rice_price_per_kg', 'value' => '50000', 'type' => 'integer', 'group' => 'zakat', 'description' => 'Harga beras per kg (Rp) untuk zakat fitrah'],
            ['key' => 'nisab_gold_gram', 'value' => '85', 'type' => 'integer', 'group' => 'zakat', 'description' => 'Nisab emas (gram)'],
            ['key' => 'nisab_silver_gram', 'value' => '595', 'type' => 'integer', 'group' => 'zakat', 'description' => 'Nisab perak (gram)'],
            ['key' => 'fitrah_amount', 'value' => '3.5', 'type' => 'float', 'group' => 'zakat', 'description' => 'Jumlah beras fitrah per jiwa (kg)'],

            // Amil Settings
            ['key' => 'amil_zakat_percent', 'value' => '12.5', 'type' => 'float', 'group' => 'amil', 'description' => 'Persentase amil dari zakat (max 12.5%)'],
            ['key' => 'amil_infaq_percent', 'value' => '20', 'type' => 'float', 'group' => 'amil', 'description' => 'Persentase amil dari infaq/sedekah'],

            // General
            ['key' => 'org_name', 'value' => 'Lazismu Lengkong', 'type' => 'string', 'group' => 'general', 'description' => 'Nama organisasi'],
            ['key' => 'org_address', 'value' => 'Jl. Buah Batu No. 59, Kec. Lengkong, Kota Bandung', 'type' => 'string', 'group' => 'general', 'description' => 'Alamat kantor layanan'],
            ['key' => 'org_phone', 'value' => '+6281234567890', 'type' => 'string', 'group' => 'general', 'description' => 'Nomor telepon/WA'],
            ['key' => 'org_email', 'value' => 'sapa@lazismulengkong.org', 'type' => 'string', 'group' => 'general', 'description' => 'Email organisasi'],

            // Bank Accounts
            ['key' => 'bank_bsi_account', 'value' => '700 123 4567', 'type' => 'string', 'group' => 'bank', 'description' => 'Nomor rekening BSI'],
            ['key' => 'bank_bsi_name', 'value' => 'LAZISMU LENGKONG', 'type' => 'string', 'group' => 'bank', 'description' => 'Nama pemilik rekening BSI'],
            ['key' => 'bank_bri_account', 'value' => '0123 0100 1234 567', 'type' => 'string', 'group' => 'bank', 'description' => 'Nomor rekening BRI'],
            ['key' => 'bank_bri_name', 'value' => 'LAZISMU LENGKONG', 'type' => 'string', 'group' => 'bank', 'description' => 'Nama pemilik rekening BRI'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
