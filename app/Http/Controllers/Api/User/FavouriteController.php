<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Favourite\AddFavouriteRequest;
use App\Http\Traits\PaginateTrait;
use App\Http\Traits\RewardTrait;
use App\Http\Traits\WithRelationTrait;
use App\Models\Favourate;
use App\Models\Product;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    use WithRelationTrait, PaginateTrait;
    use RewardTrait;

    public function add_delete_favourite(AddFavouriteRequest $request)
    {
        $data = $request->only('product_id','product_comment_id','product_reply_id');
        $data['user_id'] = user_api()->user()->id;
        $favourite = Favourate::where($data);

        if ($favourite->count() > 0) {
            $favourite->delete();
        } else {
            Favourate::create($data);
            if ($request->product_id) {
                $this->like_follow_reward($request->product_id);
            }
        }

        return $this->apiResponse(null, 'done', 'simple');
    }

    public function favourite_products(Request $request)
    {
        $product_ids = Favourate::whereHas('product')
            ->where('user_id', user_api()->id())->pluck('product_id')->toArray();

        $products = Product::whereIn('id',$product_ids)->withCount('comments')->with($this->productRelations());
        return $this->apiResponse($products);
    }
}
