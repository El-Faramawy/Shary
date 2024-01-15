<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\AdminBaseRequest;

class StoreSliderRequest extends AdminBaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'image' => 'required ',
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
