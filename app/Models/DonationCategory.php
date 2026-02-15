<?php

namespace App\Models;

use App\Enums\PsakFundType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'psak_fund_type',
        'color',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'psak_fund_type' => PsakFundType::class,
            'is_active' => 'boolean',
        ];
    }

    public function subCategories()
    {
        return $this->hasMany(DonationSubCategory::class, 'category_id');
    }

    public function donations()
    {
        return $this->hasMany(Donation::class, 'category_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
