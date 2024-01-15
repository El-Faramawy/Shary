<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdPackage;
use App\Models\Package;
use App\Models\UserAdPackage;
use App\Models\UserPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class AdPackageController extends Controller
{
    public function user_ad_packages(Request $request)
    {
        if ($request->ajax()){
            $data =UserAdPackage::where('user_id',$request->user_id)
                ->latest()->get();
            return Datatables::of($data)
                ->editColumn('package',function ($item){
                    return package_type($item->package_id) .'<br>'. $item->package->period . ' شهور ' ;
                })
                ->escapeColumns([])
                ->make(true);
        }
        return view('Admin.AdPackages.user_packages');
    }

    public function index(Request $request)
    {
        if ($request->ajax()){
            $data =AdPackage::whereIn('id',[1,4,7])->get();
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
                ->addColumn('type',function ($item){
                    return package_type($item->id) ;
                })
                ->escapeColumns([])
                ->make(true);
        }
        return view('Admin.AdPackages.index');
    }

    public function edit(AdPackage $adPackage){
        return view('Admin.AdPackages.parts.edit', compact('adPackage'));
    }

    public function update(Request $request, AdPackage $adPackage)
    {
        $valedator = Validator::make($request->all(), [
                'price'=>'required',
                'period'=>'required',
                'panner_ads'=>'required',
            ]
        );
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->all();
        $adPackage->update($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم التعديل بنجاح '
            ]);
    }

}
