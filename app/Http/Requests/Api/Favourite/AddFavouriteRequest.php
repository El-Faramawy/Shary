<?php

namespace App\Http\Requests\Api\Favourite;

use App\Http\Requests\BaseRequest;

class AddFavouriteRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id' => 'exists:products,id',
            'product_comment_id' => 'exists:product_comments,id',
            'product_reply_id' => 'exists:product_replies,id',
        ];
    }
}
