<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Traits\PaginateTrait;
use App\Http\Traits\WithRelationTrait;
use App\Models\Category;
use App\Models\Market;
use App\Models\MarketCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    use WithRelationTrait , PaginateTrait;

    public function index(){
        $categories = Category::with($this->categoryRelations());
        return $this->apiResponse($categories);
    }
    //================================================
    public function sub_category(Request $request){
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 'simple', '422');
        }
        $data = SubCategory::where('category_id',$request->category_id);
        return $this->apiResponse($data);
    }
    //================================================

}
