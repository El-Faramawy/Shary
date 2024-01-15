<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Chat\ChatRoomRequest;
use App\Http\Requests\Api\Product\UserProductsRequest;
use App\Http\Traits\NotificationTrait;
use App\Http\Traits\PaginateTrait;
use App\Http\Traits\PhotoTrait;
use App\Models\Chat;
use App\Models\ChatRoom;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    use PhotoTrait, PaginateTrait, NotificationTrait;

    public function send_message(UserProductsRequest $request)
    {
        $roomCredintals = [
            'buyer_id' => user_api()->user()->id ,
            'seller_id' => $request->user_id
        ];
        $chatRoom = ChatRoom::where($roomCredintals)->first();

        if (! $chatRoom){
            $chatRoom = ChatRoom::create($roomCredintals);
        }

        $data = $request->only('message','image','message_type');
        $data['message_from'] = user_api()->id() == $chatRoom->buyer_id ? 'buyer' : 'seller';
        $data['room_id'] = $chatRoom->id;
        if (isset($request->image)){
            $data['image'] = $this->saveImage($request->image, 'uploads/chat');
        }
        $chat = Chat::create($data);

        $user_id = $chat->message_from == 'buyer' ? $chatRoom->seller_id : $chatRoom->buyer_id;
        $msg_data = ['Room'=>$chatRoom,'message'=>$chat];
        $this->sendFCMNotification([$user_id], 'رسالة جديدة', $chat->message , $msg_data , 'chat');

        return $this->apiResponse($chat, '', 'simple');
    }

    /*================================================*/
    public function getChatRooms(Request $request)
    {
        $data = ChatRoom::where('seller_id' , user_api()->id())
            ->orwhere('buyer_id' , user_api()->id())->with('seller','buyer');

        return $this->apiResponse($data);
    }

    /*================================================*/
    public function get_chat(ChatRoomRequest $request)
    {
        $data = Chat::where('room_id',$request->room_id);
        return $this->apiResponse($data);
    }
    /*================================================*/
}
