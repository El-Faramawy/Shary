<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $guarded = [];

    //==============================================
    public function reporter_user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'type_id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'type_id');
    }
    public function comment(){
        return $this->belongsTo(ProductComment::class,'type_id');
    }
    public function reply(){
        return $this->belongsTo(ProductReply::class,'type_id');
    }}
