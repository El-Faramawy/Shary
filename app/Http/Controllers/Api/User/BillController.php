<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Bill\AddBillRequest;
use App\Http\Traits\PaginateTrait;
use App\Models\Bill;

class BillController extends Controller
{
    use PaginateTrait;

    public function add_bill(AddBillRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = user_api()->id();
        $bill = Bill::create($data);

        return $this->apiResponse($bill, 'done', 'simple');
    }

    public function bills()
    {
        $data = Bill::where('user_id',user_api()->id());
        return $this->apiResponse($data);
    }


}
