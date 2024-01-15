<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\AdminBaseRequest;

class UpdateProductRequest extends AdminBaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => 'required',
            'tax_id' => 'required',
            'name_it' => 'required',
            'name_ge' => 'required',
            'name_fr' => 'required',
            'name_en' => 'required',
            'description_it' => 'required',
            'description_ge' => 'required',
            'description_fr' => 'required',
            'description_en' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'la categoria è obbligatoria',
            'tax_id.required' => 'la via è obbligatoria',
            'name_it.required' => 'Il nome è obbligatorio',
            'name_ge.required' => 'Il nome è obbligatorio',
            'name_fr.required' => 'Il nome è obbligatorio',
            'name_en.required' => 'Il nome è obbligatorio',
            'description_it.required' => 'la descrizione è obbligatoria',
            'description_ge.required' => 'la descrizione è obbligatoria',
            'description_fr.required' => 'la descrizione è obbligatoria',
            'description_en.required' => 'la descrizione è obbligatoria',
        ];
    }
}
