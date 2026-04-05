<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * ORDER MATTERS — each seeder depends on the ones above it.
     *
     * 1.  Permissions          (no dependencies)
     * 2.  Roles                (needs permissions for sync)
     * 3.  Cities               (no dependencies)
     * 4.  SeatLayouts          (no dependencies)
     * 5.  BusTypes             (needs seat_layouts)
     * 6.  Buses                (needs bus_types, seat_layouts → also creates Seats)
     * 7.  Users                (no dependencies)
     * 8.  Drivers              (needs users with role=driver)
     * 9.  BusRoutes            (needs cities)
     * 10. Promotions           (no dependencies)
     * 11. Trips                (needs routes, buses, drivers)
     * 12. Bookings             (needs trips, seats, users, promotions → also creates Payments)
     * 13. MaintenanceLogs      (needs buses, users)
     * 14. Feedback             (needs bookings)
     * 15. Notifications        (needs bookings, users)
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            CitySeeder::class,
            SeatLayoutSeeder::class,
            BusTypeSeeder::class,
            BusSeeder::class,       // also generates Seats
            UserSeeder::class,
            DriverSeeder::class,
            BusRouteSeeder::class,
            PromotionSeeder::class,
            TripSeeder::class,
            BookingSeeder::class,   // also generates Payments
            MaintenanceLogSeeder::class,
            FeedbackSeeder::class,
            NotificationSeeder::class,
        ]);
    }
}