<?php

namespace App\Http\Requests\Api\Product;

use App\Http\Requests\BaseRequest;

class OneProductRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|exists:products,id',
        ];
    }
}
