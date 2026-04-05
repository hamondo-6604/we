<?php

namespace Database\Seeders;

use App\Models\Bus;
use App\Models\BusType;
use App\Models\Seat;
use App\Models\SeatLayout;
use Illuminate\Database\Seeder;

class BusSeeder extends Seeder
{
    public function run(): void
    {
        $buses = [
            ['bus_number' => 'BUS-001', 'bus_name' => 'Victory Liner 1',    'type' => 'Aircon',    'default_seat_type' => 'economy'],
            ['bus_number' => 'BUS-002', 'bus_name' => 'Victory Liner 2',    'type' => 'Aircon',    'default_seat_type' => 'economy'],
            ['bus_number' => 'BUS-003', 'bus_name' => 'Philtranco Express',  'type' => 'Express',   'default_seat_type' => 'economy'],
            ['bus_number' => 'BUS-004', 'bus_name' => 'Genesis Deluxe 1',   'type' => 'Deluxe',    'default_seat_type' => 'business'],
            ['bus_number' => 'BUS-005', 'bus_name' => 'Genesis Deluxe 2',   'type' => 'Deluxe',    'default_seat_type' => 'business'],
            ['bus_number' => 'BUS-006', 'bus_name' => 'Five Star Ordinary',  'type' => 'Ordinary',  'default_seat_type' => 'economy'],
            ['bus_number' => 'BUS-007', 'bus_name' => 'Florida Mini 1',     'type' => 'Mini Bus',  'default_seat_type' => 'economy'],
            ['bus_number' => 'BUS-008', 'bus_name' => 'Batangas Star 1',    'type' => 'Aircon',    'default_seat_type' => 'economy'],
        ];

        foreach ($buses as $busData) {
            $type   = BusType::where('type_name', $busData['type'])->first();
            $layout = $type?->seatLayout ?? SeatLayout::first();

            if (! $type || ! $layout) {
                continue;
            }

            $bus = Bus::updateOrCreate(
                ['bus_number' => $busData['bus_number']],
                [
                    'bus_name'          => $busData['bus_name'],
                    'bus_type_id'       => $type->id,
                    'seat_layout_id'    => $layout->id,
                    'total_seats'       => $layout->effective_capacity,
                    'default_seat_type' => $busData['default_seat_type'],
                    'status'            => 'active',
                ]
            );

            // Generate seats for this bus if none exist yet
            if ($bus->seats()->count() === 0) {
                $this->generateSeats($bus, $layout);
            }
        }
    }

    /**
     * Create individual seat rows based on the layout map.
     */
    private function generateSeats(Bus $bus, SeatLayout $layout): void
    {
        $seats = [];

        foreach ($layout->layout_map ?? [] as $row) {
            foreach ($row as $seatData) {
                $seats[] = [
                    'bus_id'      => $bus->id,
                    'seat_number' => $seatData['seat'],
                    'seat_type'   => null,   // inherits bus default_seat_type
                    'status'      => 'available',
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ];
            }
        }

        // Insert in chunks for performance
        foreach (array_chunk($seats, 50) as $chunk) {
            Seat::insert($chunk);
        }
    }
}