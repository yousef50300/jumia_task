<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\RouteDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\RouteRequest;
use App\Models\Bus;
use App\Models\City;
use App\Models\Route;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class RouteController
 * @package App\Http\Controllers\Dashboard
 */
class RouteController extends Controller
{
    /**
     * @param RouteDatatable $datatable
     * @return mixed
     */
    public function index(RouteDatatable $datatable)
    {
        return $datatable->render('dashboard.routes.index', compact('datatable'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $cities = City::all();
        $buses = Bus::all();

        return view('dashboard.routes.create', compact('cities', 'buses'));
    }

    /**
     * @param RouteRequest $request
     * @return RedirectResponse
     */
    public function store(RouteRequest $request)
    {
        $route = Route::create([
            'name' => $request['name'],
            'start_station' => $request['start_destination'],
            'end_station' => $request['end_destination'],
        ]);

        $stopsDestinations = generateAllDestinations(
            $request['start_destination'],
            $request['stops'],
            $request['end_destination']
        );

        $route->stops()->createMany($stopsDestinations);

        flash(__('routes.messages.updated'))->success();

        return redirect()->route('dashboard.routes.index');
    }
}
