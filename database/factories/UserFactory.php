<?php

namespace Database\Factories;

use App\Models\UserType;
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
            'password'          => Hash::make('password'),
            'role'              => 'customer',
            'user_type_id'      => UserType::where('name', 'regular')->first()?->id,
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
            'role'         => 'admin',
            'user_type_id' => UserType::where('name', 'regular')->first()?->id,
        ]);
    }

    public function driver(): static
    {
        return $this->state(fn () => [
            'role'         => 'driver',
            'user_type_id' => UserType::where('name', 'regular')->first()?->id,
        ]);
    }

    public function customer(): static
    {
        return $this->state(fn () => ['role' => 'customer']);
    }

    public function student(): static
    {
        return $this->state(fn () => [
            'role'         => 'customer',
            'user_type_id' => UserType::where('name', 'student')->first()?->id,
        ]);
    }

    public function senior(): static
    {
        return $this->state(fn () => [
            'role'         => 'customer',
            'user_type_id' => UserType::where('name', 'senior')->first()?->id,
        ]);
    }

    public function pwd(): static
    {
        return $this->state(fn () => [
            'role'         => 'customer',
            'user_type_id' => UserType::where('name', 'pwd')->first()?->id,
        ]);
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