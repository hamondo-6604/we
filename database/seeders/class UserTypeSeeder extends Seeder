<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            [
                'name'              => 'regular',
                'display_name'      => 'Regular Passenger',
                'description'       => 'Standard fare applies. No discount.',
                'discount_rate'     => 0.00,
                'requires_id'       => false,
                'required_document' => null,
                'is_active'         => true,
            ],
            [
                'name'              => 'student',
                'display_name'      => 'Student',
                'description'       => '20% discount on all routes. Valid school ID required at boarding.',
                'discount_rate'     => 0.20,
                'requires_id'       => true,
                'required_document' => 'Valid School / College ID',
                'is_active'         => true,
            ],
            [
                'name'              => 'senior',
                'display_name'      => 'Senior Citizen',
                'description'       => '20% discount per LTFRB regulations. Senior Citizen ID required.',
                'discount_rate'     => 0.20,
                'requires_id'       => true,
                'required_document' => 'Senior Citizen ID (OSCA)',
                'is_active'         => true,
            ],
            [
                'name'              => 'pwd',
                'display_name'      => 'Person with Disability (PWD)',
                'description'       => '20% discount per RA 10754. PWD ID required at boarding.',
                'discount_rate'     => 0.20,
                'requires_id'       => true,
                'required_document' => 'PWD ID (City / Municipal PDAO)',
                'is_active'         => true,
            ],
            [
                'name'              => 'ofw',
                'display_name'      => 'Overseas Filipino Worker (OFW)',
                'description'       => 'Standard fare applies. OFW flag for analytics and priority support.',
                'discount_rate'     => 0.00,
                'requires_id'       => true,
                'required_document' => 'OEC / iDOLE Card',
                'is_active'         => true,
            ],
        ];

        foreach ($types as $type) {
            UserType::updateOrCreate(['name' => $type['name']], $type);
        }
    }
}