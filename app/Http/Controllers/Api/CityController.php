<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class CityController
 * @package App\Http\Controllers\Api
 */
class CityController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return CityResource::collection(City::all());
    }
}
