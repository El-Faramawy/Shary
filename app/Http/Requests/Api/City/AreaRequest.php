<?php

namespace App\Http\Requests\Api\City;

use App\Http\Requests\BaseRequest;

class AreaRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'city_id'=>'required|exists:cities,id',
        ];
    }
}
