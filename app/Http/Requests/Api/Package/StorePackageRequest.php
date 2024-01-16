<?php

namespace App\Http\Requests\Api\Package;

use App\Http\Requests\BaseRequest;

class StorePackageRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'package_id' => 'required|exists:packages,id',
        ];
    }
}
