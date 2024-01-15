<?php

namespace App\Http\Requests\Api\Authentication;

use App\Http\Requests\BaseRequest;

class UpdateProfileRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'phone' => 'required|unique:users,phone,'.user_api()->id(),
            'user_name' => 'required|unique:users,user_name,'.user_api()->id(),
            'name' => 'required',
        ];
    }
}
