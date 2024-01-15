<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductRateController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Rate::where('product_id',$request->product_id)->latest()->get();
            return Datatables::of($data)
                ->editColumn('rate1', function ($item) {
                    return ' <i class="py-2 fw-1 fa fa-star text-warning"></i> ' . $item->rate1;
                })
                ->editColumn('rate2', function ($item) {
                    return ' <i class="py-2 fw-1 fa fa-star text-warning"></i> ' . $item->rate2;
                })
                ->editColumn('user', function ($item) {
                    return $item->user ? $item->user->name : '';
                })
                ->escapeColumns([])
                ->make(true);
        }
        return view('Admin.ProductRate.index');
    }

}
