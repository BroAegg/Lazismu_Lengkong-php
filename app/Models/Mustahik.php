<?php

namespace App\Models;

use App\Enums\AsnafCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mustahik extends Model
{
    use HasFactory;

    protected $table = 'mustahik';

    protected $fillable = [
        'name',
        'nik',
        'phone',
        'address',
        'asnaf_category',
        'description',
        'is_verified',
        'verified_by',
        'verified_at',
    ];

    protected function casts(): array
    {
        return [
            'asnaf_category' => AsnafCategory::class,
            'is_verified' => 'boolean',
            'verified_at' => 'datetime',
        ];
    }

    public function verifier()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    public function distributions()
    {
        return $this->hasMany(Distribution::class);
    }

    public function scopeVerified($query)
    {
        return $query->where('is_verified', true);
    }
}
