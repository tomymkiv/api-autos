<?php

namespace App\Http\Controllers;

use App\Http\Resources\VehicleModelResource;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;

class VehicleModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return VehicleModelResource::collection(VehicleModel::orderBy('id', 'asc')->get());
    }
    public function show(VehicleBrand $vehicleBrand)
    {
        return VehicleModelResource::collection(VehicleModel::where('brand_id', $vehicleBrand->id)->get());
    }
}