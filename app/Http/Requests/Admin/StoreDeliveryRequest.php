<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\AdminBaseRequest;

class StoreDeliveryRequest extends AdminBaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|unique:users,email|unique:deliveries,email',
            'name' => 'required',
            'password' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Il nome è obbligatorio',
            'email.required' => ' è richiesta la posta elettronica',
            'email.unique' => " l'e-mail deve essere univoca ",
            'password.required' => "E 'richiesta la password",
        ];
    }
}
