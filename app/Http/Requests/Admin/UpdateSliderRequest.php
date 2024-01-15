<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\AdminBaseRequest;

class UpdateSliderRequest extends AdminBaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id' => 'required',
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
