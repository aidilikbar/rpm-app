<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonitoringDataController;
use App\Http\Controllers\PatientController;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');


Route::resource('monitoring-data', MonitoringDataController::class);
Route::resource('patients', PatientController::class);