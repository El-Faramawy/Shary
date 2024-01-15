<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CityController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()){
            $cities =City::latest()->get();
            return Datatables::of($cities)
                ->addColumn('action', function ($item) {
                    $action = '';
//                    if (in_array(61, admin()->user()->permission_ids)) {
                        $action .= '
                        <button  id="editBtn" class="btn btn-default btn-primary btn-sm mb-2  mb-xl-0 "
                             data-id="' . $item->id . '" ><i class="fa fa-edit text-white"></i>
                        </button>';
//                    }
//                    if(in_array(62,admin()->user()->permission_ids)) {
                        $action .=  '
                             <a class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $item->id . '" ><i class="fa fa-trash-o text-white"></i></a>
                       ';
//                    }
                    return $action;
                })
                ->addColumn('areas', function ($item) {
                    return '<a  class="btn btn-icon btn-bg-light btn-info btn-sm me-1 "
                            href="'.route("areas.index","city_id=".$item->id).'" >
                            <span class="svg-icon svg-icon-3" style="font-size:12px">
                                <span class="svg-icon svg-icon-3">
                                    <i class="fa fa-bars "></i>
                                </span>
                            </span>
                            </button>';
                })
                ->addColumn('checkbox' , function ($item){
                    return '<input type="checkbox" class="sub_chk" data-id="'.$item->id.'">';
                })
                ->escapeColumns([])
                ->make(true);
        }
        return view('Admin.City.index');
    }
    ################ Add Object #################
    public function create()
    {
        return view('Admin.City.parts.create')->render();
    }

    public function store(Request $request)
    {
        $valedator = Validator::make($request->all(), [
            'name_ar'=>'required',
            'name_en'=>'required',
        ]
//            ,
//            [
//                'name_ar.required' => 'الاسم بالعربية مطلوب',
//                'name_en.required' => 'الاسم بالانجليزية مطلوب',
//            ]
        );
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->all();
        City::create($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم الاضافة بنجاح'
            ]);
    }
    ################ Edit offer #################
    public function edit(City $city)
    {
        return view('Admin.City.parts.edit', compact('city'));
    }
    ###############################################
    ################ update offer #################
    public function update(Request $request, City $city)
    {
        $valedator = Validator::make($request->all(), [
            'name_ar'=>'required',
            'name_en'=>'required',
        ]
//            ,
//            [
//                'name_ar.required' => 'الاسم بالعربية مطلوب',
//                'name_en.required' => 'الاسم بالانجليزية مطلوب',
//            ]
        );
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->all();
        $city->update($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم التعديل بنجاح '
            ]);
    }
    ################ multiple Delete  #################
    public function multiDelete(Request $request)
    {
        $ids = explode(",", $request->ids);
        City::whereIn('id', $ids)->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }
    ################ Delete user #################
    public function destroy(City $city)
    {
        $city->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }


}
