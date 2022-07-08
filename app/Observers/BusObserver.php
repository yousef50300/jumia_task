<?php

namespace App\Observers;

use App\Models\Bus;

class BusObserver
{
    public function created(Bus $bus)
    {
        for ($i = 1; $i <= 12; $i++) {
            $bus->seats()->create([
                'seat_number' => generateRandomNumberCode(6, 'seats', 'seat_number'),
            ]);
        }
    }
}
