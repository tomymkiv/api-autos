<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    public function brands()
    {
        return $this->belongsTo(VehicleBrand::class);
    }
}
