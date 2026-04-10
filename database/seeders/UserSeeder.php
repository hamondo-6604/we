<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Resolve user type IDs — UserTypeSeeder must run first
        $regular = UserType::where('name', 'regular')->first();
        $student = UserType::where('name', 'student')->first();
        $senior  = UserType::where('name', 'senior')->first();

        // ── Fixed accounts ──────────────────────────────────────────────

        User::updateOrCreate(
            ['email' => 'admin@busbook.com'],
            [
                'name'              => 'System Admin',
                'phone'             => '09171234567',
                'password'          => Hash::make('password'),
                'role'              => 'admin',
                'user_type_id'      => $regular?->id,
                'status'            => 'active',
                'email_verified_at' => now(),
            ]
        );

        User::updateOrCreate(
            ['email' => 'customer@busbook.com'],
            [
                'name'              => 'Juan dela Cruz',
                'phone'             => '09181234567',
                'password'          => Hash::make('password'),
                'role'              => 'customer',
                'user_type_id'      => $regular?->id,
                'status'            => 'active',
                'email_verified_at' => now(),
            ]
        );

        // Fixed student test account
        User::updateOrCreate(
            ['email' => 'student@busbook.com'],
            [
                'name'              => 'Maria Reyes',
                'phone'             => '09201234567',
                'password'          => Hash::make('password'),
                'role'              => 'customer',
                'user_type_id'      => $student?->id,
                'status'            => 'active',
                'email_verified_at' => now(),
            ]
        );

        // Fixed senior test account
        User::updateOrCreate(
            ['email' => 'senior@busbook.com'],
            [
                'name'              => 'Lola Rosa Santos',
                'phone'             => '09211234567',
                'password'          => Hash::make('password'),
                'role'              => 'customer',
                'user_type_id'      => $senior?->id,
                'status'            => 'active',
                'email_verified_at' => now(),
            ]
        );

        // Fixed driver test account
        User::updateOrCreate(
            ['email' => 'driver@busbook.com'],
            [
                'name'              => 'Pedro Santos',
                'phone'             => '09191234567',
                'password'          => Hash::make('password'),
                'role'              => 'driver',
                'user_type_id'      => $regular?->id,
                'status'            => 'active',
                'email_verified_at' => now(),
            ]
        );

        // ── Random customers — mix of user types ─────────────────────────
        $userTypeIds = UserType::where('is_active', true)->pluck('id')->toArray();

        User::factory()
            ->count(20)
            ->customer()
            ->create()
            ->each(function ($user) use ($userTypeIds, $regular) {
                // 70% regular, 20% student, 10% senior/pwd
                $weights = array_fill(0, count($userTypeIds), 1);
                $typeId  = $regular
                    ? (rand(1, 10) <= 7 ? $regular->id : $userTypeIds[array_rand($userTypeIds)])
                    : $userTypeIds[array_rand($userTypeIds)];

                $user->update(['user_type_id' => $typeId]);
            });

        // ── Random driver users ───────────────────────────────────────────
        User::factory()
            ->count(8)
            ->driver()
            ->create()
            ->each(function ($user) use ($regular) {
                $user->update(['user_type_id' => $regular?->id]);
            });
    }
}