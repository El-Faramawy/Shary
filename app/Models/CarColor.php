<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarColor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function car_model(){
        return $this->belongsTo(CarModel::class);
    }
}
