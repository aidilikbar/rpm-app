<?php

use App\Http\Controllers\MonitoringDataController;
use Illuminate\Support\Facades\Route;

Route::prefix('monitoring-data')->group(function () {
    Route::get('/', [MonitoringDataController::class, 'apiIndex'])->name('api.monitoring-data.index');
    Route::post('/', [MonitoringDataController::class, 'apiStore'])->name('api.monitoring-data.store');
    Route::get('/{id}', [MonitoringDataController::class, 'apiShow'])->name('api.monitoring-data.show');
    Route::put('/{id}', [MonitoringDataController::class, 'apiUpdate'])->name('api.monitoring-data.update');
    Route::delete('/{id}', [MonitoringDataController::class, 'apiDestroy'])->name('api.monitoring-data.destroy');
});