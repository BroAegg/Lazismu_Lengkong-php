<?php

namespace App\Models;

use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class User extends Authenticatable
{
    use HasFactory, Notifiable, LogsActivity;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role',
        'avatar',
        'address',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRole::class,
            'is_active' => 'boolean',
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'email', 'phone', 'role', 'is_active'])
            ->logOnlyDirty()
            ->useLogName('user');
    }

    // ── Relationships ──────────────────────────────────

    public function donations()
    {
        return $this->hasMany(Donation::class, 'donor_id');
    }

    public function verifiedDonations()
    {
        return $this->hasMany(Donation::class, 'verified_by');
    }

    public function zakatCalculations()
    {
        return $this->hasMany(ZakatCalculation::class);
    }

    // ── Helpers ────────────────────────────────────────

    public function isStaff(): bool
    {
        return $this->role->isStaff();
    }

    public function getInitialsAttribute(): string
    {
        return strtoupper(collect(explode(' ', $this->name))->map(fn($w) => $w[0] ?? '')->take(2)->join(''));
    }

    public function getAvatarUrlAttribute(): string
    {
        return $this->avatar
            ? asset('storage/' . $this->avatar)
            : 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&background=random&color=fff';
    }
}
