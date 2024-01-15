<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\AdminBaseRequest;

class StoreSubCategoryRequest extends AdminBaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'amount'=>'required',
        ];
    }

    public function messages(): array
    {
        return [
            'amount.required' => 'Il quantità è obbligatorio',
        ];
    }
}
