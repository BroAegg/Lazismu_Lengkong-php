<?php

namespace App\Enums;

enum DonationStatus: string
{
    case PENDING  = 'PENDING';
    case VERIFIED = 'VERIFIED';
    case REJECTED = 'REJECTED';
    case FAILED   = 'FAILED';
    case REFUNDED = 'REFUNDED';
    case EXPIRED  = 'EXPIRED';

    public function label(): string
    {
        return match ($this) {
            self::PENDING  => 'Menunggu Verifikasi',
            self::VERIFIED => 'Terverifikasi',
            self::REJECTED => 'Ditolak',
            self::FAILED   => 'Gagal',
            self::REFUNDED => 'Dikembalikan',
            self::EXPIRED  => 'Kadaluarsa',
        };
    }

    public function badgeColor(): string
    {
        return match ($this) {
            self::PENDING  => 'bg-yellow-100 text-yellow-700',
            self::VERIFIED => 'bg-green-100 text-green-700',
            self::REJECTED => 'bg-red-100 text-red-700',
            self::FAILED   => 'bg-red-100 text-red-700',
            self::REFUNDED => 'bg-blue-100 text-blue-700',
            self::EXPIRED  => 'bg-gray-100 text-gray-500',
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::PENDING  => 'fas fa-clock',
            self::VERIFIED => 'fas fa-check-circle',
            self::REJECTED => 'fas fa-ban',
            self::FAILED   => 'fas fa-times-circle',
            self::REFUNDED => 'fas fa-undo',
            self::EXPIRED  => 'fas fa-hourglass-end',
        };
    }
}
