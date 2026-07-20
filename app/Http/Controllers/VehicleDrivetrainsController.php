<?php

namespace App\Http\Controllers;

use App\Models\VehicleDrivetrain;

class VehicleDrivetrainsController extends Controller
{
    public function index()
    {
        return VehicleDrivetrain::orderBy('id', 'asc')->get();
    }
}
