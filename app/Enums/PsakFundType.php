<?php

namespace App\Enums;

/**
 * Tipe Dana sesuai PSAK 109 (Standar Akuntansi Zakat & Infaq/Sedekah)
 */
enum PsakFundType: string
{
    case DANA_ZAKAT                      = 'DANA_ZAKAT';
    case DANA_INFAQ_SEDEKAH_TERIKAT      = 'DANA_INFAQ_SEDEKAH_TERIKAT';
    case DANA_INFAQ_SEDEKAH_TIDAK_TERIKAT = 'DANA_INFAQ_SEDEKAH_TIDAK_TERIKAT';
    case DANA_AMIL                       = 'DANA_AMIL';
    case DANA_WAKAF                      = 'DANA_WAKAF';
    case DANA_NON_HALAL                  = 'DANA_NON_HALAL';

    public function label(): string
    {
        return match ($this) {
            self::DANA_ZAKAT                       => 'Dana Zakat',
            self::DANA_INFAQ_SEDEKAH_TERIKAT       => 'Dana Infaq/Sedekah Terikat',
            self::DANA_INFAQ_SEDEKAH_TIDAK_TERIKAT => 'Dana Infaq/Sedekah Tidak Terikat',
            self::DANA_AMIL                        => 'Dana Amil',
            self::DANA_WAKAF                       => 'Dana Wakaf',
            self::DANA_NON_HALAL                   => 'Dana Non-Halal',
        };
    }

    public function rules(): string
    {
        return match ($this) {
            self::DANA_ZAKAT                       => 'Hanya boleh disalurkan ke 8 asnaf. Bagian amil maksimal 12,5% (1/8)',
            self::DANA_INFAQ_SEDEKAH_TERIKAT       => 'Harus disalurkan sesuai tujuan yang ditentukan donatur',
            self::DANA_INFAQ_SEDEKAH_TIDAK_TERIKAT => 'Lembaga berwenang menentukan alokasi penyaluran',
            self::DANA_AMIL                        => 'Digunakan untuk operasional lembaga (gaji, biaya program)',
            self::DANA_WAKAF                       => 'Pokok dana tidak boleh habis; hanya manfaat/hasil yang disalurkan',
            self::DANA_NON_HALAL                   => 'Wajib dilaporkan terpisah, digunakan untuk kepentingan umum saja',
        };
    }

    /**
     * Warna untuk reporting/dashboard
     */
    public function color(): string
    {
        return match ($this) {
            self::DANA_ZAKAT                       => '#F7941D',
            self::DANA_INFAQ_SEDEKAH_TERIKAT       => '#00A651',
            self::DANA_INFAQ_SEDEKAH_TIDAK_TERIKAT => '#2ECC71',
            self::DANA_AMIL                        => '#3498DB',
            self::DANA_WAKAF                       => '#9B59B6',
            self::DANA_NON_HALAL                   => '#E74C3C',
        };
    }
}
