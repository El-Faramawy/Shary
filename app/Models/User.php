<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    protected $guarded = [];
    protected $appends = ['is_follow'];

    public function getImageAttribute()
    {
        return get_file($this->attributes['image']);
    }

    public function getRateAttribute()
    {
        $rates = Rate::where('rated_user_id', $this->attributes['id'])->pluck('rate')->avg();
        return $rates ?: 0;
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'user_id');
    }

    public function chat_messages()
    {
        return $this->hasMany(Chat::class, 'user_id');
    }

    public function unread_messages()
    {
        return $this->hasMany(Chat::class, 'user_id')->where(['is_read' => 0, 'message_from' => 'user']);
    }

    public function verify_images()
    {
        return $this->hasOne(VerifyAccount::class);
    }

    //===================  is_follow ===========================
    public function getIsFollowAttribute()
    {
        if (user_api()->check()) {
            $following = Following::where(['follower_user_id' => user_api()->user()->id, 'following_user_id' => $this->attributes['id']])->count();
            if ($following > 0)
                return 'yes';
            else
                return 'no';
        } else {
            return 'no';
        }
    }

}
