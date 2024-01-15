<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserRate;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserRateController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = UserRate::where('rated_user_id',$request->user_id)->latest()->get();
            return Datatables::of($data)
                ->editColumn('rate', function ($item) {
                    return ' <i class="py-2 fw-1 fa fa-star text-warning"></i> ' . $item->rate;
                })
                ->editColumn('user', function ($item) {
                    return $item->user ? $item->user->name : '';
                })
                ->escapeColumns([])
                ->make(true);
        }
        return view('Admin.UserRate.index');
    }

}
