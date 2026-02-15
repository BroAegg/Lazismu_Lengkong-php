<?php

namespace App\Models;

use App\Enums\AsnafCategory;
use App\Enums\PsakFundType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Distribution extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'program_id',
        'mustahik_id',
        'amount',
        'asnaf_category',
        'psak_fund_type',
        'description',
        'distributed_at',
        'distributed_by',
        'evidence_photo',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'asnaf_category' => AsnafCategory::class,
            'psak_fund_type' => PsakFundType::class,
            'distributed_at' => 'datetime',
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->useLogName('distribution');
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function mustahik()
    {
        return $this->belongsTo(Mustahik::class);
    }

    public function distributor()
    {
        return $this->belongsTo(User::class, 'distributed_by');
    }
}
