<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\TripDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\TripRequest;
use App\Models\Bus;
use App\Models\Route;
use App\Models\Trip;

/**
 * Class TripController
 * @package App\Http\Controllers\Dashboard
 */
class TripController extends Controller
{
    public function index(TripDatatable $datatable)
    {
        return $datatable->render('dashboard.trips.index', compact('datatable'));
    }

    public function create()
    {
        $routes = Route::all();
        $buses = Bus::all();

        return view('dashboard.trips.create', compact('routes','buses'));
    }

    public function store(TripRequest $request)
    {
        Trip::create($request->validated() + ['bus_id' => $request['bus_number']]);

        flash(__('trips.messages.updated'))->success();

        return redirect()->route('dashboard.trips.index');
    }
}
