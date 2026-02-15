<?php

namespace App\Models;

use App\Enums\PsakFundType;
use App\Enums\RestrictionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'icon',
        'psak_fund_type',
        'restriction_type',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'psak_fund_type' => PsakFundType::class,
            'restriction_type' => RestrictionType::class,
            'is_active' => 'boolean',
        ];
    }

    public function category()
    {
        return $this->belongsTo(DonationCategory::class, 'category_id');
    }

    public function donations()
    {
        return $this->hasMany(Donation::class, 'sub_category_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
