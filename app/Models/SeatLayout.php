<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SeatLayout extends Model
{
    use HasFactory;

    protected $fillable = [
        'layout_name',
        'total_rows',
        'total_columns',
        'capacity',
        'layout_map',
        'status',
        'description',
    ];

    protected $casts = [
        'layout_map' => 'array',
    ];

    // ------------------------------------------------------------------
    // RELATIONSHIPS
    // ------------------------------------------------------------------

    public function busTypes(): HasMany
    {
        return $this->hasMany(BusType::class, 'seat_layout_id');
    }

    public function buses(): HasMany
    {
        return $this->hasMany(Bus::class, 'seat_layout_id');
    }

    // ------------------------------------------------------------------
    // ACCESSORS
    // ------------------------------------------------------------------

    /**
     * Effective capacity: use explicit value or calculate from grid dimensions.
     */
    public function getEffectiveCapacityAttribute(): int
    {
        return $this->capacity ?? ($this->total_rows * $this->total_columns);
    }

    // ------------------------------------------------------------------
    // SCOPES
    // ------------------------------------------------------------------

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}