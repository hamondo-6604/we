<?php

namespace Database\Factories;

use App\Models\Bus;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeatFactory extends Factory
{
    public function definition(): array
    {
        return [
            'bus_id'      => Bus::inRandomOrder()->first()?->id ?? Bus::factory(),
            'seat_number' => fake()->numberBetween(1, 14) . fake()->randomLetter(),
            'seat_type'   => null,   // inherits bus default_seat_type
            'status'      => 'available',
        ];
    }

    public function booked(): static
    {
        return $this->state(fn () => ['status' => 'booked']);
    }

    public function blocked(): static
    {
        return $this->state(fn () => ['status' => 'blocked']);
    }

    public function economy(): static
    {
        return $this->state(fn () => ['seat_type' => 'economy']);
    }

    public function business(): static
    {
        return $this->state(fn () => ['seat_type' => 'business']);
    }
}