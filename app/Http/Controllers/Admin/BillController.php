<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\NotificationTrait;
use App\Models\Bill;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BillController extends Controller
{
    use NotificationTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Bill::latest()->get();
            return Datatables::of($data)
                ->addColumn('action', function ($item) {
                    return '
                    <button class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                         data-id="' . $item->id . '" ><i class="fa fa-trash-o text-white"></i>
                    </button>
                   ';
                })->editColumn('type', function ($user) {
                    $color = $user->type == 'package' ? "danger" : "success";
                    $text = $user->type == 'package' ? "باقة" : "عدد اعلانات";
                    return '<span class=" badge badge-sm badge-' . $color . '" >' . $text . '</span>';
                })->editColumn('status', function ($user) {
                    $color = $user->status == 'no' ? "danger" : "success";
                    $text = $user->status == 'no' ? "لا" : "نعم";
                    return '<span class=" badge badge-sm badge-' . $color . '" >' . $text . '</span>';
                })->editColumn('user', function ($item) {
                    return $item->user?->name;
                })->editColumn('created_at', function ($item) {
                    return date('Y-m-d',strtotime($item->created_at));
                })->addColumn('checkbox', function ($item) {
                    return '<input type="checkbox" class="sub_chk" data-id="' . $item->id . '">';
                })
                ->escapeColumns([])
                ->make(true);
        }

        return view('Admin.Bill.index');
    }

    public function multiDelete(Request $request)
    {
        $ids = explode(",", $request->ids);
        Bill::whereIn('id', $ids)->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }

    public function destroy(Bill $bill)
    {
        $bill->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }

}
