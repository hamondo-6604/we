<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'              => fake()->name(),
            'email'             => fake()->unique()->safeEmail(),
            'phone'             => fake()->numerify('09#########'),
            'password'          => Hash::make('password'),  // default password for seeding
            'role'              => 'customer',
            'status'            => 'active',
            'profile_photo'     => null,
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
        ];
    }

    // ------------------------------------------------------------------
    // STATES
    // ------------------------------------------------------------------

    public function admin(): static
    {
        return $this->state(fn () => [
            'role'  => 'admin',
            'email' => 'admin@busbook.com',
            'name'  => 'System Admin',
        ]);
    }

    public function driver(): static
    {
        return $this->state(fn () => ['role' => 'driver']);
    }

    public function customer(): static
    {
        return $this->state(fn () => ['role' => 'customer']);
    }

    public function blocked(): static
    {
        return $this->state(fn () => ['status' => 'blocked']);
    }

    public function unverified(): static
    {
        return $this->state(fn () => ['email_verified_at' => null]);
    }
}