<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\BaseRequest;

class UpdateAdPackageRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'day_num' => 'required',
            'product_id' => 'required|exists:products,id',
        ];
    }
}
