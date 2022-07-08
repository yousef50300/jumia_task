<?php

namespace App\Models;

use App\Models\Helpers\TripHelper;
use App\Models\Relations\TripRelation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory, TripRelation, TripHelper;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'route_id',
        'bus_id'
    ];
}
