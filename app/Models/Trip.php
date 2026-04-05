<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'route_id',
        'bus_id',
        'driver_id',
        'trip_code',
        'trip_date',
        'departure_time',
        'arrival_time',
        'available_seats',
        'fare',
        'status',
        'is_active',
        'notes',
    ];

    protected $casts = [
        'trip_date'      => 'date',
        // FIX: was 'datetime:H:i' on a time() column — now timestamp columns,
        // so standard datetime cast works correctly with Carbon.
        'departure_time' => 'datetime',
        'arrival_time'   => 'datetime',
        'fare'           => 'decimal:2',
        'is_active'      => 'boolean',
    ];

    // ------------------------------------------------------------------
    // RELATIONSHIPS
    // ------------------------------------------------------------------

    public function route(): BelongsTo
    {
        return $this->belongsTo(BusRoute::class, 'route_id');
    }

    public function bus(): BelongsTo
    {
        return $this->belongsTo(Bus::class);
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function feedback(): HasMany
    {
        return $this->hasMany(Feedback::class);
    }

    // ------------------------------------------------------------------
    // ACCESSORS
    // ------------------------------------------------------------------

    /**
     * Human-readable departure e.g. "Mon, Jan 6 · 08:00 AM"
     */
    public function getFormattedDepartureAttribute(): string
    {
        return $this->departure_time?->format('D, M j · h:i A') ?? '—';
    }

    /**
     * Whether this trip still has open seats.
     */
    public function hasAvailableSeats(): bool
    {
        return $this->available_seats > 0;
    }

    // ------------------------------------------------------------------
    // SCOPES
    // ------------------------------------------------------------------

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeScheduled($query)
    {
        return $query->where('status', 'scheduled');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('trip_date', '>=', now()->toDateString())
                     ->where('is_active', true);
    }

    public function scopeForRoute($query, int $routeId)
    {
        return $query->where('route_id', $routeId);
    }
}