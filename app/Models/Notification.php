<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getCreatedAtAttribute(){
        return date('Y-m-d H:i:s' ,strtotime($this->attributes['created_at'] . '+2 hour'));
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
