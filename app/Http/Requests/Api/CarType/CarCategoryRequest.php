<?php

namespace App\Http\Requests\Api\CarType;

use App\Http\Requests\BaseRequest;

class CarCategoryRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'car_type_id'=>'required|exists:car_types,id',
        ];
    }
}
