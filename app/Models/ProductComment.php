<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends =['is_favourite'];
    //===================  replies ===========================
    public function replies()
    {
        return $this->hasMany(ProductReply::class,'comment_id');
    }
    //===================  user ===========================
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    //===================  product ===========================
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    //===================  IsFavourite ===========================
    public function getIsFavouriteAttribute(){
        if (user_api()->check()){
            $favourites = Favourate::where(['user_id' => user_api()->user()->id , 'product_comment_id' => $this->attributes['id'] ] )->count();
            if ($favourites > 0)
                return 'yes';
            else
                return 'no';
        }else{
            return 'no';
        }
    }
}
