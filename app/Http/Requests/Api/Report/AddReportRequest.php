<?php

namespace App\Http\Requests\Api\Report;

use App\Http\Requests\BaseRequest;

class AddReportRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'message' => 'required',
            'type' => 'required',
            'type_id' => 'required',
        ];
    }
}
