<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class AreaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()){
            $areas =Area::with('city')
                ->where('city_id',$request->city_id)->latest()->get();
            return Datatables::of($areas)
                ->addColumn('action', function ($item) {
                    return '
                        <button  id="editBtn" class="btn btn-default btn-primary btn-sm mb-2  mb-xl-0 "
                             data-id="' . $item->id . '" ><i class="fa fa-edit text-white"></i>
                        </button>
                        <a class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $item->id . '" ><i class="fa fa-trash-o text-white"></i></a>
                       ';
                })
                ->editColumn('city',function ($item){
                    return $item->city ? $item->city->name_ar : '';
                })
                ->addColumn('checkbox' , function ($item){
                    return '<input type="checkbox" class="sub_chk" data-id="'.$item->id.'">';
                })
                ->escapeColumns([])
                ->make(true);
        }
        return view('Admin.Area.index',['id'=>$request->city_id?:'']);
    }
    ################ Add Object #################
    public function create(Request $request)
    {
        $city_id = $request->id;
        $cities = City::all();
        return view('Admin.Area.parts.create',compact('cities','city_id'))->render();
    }

    public function store(Request $request)
    {
        $valedator = Validator::make($request->all(), [
                'city_id'=>'required',
                'name_ar'=>'required',
                'name_en'=>'required',
            ]
        );
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->all();
        Area::create($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم الاضافة بنجاح'
            ]);
    }
    ################ Edit Object #################
    public function edit(Area $area)
    {
        $cities = City::all();
        return view('Admin.Area.parts.edit', compact('cities','area'));
    }
    ###############################################
    ################ update offer #################
    public function update(Request $request, Area $area)
    {
        $valedator = Validator::make($request->all(), [
                'city_id'=>'required',
                'name_ar'=>'required',
                'name_en'=>'required',
            ]
        );
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->all();
        $area->update($data);

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
        Area::whereIn('id', $ids)->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }
    ################ Delete user #################
    public function destroy(Area $area)
    {
        $area->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }

}
