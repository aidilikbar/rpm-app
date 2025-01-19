<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonitoringDataController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('monitoring-data', MonitoringDataController::class);