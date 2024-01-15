<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\AdminBaseRequest;

class StoreMaterialRequest extends AdminBaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
//            'image' => 'required ',
            'user_id' => 'required',
            'material_category_id' => 'required',
            'amount' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
//            'title.required' => 'Il titolo del messaggio è obbligatorio',
//            'message.required' => ' Il messaggio è obbligatorio',
        ];
    }
}
