<?php

namespace Database\Factories;

use App\Models\Bus;
use App\Models\BusRoute;
use App\Models\Driver;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TripFactory extends Factory
{
    public function definition(): array
    {
        $bus           = Bus::inRandomOrder()->first() ?? Bus::factory()->create();
        $departureTime = fake()->dateTimeBetween('+1 day', '+60 days');
        // arrival = departure + 2–10 hours
        $arrivalTime   = (clone $departureTime)->modify('+' . fake()->numberBetween(2, 10) . ' hours');

        return [
            'route_id'        => BusRoute::inRandomOrder()->first()?->id
                                 ?? BusRoute::factory(),
            'bus_id'          => $bus->id,
            'driver_id'       => Driver::inRandomOrder()->first()?->id
                                 ?? Driver::factory(),
            'trip_code'       => 'TR-' . strtoupper(Str::random(6)),
            'trip_date'       => $departureTime->format('Y-m-d'),
            'departure_time'  => $departureTime->format('Y-m-d H:i:s'),
            'arrival_time'    => $arrivalTime->format('Y-m-d H:i:s'),
            'available_seats' => $bus->total_seats,
            'fare'            => fake()->randomFloat(2, 150, 1500),
            'status'          => 'scheduled',
            'is_active'       => true,
            'notes'           => null,
        ];
    }

    // ------------------------------------------------------------------
    // STATES
    // ------------------------------------------------------------------

    public function ongoing(): static
    {
        return $this->state(fn () => [
            'status'         => 'ongoing',
            'departure_time' => now()->subHours(2)->format('Y-m-d H:i:s'),
            'arrival_time'   => now()->addHours(3)->format('Y-m-d H:i:s'),
            'trip_date'      => now()->toDateString(),
        ]);
    }

    public function completed(): static
    {
        return $this->state(fn () => [
            'status'         => 'completed',
            'is_active'      => false,
            'departure_time' => fake()->dateTimeBetween('-60 days', '-1 day')->format('Y-m-d H:i:s'),
            'trip_date'      => fake()->dateTimeBetween('-60 days', '-1 day')->format('Y-m-d'),
        ]);
    }

    public function cancelled(): static
    {
        return $this->state(fn () => [
            'status'    => 'cancelled',
            'is_active' => false,
        ]);
    }
}