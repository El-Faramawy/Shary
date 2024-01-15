<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductComment;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()){
            $areas =ProductComment::where('product_id',$request->product_id)->latest()->get();
            return Datatables::of($areas)
                ->addColumn('action', function ($user) {
                    return '
                             <a class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $user->id . '" ><i class="fa fa-trash-o text-white"></i></a>
                       ';
                })
                ->addColumn('reply', function ($item) {
                    return '<a  class="btn btn-icon btn-bg-light btn-info btn-sm me-1 "
                            href="'.route("reply.index","comment_id=".$item->id).'" >
                            <span class="svg-icon svg-icon-3" style="font-size:12px">
                                <span class="svg-icon svg-icon-3">
                                    <i class="fa fa-comments "></i>
                                </span>
                            </span>
                            </button>';
                })
                ->addColumn('user', function ($item) {
                    return $item->user->name;
                })
                ->escapeColumns([])
                ->make(true);
        }
        return view('Admin.Comment.index');
    }

    ################ Delete user #################
    public function destroy($id)
    {
        ProductComment::where('id',$id)->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }

}
