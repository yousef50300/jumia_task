<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_id',
        'seat_id',
        'user_id',
        'start_stop_id',
        'end_stop_id',
    ];
}
