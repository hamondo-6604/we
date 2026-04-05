<?php

namespace Database\Seeders;

use App\Models\BusRoute;
use App\Models\City;
use Illuminate\Database\Seeder;

class BusRouteSeeder extends Seeder
{
    public function run(): void
    {
        $routes = [
            // From Manila
            ['origin' => 'Manila',        'destination' => 'Baguio',         'distance' => 250,  'duration' => 360],
            ['origin' => 'Manila',        'destination' => 'Batangas City',   'distance' => 110,  'duration' => 150],
            ['origin' => 'Manila',        'destination' => 'Legazpi',         'distance' => 560,  'duration' => 600],
            ['origin' => 'Manila',        'destination' => 'Laoag',           'distance' => 483,  'duration' => 540],
            ['origin' => 'Manila',        'destination' => 'Naga',            'distance' => 450,  'duration' => 480],
            ['origin' => 'Manila',        'destination' => 'Vigan',           'distance' => 408,  'duration' => 480],
            ['origin' => 'Manila',        'destination' => 'San Fernando',    'distance' => 80,   'duration' => 120],

            // From Cebu
            ['origin' => 'Cebu City',     'destination' => 'Tagbilaran',      'distance' => 100,  'duration' => 180],

            // From Davao
            ['origin' => 'Davao City',    'destination' => 'General Santos',  'distance' => 120,  'duration' => 150],
            ['origin' => 'Davao City',    'destination' => 'Cagayan de Oro',  'distance' => 310,  'duration' => 360],

            // Others
            ['origin' => 'Cagayan de Oro','destination' => 'Iligan',          'distance' => 35,   'duration' => 60],
            ['origin' => 'Iloilo City',   'destination' => 'Bacolod',         'distance' => 80,   'duration' => 120],
            ['origin' => 'Baguio',        'destination' => 'Laoag',           'distance' => 233,  'duration' => 300],
        ];

        foreach ($routes as $routeData) {
            // Look up cities by name — cities must be seeded first
            $originCity = City::where('name', $routeData['origin'])->first();
            $destCity   = City::where('name', $routeData['destination'])->first();

            if (! $originCity || ! $destCity) {
                $this->command->warn(
                    "Skipping route {$routeData['origin']} → {$routeData['destination']}: city not found."
                );
                continue;
            }

            BusRoute::updateOrCreate(
                [
                    'origin_city_id'      => $originCity->id,
                    'destination_city_id' => $destCity->id,
                ],
                [
                    'route_name'                 => $originCity->name . ' → ' . $destCity->name,
                    'distance_km'                => $routeData['distance'],
                    'estimated_duration_minutes' => $routeData['duration'],
                    'status'                     => 'active',
                ]
            );
        }
    }
}