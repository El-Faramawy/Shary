<?php

namespace App\Http\Requests\Api\Comment;

use App\Http\Requests\BaseRequest;

class DeleteCommentRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'comment_id' => 'required|exists:product_comments,id',
        ];
    }
}
