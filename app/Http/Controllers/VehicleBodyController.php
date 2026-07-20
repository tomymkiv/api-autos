<?php

namespace App\Http\Controllers;

use App\Http\Resources\VehicleBodyResource;
use App\Models\VehicleBody;

class VehicleBodyController extends Controller
{
    public function index()
    {
        return VehicleBodyResource::collection(VehicleBody::orderBy('name', 'asc')->get());
    }
}