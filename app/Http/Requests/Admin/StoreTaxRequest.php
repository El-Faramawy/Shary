<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\AdminBaseRequest;

class StoreTaxRequest extends AdminBaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tax'=>'required',
        ];
    }

    public function messages(): array
    {
        return [
            'tax.required' => 'Il iva è obbligatorio',
        ];
    }
}
