<?php

namespace App\Enums;

/**
 * 8 Golongan Penerima Zakat (QS. At-Taubah: 60)
 */
enum AsnafCategory: string
{
    case FAKIR        = 'FAKIR';
    case MISKIN       = 'MISKIN';
    case AMIL         = 'AMIL';
    case MUALAF       = 'MUALAF';
    case RIQAB        = 'RIQAB';
    case GHARIMIN     = 'GHARIMIN';
    case FISABILILLAH = 'FISABILILLAH';
    case IBNU_SABIL   = 'IBNU_SABIL';

    public function label(): string
    {
        return match ($this) {
            self::FAKIR        => 'Fakir',
            self::MISKIN       => 'Miskin',
            self::AMIL         => 'Amil',
            self::MUALAF       => 'Mualaf',
            self::RIQAB        => 'Riqab',
            self::GHARIMIN     => 'Gharimin',
            self::FISABILILLAH => 'Fisabilillah',
            self::IBNU_SABIL   => 'Ibnu Sabil',
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::FAKIR        => 'Mereka yang hampir tidak memiliki apa-apa, tidak mampu memenuhi kebutuhan pokok hidup',
            self::MISKIN       => 'Mereka yang memiliki harta namun tidak cukup untuk memenuhi kebutuhan dasar kehidupan',
            self::AMIL         => 'Pengelola/pengumpul zakat (bagian operasional lembaga amil zakat)',
            self::MUALAF       => 'Orang yang baru masuk Islam dan membutuhkan bantuan untuk menguatkan keimanan',
            self::RIQAB        => 'Memerdekakan dari perbudakan atau korban perdagangan manusia',
            self::GHARIMIN     => 'Mereka yang terlilit hutang untuk kebutuhan halal dan tidak sanggup membayarnya',
            self::FISABILILLAH => 'Mereka yang berjuang di jalan Allah: dakwah, pendidikan Islam, kegiatan kebaikan',
            self::IBNU_SABIL   => 'Musafir yang kehabisan bekal dalam perjalanan yang diridhai Allah',
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::FAKIR        => 'fas fa-hand-holding-heart',
            self::MISKIN       => 'fas fa-hands-helping',
            self::AMIL         => 'fas fa-user-tie',
            self::MUALAF       => 'fas fa-user-plus',
            self::RIQAB        => 'fas fa-link',
            self::GHARIMIN     => 'fas fa-file-invoice-dollar',
            self::FISABILILLAH => 'fas fa-mosque',
            self::IBNU_SABIL   => 'fas fa-road',
        };
    }

    /**
     * Urutan tampilan (1-8)
     */
    public function order(): int
    {
        return match ($this) {
            self::FAKIR        => 1,
            self::MISKIN       => 2,
            self::AMIL         => 3,
            self::MUALAF       => 4,
            self::RIQAB        => 5,
            self::GHARIMIN     => 6,
            self::FISABILILLAH => 7,
            self::IBNU_SABIL   => 8,
        };
    }
}
