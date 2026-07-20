<?php

namespace App\Http\Controllers;

use App\Models\VehicleFuel;

class VehicleFuelsController extends Controller
{
    public function index()
    {
        return VehicleFuel::orderBy('id', 'asc')->get();
    }
}
