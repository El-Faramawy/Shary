<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ProductTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Traits\PhotoTrait;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    use PhotoTrait;

    public function index(Request $request)
    {
        if ($request->ajax()){
            if(isset($request->user_id)){
                $data =Product::where('user_id',$request->user_id)->latest()->get();
            }else{
                $data =Product::latest()->get();
            }
            return Datatables::of($data)
                ->addColumn('action', function ($product) {
                    $action = '';
//                    if (in_array(24, admin()->user()->permission_ids)) {
//                        $action .= '
//                        <button  id="editBtn" class="btn btn-default btn-primary btn-sm mb-2  mb-xl-0 "
//                             data-id="' . $product->id . '" ><i class="fa fa-edit text-white"></i>
//                        </button>';
//                    }
//                    if(in_array(25,admin()->user()->permission_ids)) {
                        $action .=  '
                             <a class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $product->id . '" ><i class="fa fa-trash-o text-white"></i></a>
                       ';
//                    }
                    return $action;
                })
                ->addColumn('checkbox' , function ($product){
                    return '<input type="checkbox" class="sub_chk" data-id="'.$product->id.'">';
                })
                ->addColumn('category' , function ($product){
                    return $product->category?$product->category->name_ar:'';
                })
                ->addColumn('user' , function ($product){
                    return $product->user?$product->user->name:'';
                })
                ->addColumn('sub_category' , function ($product){
                    return $product->sub_category?$product->sub_category->name_ar:'';
                })
                ->addColumn('city' , function ($product){
                    return $product->city?$product->city->name_ar:'';
                })
                ->addColumn('area' , function ($product){
                    return $product->area?$product->area->name_ar:'';
                })
                ->addColumn('comment', function ($item) {
                    return '<a  class="btn btn-icon btn-bg-light btn-info btn-sm me-1 "
                            href="'.route("comment.index","product_id=".$item->id).'" >
                            <span class="svg-icon svg-icon-3" style="font-size:12px">
                                <span class="svg-icon svg-icon-3">
                                    <i class="fa fa-comments "></i>
                                </span>
                            </span>
                            </button>';
                })
                ->addColumn('product_rate', function ($item) {
                    return '<a  class="btn btn-icon btn-bg-warning btn-light btn-sm me-1 "
                            href="'.route("product_rate.index","product_id=".$item->id).'" >
                            <span class="svg-icon svg-icon-3" style="font-size:12px">
                                <span class="svg-icon svg-icon-3">
                                    <i class="fa fa-star text-warning "></i>
                                </span>
                            </span>
                            </button>';
                })
                ->editColumn('type',function ($user){
                    $color = $user->type == ProductTypeEnum::USER ? "light" :"primary";
                    $text = $user->type == ProductTypeEnum::USER ? "فرد" :"شركة";
                    return '<span class=" badge badge-sm badge-' . $color . '" >'.$text.'</span>';
                })
                ->editColumn('has_ad',function ($item){
                    $color = $item->has_ad == 1 ? "success" :"danger";
                    $text = $item->has_ad == 1 ? "نعم" :"لا";
                    return '<span class="text-center fw-3 badge badge-sm badge-' . $color . '" style="color:white">'.$text.'</a>';
                })
                ->editColumn('is_chat',function ($item){
                    $color = $item->is_chat == 1 ? "success" :"danger";
                    $text = $item->is_chat == 1 ? "نعم" :"لا";
                    return '<span class="text-center fw-3 badge badge-sm badge-' . $color . '" style="color:white">'.$text.'</a>';
                })
                ->editColumn('is_95',function ($item){
                    $color = $item->is_95 == 1 ? "success" :"danger";
                    $text = $item->is_95 == 1 ? "نعم" :"لا";
                    return '<span class="text-center fw-3 badge badge-sm badge-' . $color . '" style="color:white">'.$text.'</a>';
                })
                ->editColumn('is_diesel',function ($item){
                    $color = $item->is_diesel == 1 ? "success" :"danger";
                    $text = $item->is_diesel == 1 ? "نعم" :"لا";
                    return '<span class="text-center fw-3 badge badge-sm badge-' . $color . '" style="color:white">'.$text.'</a>';
                })
                ->editColumn('civil_defense_license',function ($item){
                    $color = $item->civil_defense_license == 1 ? "success" :"danger";
                    $text = $item->civil_defense_license == 1 ? "نعم" :"لا";
                    return '<span class="text-center fw-3 badge badge-sm badge-' . $color . '" style="color:white">'.$text.'</a>';
                })
                ->editColumn('municipal_license',function ($item){
                    $color = $item->municipal_license == 1 ? "success" :"danger";
                    $text = $item->municipal_license == 1 ? "نعم" :"لا";
                    return '<span class="text-center fw-3 badge badge-sm badge-' . $color . '" style="color:white">'.$text.'</a>';
                })
                ->editColumn('for_rent',function ($item){
                    if ($item->for_rent == null) return '';
                    $color = $item->for_rent == 1 ? "success" :"danger";
                    $text = $item->for_rent == 1 ? "نعم" :"لا";
                    return '<span class="text-center fw-3 badge badge-sm badge-' . $color . '" style="color:white">'.$text.'</a>';
                })
                ->editColumn('developed',function ($item){
                    if ($item->developed == null) return '';
                    $color = $item->developed == 1 ? "success" :"danger";
                    $text = $item->developed == 1 ? "نعم" :"لا";
                    return '<span class="text-center fw-3 badge badge-sm badge-' . $color . '" style="color:white">'.$text.'</a>';
                })
                ->editColumn('show_price',function ($item){
                    $color = $item->show_price == 1 ? "success" :"danger";
                    $text = $item->show_price == 1 ? "نعم" :"لا";
                    return '<span class="text-center fw-3 badge badge-sm badge-' . $color . '" style="color:white">'.$text.'</a>';
                })
                ->editColumn('favourite', function ($item) {
                    $color = $item->favourite == 1 ? "warning" : "dark" ;
                    return '<span style="font-size: x-large;" class="favourite fw-1  text-' . $color . '"
                    data-id="' . $item->id . '" style="cursor: pointer;">
                    <i class="py-2 fw-1  fa fa-star text-' . $color . '" ></i></span>
                    ' ;
                })
                ->addColumn('address', function ($item) {
                    $text = "الذهاب للعنوان";
                    return '<a href= "https://maps.google.com/?q='.$item->latitude.','.$item->longitude.'" target="_blank">'.$text.'</a>' ;
                })
                ->editColumn('image',function ($product){
                    return '<img alt="image" class="img list-thumbnail border-0" style="width:100px;border-radius:10px" onclick="window.open(this.src)" src="'.$product->image.'">';
                })
//                ->editColumn('civil_defense_license',function ($product){
//                    return '<img alt="image" class="img list-thumbnail border-0" style="width:100px;border-radius:10px" onclick="window.open(this.src)" src="'.$product->civil_defense_license.'">';
//                })
//                ->editColumn('municipal_license',function ($product){
//                    return '<img alt="image" class="img list-thumbnail border-0" style="width:100px;border-radius:10px" onclick="window.open(this.src)" src="'.$product->municipal_license.'">';
//                })
                ->editColumn('video',function ($product){
                    $video = "'".$product->video."'";
                    return '<img alt="image" class="img list-thumbnail border-0" style="width:100px;border-radius:10px" onclick="window.open('.$video.')" src="'.$product->video_cover.'">';
                })
                ->escapeColumns([])
                ->make(true);
        }
        return view('Admin.Product.index');
    }

    ################ multiple Delete  #################
    public function multiDelete(Request $request)
    {
        $ids = explode(",", $request->ids);
        Product::whereIn('id', $ids)->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }
    ################ Delete user #################
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }
    /////////////////////////////////////////////////////////
    public function favourite_product(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        $text = $product->favourite == 1 ? "تم الحذف من المنتجات المفضلة بنجاح" : "تم الاضافة للمنتجات المفضلة بنجاح";
        $product->favourite = $product->favourite == 1 ? 0 : 1;
        $product->save();
        return response()->json(
            [
                'code' => 200,
                'message' => $text
            ]);
    }

}
