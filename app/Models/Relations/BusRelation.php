<?php

namespace App\Models\Relations;

use App\Models\Seat;
use App\Models\Trip;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Trait BusRelation
 * @package App\Models\Relations
 */
trait BusRelation
{
    /**
     * @return HasMany
     */
    public function seats()
    {
        return $this->hasMany(Seat::class);
    }

    /**
     * @return HasMany
     */
    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
