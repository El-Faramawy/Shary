<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'chat_rooms';

    public function seller(){
        return $this->belongsTo(User::class );
    }
    public function buyer(){
        return $this->belongsTo(User::class );
    }

}
