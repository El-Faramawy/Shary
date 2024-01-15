<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function getLogoAttribute(){
        return  get_file($this->attributes['logo']);
    }
    public function getFavIconAttribute(){
        return  get_file($this->attributes['fav_icon']);
    }
}
