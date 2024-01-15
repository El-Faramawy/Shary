<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\AdminBaseRequest;

class StoreCategoryRequest extends AdminBaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name_it'=>'required',
            'name_ge'=>'required',
            'name_fr'=>'required',
            'name_en'=>'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name_it.required' => 'Il nome è obbligatorio',
            'name_ge.required' => 'Il nome è obbligatorio',
            'name_fr.required' => 'Il nome è obbligatorio',
            'name_en.required' => 'Il nome è obbligatorio',
        ];
    }
}
