<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserQuestions;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserQuestionsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = UserQuestions::where('user_id',$request->user_id)->latest()->get();
            return Datatables::of($data)
                ->escapeColumns([])
                ->make(true);
        }
        return view('Admin.UserQuestions.index');
    }

}
