<?php

namespace App\Models;

use App\Enums\DonationStatus;
use App\Enums\PaymentMethod;
use App\Enums\PsakFundType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Donation extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'invoice_number',
        'donor_id',
        'donor_name',
        'donor_email',
        'donor_phone',
        'category_id',
        'sub_category_id',
        'program_id',
        'amount',
        'amil_amount',
        'net_amount',
        'payment_method',
        'payment_proof',
        'status',
        'psak_fund_type',
        'message',
        'is_anonymous',
        'verified_by',
        'verified_at',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'amil_amount' => 'decimal:2',
            'net_amount' => 'decimal:2',
            'payment_method' => PaymentMethod::class,
            'status' => DonationStatus::class,
            'psak_fund_type' => PsakFundType::class,
            'is_anonymous' => 'boolean',
            'verified_at' => 'datetime',
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['status', 'verified_by', 'amount'])
            ->logOnlyDirty()
            ->useLogName('donation');
    }

    // ── Relationships ──────────────────────────────────

    public function donor()
    {
        return $this->belongsTo(User::class, 'donor_id');
    }

    public function category()
    {
        return $this->belongsTo(DonationCategory::class, 'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(DonationSubCategory::class, 'sub_category_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function verifier()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    // ── Scopes ─────────────────────────────────────────

    public function scopeVerified($query)
    {
        return $query->where('status', DonationStatus::VERIFIED);
    }

    public function scopePending($query)
    {
        return $query->where('status', DonationStatus::PENDING);
    }

    // ── Helpers ────────────────────────────────────────

    public static function generateInvoiceNumber(): string
    {
        $prefix = 'LZM';
        $date = now()->format('Ymd');
        $sequence = str_pad(static::whereDate('created_at', today())->count() + 1, 4, '0', STR_PAD_LEFT);
        return "{$prefix}-{$date}-{$sequence}";
    }

    public function calculateAmilAmount(): float
    {
        // Zakat: max 12.5% amil
        if ($this->category?->slug === 'zakat') {
            return round($this->amount * 0.125, 2);
        }
        // Infaq/Sedekah: configurable (default 20%)
        return round($this->amount * 0.20, 2);
    }

    public function getDisplayNameAttribute(): string
    {
        if ($this->is_anonymous) return 'Hamba Allah';
        return $this->donor_name ?? $this->donor?->name ?? 'Anonim';
    }
}
