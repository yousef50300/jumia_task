<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trip::factory()->create([
            'name' => 'Cairo - Assiut',
            'bus_id' => 1,
            'route_id' => 1,
        ]);

        Trip::factory()->create([
            'name' => 'Alexandria - Cairo',
            'bus_id' => 2,
            'route_id' => 2,
        ]);
    }
}
