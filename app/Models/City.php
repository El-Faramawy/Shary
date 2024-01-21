<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $appends =['name'];
    protected $guarded = [];

    public function getNameAttribute(){
        return $this->attributes[getLanguage('name')];
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }


}
