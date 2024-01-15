<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\AdminBaseRequest;

class StoreUserRequest extends AdminBaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|unique:users,email|unique:deliveries,email',
            'user_name' => 'required',
            'phone' => 'required',
            'user_id' => 'required',
            'password' => 'required',
            'name' => 'required'
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
