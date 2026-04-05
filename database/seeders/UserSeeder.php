<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ── Fixed accounts ──────────────────────────────────────────────

        $admin = User::updateOrCreate(
            ['email' => 'admin@busbook.com'],
            [
                'name'              => 'System Admin',
                'phone'             => '09171234567',
                'password'          => Hash::make('password'),
                'role'              => 'admin',
                'status'            => 'active',
                'email_verified_at' => now(),
            ]
        );

        // A fixed test customer
        User::updateOrCreate(
            ['email' => 'customer@busbook.com'],
            [
                'name'              => 'Juan dela Cruz',
                'phone'             => '09181234567',
                'password'          => Hash::make('password'),
                'role'              => 'customer',
                'status'            => 'active',
                'email_verified_at' => now(),
            ]
        );

        // A fixed test driver user (driver profile created in DriverSeeder)
        User::updateOrCreate(
            ['email' => 'driver@busbook.com'],
            [
                'name'              => 'Pedro Santos',
                'phone'             => '09191234567',
                'password'          => Hash::make('password'),
                'role'              => 'driver',
                'status'            => 'active',
                'email_verified_at' => now(),
            ]
        );

        // ── Random customers ─────────────────────────────────────────────
        User::factory()
            ->count(20)
            ->customer()
            ->create();

        // ── Random driver users (driver profiles created in DriverSeeder) ─
        User::factory()
            ->count(8)
            ->driver()
            ->create();
    }
}