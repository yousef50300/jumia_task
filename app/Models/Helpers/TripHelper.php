<?php

namespace App\Models\Helpers;

use Illuminate\Support\Facades\DB;

/**
 * Trait TripHelper
 * @package App\Models\Helpers
 */
trait TripHelper
{
    public function scopeHasCountLessThanTwelve($query, $from, $to)
    {
        $query->whereExists(function ($query1) use ($from, $to) {
            $query1->select(DB::raw(1))
                ->from('stops')
                ->whereColumn('stops.route_id', '=', 'trips.route_id')
                ->where('stops.from', $from)
                ->where('stops.to', $to)
                ->whereRaw("COALESCE((SELECT count(reservations.id) FROM reservations WHERE reservations.trip_id = trips.id AND ((reservations.start_stop_id <= stops.id AND reservations.end_stop_id >= stops.id) or (reservations.start_stop_id <= stops.id and stops.to != $from or stops.from != $from)) ),0) < 12");
        });
    }

    public function scopeTripWithFreeSeats($query, $from, $to)
    {
        return $query->select("seats.seat_number", "trips.id", 'seats.id as seat_id', 'trips.route_id')
            ->whereNotExists(function ($query) use ($from, $to) {
                $query->select(DB::raw(1))
                    ->from('reservations')
                    ->join('trips as t1', 't1.id', '=', 'reservations.trip_id')
                    ->join("stops", 'stops.route_id', 't1.route_id')
                    ->where('t1.id', DB::raw("trips.id"))
                    ->where('stops.from', $from)
                    ->where('stops.to', $to)
                    ->where(function ($group) use ($from) {
                        $group->where(function ($group1) {
                            $group1->where("reservations.start_stop_id", "<=", DB::raw("stops.id"))
                                ->where("reservations.end_stop_id", ">=", DB::raw("stops.id"));
                        })->orWhere(function ($group2) use ($from) {
                            $group2->where("reservations.start_stop_id", "<=", DB::raw("stops.id"))
                                ->Where("stops.to", "=", $from)
                                ->orWhere("stops.from", "=", $from);
                        });
                    })
                    ->where('reservations.seat_id', '=', DB::raw("seats.id"));
            })
            ->join('buses', 'buses.id', '=', 'trips.bus_id')
            ->join('seats', 'seats.bus_id', '=', 'buses.id')
            ->orderBy('seats.id', 'asc');
    }
}
