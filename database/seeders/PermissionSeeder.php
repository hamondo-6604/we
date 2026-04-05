<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            // --- Users ---
            ['group' => 'users', 'name' => 'users.view',       'display_name' => 'View Users'],
            ['group' => 'users', 'name' => 'users.create',     'display_name' => 'Create Users'],
            ['group' => 'users', 'name' => 'users.edit',       'display_name' => 'Edit Users'],
            ['group' => 'users', 'name' => 'users.delete',     'display_name' => 'Delete Users'],
            ['group' => 'users', 'name' => 'users.block',      'display_name' => 'Block / Unblock Users'],

            // --- Buses ---
            ['group' => 'buses', 'name' => 'buses.view',       'display_name' => 'View Buses'],
            ['group' => 'buses', 'name' => 'buses.create',     'display_name' => 'Create Buses'],
            ['group' => 'buses', 'name' => 'buses.edit',       'display_name' => 'Edit Buses'],
            ['group' => 'buses', 'name' => 'buses.delete',     'display_name' => 'Delete Buses'],

            // --- Trips ---
            ['group' => 'trips', 'name' => 'trips.view',            'display_name' => 'View Trips'],
            ['group' => 'trips', 'name' => 'trips.create',          'display_name' => 'Create Trips'],
            ['group' => 'trips', 'name' => 'trips.edit',            'display_name' => 'Edit Trips'],
            ['group' => 'trips', 'name' => 'trips.delete',          'display_name' => 'Delete Trips'],
            ['group' => 'trips', 'name' => 'trips.update_status',   'display_name' => 'Update Trip Status'],

            // --- Bookings ---
            ['group' => 'bookings', 'name' => 'bookings.view',      'display_name' => 'View Bookings'],
            ['group' => 'bookings', 'name' => 'bookings.create',    'display_name' => 'Create Bookings'],
            ['group' => 'bookings', 'name' => 'bookings.edit',      'display_name' => 'Edit Bookings'],
            ['group' => 'bookings', 'name' => 'bookings.cancel',    'display_name' => 'Cancel Bookings'],
            ['group' => 'bookings', 'name' => 'bookings.delete',    'display_name' => 'Delete Bookings'],

            // --- Payments ---
            ['group' => 'payments', 'name' => 'payments.view',      'display_name' => 'View Payments'],
            ['group' => 'payments', 'name' => 'payments.refund',    'display_name' => 'Process Refunds'],

            // --- Routes ---
            ['group' => 'routes', 'name' => 'routes.view',          'display_name' => 'View Routes'],
            ['group' => 'routes', 'name' => 'routes.create',        'display_name' => 'Create Routes'],
            ['group' => 'routes', 'name' => 'routes.edit',          'display_name' => 'Edit Routes'],
            ['group' => 'routes', 'name' => 'routes.delete',        'display_name' => 'Delete Routes'],

            // --- Drivers ---
            ['group' => 'drivers', 'name' => 'drivers.view',        'display_name' => 'View Drivers'],
            ['group' => 'drivers', 'name' => 'drivers.create',      'display_name' => 'Create Drivers'],
            ['group' => 'drivers', 'name' => 'drivers.edit',        'display_name' => 'Edit Drivers'],
            ['group' => 'drivers', 'name' => 'drivers.delete',      'display_name' => 'Delete Drivers'],

            // --- Maintenance ---
            ['group' => 'maintenance', 'name' => 'maintenance.view',   'display_name' => 'View Maintenance Logs'],
            ['group' => 'maintenance', 'name' => 'maintenance.create', 'display_name' => 'Create Maintenance Logs'],
            ['group' => 'maintenance', 'name' => 'maintenance.edit',   'display_name' => 'Edit Maintenance Logs'],

            // --- Promotions ---
            ['group' => 'promotions', 'name' => 'promotions.view',     'display_name' => 'View Promotions'],
            ['group' => 'promotions', 'name' => 'promotions.create',   'display_name' => 'Create Promotions'],
            ['group' => 'promotions', 'name' => 'promotions.edit',     'display_name' => 'Edit Promotions'],
            ['group' => 'promotions', 'name' => 'promotions.delete',   'display_name' => 'Delete Promotions'],

            // --- Feedback ---
            ['group' => 'feedback', 'name' => 'feedback.view',         'display_name' => 'View Feedback'],
            ['group' => 'feedback', 'name' => 'feedback.create',       'display_name' => 'Submit Feedback'],
            ['group' => 'feedback', 'name' => 'feedback.reply',        'display_name' => 'Reply to Feedback'],

            // --- Reports ---
            ['group' => 'reports', 'name' => 'reports.view',           'display_name' => 'View Reports'],
            ['group' => 'reports', 'name' => 'reports.export',         'display_name' => 'Export Reports'],
        ];

        foreach ($permissions as $perm) {
            Permission::updateOrCreate(['name' => $perm['name']], $perm);
        }
    }
}