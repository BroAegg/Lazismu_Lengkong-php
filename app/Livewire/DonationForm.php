<?php

namespace App\Livewire;

use App\Enums\DonationStatus;
use App\Enums\PaymentMethod;
use App\Enums\PsakFundType;
use App\Models\Donation;
use App\Models\DonationCategory;
use App\Models\Program;
use Livewire\Component;

class DonationForm extends Component
{
    // Pre-selections from route
    public ?int $programId = null;
    public ?int $categoryId = null;

    // Form fields
    public $amount = '';
    public string $payment_method = '';
    public string $donor_name = '';
    public string $donor_email = '';
    public string $donor_phone = '';
    public bool $is_anonymous = false;
    public string $message = '';

    // Data
    public array $presetAmounts = [50000, 100000, 200000, 500000, 1000000, 2500000];

    public function mount(?int $programId = null, ?int $categoryId = null): void
    {
        $this->programId = $programId;
        $this->categoryId = $categoryId;

        // Pre-fill donor info if authenticated
        if (auth()->check()) {
            $user = auth()->user();
            $this->donor_name  = $user->name;
            $this->donor_email = $user->email;
            $this->donor_phone = $user->phone ?? '';
        }
    }

    protected function rules(): array
    {
        return [
            'amount'         => 'required|numeric|min:10000',
            'payment_method' => 'required|in:' . implode(',', array_column(PaymentMethod::cases(), 'value')),
            'donor_name'     => 'required|string|max:255',
            'donor_email'    => 'required|email|max:255',
            'donor_phone'    => 'nullable|string|max:20',
            'categoryId'     => 'required|exists:donation_categories,id',
            'is_anonymous'   => 'boolean',
            'message'        => 'nullable|string|max:500',
        ];
    }

    protected function messages(): array
    {
        return [
            'amount.required'         => 'Jumlah donasi harus diisi',
            'amount.min'              => 'Minimal donasi Rp 10.000',
            'payment_method.required' => 'Pilih metode pembayaran',
            'donor_name.required'     => 'Nama harus diisi',
            'donor_email.required'    => 'Email harus diisi',
            'categoryId.required'     => 'Pilih kategori donasi',
        ];
    }

    public function selectPreset(int $amount): void
    {
        $this->amount = $amount;
    }

    public function submit(): void
    {
        $this->validate();

        // Determine PSAK fund type from category
        $category = DonationCategory::find($this->categoryId);
        $psakFundType = $category?->psak_fund_type ?? PsakFundType::DANA_INFAQ_SEDEKAH_TIDAK_TERIKAT;

        // Calculate amil portion
        $amountValue = (float) $this->amount;
        $amil = $this->calculateAmil($amountValue, $psakFundType);

        $donation = Donation::create([
            'invoice_number'   => Donation::generateInvoiceNumber(),
            'donor_id'         => auth()->id(),
            'category_id'      => $this->categoryId,
            'program_id'       => $this->programId,
            'amount'           => $amountValue,
            'amil_amount'      => $amil,
            'net_amount'       => $amountValue - $amil,
            'payment_method'   => $this->payment_method,
            'status'           => DonationStatus::PENDING,
            'psak_fund_type'   => $psakFundType->value,
            'donor_name'       => $this->donor_name,
            'donor_email'      => $this->donor_email,
            'donor_phone'      => $this->donor_phone,
            'is_anonymous'     => $this->is_anonymous,
            'message'          => $this->message,
        ]);

        return $this->redirect(route('donasi.success', $donation->invoice_number), navigate: true);
    }

    private function calculateAmil(float $amount, PsakFundType $fundType): float
    {
        $rate = match ($fundType) {
            PsakFundType::DANA_ZAKAT                       => 0.125, // 12.5% (1/8)
            PsakFundType::DANA_INFAQ_SEDEKAH_TERIKAT,
            PsakFundType::DANA_INFAQ_SEDEKAH_TIDAK_TERIKAT => 0.20,  // 20% max
            default                                        => 0.10,
        };
        return round($amount * $rate);
    }

    public function render()
    {
        $categories = DonationCategory::where('is_active', true)->ordered()->get();
        $paymentMethods = PaymentMethod::cases();

        return view('livewire.donation-form', compact('categories', 'paymentMethods'));
    }
}
