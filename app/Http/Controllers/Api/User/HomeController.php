<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Traits\PaginateTrait;
use App\Http\Traits\WithRelationTrait;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use WithRelationTrait, PaginateTrait;

    public function productFillterArray()
    {
        return [
            "name",
            "type",
            "publisher_type",
            "area_id",
            "city_id",
            "phone",
            "whatsapp",
            "address",
            "car_type_id",
            "car_category_id",
            "car_model_id",
            "car_color_id",
            "car_status",
            "checked",
            "license",
            "body",
            "street_type",
            "publisher_number",
            "building_category",
            "room_number",
            "bathroom_number",
            "building_area",
            "floor_number",
            "building_age",
            "full_option",
            "building_status",
        ];
    }

    public function index(Request $request)
    {
        $products = Product::where('status', 'active')
            ->with($this->productRelations())->withCount('comments');

        if (user_api()->check()) {
            $products = $products->where('country_id', user_api()->user()->country_id);
        }

        foreach ($this->productFillterArray() as $field) {
            if (isset($request[$field]) && $request[$field] != null) {
                $products = $products->where("$field", "LIKE", "%" . $request[$field] . "%");
            }
        }

        if (isset($request['price_from']) && isset($request['price_to']) &&
            $request['price_from'] != null && $request['price_to'] != null) {
            $products = $products->whereBetween("price", [$request['price_from'], $request['price_to']]);
        }

        $image_type = $request['image_type'];
        if (isset($image_type) && $image_type != null) {
            $products = $products->whereHas("$image_type");
        }

        if (isset($request['lat']) && isset($request['long'])) {
            $products = $products->selectRaw(
                '( 6371 * acos( cos( radians(?) ) * cos( radians( latitude ) )
                 * cos( radians( longitude ) - radians(?) ) + sin( radians(?) )
                 * sin( radians( latitude ) ) ) ) AS distance',
                [$request['lat'], $request['long'], $request['lat']]
            )->orderBy('distance');
        }

        return $this->apiResponse($products);
    }

    public function slider(Request $request)
    {
        $data = Product::where([['status' , 'active'], ['panner_end_date' ,'>=',date('Y-m-d')]])/*->select('id', 'image','name')*/
        ;
        return $this->apiResponse($data);
    }


}
