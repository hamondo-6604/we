<?php

namespace Database\Seeders;

use App\Models\Bus;
use App\Models\BusRoute;
use App\Models\Driver;
use App\Models\Trip;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TripSeeder extends Seeder
{
    public function run(): void
    {
        $routes  = BusRoute::where('status', 'active')->get();
        $buses   = Bus::where('status', 'active')->get();
        $drivers = Driver::where('status', 'available')->get();

        if ($routes->isEmpty() || $buses->isEmpty() || $drivers->isEmpty()) {
            $this->command->warn('TripSeeder: routes, buses, or drivers are empty. Skipping.');
            return;
        }

        // ── 10 upcoming scheduled trips ──────────────────────────────────
        for ($i = 0; $i < 10; $i++) {
            $bus    = $buses->random();
            $driver = $drivers->random();
            $route  = $routes->random();

            $departure = now()->addDays(rand(1, 30))
                              ->setTime(rand(5, 20), rand(0, 1) * 30, 0);
            $arrival   = (clone $departure)->modify(
                '+' . ($route->estimated_duration_minutes ?? rand(120, 480)) . ' minutes'
            );

            Trip::create([
                'route_id'       => $route->id,
                'bus_id'         => $bus->id,
                'driver_id'      => $driver->id,
                'trip_code'      => 'TR-' . strtoupper(Str::random(6)),
                'trip_date'      => $departure->format('Y-m-d'),
                'departure_time' => $departure->format('Y-m-d H:i:s'),
                'arrival_time'   => $arrival->format('Y-m-d H:i:s'),
                'available_seats'=> $bus->total_seats,
                'fare'           => $this->fareForDistance($route->distance_km ?? 200),
                'status'         => 'scheduled',
                'is_active'      => true,
            ]);
        }

        // ── 3 currently ongoing trips ─────────────────────────────────────
        for ($i = 0; $i < 3; $i++) {
            $bus    = $buses->random();
            $driver = $drivers->random();
            $route  = $routes->random();

            $departure = now()->subHours(rand(1, 4));
            $arrival   = now()->addHours(rand(1, 6));

            Trip::create([
                'route_id'       => $route->id,
                'bus_id'         => $bus->id,
                'driver_id'      => $driver->id,
                'trip_code'      => 'TR-' . strtoupper(Str::random(6)),
                'trip_date'      => $departure->format('Y-m-d'),
                'departure_time' => $departure->format('Y-m-d H:i:s'),
                'arrival_time'   => $arrival->format('Y-m-d H:i:s'),
                'available_seats'=> rand(0, $bus->total_seats),
                'fare'           => $this->fareForDistance($route->distance_km ?? 200),
                'status'         => 'ongoing',
                'is_active'      => true,
            ]);
        }

        // ── 10 past completed trips ───────────────────────────────────────
        for ($i = 0; $i < 10; $i++) {
            $bus    = $buses->random();
            $driver = $drivers->random();
            $route  = $routes->random();

            $departure = now()->subDays(rand(1, 60))
                              ->setTime(rand(5, 20), rand(0, 1) * 30, 0);
            $arrival   = (clone $departure)->modify(
                '+' . ($route->estimated_duration_minutes ?? rand(120, 480)) . ' minutes'
            );

            Trip::create([
                'route_id'       => $route->id,
                'bus_id'         => $bus->id,
                'driver_id'      => $driver->id,
                'trip_code'      => 'TR-' . strtoupper(Str::random(6)),
                'trip_date'      => $departure->format('Y-m-d'),
                'departure_time' => $departure->format('Y-m-d H:i:s'),
                'arrival_time'   => $arrival->format('Y-m-d H:i:s'),
                'available_seats'=> 0,
                'fare'           => $this->fareForDistance($route->distance_km ?? 200),
                'status'         => 'completed',
                'is_active'      => false,
            ]);
        }
    }

    /**
     * Calculate a realistic fare based on distance.
     * Base: ₱2.50 per km, minimum ₱150.
     */
    private function fareForDistance(?int $distanceKm): float
    {
        if (! $distanceKm) {
            return 250.00;
        }

        return max(150.00, round($distanceKm * 2.50, 2));
    }
}