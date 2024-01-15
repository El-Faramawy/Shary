<?php

namespace App\Http\Requests\Api\CarType;

use App\Http\Requests\BaseRequest;

class CarModelRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'car_category_id'=>'required|exists:car_categories,id',
        ];
    }
}
