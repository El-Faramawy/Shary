<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CarModelController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = CarModel::with('car_category')
                ->where('car_category_id', $request->car_category_id)->latest()->get();
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
                ->editColumn('car_category', function ($item) {
                    return $item->car_category->name_ar ?? '';
                })
                ->addColumn('car_colors', function ($item) {
                    return '<a  class="btn btn-icon btn-bg-light btn-info btn-sm me-1 "
                            href="' . route("car_colors.index", "car_model_id=" . $item->id) . '" >
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
        return view('Admin.CarModel.index',['id'=>$request->car_category_id?:'']);
    }

    public function create(Request $request)
    {
        $car_category_id = $request->id;
        return view('Admin.CarModel.parts.create',compact('car_category_id'))->render();
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
        CarModel::create($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم الاضافة بنجاح'
            ]);
    }

    public function edit(CarModel $carModel)
    {
        return view('Admin.CarModel.parts.edit', compact('carModel'));
    }

    public function update(Request $request, CarModel $carModel)
    {
        $valedator = Validator::make($request->all(), [
            'name_ar' => 'required',
            'name_en' => 'required',
        ]);
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->all();
        $carModel->update($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم التعديل بنجاح '
            ]);
    }


    public function multiDelete(Request $request)
    {
        $ids = explode(",", $request->ids);
        CarModel::whereIn('id', $ids)->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }


    public function destroy(CarModel $carModel)
    {
        $carModel->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }


}
