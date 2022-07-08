<?php

namespace App\Models;

use App\Models\Helpers\BusHelper;
use App\Models\Relations\BusRelation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory,BusRelation,BusHelper;

    /**
     * @var string[]
     */
    protected $fillable = [
        'bus_number'
    ];
}
