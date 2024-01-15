<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Product\UserProductsRequest;
use App\Http\Requests\Api\Rate\AddRateRequest;
use App\Http\Traits\PaginateTrait;
use App\Models\Rate;

class RateController extends Controller
{
    use  PaginateTrait;

    public function add_rate(AddRateRequest $request)
    {
        // $rate = UserRate::where(['rated_user_id' => $request->user_id, 'user_id' => user_api()->id()])->first();
        // if ($rate) {
        //     return $this->apiResponse(null, 'لقد سجلت تقييمك من قبل', 'simple', '422');
        // }
        $data = $request->all();
        $data['user_id'] = user_api()->id();
        $data['rated_user_id'] = $request->user_id;
        $storedData = Rate::create($data);

        return $this->apiResponse($storedData, 'done', 'simple');
    }

    public function rates(UserProductsRequest $request)
    {
        $data = Rate::where('user_id',$request->user_id);
        return $this->apiResponse($data);
    }

}
