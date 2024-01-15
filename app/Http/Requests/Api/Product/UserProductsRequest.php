<?php

namespace App\Http\Requests\Api\Product;

use App\Http\Requests\BaseRequest;

class UserProductsRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
        ];
    }
}
