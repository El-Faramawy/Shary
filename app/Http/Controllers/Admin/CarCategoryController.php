<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CarCategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = CarCategory::with('car_type')
                ->where('car_type_id', $request->car_type_id)->latest()->get();
            return Datatables::of($data)
                ->addColumn('action', function ($item) {
                    return '
                        <button  id="editBtn" class="btn btn-default btn-primary btn-sm mb-2  mb-xl-0 "
                             data-id="' . $item->id . '" ><i class="fa fa-edit text-white"></i>
                        </button>
                             <a class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $item->id . '" ><i class="fa fa-trash-o text-white"></i></a>
                       ';
                })
                ->editColumn('car_type', function ($item) {
                    return $item->car_type->name_ar ?? '';
                })
                ->addColumn('car_models', function ($item) {
                    return '<a  class="btn btn-icon btn-bg-light btn-info btn-sm me-1 "
                            href="' . route("car_models.index", "car_category_id=" . $item->id) . '" >
                            <span class="svg-icon svg-icon-3" style="font-size:12px">
                                <span class="svg-icon svg-icon-3">
                                    <i class="fa fa-bars "></i>
                                </span>
                            </span>
                            </button>';
                })
                ->addColumn('checkbox', function ($item) {
                    return '<input type="checkbox" class="sub_chk" data-id="' . $item->id . '">';
                })
                ->escapeColumns([])
                ->make(true);
        }
        return view('Admin.CarCategory.index',['id'=>$request->car_type_id?:'']);
    }

    public function create(Request $request)
    {
        $car_type_id = $request->id;
        return view('Admin.CarCategory.parts.create',compact('car_type_id'))->render();
    }

    public function store(Request $request)
    {
        $valedator = Validator::make($request->all(), [
            'name_ar' => 'required',
            'name_en' => 'required',
        ]);
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->all();
        CarCategory::create($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم الاضافة بنجاح'
            ]);
    }

    public function edit(CarCategory $carCategory)
    {
        return view('Admin.CarCategory.parts.edit', compact('carCategory'));
    }

    public function update(Request $request, CarCategory $carCategory)
    {
        $valedator = Validator::make($request->all(), [
            'name_ar' => 'required',
            'name_en' => 'required',
        ]);
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->all();
        $carCategory->update($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم التعديل بنجاح '
            ]);
    }


    public function multiDelete(Request $request)
    {
        $ids = explode(",", $request->ids);
        CarCategory::whereIn('id', $ids)->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }


    public function destroy(CarCategory $carCategory)
    {
        $carCategory->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }


}
