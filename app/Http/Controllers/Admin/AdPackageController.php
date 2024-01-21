<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class AdPackageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = AdPackage::query();
            return Datatables::of($data)
                ->addColumn('action', function ($item) {
                    return '
                        <button  id="editBtn" class="btn btn-default btn-primary btn-sm mb-2  mb-xl-0 "
                             data-id="' . $item->id . '" ><i class="fa fa-edit text-white"></i>
                         </button>
                        <button class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $item->id . '" ><i class="fa fa-trash-o text-white"></i>
                        </button>';
                })
                ->addColumn('type', function ($item) {
                    return $item->type == 'ad' ? 'اعلان' : 'بانر';
                })->addColumn('checkbox', function ($item) {
                    return '<input type="checkbox" class="sub_chk" data-id="' . $item->id . '">';
                })
                ->escapeColumns([])
                ->make(true);
        }
        return view('Admin.AdPackages.index');
    }

    public function create()
    {
        return view('Admin.AdPackages.parts.create')->render();
    }

    public function store(Request $request)
    {
        $valedator = Validator::make($request->all(), [
            'price' => 'required',
            'period' => 'required',
            'type' => 'required',
        ]);
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->all();
        AdPackage::create($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم الاضافة بنجاح '
            ]);
    }

    public function edit(AdPackage $adPackage)
    {
        return view('Admin.AdPackages.parts.edit', compact('adPackage'));
    }

    public function update(Request $request, AdPackage $adPackage)
    {
        $valedator = Validator::make($request->all(), [
                'price' => 'required',
                'period' => 'required',
                'type' => 'required',
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

    public function destroy(AdPackage $adPackage)
    {
        $adPackage->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }

    public function multiDelete(Request $request)
    {
        $ids = explode(",", $request->ids);
        AdPackage::whereIn('id', $ids)->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }
}
