<?php

namespace App\Models\Relations;

use App\Models\City;
use App\Models\Stop;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Trait RouteRelation
 * @package App\Models\Relations
 */
trait RouteRelation
{
    /**
     * @return BelongsTo
     */
    public function startDestination()
    {
        return $this->belongsTo(City::class,'start_station');
    }

    /**
     * @return BelongsTo
     */
    public function endDestination()
    {
        return $this->belongsTo(City::class,'end_station');
    }

    /**
     * @return HasMany
     */
    public function stops()
    {
        return $this->hasMany(Stop::class);
    }
}
