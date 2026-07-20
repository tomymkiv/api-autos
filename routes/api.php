<?php

use App\Http\Controllers\Api\VehicleBrandController;
use App\Http\Controllers\VehicleBodyController;
use App\Http\Controllers\VehicleDrivetrainsController;
use App\Http\Controllers\VehicleFuelsController;
use App\Http\Controllers\VehicleModelController;
use App\Http\Controllers\VehicleTransmissionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// api/ruta

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/brands', [VehicleBrandController::class, 'index'])->name('vehicle_brand.index');
Route::get('/models', [VehicleModelController::class, 'index'])->name('vehicle_models.index');
Route::get('/brands/{vehicleBrand}', [VehicleBrandController::class, 'show'])->name('vehicle_brand.show');
Route::get('/brands/{vehicleBrand}/models', [VehicleModelController::class, 'show'])->name('vehicle_models.show');
Route::get('/types', [VehicleBodyController::class, 'index'])->name('vehicle_body.index');
Route::get('/drivetrains', [VehicleDrivetrainsController::class, 'index'])->name('vehicle_drivetrains.index');
Route::get('/transmissions', [VehicleTransmissionsController::class, 'index'])->name('vehicle_transmissions.index');
Route::get('/fuels', [VehicleFuelsController::class, 'index'])->name('vehicle_fuel.index');