<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TripResource;
use App\Models\Reservation;
use App\Models\Trip;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;

/**
 * Class TripController
 * @package App\Http\Controllers\Api
 */
class TripController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $trips = Trip::hasCountLessThanTwelve(request('from'), request('to'))->with([
            'route',
            'bus',
            'seats' => function ($query) {
                $query->tripWithFreeSeats(request('from'), request('to'));
            },
        ])->get();

        return TripResource::collection($trips);
    }

    public function reserve($trip)
    {
        $seats = Trip::where('trips.id', $trip)
            ->tripWithFreeSeats(request('from'), request('to'))
            ->get();

        $seat = $seats->where('seat_id', request('seat_id'))->first();

        if (!$seat) {
            return response()->json([
                'error' => "You can't reserve this seat"
            ], 422);
        }

        $startStopId = DB::table('stops')
            ->where('from', request('from'))
            ->where('route_id', $seat->route_id)
            ->orderBy('id')
            ->first('id');

        $endStopId = DB::table('stops')
            ->where('to', request('to'))
            ->where('route_id', $seat->route_id)
            ->orderBy('id','desc')
            ->first('id');

        Reservation::create([
            'trip_id' => $trip,
            'user_id' => auth()->id(),
            'seat_id' => request('seat_id'),
            'start_stop_id' => $startStopId->id,
            'end_stop_id' => $endStopId->id,
        ]);

        return response()->json([
            'message' => 'Seat has been reserved successfully'
        ]);
    }
}
