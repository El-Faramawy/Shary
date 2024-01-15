<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\AdminBaseRequest;

class UpdateProductSubCategoryRequest extends AdminBaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'sub_category_id' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'min_limit' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'la categoria è obbligatoria',
        ];
    }
}
