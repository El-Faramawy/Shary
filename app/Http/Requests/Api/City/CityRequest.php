<?php

namespace App\Http\Requests\Api\City;

use App\Http\Requests\BaseRequest;

class CityRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'country_id'=>'required|exists:countries,id',
        ];
    }
}
