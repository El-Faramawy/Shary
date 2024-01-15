<?php

namespace App\Http\Requests\Api\Comment;

use App\Http\Requests\BaseRequest;

class AddCommentRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id' => 'required|exists:products,id',
            'comment' => 'required',
        ];
    }
}
