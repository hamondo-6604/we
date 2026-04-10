<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'user_type_id',     // NEW
        'status',
        'phone',
        'profile_photo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
    ];

    // ------------------------------------------------------------------
    // ROLE HELPERS
    // ------------------------------------------------------------------

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isDriver(): bool
    {
        return $this->role === 'driver';
    }

    public function isCustomer(): bool
    {
        return $this->role === 'customer';
    }

    public function isBlocked(): bool
    {
        return $this->status === 'blocked';
    }

    // ------------------------------------------------------------------
    // RELATIONSHIPS
    // ------------------------------------------------------------------

    /**
     * Passenger classification: regular, student, senior, PWD, OFW.
     */
    public function userType(): BelongsTo
    {
        return $this->belongsTo(UserType::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function driver(): HasOne
    {
        return $this->hasOne(Driver::class);
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

    public function feedback(): HasMany
    {
        return $this->hasMany(Feedback::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    // ------------------------------------------------------------------
    // FARE HELPERS
    // ------------------------------------------------------------------

    /**
     * Apply this user's type discount to a fare.
     * e.g. Student (20% off) → calculateFare(500) = 400
     */
    public function calculateFare(float $baseFare): float
    {
        return $this->userType
            ? $this->userType->calculateFare($baseFare)
            : $baseFare;
    }

    /**
     * The discount rate this user gets (0.00–1.00).
     */
    public function getDiscountRateAttribute(): float
    {
        return (float) ($this->userType?->discount_rate ?? 0);
    }

    // ------------------------------------------------------------------
    // SCOPES
    // ------------------------------------------------------------------

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeByRole($query, string $role)
    {
        return $query->where('role', $role);
    }
}