<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\PhotoTrait;
use App\Models\Category;
use App\Models\Market;
use App\Models\SubCategory;
use App\Models\VerifyAccountImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class VerifyController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()){
            $verifies =VerifyAccountImage::latest()->get();
            return Datatables::of($verifies)
                ->addColumn('action', function ($category) {
                    $action = '';
//                    if (in_array(61, admin()->user()->permission_ids)) {

//                    }
//                    if(in_array(62,admin()->user()->permission_ids)) {
                        $action .=  '
                             <a class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $category->id . '" ><i class="fa fa-trash-o text-white"></i></a>
                       ';
//                    }
                    return $action;
                })
                ->editColumn('image',function ($item){
                    return '<img alt="image" class="img list-thumbnail border-0" style="width:100px;border-radius:10px" onclick="window.open(this.src)" src="'.$item->image.'">';
                })
                ->editColumn('user',function ($item){
                    return $item->user ? $item->user->name : '';
                })
                ->addColumn('checkbox' , function ($item){
                    return '<input type="checkbox" class="sub_chk" data-id="'.$item->id.'">';
                })
                ->escapeColumns([])
                ->make(true);
        }
        return view('Admin.Verify.index',['id'=>$request->user_id?:'']);
    }
    ################ multiple Delete  #################
    public function multiDelete(Request $request)
    {
        $ids = explode(",", $request->ids);
        VerifyAccountImage::whereIn('id', $ids)->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }
    ################ Delete user #################
    public function destroy(VerifyAccountImage $verifyAccountImage)
    {
        $verifyAccountImage->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }

}
