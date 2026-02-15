<?php

namespace App\Services;

use App\Models\Setting;

class ZakatCalculatorService
{
    /**
     * Hitung Zakat Penghasilan (Profesi)
     * Nisab = 85 gram emas / tahun ≈ Rp85.000.000 (default)
     * Zakat = 2.5% x penghasilan bersih per tahun
     */
    public function hitungZakatPenghasilan(array $data): array
    {
        $gajiPerBulan   = (float) ($data['gaji_bulanan'] ?? 0);
        $pendapatanLain = (float) ($data['pendapatan_lain'] ?? 0);
        $pengeluaran    = (float) ($data['pengeluaran'] ?? 0);

        $totalPerBulan  = $gajiPerBulan + $pendapatanLain - $pengeluaran;
        $totalPerTahun  = $totalPerBulan * 12;

        $hargaEmas      = (float) Setting::get('harga_emas_per_gram', 1_550_000);
        $nisabEmas       = (float) Setting::get('nisab_emas_gram', 85);
        $nisabValue      = $hargaEmas * $nisabEmas;

        $isWajib = $totalPerTahun >= $nisabValue;
        $zakatAmount = $isWajib ? round($totalPerTahun * 0.025) : 0;
        $zakatPerBulan = $isWajib ? round($totalPerBulan * 0.025) : 0;

        return [
            'type'             => 'penghasilan',
            'total_per_bulan'  => $totalPerBulan,
            'total_per_tahun'  => $totalPerTahun,
            'nisab_value'      => $nisabValue,
            'is_wajib'         => $isWajib,
            'zakat_amount'     => $zakatAmount,
            'zakat_per_bulan'  => $zakatPerBulan,
            'rate'             => 2.5,
        ];
    }

    /**
     * Hitung Zakat Emas & Perak
     * Nisab emas = 85 gram, perak = 595 gram
     * Zakat = 2.5% x (nilai emas + perak) jika ≥ nisab
     */
    public function hitungZakatEmas(array $data): array
    {
        $beratEmas  = (float) ($data['berat_emas'] ?? 0); // gram
        $beratPerak = (float) ($data['berat_perak'] ?? 0); // gram

        $hargaEmas  = (float) Setting::get('harga_emas_per_gram', 1_550_000);
        $hargaPerak = (float) Setting::get('harga_perak_per_gram', 15_000);

        $nilaiEmas  = $beratEmas * $hargaEmas;
        $nilaiPerak = $beratPerak * $hargaPerak;
        $totalNilai = $nilaiEmas + $nilaiPerak;

        $nisabEmas  = (float) Setting::get('nisab_emas_gram', 85);
        $nisabValue = $nisabEmas * $hargaEmas;

        // Wajib jika total nilai ≥ nisab emas
        $isWajib = $totalNilai >= $nisabValue;
        $zakatAmount = $isWajib ? round($totalNilai * 0.025) : 0;

        return [
            'type'         => 'emas',
            'nilai_emas'   => $nilaiEmas,
            'nilai_perak'  => $nilaiPerak,
            'total_nilai'  => $totalNilai,
            'nisab_value'  => $nisabValue,
            'is_wajib'     => $isWajib,
            'zakat_amount' => $zakatAmount,
            'rate'         => 2.5,
        ];
    }

    /**
     * Hitung Zakat Fitrah
     * = jumlah_jiwa × harga_beras_per_kg × 3.5 kg
     *   atau jumlah_jiwa × nominal_fitrah (default Rp50.000)
     */
    public function hitungZakatFitrah(array $data): array
    {
        $jumlahJiwa   = (int) ($data['jumlah_jiwa'] ?? 1);
        $metode       = $data['metode'] ?? 'uang'; // 'uang' atau 'beras'

        if ($metode === 'beras') {
            $hargaBeras  = (float) Setting::get('harga_beras_per_kg', 15_000);
            $beratPerJiwa = 3.5; // kg
            $perJiwa     = $hargaBeras * $beratPerJiwa;
        } else {
            $perJiwa = (float) Setting::get('nominal_fitrah', 50_000);
        }

        $zakatAmount = round($jumlahJiwa * $perJiwa);

        return [
            'type'         => 'fitrah',
            'jumlah_jiwa'  => $jumlahJiwa,
            'metode'       => $metode,
            'per_jiwa'     => $perJiwa,
            'zakat_amount' => $zakatAmount,
            'is_wajib'     => true, // fitrah selalu wajib bagi yang mampu
        ];
    }

    /**
     * Dispatcher: hitung berdasarkan tipe
     */
    public function hitung(string $type, array $data): array
    {
        return match ($type) {
            'penghasilan' => $this->hitungZakatPenghasilan($data),
            'emas'        => $this->hitungZakatEmas($data),
            'fitrah'      => $this->hitungZakatFitrah($data),
            default       => ['error' => 'Tipe zakat tidak dikenali'],
        };
    }
}
