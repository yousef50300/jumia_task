<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data() as $value) {
            City::create([
                'name' => $value
            ]);
        }
    }

    public function data()
    {
        return [
            'Cairo',
            'Giza',
            'Alexandria',
            'Dakahlia',
            'Red Sea',
            'Beheira',
            'Fayoum',
            'Gharbiya',
            'Ismailia',
            'Menofia',
            'Minya',
            'Qaliubiya',
            'New Valley',
            'Suez',
            'Aswan',
            'Assiut',
            'Beni Suef',
            'Port Said',
            'Damietta',
            'Sharkia',
            'South Sinai',
            'Kafr Al sheikh',
            'Matrouh',
            'Luxor',
            'Qena',
            'North Sinai',
            'Sohag'
        ];
    }
}
