<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\AdminBaseRequest;

class UpdateDeliveryRequest extends AdminBaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|unique:users,email,' . request('id').'|unique:deliveries,email,' . request('id'),
            'name' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Il nome è obbligatorio',
            'email.required' => ' è richiesta la posta elettronica',
            'email.unique' => " l'e-mail deve essere univoca ",
        ];
    }
}
