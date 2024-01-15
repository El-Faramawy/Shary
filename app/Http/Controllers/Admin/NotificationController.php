<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\NotificationTrait;
use App\Models\Delivery;
use App\Models\Market;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Models\Notification;
use App\Models\User;

class NotificationController extends Controller
{
    use NotificationTrait;
    public function index(Request $request)
    {
        $users = User::all();
        return view('Admin.Notification.index',compact('users'));
    }

    public function store(Request $request)
    {
        $valedator = Validator::make($request->all(), [
            'message' => 'required ',
            'title' => 'required',
        ],
            [
                'title.required' => 'عنوان الرسالة مطلوب',
                'message.required' => ' الرسالة مطلوبة',
            ]
        );
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        if ($request->users){
            $this->sendAllNotifications($request->users, $request->title,$request->message);
        }

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم الارسال بنجاح'
            ]);
    }
    ###############################################


}
