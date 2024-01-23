<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reword;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RewordController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Reword::latest()->get();
            return Datatables::of($data)
                ->addColumn('action', function ($item) {
                    return '
                    <button class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                         data-id="' . $item->id . '" ><i class="fa fa-trash-o text-white"></i>
                    </button>
                   ';
                })->editColumn('user', function ($item) {
                    return $item->user ? '<a href="' . url("admin/users?user_id=" . $item->user->id) . '" >' . $item->user->name . '</a>' : '';
                })->addColumn('checkbox', function ($item) {
                    return '<input type="checkbox" class="sub_chk" data-id="' . $item->id . '">';
                })
                ->escapeColumns([])
                ->make(true);
        }

        return view('Admin.Reword.index');
    }

    public function multiDelete(Request $request)
    {
        $ids = explode(",", $request->ids);
        Reword::whereIn('id', $ids)->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }

    public function destroy(Reword $reword)
    {
        $reword->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }

}
