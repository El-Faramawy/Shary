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
    public function getCarImageAttribute(){
        return  get_file($this->attributes['car_image']);
    }
    public function getBuildingImageAttribute(){
        return  get_file($this->attributes['building_image']);
    }
    public function getWhatVerificationAttribute(){
        return  get_file($this->attributes['what_verification']);
    }
    public function getHowVerificationAttribute(){
        return  get_file($this->attributes['how_verification']);
    }
    public function getDeletedActionAttribute(){
        return  get_file($this->attributes['deleted_action']);
    }
    public function getNoCommissionAttribute(){
        return  get_file($this->attributes['no_commission']);
    }
    public function getBreakLowAttribute(){
        return  get_file($this->attributes['break_low']);
    }
    public function getVerificationImportantAttribute(){
        return  get_file($this->attributes['verification_important']);
    }
}
