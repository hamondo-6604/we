<?php

namespace Database\Factories;

use App\Models\BusType;
use App\Models\SeatLayout;
use Illuminate\Database\Eloquent\Factories\Factory;

class BusFactory extends Factory
{
    public function definition(): array
    {
        $layout = SeatLayout::inRandomOrder()->first() ?? SeatLayout::factory()->create();

        return [
            'bus_number'         => strtoupper(fake()->bothify('??-####')),
            'bus_name'           => fake()->randomElement([
                'Batangas Star', 'Victory Liner', 'Philtranco',
                'Genesis Transport', 'Florida Bus', 'Five Star',
            ]) . ' ' . fake()->numberBetween(1, 99),
            'bus_type_id'        => BusType::inRandomOrder()->first()?->id
                                    ?? BusType::factory(),
            'seat_layout_id'     => $layout->id,
            'total_seats'        => $layout->effective_capacity,
            'default_seat_type'  => fake()->randomElement(['economy', 'business']),
            'bus_img'            => null,
            'status'             => 'active',
            'description'        => fake()->sentence(),
        ];
    }

    // ------------------------------------------------------------------
    // STATES
    // ------------------------------------------------------------------

    public function inactive(): static
    {
        return $this->state(fn () => ['status' => 'inactive']);
    }

    public function maintenance(): static
    {
        return $this->state(fn () => ['status' => 'maintenance']);
    }
}