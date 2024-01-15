<?php

namespace App\Http\Requests\Api\Commission;

use App\Http\Requests\BaseRequest;

class AddCommissionRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'price' => 'required',
            'product_name' => 'required',
            'product_id' => 'required|exists:products,id',
        ];
    }
}
