<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Traits\PaginateTrait;
use App\Http\Traits\RewardTrait;
use App\Http\Traits\WithRelationTrait;
use App\Models\Following;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FollowController extends Controller
{
    use WithRelationTrait, PaginateTrait;
    use RewardTrait;

    public function add_delete_follow(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'exists:products,id',
            'following_user_id' => 'exists:users,id',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 'simple', '422');
        }
        $data = $request->only('product_id', 'following_user_id');
        $data['follower_user_id'] = user_api()->user()->id;
        $follow = Following::where($data);

        if ($follow->count() > 0) {
            $follow->delete();
        } else {
            Following::create($data);
            if ($request->product_id) {
                $this->like_follow_reward($request->product_id);
            }
        }

        return $this->apiResponse(null, 'done', 'simple');
    }

    public function followers(Request $request)
    {
        $follows = Following::where([['following_user_id', user_api()->id()], ['follower_user_id', '!=', null]])->with('follower_user');
        return $this->apiResponse($follows);
    }

    public function users_i_follow(Request $request)
    {
        $follows = Following::where([['follower_user_id', user_api()->id()], ['following_user_id', '!=', null]])->with('following_user');
        return $this->apiResponse($follows);
    }

}
