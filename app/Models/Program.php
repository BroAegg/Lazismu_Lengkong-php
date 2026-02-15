<?php

namespace App\Models;

use App\Enums\PsakFundType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'pillar_id',
        'title',
        'slug',
        'description',
        'content',
        'image',
        'target_amount',
        'collected_amount',
        'donor_count',
        'psak_fund_type',
        'start_date',
        'end_date',
        'is_featured',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'target_amount' => 'decimal:2',
            'collected_amount' => 'decimal:2',
            'donor_count' => 'integer',
            'psak_fund_type' => PsakFundType::class,
            'start_date' => 'date',
            'end_date' => 'date',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function pillar()
    {
        return $this->belongsTo(ProgramPillar::class, 'pillar_id');
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function distributions()
    {
        return $this->hasMany(Distribution::class);
    }

    // ── Accessors ──────────────────────────────────────

    public function getProgressPercentAttribute(): float
    {
        if ($this->target_amount <= 0) return 0;
        return min(round(($this->collected_amount / $this->target_amount) * 100, 1), 100);
    }

    public function getRemainingAmountAttribute(): float
    {
        return max($this->target_amount - $this->collected_amount, 0);
    }

    public function getDaysLeftAttribute(): ?int
    {
        if (!$this->end_date) return null;
        $diff = now()->diffInDays($this->end_date, false);
        return max($diff, 0);
    }

    // ── Scopes ─────────────────────────────────────────

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOngoing($query)
    {
        return $query->where(function ($q) {
            $q->whereNull('end_date')
              ->orWhere('end_date', '>=', now());
        });
    }
}
