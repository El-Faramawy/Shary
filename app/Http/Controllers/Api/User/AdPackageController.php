<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UpdateAdPackageRequest;
use App\Http\Traits\PaginateTrait;
use App\Models\AdPackage;
use App\Models\Product;

class AdPackageController extends Controller
{
    use  PaginateTrait;

    public function updateAdPackage(UpdateAdPackageRequest $request)
    {
        $product = Product::where('id', $request->product_id)->first();
        if ($request->type == 'panner'){
            $product->panner_end_date = date('Y-m-d',
                strtotime($product->panner_end_date . '+' . $request->day_num . ' day'));
        }else{
            $product->end_date = date('Y-m-d',
                strtotime($product->end_date . '+' . $request->day_num . ' day'));
        }

        $product->save();

        return $this->apiResponse($product, '', 'simple');
    }

    public function ad_packages()
    {
        $data = AdPackage::query();
        return $this->apiResponse($data);
    }
}
