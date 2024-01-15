<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Traits\PaginateTrait;
use App\Models\Reword;

class RewardController extends Controller
{
    use PaginateTrait;

    public function rewards()
    {
        $data = Reword::where('user_id', user_api()->id());
        return $this->apiResponse($data);
    }


}
