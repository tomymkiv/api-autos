<?php

use App\Http\Resources\VehicleBrandResource;
use App\Models\VehicleBrand;

$brands = VehicleBrand::all();
$brand_names[] = null;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/car_models', function () use ($url_models) {
//     $data = Http::get($url_models);
//     return $data->json();
// });