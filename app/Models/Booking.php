<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'trip_id',
        'seat_id',
        'promotion_id',
        'seat_number',
        'status',
        'base_fare',
        'discount_amount',
        'amount_paid',
        'payment_status',
        'booking_reference',
        'cancelled_at',
        'cancellation_reason',
    ];

    protected $casts = [
        'cancelled_at'    => 'datetime',
        'base_fare'       => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'amount_paid'     => 'decimal:2',
    ];

    // ------------------------------------------------------------------
    // BOOT
    // ------------------------------------------------------------------

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($booking) {
            if (empty($booking->booking_reference)) {
                $booking->booking_reference = 'BKG-' . strtoupper(Str::random(8));
            }
        });
    }

    // ------------------------------------------------------------------
    // RELATIONSHIPS
    // ------------------------------------------------------------------

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function trip(): BelongsTo
    {
        return $this->belongsTo(Trip::class);
    }

    public function seat(): BelongsTo
    {
        return $this->belongsTo(Seat::class);
    }

    public function promotion(): BelongsTo
    {
        return $this->belongsTo(Promotion::class);
    }

    /**
     * The single payment record for this booking.
     */
    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    /**
     * All payment attempts (e.g. first attempt failed, second succeeded).
     */
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function feedback(): HasMany
    {
        return $this->hasMany(Feedback::class);
    }

    // ------------------------------------------------------------------
    // CONVENIENCE ACCESSORS — derived from trip relationship
    // ------------------------------------------------------------------

    /**
     * Get the bus through the trip — no redundant bus_id on bookings.
     */
    public function getBusAttribute(): ?Bus
    {
        return $this->trip?->bus;
    }

    /**
     * Get the route through the trip.
     */
    public function getRouteAttribute(): ?BusRoute
    {
        return $this->trip?->route;
    }

    public function getEffectiveSeatTypeAttribute(): string
    {
        return $this->seat?->effective_seat_type ?? 'economy';
    }

    public function getFormattedAmountPaidAttribute(): string
    {
        return '₱' . number_format($this->amount_paid, 2);
    }

    public function getFinalFareAttribute(): float
    {
        return (float) $this->base_fare - (float) $this->discount_amount;
    }

    // ------------------------------------------------------------------
    // QUERY SCOPES
    // ------------------------------------------------------------------

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeCancelled($query)
    {
        return $query->where('status', 'cancelled');
    }

    public function scopeUnpaid($query)
    {
        return $query->where('payment_status', 'unpaid');
    }

    public function scopePaid($query)
    {
        return $query->where('payment_status', 'paid');
    }
}