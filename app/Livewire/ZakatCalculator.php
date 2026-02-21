<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\ZakatCalculatorService;
use App\Models\ZakatCalculation;
use Illuminate\Support\Facades\Auth;

class ZakatCalculator extends Component
{
    // Step: 1=pilih jenis, 2=input data, 3=hasil
    public int $step = 1;

    // Jenis zakat yang dipilih
    public string $type = '';

    // ── Zakat Penghasilan / Profesi ──
    public $gaji_bulanan    = '';
    public $pendapatan_lain = '';
    public $pengeluaran     = '';

    // ── Zakat Maal (Harta / Tabungan) ──
    public $tabungan       = '';
    public $investasi      = '';
    public $piutang_lancar = '';
    public $hutang_lancar  = '';

    // ── Zakat Emas & Perak ──
    public $berat_emas  = '';
    public $berat_perak = '';

    // ── Zakat Fitrah ──
    public int    $jumlah_jiwa = 1;
    public string $metode      = 'uang';

    // Hasil kalkulasi
    public array $result = [];

    protected function rules(): array
    {
        return match ($this->type) {
            'penghasilan' => [
                'gaji_bulanan'    => 'required|numeric|min:1',
                'pendapatan_lain' => 'nullable|numeric|min:0',
                'pengeluaran'     => 'nullable|numeric|min:0',
            ],
            'maal' => [
                'tabungan'       => 'nullable|numeric|min:0',
                'investasi'      => 'nullable|numeric|min:0',
                'piutang_lancar' => 'nullable|numeric|min:0',
                'hutang_lancar'  => 'nullable|numeric|min:0',
            ],
            'emas' => [
                'berat_emas'  => 'nullable|numeric|min:0',
                'berat_perak' => 'nullable|numeric|min:0',
            ],
            'fitrah' => [
                'jumlah_jiwa' => 'required|integer|min:1|max:50',
                'metode'      => 'required|in:uang,beras',
            ],
            default => [],
        };
    }

    public function selectType(string $type): void
    {
        $this->type   = $type;
        $this->step   = 2;
        $this->result = [];
    }

    public function calculate(): void
    {
        $this->validate();

        $service = new ZakatCalculatorService();

        $data = match ($this->type) {
            'penghasilan' => [
                'gaji_bulanan'    => (float) $this->gaji_bulanan,
                'pendapatan_lain' => (float) ($this->pendapatan_lain ?: 0),
                'pengeluaran'     => (float) ($this->pengeluaran ?: 0),
            ],
            'maal' => [
                'tabungan'       => (float) ($this->tabungan ?: 0),
                'investasi'      => (float) ($this->investasi ?: 0),
                'piutang_lancar' => (float) ($this->piutang_lancar ?: 0),
                'hutang_lancar'  => (float) ($this->hutang_lancar ?: 0),
            ],
            'emas' => [
                'berat_emas'  => (float) ($this->berat_emas ?: 0),
                'berat_perak' => (float) ($this->berat_perak ?: 0),
            ],
            'fitrah' => [
                'jumlah_jiwa' => $this->jumlah_jiwa,
                'metode'      => $this->metode,
            ],
        };

        $this->result = $service->hitung($this->type, $data);

        // Simpan histori kalkulasi jika user login
        if (Auth::check()) {
            ZakatCalculation::create([
                'user_id'        => Auth::id(),
                'type'           => $this->type,
                'input_data'     => $data,
                'nisab_value'    => $this->result['nisab_value'] ?? 0,
                'is_wajib'       => $this->result['is_wajib'],
                'zakat_amount'   => $this->result['zakat_amount'],
                'calculated_at'  => now(),
            ]);
        }

        $this->step = 3;
    }

    public function resetCalculator(): void
    {
        $this->step        = 1;
        $this->type        = '';
        $this->result      = [];
        $this->jumlah_jiwa = 1;
        $this->metode      = 'uang';
        $this->reset([
            'gaji_bulanan', 'pendapatan_lain', 'pengeluaran',
            'tabungan', 'investasi', 'piutang_lancar', 'hutang_lancar',
            'berat_emas', 'berat_perak',
        ]);
    }

    public function incrementJiwa(): void
    {
        if ($this->jumlah_jiwa < 50) $this->jumlah_jiwa++;
    }

    public function decrementJiwa(): void
    {
        if ($this->jumlah_jiwa > 1) $this->jumlah_jiwa--;
    }

    public function render()
    {
        return view('livewire.zakat-calculator');
    }
}
