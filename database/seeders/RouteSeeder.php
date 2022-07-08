<?php

namespace Database\Seeders;

use App\Models\Route;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $route = Route::factory()->create([
            'name' => 'Cairo - Assiut',
            'start_station' => 1,
            'end_station' => 16,
        ]);

        // cairo - fayoum - Minya - Assiut
        $stopsDestinations = generateAllDestinations(
            1,
            [7, 11],
            16
        );

        $route->stops()->createMany($stopsDestinations);

        $route = Route::factory()->create([
            'name' => 'Alexandria - Cairo',
            'start_station' => 3,
            'end_station' => 1,
        ]);

        // Alexandria - Beheira - Gharbiya - Cairo
        $stopsDestinations = generateAllDestinations(
            3,
            [6, 8],
            1
        );

        $route->stops()->createMany($stopsDestinations);
    }
}
