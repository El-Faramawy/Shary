<?php

namespace App\Http\Requests\Api\Authentication;

use App\Http\Requests\BaseRequest;

class RegisterRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'phone' => 'required|unique:users,phone',
            'user_name' => 'required|unique:users,user_name',
            'country_id' => 'required|exists:countries,id',
            'name' => 'required',
            'password' => 'required'
        ];
    }
}
