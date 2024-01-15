<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Traits\PaginateTrait;
use App\Models\Favourate;
use App\Models\Notification;
use App\Models\ProductReply;
use App\Models\User;

class NotificationController extends Controller
{
    use PaginateTrait;
    public function notifications(){
        Notification::where('user_id',user_api()->user()->id)->update(['is_read'=>true]);
        $notifications = Notification::with('product')->where('user_id',user_api()->user()->id)->get();
        foreach ($notifications as $notification){
            if ($notification->type == 'favorite'){
                $notification['count'] = $notification->product?->favourites()->count();
                $notification['name']= $notification?->product?->favourites()?->latest()?->first()?->user?->name;
                $user_ids = $notification?->product?->favourites()?->latest()?->take(8)->pluck('user_id')->toArray();
                $notification['images'] = User::whereIn('id',$user_ids)->pluck('image')->toArray();
            }
            elseif ($notification->type == 'comment'){
                $notification['count'] = $notification->product?->comments()->count();
                $notification['name']= $notification?->product?->comments()?->latest()?->first()?->user?->name;
                $user_ids = $notification?->product?->comments()?->latest()?->take(8)->pluck('user_id')->toArray();
                $notification['images'] = User::whereIn('id',$user_ids)->pluck('image')->toArray();
            }
            elseif ($notification->type == 'reply'){
                $comment_ids = $notification->product?->comments()?->pluck('id')->toArray();
                $notification['count'] = ProductReply::whereIn('id',$comment_ids)->count();
                $notification['name']= ProductReply::whereIn('id',$comment_ids)->latest()?->first()?->user?->name;
                $user_ids = ProductReply::whereIn('id',$comment_ids)->latest()?->take(8)->pluck('user_id')->toArray();
                $notification['images'] = User::whereIn('id',$user_ids)->pluck('image')->toArray();
            }
        }

        return $this->apiResponse($notifications , '','simple');
    }//end fun

    public function getNotificationsCount()
    {
        $notificationsCount = Notification::where('user_id',user_api()->user()->id)->where('is_read',false)->count();
        return $this->apiResponse($notificationsCount,null,'simple');
    }//end fun



}
