<?php

namespace App\Enums;

enum UserRole: string
{
    case KEPALA_KANTOR   = 'KEPALA_KANTOR';
    case ADMINISTRASI    = 'ADMINISTRASI';
    case FUND_RISING     = 'FUND_RISING';
    case STAFF_PELAYANAN = 'STAFF_PELAYANAN';
    case USER            = 'USER';

    /**
     * Label tampilan untuk UI
     */
    public function label(): string
    {
        return match ($this) {
            self::KEPALA_KANTOR   => 'Kepala Kantor',
            self::ADMINISTRASI    => 'Administrasi',
            self::FUND_RISING     => 'Fund Rising',
            self::STAFF_PELAYANAN => 'Staff Pelayanan',
            self::USER            => 'User',
        };
    }

    /**
     * Warna badge untuk UI
     */
    public function badgeColor(): string
    {
        return match ($this) {
            self::KEPALA_KANTOR   => 'bg-red-100 text-red-700',
            self::ADMINISTRASI    => 'bg-blue-100 text-blue-700',
            self::FUND_RISING     => 'bg-green-100 text-green-700',
            self::STAFF_PELAYANAN => 'bg-yellow-100 text-yellow-700',
            self::USER            => 'bg-gray-100 text-gray-600',
        };
    }

    /**
     * Cek apakah role ini adalah staff (bukan user biasa)
     */
    public function isStaff(): bool
    {
        return $this !== self::USER;
    }

    /**
     * Dashboard redirect path berdasarkan role
     */
    public function dashboardPath(): string
    {
        return match ($this) {
            self::USER => '/dashboard',
            default    => '/admin/dashboard',
        };
    }

    /**
     * Icon untuk sidebar/UI
     */
    public function icon(): string
    {
        return match ($this) {
            self::KEPALA_KANTOR   => 'fas fa-user-tie',
            self::ADMINISTRASI    => 'fas fa-user-cog',
            self::FUND_RISING     => 'fas fa-hand-holding-usd',
            self::STAFF_PELAYANAN => 'fas fa-user-shield',
            self::USER            => 'fas fa-user',
        };
    }
}
