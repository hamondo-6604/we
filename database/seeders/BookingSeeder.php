<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\Promotion;
use App\Models\Seat;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $customers  = User::where('role', 'customer')->get();
        $promo      = Promotion::where('code', 'WELCOME20')->first();

        if ($customers->isEmpty()) {
            $this->command->warn('BookingSeeder: no customers found. Skipping.');
            return;
        }

        // ── Bookings on completed trips ───────────────────────────────────
        $completedTrips = Trip::where('status', 'completed')->get();

        foreach ($completedTrips as $trip) {
            $seats = Seat::where('bus_id', $trip->bus_id)->get();
            // Book 60–100% of seats on completed trips
            $bookCount = (int) ceil($seats->count() * (rand(60, 100) / 100));

            foreach ($seats->take($bookCount) as $seat) {
                $customer   = $customers->random();
                $baseFare   = (float) $trip->fare;
                $discount   = 0.00;
                $promoId    = null;

                // 20% chance of promo applied
                if ($promo && rand(1, 5) === 1) {
                    $discount = $promo->calculateDiscount($baseFare);
                    $promoId  = $promo->id;
                }

                $booking = Booking::create([
                    'user_id'             => $customer->id,
                    'trip_id'             => $trip->id,
                    'seat_id'             => $seat->id,
                    'promotion_id'        => $promoId,
                    'seat_number'         => $seat->seat_number,
                    'status'              => 'completed',
                    'base_fare'           => $baseFare,
                    'discount_amount'     => $discount,
                    'amount_paid'         => $baseFare - $discount,
                    'payment_status'      => 'paid',
                    'booking_reference'   => 'BKG-' . strtoupper(Str::random(8)),
                ]);

                // Create payment record
                Payment::create([
                    'booking_id'     => $booking->id,
                    'amount'         => $booking->amount_paid,
                    'payment_method' => collect(['gcash', 'cash', 'maya', 'card'])->random(),
                    'status'         => 'paid',
                    'transaction_id' => strtoupper(Str::random(16)),
                    'currency'       => 'PHP',
                    'paid_at'        => $trip->departure_time,
                ]);
            }

            // Mark seats as booked
            $seats->take($bookCount)->each(fn ($s) => $s->update(['status' => 'booked']));

            // Update available_seats on completed trip
            $trip->update(['available_seats' => max(0, $seats->count() - $bookCount)]);
        }

        // ── Bookings on upcoming scheduled trips ──────────────────────────
        $upcomingTrips = Trip::where('status', 'scheduled')->get();

        foreach ($upcomingTrips as $trip) {
            $seats     = Seat::where('bus_id', $trip->bus_id)->where('status', 'available')->get();
            $bookCount = (int) ceil($seats->count() * (rand(20, 70) / 100));

            foreach ($seats->take($bookCount) as $seat) {
                $customer  = $customers->random();
                $baseFare  = (float) $trip->fare;
                $discount  = 0.00;
                $promoId   = null;

                if ($promo && rand(1, 4) === 1) {
                    $discount = $promo->calculateDiscount($baseFare);
                    $promoId  = $promo->id;
                }

                $booking = Booking::create([
                    'user_id'           => $customer->id,
                    'trip_id'           => $trip->id,
                    'seat_id'           => $seat->id,
                    'promotion_id'      => $promoId,
                    'seat_number'       => $seat->seat_number,
                    'status'            => 'confirmed',
                    'base_fare'         => $baseFare,
                    'discount_amount'   => $discount,
                    'amount_paid'       => $baseFare - $discount,
                    'payment_status'    => 'paid',
                    'booking_reference' => 'BKG-' . strtoupper(Str::random(8)),
                ]);

                Payment::create([
                    'booking_id'     => $booking->id,
                    'amount'         => $booking->amount_paid,
                    'payment_method' => collect(['gcash', 'cash', 'maya', 'card'])->random(),
                    'status'         => 'paid',
                    'transaction_id' => strtoupper(Str::random(16)),
                    'currency'       => 'PHP',
                    'paid_at'        => now(),
                ]);

                $seat->update(['status' => 'booked']);
            }

            $trip->update([
                'available_seats' => max(0, $seats->count() - $bookCount),
            ]);
        }

        // ── A handful of cancelled bookings ───────────────────────────────
        for ($i = 0; $i < 5; $i++) {
            $trip = Trip::inRandomOrder()->first();
            $seat = Seat::where('bus_id', $trip->bus_id)->inRandomOrder()->first();

            if (! $trip || ! $seat) {
                continue;
            }

            Booking::create([
                'user_id'             => $customers->random()->id,
                'trip_id'             => $trip->id,
                'seat_id'             => $seat->id,
                'seat_number'         => $seat->seat_number,
                'status'              => 'cancelled',
                'base_fare'           => (float) $trip->fare,
                'discount_amount'     => 0.00,
                'amount_paid'         => 0.00,
                'payment_status'      => 'unpaid',
                'booking_reference'   => 'BKG-' . strtoupper(Str::random(8)),
                'cancelled_at'        => now()->subDays(rand(1, 10)),
                'cancellation_reason' => collect([
                    'Customer request',
                    'Change of plans',
                    'Duplicate booking',
                ])->random(),
            ]);
        }
    }
}