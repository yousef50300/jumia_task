<?php

namespace Database\Seeders;

use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use TruncateTable,DisableForeignKeys;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        $this->truncateMultiple([
            'admins',
            'users',
            'password_resets',
            'failed_jobs',
            'personal_access_tokens',
            'cities',
            'buses',
            'seats',
            'routes',
            'stops',
            'reservations',
            'cities',
            'trips'
        ]);

        $this->call(AdminSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BusSeeder::class);
//        $this->call(SeatSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(RouteSeeder::class);
        $this->call(TripSeeder::class);

        $this->enableForeignKeys();
    }
}
