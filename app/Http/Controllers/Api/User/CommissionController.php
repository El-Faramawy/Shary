<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Commission\AddCommissionRequest;
use App\Http\Traits\PaginateTrait;
use App\Models\Commission;

class CommissionController extends Controller
{
    use PaginateTrait;

    public function add_commission(AddCommissionRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = user_api()->id();
        $commission = Commission::create($data);

        return $this->apiResponse($commission, 'done', 'simple');
    }

    public function commissions()
    {
        $data = Commission::where('user_id',user_api()->id());
        return $this->apiResponse($data);
    }


}
