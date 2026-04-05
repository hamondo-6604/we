<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'name'         => 'admin',
                'display_name' => 'Administrator',
                'description'  => 'Full access to all system features.',
            ],
            [
                'name'         => 'driver',
                'display_name' => 'Driver',
                'description'  => 'Can view assigned trips and update trip status.',
            ],
            [
                'name'         => 'customer',
                'display_name' => 'Customer',
                'description'  => 'Can book trips, manage bookings, and leave feedback.',
            ],
        ];

        foreach ($roles as $roleData) {
            Role::updateOrCreate(['name' => $roleData['name']], $roleData);
        }

        // Assign all permissions to admin
        $admin = Role::where('name', 'admin')->first();
        $admin->permissions()->sync(Permission::pluck('id'));

        // Assign scoped permissions to driver
        $driver = Role::where('name', 'driver')->first();
        $driver->permissions()->sync(
            Permission::whereIn('name', [
                'trips.view',
                'trips.update_status',
                'bookings.view',
            ])->pluck('id')
        );

        // Assign scoped permissions to customer
        $customer = Role::where('name', 'customer')->first();
        $customer->permissions()->sync(
            Permission::whereIn('name', [
                'bookings.create',
                'bookings.view',
                'bookings.cancel',
                'feedback.create',
                'promotions.view',
            ])->pluck('id')
        );
    }
}