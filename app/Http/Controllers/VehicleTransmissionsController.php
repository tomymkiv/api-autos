<?php

namespace App\Http\Controllers;

use App\Models\VehicleTransmission;

class VehicleTransmissionsController extends Controller
{
    public function index()
    {
        return VehicleTransmission::orderBy('id', 'asc')->get();
    }
}
