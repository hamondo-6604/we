<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class BusRouteFactory extends Factory
{
    public function definition(): array
    {
        // Pull two different cities
        $cities = City::inRandomOrder()->limit(2)->get();

        $origin      = $cities->first()      ?? City::factory()->create();
        $destination = $cities->last()       ?? City::factory()->create();

        // Make sure origin !== destination
        if ($origin->id === $destination->id) {
            $destination = City::where('id', '!=', $origin->id)->inRandomOrder()->first()
                           ?? City::factory()->create();
        }

        $distanceKm       = fake()->numberBetween(50, 900);
        $durationMinutes  = (int) ($distanceKm * fake()->randomFloat(1, 0.8, 1.5));

        return [
            'route_name'                 => $origin->name . ' → ' . $destination->name,
            'origin_city_id'             => $origin->id,
            'destination_city_id'        => $destination->id,
            'distance_km'                => $distanceKm,
            'estimated_duration_minutes' => $durationMinutes,
            'status'                     => 'active',
            'description'                => 'Route from ' . $origin->name . ' to ' . $destination->name,
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn () => ['status' => 'inactive']);
    }
}