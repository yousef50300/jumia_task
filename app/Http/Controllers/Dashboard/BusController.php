<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\BusDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\BusRequest;
use App\Models\Bus;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class BusController
 * @package App\Http\Controllers\Dashboard
 */
class BusController extends Controller
{
    /**
     * @param BusDatatable $datatable
     * @return mixed
     */
    public function index(BusDatatable $datatable)
    {
        return $datatable->render('dashboard.buses.index');
    }

    public function create()
    {
        return view('dashboard.buses.create');
    }

    /**
     * @param BusRequest $request
     * @return RedirectResponse
     */
    public function store(BusRequest $request)
    {
        Bus::create($request->validated());

        flash(__('buses.messages.created'))->success();

        return redirect()->route('dashboard.buses.index');
    }

    /**
     * @param Bus $bus
     * @return Application|Factory|View
     */
    public function edit(Bus $bus)
    {
        return view('dashboard.buses.edit', compact('bus'));
    }

    /**
     * @param BusRequest $request
     * @param Bus $bus
     * @return RedirectResponse
     */
    public function update(BusRequest $request, Bus $bus)
    {
        $bus->update($request->validated());

        flash(__('buses.messages.updated'))->success();

        return redirect()->route('dashboard.buses.index');
    }

    /**
     * @param Bus $bus
     * @return RedirectResponse
     */
    public function destroy(Bus $bus)
    {
        if (!$bus->canDelete()){
            flash(__('buses.messages.cant_deleted'))->error();
        }

        $bus->delete();

        flash(__('buses.messages.deleted'))->success();

        return redirect()->route('dashboard.buses.index');
    }
}
