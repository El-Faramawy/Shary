<?php

namespace App\Http\Requests\Api\Comment;

use App\Http\Requests\BaseRequest;

class DeleteReplyRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'reply_id' => 'required|exists:product_replies,id',
        ];
    }
}
