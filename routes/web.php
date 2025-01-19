<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonitoringDataController;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');


Route::resource('monitoring-data', MonitoringDataController::class);