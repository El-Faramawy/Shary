<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $appends =['name'];
    protected $guarded = [];

    public function getNameAttribute(){
        return $this->attributes[getLanguage('name')];
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

}
