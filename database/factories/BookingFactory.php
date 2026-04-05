<?php

namespace Database\Factories;

use App\Models\Promotion;
use App\Models\Seat;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookingFactory extends Factory
{
    public function definition(): array
    {
        $trip      = Trip::inRandomOrder()->first() ?? Trip::factory()->create();
        $seat      = Seat::where('bus_id', $trip->bus_id)
                         ->where('status', 'available')
                         ->inRandomOrder()
                         ->first();
        $baseFare      = $trip->fare ?? fake()->randomFloat(2, 150, 1500);
        $discountAmount = 0.00;

        return [
            'user_id'              => User::customer()->inRandomOrder()->first()?->id
                                      ?? User::factory()->customer(),
            'trip_id'              => $trip->id,
            'seat_id'              => $seat?->id,
            'promotion_id'         => null,
            'seat_number'          => $seat?->seat_number ?? fake()->bothify('#?'),
            'status'               => 'confirmed',
            'base_fare'            => $baseFare,
            'discount_amount'      => $discountAmount,
            'amount_paid'          => $baseFare - $discountAmount,
            'payment_status'       => 'paid',
            'booking_reference'    => 'BKG-' . strtoupper(Str::random(8)),
            'cancelled_at'         => null,
            'cancellation_reason'  => null,
        ];
    }

    // ------------------------------------------------------------------
    // STATES
    // ------------------------------------------------------------------

    public function pending(): static
    {
        return $this->state(fn () => [
            'status'         => 'pending',
            'payment_status' => 'unpaid',
            'amount_paid'    => 0.00,
        ]);
    }

    public function cancelled(): static
    {
        return $this->state(fn () => [
            'status'              => 'cancelled',
            'cancelled_at'        => now(),
            'cancellation_reason' => fake()->randomElement([
                'Customer request',
                'Trip cancelled',
                'Duplicate booking',
                'Payment not received',
            ]),
        ]);
    }

    public function completed(): static
    {
        return $this->state(fn () => [
            'status'         => 'completed',
            'payment_status' => 'paid',
        ]);
    }

    public function withPromotion(): static
    {
        return $this->state(function (array $attributes) {
            $promo          = Promotion::valid()->inRandomOrder()->first()
                              ?? Promotion::factory()->create();
            $baseFare       = $attributes['base_fare'];
            $discount       = $promo->calculateDiscount($baseFare);

            return [
                'promotion_id'    => $promo->id,
                'discount_amount' => $discount,
                'amount_paid'     => $baseFare - $discount,
            ];
        });
    }
}