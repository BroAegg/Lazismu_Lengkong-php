<?php

namespace App\Enums;

enum DonationStatus: string
{
    case PENDING  = 'PENDING';
    case VERIFIED = 'VERIFIED';
    case FAILED   = 'FAILED';
    case REFUNDED = 'REFUNDED';
    case EXPIRED  = 'EXPIRED';

    public function label(): string
    {
        return match ($this) {
            self::PENDING  => 'Menunggu Verifikasi',
            self::VERIFIED => 'Terverifikasi',
            self::FAILED   => 'Gagal',
            self::REFUNDED => 'Dikembalikan',
            self::EXPIRED  => 'Kadaluarsa',
        };
    }

    public function badgeColor(): string
    {
        return match ($this) {
            self::PENDING  => 'yellow',
            self::VERIFIED => 'green',
            self::FAILED   => 'red',
            self::REFUNDED => 'blue',
            self::EXPIRED  => 'gray',
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::PENDING  => 'fas fa-clock',
            self::VERIFIED => 'fas fa-check-circle',
            self::FAILED   => 'fas fa-times-circle',
            self::REFUNDED => 'fas fa-undo',
            self::EXPIRED  => 'fas fa-hourglass-end',
        };
    }
}
