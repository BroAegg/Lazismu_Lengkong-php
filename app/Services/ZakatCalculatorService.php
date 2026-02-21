<?php

namespace App\Services;

use App\Models\Setting;

class ZakatCalculatorService
{
    // ─── Helpers ─────────────────────────────────────────────

    private function hargaEmas(): float
    {
        return (float) Setting::get('gold_price_per_gram', 1_750_000);
    }

    private function nisabEmasGram(): float
    {
        return (float) Setting::get('nisab_gold_gram', 85);
    }

    public function nisabValue(): float
    {
        return $this->hargaEmas() * $this->nisabEmasGram();
    }

    // ─── Zakat Penghasilan / Profesi ──────────────────────────
    // Dasar: Fatwa MUI No.3 Tahun 2003
    // Nisab  : 85 gram emas / tahun
    // Rate   : 2.5% × penghasilan bersih per tahun
    // Haul   : tidak disyaratkan (langsung bayar saat terima)

    public function hitungZakatPenghasilan(array $data): array
    {
        $gaji   = (float) ($data['gaji_bulanan'] ?? 0);
        $lain   = (float) ($data['pendapatan_lain'] ?? 0);
        $keluar = (float) ($data['pengeluaran'] ?? 0);

        $bersihPerBulan = max(0, $gaji + $lain - $keluar);
        $bersihPerTahun = $bersihPerBulan * 12;

        $hargaEmas  = $this->hargaEmas();
        $nisabValue = $this->nisabValue();

        $isWajib       = $bersihPerTahun >= $nisabValue;
        $zakatAmount   = $isWajib ? (int) round($bersihPerTahun * 0.025) : 0;
        $zakatPerBulan = $isWajib ? (int) round($bersihPerBulan * 0.025) : 0;

        return [
            'type'             => 'penghasilan',
            'gaji_per_bulan'   => $gaji,
            'pendapatan_lain'  => $lain,
            'pengeluaran'      => $keluar,
            'bersih_per_bulan' => $bersihPerBulan,
            'total_per_tahun'  => $bersihPerTahun,
            'nisab_value'      => $nisabValue,
            'harga_emas'       => $hargaEmas,
            'nisab_gram'       => $this->nisabEmasGram(),
            'is_wajib'         => $isWajib,
            'zakat_amount'     => $zakatAmount,
            'zakat_per_bulan'  => $zakatPerBulan,
            'rate'             => 2.5,
        ];
    }

    // ─── Zakat Maal (Harta / Tabungan) ───────────────────────
    // Dasar: QS At-Taubah: 103, Fiqh Mazhab Jumhur
    // Syarat haul : sudah dimiliki ≥ 1 tahun hijriah
    // Nisab       : 85 gram emas
    // Rate        : 2.5% × harta bersih

    public function hitungZakatMaal(array $data): array
    {
        $tabungan  = (float) ($data['tabungan'] ?? 0);
        $investasi = (float) ($data['investasi'] ?? 0);
        $piutang   = (float) ($data['piutang_lancar'] ?? 0);
        $hutang    = (float) ($data['hutang_lancar'] ?? 0);

        $totalHarta  = $tabungan + $investasi + $piutang;
        $hartaBersih = max(0, $totalHarta - $hutang);

        $hargaEmas  = $this->hargaEmas();
        $nisabValue = $this->nisabValue();

        $isWajib     = $hartaBersih >= $nisabValue;
        $zakatAmount = $isWajib ? (int) round($hartaBersih * 0.025) : 0;

        return [
            'type'         => 'maal',
            'tabungan'     => $tabungan,
            'investasi'    => $investasi,
            'piutang'      => $piutang,
            'hutang'       => $hutang,
            'total_harta'  => $totalHarta,
            'harta_bersih' => $hartaBersih,
            'nisab_value'  => $nisabValue,
            'harga_emas'   => $hargaEmas,
            'nisab_gram'   => $this->nisabEmasGram(),
            'is_wajib'     => $isWajib,
            'zakat_amount' => $zakatAmount,
            'rate'         => 2.5,
        ];
    }

    // ─── Zakat Emas & Perak ───────────────────────────────────
    // Nisab emas  : 85 gram (dimiliki ≥ 1 haul)
    // Nisab perak : 595 gram (dimiliki ≥ 1 haul)
    // Rate        : 2.5% × (nilai emas + perak)
    // Patokan     : gunakan nisab emas sebagai referensi utama

    public function hitungZakatEmas(array $data): array
    {
        $beratEmas  = (float) ($data['berat_emas'] ?? 0);
        $beratPerak = (float) ($data['berat_perak'] ?? 0);

        $hargaEmas  = $this->hargaEmas();
        $hargaPerak = (float) Setting::get('silver_price_per_gram', 16_000);

        $nilaiEmas  = $beratEmas * $hargaEmas;
        $nilaiPerak = $beratPerak * $hargaPerak;
        $totalNilai = $nilaiEmas + $nilaiPerak;

        $nisabValue    = $this->nisabValue();
        $nisabEmasGram = $this->nisabEmasGram();
        $nisabPerakGram = (float) Setting::get('nisab_silver_gram', 595);

        $isWajib     = $totalNilai >= $nisabValue;
        $zakatAmount = $isWajib ? (int) round($totalNilai * 0.025) : 0;

        return [
            'type'            => 'emas',
            'berat_emas'      => $beratEmas,
            'berat_perak'     => $beratPerak,
            'nilai_emas'      => $nilaiEmas,
            'nilai_perak'     => $nilaiPerak,
            'total_nilai'     => $totalNilai,
            'harga_emas'      => $hargaEmas,
            'harga_perak'     => $hargaPerak,
            'nisab_value'     => $nisabValue,
            'nisab_emas_gram' => $nisabEmasGram,
            'nisab_perak_gram'=> $nisabPerakGram,
            'is_wajib'        => $isWajib,
            'zakat_amount'    => $zakatAmount,
            'rate'            => 2.5,
        ];
    }

    // ─── Zakat Fitrah ─────────────────────────────────────────
    // Wajib setiap jiwa yang mampu di bulan Ramadhan
    // = 1 sha' makanan pokok (± 2.5 kg / 3.5 kg beras)
    // Uang: sesuai ketentuan Baznas/kemenag setempat

    public function hitungZakatFitrah(array $data): array
    {
        $jumlahJiwa = (int) ($data['jumlah_jiwa'] ?? 1);
        $metode     = $data['metode'] ?? 'uang';

        if ($metode === 'beras') {
            $hargaBeras   = (float) Setting::get('rice_price_per_kg', 15_000);
            $beratPerJiwa = (float) Setting::get('fitrah_amount', 3.5);
            $perJiwa      = $hargaBeras * $beratPerJiwa;
            $keterangan   = number_format($beratPerJiwa, 1, ',', '.') . ' kg beras × Rp ' . number_format($hargaBeras, 0, ',', '.');
        } else {
            $perJiwa    = (float) Setting::get('fitrah_cash_per_jiwa', 47_000);
            $keterangan = 'Nominal resmi Baznas / Kemenag setempat';
        }

        $zakatAmount = (int) round($jumlahJiwa * $perJiwa);

        return [
            'type'         => 'fitrah',
            'jumlah_jiwa'  => $jumlahJiwa,
            'metode'       => $metode,
            'per_jiwa'     => $perJiwa,
            'keterangan'   => $keterangan,
            'zakat_amount' => $zakatAmount,
            'nisab_value'  => 0,
            'is_wajib'     => true,
            'rate'         => null,
        ];
    }

    // ─── Dispatcher ───────────────────────────────────────────

    public function hitung(string $type, array $data): array
    {
        return match ($type) {
            'penghasilan' => $this->hitungZakatPenghasilan($data),
            'maal'        => $this->hitungZakatMaal($data),
            'emas'        => $this->hitungZakatEmas($data),
            'fitrah'      => $this->hitungZakatFitrah($data),
            default       => ['error' => 'Tipe zakat tidak dikenali'],
        };
    }
}
