<?php

namespace App\Models\Relations;

use App\Models\Bus;
use App\Models\Route;
use App\Models\Stop;
use App\Models\Trip;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Trait TripRelation
 * @package App\Models\Relations
 */
trait TripRelation
{
    /**
     * @return BelongsTo
     */
    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    /**
     * @return BelongsTo
     */
    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function seats(){
        return $this->hasMany(Trip::class,'id','id');
    }
}
