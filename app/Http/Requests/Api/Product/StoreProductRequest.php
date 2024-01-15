<?php

namespace App\Http\Requests\Api\Product;

use App\Http\Requests\BaseRequest;

class StoreProductRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'city_id' => 'required|exists:cities,id',
            'area_id' => 'required|exists:areas,id',
            'type' => 'required|in:car,building',
            ];
    }
}
