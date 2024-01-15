<?php

namespace App\Http\Requests\Api\CarType;

use App\Http\Requests\BaseRequest;

class CarColorRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'car_model_id'=>'required|exists:car_models,id',
        ];
    }
}
