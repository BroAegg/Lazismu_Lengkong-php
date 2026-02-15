<?php

namespace App\Enums;

/**
 * Tipe pembatasan penggunaan dana Infaq/Sedekah (PSAK 109)
 */
enum RestrictionType: string
{
    case TERIKAT       = 'TERIKAT';
    case TIDAK_TERIKAT = 'TIDAK_TERIKAT';

    public function label(): string
    {
        return match ($this) {
            self::TERIKAT       => 'Terikat (Restricted)',
            self::TIDAK_TERIKAT => 'Tidak Terikat (Unrestricted)',
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::TERIKAT       => 'Dana harus disalurkan sesuai tujuan spesifik yang ditentukan donatur',
            self::TIDAK_TERIKAT => 'Lembaga berwenang menentukan alokasi penyaluran dana',
        };
    }
}
