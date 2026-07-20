<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleVersion extends Model
{
    public function model()
    {
        return $this->belongsTo(VehicleModel::class);
    }
}
