<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReply;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ReplyController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()){
            $areas =ProductReply::where('comment_id',$request->comment_id)->latest()->get();
            return Datatables::of($areas)
                ->addColumn('action', function ($user) {
                    return '
                             <a class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $user->id . '" ><i class="fa fa-trash-o text-white"></i></a>
                       ';
                })
                ->addColumn('user', function ($item) {
                    return $item->user->name ?? '';
                })
                ->escapeColumns([])
                ->make(true);
        }
        return view('Admin.Reply.index');
    }

    ################ Delete Reply #################
    public function destroy($id)
    {
        ProductReply::where('id',$id)->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }

}
