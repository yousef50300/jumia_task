<?php

use Illuminate\Support\Facades\Route;

Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('login', 'Auth\AdminLoginController@login');
Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

Route::middleware('auth:admin')->group(function () {
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('index');

    Route::resource('users', 'UserController');
    Route::resource('buses', 'BusController');
    Route::get('cities', 'CityController@index')->name('cities.index');

    Route::resource('routes', 'RouteController')->only('index','create','store');
    Route::resource('trips', 'TripController')->only('index','create','store');
});

