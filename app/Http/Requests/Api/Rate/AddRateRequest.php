<?php

namespace App\Http\Requests\Api\Rate;

use App\Http\Requests\BaseRequest;

class AddRateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'comment' => 'required',
            'rate' => 'required',
        ];
    }
}
