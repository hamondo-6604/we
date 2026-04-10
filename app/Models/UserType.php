<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_name',
        'description',
        'discount_rate',
        'requires_id',
        'required_document',
        'is_active',
    ];

    protected $casts = [
        'discount_rate' => 'decimal:2',
        'requires_id'   => 'boolean',
        'is_active'     => 'boolean',
    ];

    // ------------------------------------------------------------------
    // RELATIONSHIPS
    // ------------------------------------------------------------------

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    // ------------------------------------------------------------------
    // BUSINESS LOGIC
    // ------------------------------------------------------------------

    /**
     * Calculate the discounted fare for this user type.
     * e.g. discount_rate = 0.20 → 20% off
     */
    public function calculateFare(float $baseFare): float
    {
        return round($baseFare * (1 - (float) $this->discount_rate), 2);
    }

    // ------------------------------------------------------------------
    // SCOPES
    // ------------------------------------------------------------------

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}