<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\UserPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class PackageController extends Controller
{
    public function user_packages(Request $request)
    {
        if ($request->ajax()){
            $data =UserPackage::where('user_id',$request->user_id)->latest()->get();
            return Datatables::of($data)
                ->editColumn('package',function ($item){
                    return package_type($item->package_id) .'<br>'. $item->package->period . ' شهور ' ;
                })
                ->escapeColumns([])
                ->make(true);
        }
        return view('Admin.Packages.user_packages');
    }

    public function index(Request $request)
    {
        if ($request->ajax()){
            $data =Package::whereIn('id',[1,4,7])->get();
            return Datatables::of($data)
                ->addColumn('action', function ($item) {
                    $action = '';
//                    if (in_array(61, admin()->user()->permission_ids)) {
                    $action .= '
                        <button  id="editBtn" class="btn btn-default btn-primary btn-sm mb-2  mb-xl-0 "
                             data-id="' . $item->id . '" ><i class="fa fa-edit text-white"></i>
                        </button>';
//                    }
                    return $action;
                })
                ->editColumn('close_chat',function ($item){
                    return $item->close_chat ? 'نعم' : 'لا';
                })
                ->editColumn('show_vip',function ($item){
                    return $item->show_vip ? 'نعم' : 'لا';
                })
                ->addColumn('type',function ($item){
                    return package_type($item->id) ;
                })
                ->escapeColumns([])
                ->make(true);
        }
        return view('Admin.Packages.index');
    }

    public function edit(Package $package){
        return view('Admin.Packages.parts.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $valedator = Validator::make($request->all(), [
                'price'=>'required',
                'period'=>'required',
                'daily_ads'=>'required',
//                'panner_ads'=>'required',
                'close_chat'=>'required',
                'free_months_number'=>'required',
                'free_ads_number'=>'required',
                'show_vip'=>'required',
            ]
        );
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->all();
        $package->update($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم التعديل بنجاح '
            ]);
    }

}
