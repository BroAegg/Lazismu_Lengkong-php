<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZakatCalculation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'input_data',
        'nisab_value',
        'is_wajib',
        'zakat_amount',
        'calculated_at',
    ];

    protected function casts(): array
    {
        return [
            'input_data' => 'array',
            'nisab_value' => 'decimal:2',
            'is_wajib' => 'boolean',
            'zakat_amount' => 'decimal:2',
            'calculated_at' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
