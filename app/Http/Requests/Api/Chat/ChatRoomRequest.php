<?php

namespace App\Http\Requests\Api\Chat;

use App\Http\Requests\BaseRequest;

class ChatRoomRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'room_id' => 'required|exists:chat_rooms,id',
        ];
    }
}
