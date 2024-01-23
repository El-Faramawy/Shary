<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends =['is_favourite','is_follow'];

    public function getImageAttribute(){
        return  get_file($this->attributes['image']);
    }
    public function getVideoAttribute(){
        return  get_file($this->attributes['video']);
    }
    public function getVideoCoverAttribute(){
        return  get_file($this->attributes['video_cover']);
    }
    //===================  IsFavourite ===========================
    public function getIsFavouriteAttribute(){
        if (user_api()->check()){
            $favourites = Favourate::where(['user_id' => user_api()->user()->id , 'product_id' => $this->attributes['id'] ] )->count();
            if ($favourites > 0)
                return 'yes';
            else
                return 'no';
        }else{
            return 'no';
        }
    }
    //===================  is_follow ===========================
    public function getIsFollowAttribute(){
        if (user_api()->check()){
            $following = Following::where(['follower_user_id' => user_api()->user()->id , 'product_id' => $this->attributes['id'] ] )->count();
            if ($following > 0)
                return 'yes';
            else
                return 'no';
        }else{
            return 'no';
        }
    }

    //===================  user ===========================
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //===================  area ===========================
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    //===================  city ===========================
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    //===================  country ===========================
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    //===================  images ===========================
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    //===================  comments ===========================
    public function comments()
    {
        return $this->hasMany(ProductComment::class);
    }
    //===================  favourites ===========================
    public function favourites()
    {
        return $this->hasMany(Favourate::class);
    }
    //===================  car_type ===========================
    public function car_type()
    {
        return $this->belongsTo(CarType::class);
    }
    //===================  car_category ===========================
    public function car_category()
    {
        return $this->belongsTo(CarCategory::class);
    }
    //===================  car_model ===========================
    public function car_model()
    {
        return $this->belongsTo(CarModel::class);
    }
    //===================  car_color ===========================
    public function car_color()
    {
        return $this->belongsTo(CarColor::class);
    }


}
