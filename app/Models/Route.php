<?php

namespace App\Models;

use App\Models\Relations\RouteRelation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory,RouteRelation;

    /**
     * @var string[]
     */
    protected $fillable = [
        'start_station',
        'end_station',
        'name'
    ];
}
