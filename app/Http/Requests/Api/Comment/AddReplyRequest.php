<?php

namespace App\Http\Requests\Api\Comment;

use App\Http\Requests\BaseRequest;

class AddReplyRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'comment_id' => 'required|exists:product_comments,id',
            'reply' => 'required',
        ];
    }
}
