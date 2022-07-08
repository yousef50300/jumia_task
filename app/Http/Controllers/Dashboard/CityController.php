<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\CityDatatable;
use App\Http\Controllers\Controller;

/**
 * Class CityController
 * @package App\Http\Controllers\Dashboard
 */
class CityController extends Controller
{
    /**
     * @param CityDatatable $datatable
     * @return mixed
     */
    public function index(CityDatatable $datatable)
    {
        return $datatable->render('dashboard.cities.index');
    }
}
