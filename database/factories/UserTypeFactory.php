<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserTypeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'              => fake()->unique()->slug(1),
            'display_name'      => fake()->jobTitle(),
            'description'       => fake()->sentence(),
            'discount_rate'     => fake()->randomFloat(2, 0.00, 0.30),
            'requires_id'       => fake()->boolean(40),
            'required_document' => fake()->randomElement([null, 'Valid ID', 'School ID', 'Senior Citizen ID']),
            'is_active'         => true,
        ];
    }

    // ------------------------------------------------------------------
    // STATES
    // ------------------------------------------------------------------

    public function regular(): static
    {
        return $this->state(fn () => [
            'name'          => 'regular',
            'display_name'  => 'Regular Passenger',
            'discount_rate' => 0.00,
            'requires_id'   => false,
        ]);
    }

    public function student(): static
    {
        return $this->state(fn () => [
            'name'              => 'student',
            'display_name'      => 'Student',
            'discount_rate'     => 0.20,
            'requires_id'       => true,
            'required_document' => 'Valid School ID',
        ]);
    }

    public function senior(): static
    {
        return $this->state(fn () => [
            'name'              => 'senior',
            'display_name'      => 'Senior Citizen',
            'discount_rate'     => 0.20,
            'requires_id'       => true,
            'required_document' => 'Senior Citizen ID (OSCA)',
        ]);
    }

    public function pwd(): static
    {
        return $this->state(fn () => [
            'name'              => 'pwd',
            'display_name'      => 'Person with Disability',
            'discount_rate'     => 0.20,
            'requires_id'       => true,
            'required_document' => 'PWD ID',
        ]);
    }

    public function inactive(): static
    {
        return $this->state(fn () => ['is_active' => false]);
    }
}