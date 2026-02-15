<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\ZakatCalculatorService;
use App\Models\ZakatCalculation;
use Illuminate\Support\Facades\Auth;

class ZakatCalculator extends Component
{
    // Step tracking
    public int $step = 1; // 1=pilih jenis, 2=input data, 3=hasil

    // Jenis zakat
    public string $type = 'penghasilan'; // penghasilan, emas, fitrah

    // === Input Zakat Penghasilan ===
    public $gaji_bulanan = '';
    public $pendapatan_lain = '';
    public $pengeluaran = '';

    // === Input Zakat Emas ===
    public $berat_emas = '';
    public $berat_perak = '';

    // === Input Zakat Fitrah ===
    public int $jumlah_jiwa = 1;
    public string $metode = 'uang'; // uang | beras

    // Results
    public array $result = [];

    protected function rules(): array
    {
        return match ($this->type) {
            'penghasilan' => [
                'gaji_bulanan'   => 'required|numeric|min:0',
                'pendapatan_lain' => 'nullable|numeric|min:0',
                'pengeluaran'    => 'nullable|numeric|min:0',
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
        $this->type = $type;
        $this->step = 2;
        $this->resetResult();
    }

    public function calculate(): void
    {
        $this->validate();

        $service = new ZakatCalculatorService();

        $data = match ($this->type) {
            'penghasilan' => [
                'gaji_bulanan'    => $this->gaji_bulanan,
                'pendapatan_lain' => $this->pendapatan_lain ?: 0,
                'pengeluaran'     => $this->pengeluaran ?: 0,
            ],
            'emas' => [
                'berat_emas'  => $this->berat_emas ?: 0,
                'berat_perak' => $this->berat_perak ?: 0,
            ],
            'fitrah' => [
                'jumlah_jiwa' => $this->jumlah_jiwa,
                'metode'      => $this->metode,
            ],
        };

        $this->result = $service->hitung($this->type, $data);

        // Save calculation if authenticated
        if (Auth::check()) {
            ZakatCalculation::create([
                'user_id'      => Auth::id(),
                'type'         => $this->type,
                'input_data'   => $data,
                'nisab_value'  => $this->result['nisab_value'] ?? 0,
                'is_wajib'     => $this->result['is_wajib'],
                'zakat_amount' => $this->result['zakat_amount'],
            ]);
        }

        $this->step = 3;
    }

    public function resetCalculator(): void
    {
        $this->step = 1;
        $this->resetResult();
        $this->reset(['gaji_bulanan', 'pendapatan_lain', 'pengeluaran', 'berat_emas', 'berat_perak', 'jumlah_jiwa', 'metode']);
        $this->jumlah_jiwa = 1;
        $this->metode = 'uang';
    }

    private function resetResult(): void
    {
        $this->result = [];
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
