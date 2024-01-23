<?php

namespace App\Http\Controllers\Admin;

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
                $data =Product::with('user')->where('user_id',$request->user_id)->latest()->get();
            }else{
                $data =Product::with('user')->latest()->get();
            }
            return Datatables::of($data)
                ->addColumn('action', function ($product) {
                    return  '
                             <a class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $product->id . '" ><i class="fa fa-trash-o text-white"></i></a>
                       ';
                })
                ->addColumn('checkbox' , function ($product){
                    return '<input type="checkbox" class="sub_chk" data-id="'.$product->id.'">';
                })
                ->addColumn('category' , function ($product){
                    return $product->category?$product->category->name_ar:'';
                })
                ->addColumn('user' , function ($product){
                    return $product->user->name ?? '';
                })
                ->addColumn('country' , function ($product){
                    return $product->country?$product->country->name_ar:'';
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
                ->addColumn('details', function ($item) {
                    return '<div class="card-options pr-2">
                                    <a class="btn btn-sm btn-primary text-white detailsBtn"  href="' . route("product_details", $item->id) . '"><i class="fa fa-book mb-0"></i></a>
                           </div>';
                })
//                ->addColumn('product_rate', function ($item) {
//                    return '<a  class="btn btn-icon btn-bg-warning btn-light btn-sm me-1 "
//                            href="'.route("product_rate.index","product_id=".$item->id).'" >
//                            <span class="svg-icon svg-icon-3" style="font-size:12px">
//                                <span class="svg-icon svg-icon-3">
//                                    <i class="fa fa-star text-warning "></i>
//                                </span>
//                            </span>
//                            </button>';
//                })
                ->editColumn('status',function ($user){
//                    $block =in_array(10,admin()->user()->permission_ids)? "block" : " ";
                    $color ="danger";
                    $color2 ="success";
                    $text = "حظر";
                    $text2 = "تفعيل";
                    if ($user->status == "pending"){
                        return '
                        <span class="badge badge-warning badge-sm d-block"> معلق </span>
                        <a style="font-size: xx-large; display: inline-block!important;cursor: pointer " class="block text-center fw-3 pl-1 text-' . $color2 . '" data-value="active" data-id="' . $user->id . '" data-text="' . $text2 . '" ><i class="py-2 fw-3  fa fa-thumbs-up text-' . $color2 . '" ></i></a>
                        <a style="font-size: xx-large; display: inline-block!important;cursor: pointer" class="block text-center fw-3 pr-1 text-' . $color . '" data-value="inactive" data-id="' . $user->id . '" data-text="' . $text . '" ><i class="py-2 fw-3  fa fa-thumbs-down text-' . $color . '" ></i></a>
                                ';
                    }elseif ($user->status == "active"){
                        return '<span class="badge badge-success badge-sm d-block"> مفعل </span>
                        <a style="font-size: xx-large; display: inline-block!important;cursor: pointer" class="block text-center fw-3 pr-1 text-' . $color . '" data-value="inactive" data-id="' . $user->id . '" data-text="' . $text . '" ><i class="py-2 fw-3  fa fa-thumbs-down text-' . $color . '" ></i></a>';
                    }else{
                        return '<span class="badge badge-danger badge-sm d-block"> غير مفعل </span>
                        <a style="font-size: xx-large; display: inline-block!important;cursor: pointer " class="block text-center fw-3 pl-1 text-' . $color2 . '" data-value="active" data-id="' . $user->id . '" data-text="' . $text2 . '" ><i class="py-2 fw-3  fa fa-thumbs-up text-' . $color2 . '" ></i></a>';
                    }
                })
                ->editColumn('type',function ($user){
                    $color = $user->type == 'car' ? "warning" :"info";
                    $text = $user->type == 'car' ? "سيارات" :"عقارات";
                    return '<span class=" badge badge-sm badge-' . $color . '" >'.$text.'</span>';
                })
                ->addColumn('address', function ($item) {
                    $text = "الذهاب للعنوان";
                    return '<a href= "https://maps.google.com/?q='.$item->latitude.','.$item->longitude.'" target="_blank">'.$text.'</a>' ;
                })
                ->editColumn('image',function ($product){
                    return '<img alt="image" class="img list-thumbnail border-0" style="width:100px;border-radius:10px" onclick="window.open(this.src)" src="'.$product->image.'">';
                })
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

    public function product_details($id)
    {
        $product = Product::where('id', $id)->first();
        return view('Admin.Product.parts.details', compact('product'))->render();
    }

    public function block_product(Request $request , $id)
    {
        $product = Product::where('id',$id)->first();
        $product->status = $request->value;
        $product->save();
        $text = $product->status == "active" ? "تم التفعيل بنجاح" :"تم الحظر بنجاح";
        return response()->json(
            [
                'code' => 200,
                'message' => $text
            ]);
    }

}
