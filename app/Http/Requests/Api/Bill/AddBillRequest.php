<?php

namespace App\Http\Requests\Api\Bill;

use App\Http\Requests\BaseRequest;

class AddBillRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type' => 'required',
            'status' => 'required',
            'price' => 'required',
        ];
    }
}
