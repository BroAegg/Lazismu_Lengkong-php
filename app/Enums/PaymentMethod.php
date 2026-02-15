<?php

namespace App\Enums;

enum PaymentMethod: string
{
    case QRIS         = 'QRIS';
    case TRANSFER_BSI = 'TRANSFER_BSI';
    case TRANSFER_BRI = 'TRANSFER_BRI';
    case EWALLET      = 'EWALLET';
    case TUNAI        = 'TUNAI';

    public function label(): string
    {
        return match ($this) {
            self::QRIS         => 'QRIS',
            self::TRANSFER_BSI => 'Transfer Bank BSI',
            self::TRANSFER_BRI => 'Transfer Bank BRI',
            self::EWALLET      => 'E-Wallet',
            self::TUNAI        => 'Tunai',
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::QRIS         => 'fas fa-qrcode',
            self::TRANSFER_BSI => 'fas fa-university',
            self::TRANSFER_BRI => 'fas fa-university',
            self::EWALLET      => 'fas fa-wallet',
            self::TUNAI        => 'fas fa-money-bill-wave',
        };
    }

    public function instructions(): string
    {
        return match ($this) {
            self::QRIS         => 'Scan QR Code menggunakan aplikasi pembayaran Anda',
            self::TRANSFER_BSI => 'Transfer ke rekening BSI: 720-123-4567 a.n. Lazismu Lengkong',
            self::TRANSFER_BRI => 'Transfer ke rekening BRI: 0123-01-012345-50-1 a.n. Lazismu Lengkong',
            self::EWALLET      => 'Kirim ke nomor e-wallet Lazismu Lengkong',
            self::TUNAI        => 'Datang langsung ke kantor Lazismu Lengkong',
        };
    }
}
