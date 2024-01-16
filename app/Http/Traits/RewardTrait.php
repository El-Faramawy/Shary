<?php

namespace App\Http\Traits;

use App\Models\Favourate;
use App\Models\Following;
use App\Models\Product;
use App\Models\Reword;

trait  RewardTrait
{
    function like_follow_reward($product_id)
    {
        $product = Product::where('id', $product_id)->first();
        if ($product->has_reword == 0) {
            $follow_count = Following::where('product_id', $product->id)->count();
            $favourite_count = Favourate::where('product_id', $product->id)->count();
            $user_rate = $product->user?->rate ?? 0;
            if ( ($user_rate * 20) >= 80 &&
                ( $follow_count >= setting()->follow_reword ||
                    $favourite_count >= setting()->like_reword )
            ) {
                user_api()->user()->update(['wallet' => user_api()->user()->wallet + setting()->reword]);
                $product->update(['has_reword' => 1]);
                Reword::create([
                    'user_id'       => user_api()->id(),
                    'product_id'    => $product->id,
                    'product_name'  => $product->name,
                    'price'         => $product->price
                ]);
            }
        }
    }


}
