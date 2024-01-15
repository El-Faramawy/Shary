<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Traits\PaginateTrait;
use App\Http\Traits\WithRelationTrait;
use App\Models\Area;
use App\Models\Category;
use App\Models\City;
use App\Models\Market;
use App\Models\MarketCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    use WithRelationTrait , PaginateTrait;

    public function index(){
        $data = City::with($this->cityRelations());
        return $this->apiResponse($data);
    }
    //================================================
    public function area(Request $request){
        $validator = Validator::make($request->all(), [
            'city_id' => 'required|exists:cities,id',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 'simple', '422');
        }
        $data = Area::where('city_id',$request->city_id);
        return $this->apiResponse($data);
    }
    //================================================

}
