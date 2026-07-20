<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VehicleBrandResource;
use App\Models\VehicleBrand;

class VehicleBrandController extends Controller
{
    public function index()
    {
        return VehicleBrandResource::collection(VehicleBrand::get());
        // retorno solo la info que tengo seteada en VehicleBrandResource
        // return CarBrandsResource::collection(CarBrand::paginate(2));
    }
    public function show(VehicleBrand $vehicleBrand)
    {
        return new VehicleBrandResource($vehicleBrand);
    }
}