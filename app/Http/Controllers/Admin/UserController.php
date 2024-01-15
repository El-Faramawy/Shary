<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Traits\NotificationTrait;
use App\Models\VerifyAccount;
use App\Models\VerifyAccountImage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    use NotificationTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            if (isset($request->user_id)){
                $users = User::where('id',$request->user_id)->get();
            }else{
                $users = User::latest()->get();
            }
            return Datatables::of($users)
                ->addColumn('action', function ($user) {
//                    if(in_array(7,admin()->user()->permission_ids)) {
                    return '
                             <a class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $user->id . '" ><i class="fa fa-trash-o text-white"></i></a>
                       ';
//                    }
                })
                ->addColumn('packages', function ($user) {
                    return '<a  class="btn btn-icon btn-bg-light btn-info btn-sm me-1 "
                            href="'.route("user_packages.index","user_id=".$user->id).'" >
                            <span class="svg-icon svg-icon-3" style="font-size:12px">
                                <span class="svg-icon svg-icon-3">
                                    <i class="fa fa-bars "></i>
                                </span>
                            </span>
                            </button>';
                })
                ->addColumn('ad_packages', function ($user) {
                    return '<a  class="btn btn-icon btn-bg-light btn-info btn-sm me-1 "
                            href="'.route("user_ad_packages.index","user_id=".$user->id).'" >
                            <span class="svg-icon svg-icon-3" style="font-size:12px">
                                <span class="svg-icon svg-icon-3">
                                    <i class="fa fa-bars "></i>
                                </span>
                            </span>
                            </button>';
                })
                ->addColumn('products', function ($user) {
                    return '<a  class="btn btn-icon btn-bg-light btn-success btn-sm me-1 "
                            href="'.route("products.index","user_id=".$user->id).'" >
                            <span class="svg-icon svg-icon-3" style="font-size:12px">
                                <span class="svg-icon svg-icon-3">
                                    <i class="fa fa-bars "></i>
                                </span>
                            </span>
                            </button>';
                })
                ->editColumn('block',function ($user){
                    $color = $user->block == "yes" ? "danger" :"dark";
                    $text = $user->block == "yes" ? "الغاء حظر" :"حظر";
                    $block =in_array(10,admin()->user()->permission_ids)? "block" : " ";
                    return '<a class="'. $block .' text-center fw-3  text-' . $color . '" data-id="' . $user->id . '" data-text="' . $text . '" style="cursor: pointer"><i class="py-2 fw-3  fa fa-ban text-' . $color . '" ></i></a>';
                })
                ->editColumn('image', function ($user) {
                    return '<img alt="image" class="img list-thumbnail border-0" style="width:100px;border-radius:10px" onclick="window.open(this.src)" src="' . $user->image . '">';
                })
                ->editColumn('company_image', function ($user) {
                    return '<img alt="image" class="img list-thumbnail border-0" style="width:100px;border-radius:10px" onclick="window.open(this.src)" src="' . $user->company_image . '">';
                })
                ->editColumn('company_panner', function ($user) {
                    return '<img alt="image" class="img list-thumbnail border-0" style="width:100px;border-radius:10px" onclick="window.open(this.src)" src="' . $user->company_panner . '">';
                })
                ->addColumn('address', function ($item) {
                    $text = "الذهاب للعنوان";
                    return '<a href= "https://maps.google.com/?q=' . $item->latitude . ',' . $item->longitude . '" target="_blank">' . $text . '</a>';
                })
                ->editColumn('type', function ($user) {
                    $color = $user->type == UserTypeEnum::USER ? "light" : "primary";
                    $text = $user->type == UserTypeEnum::USER ? "فرد" : "شركة";
                    return '<span class=" badge badge-sm badge-' . $color . '" >' . $text . '</span>';
                })
                ->editColumn('rate', function ($user) {
                    return ' <i class="py-2 fw-1 fa fa-star text-warning"></i> ' .$user->rate ;
                })
                ->addColumn('user_rate', function ($item) {
                    return '<a  class="btn btn-icon btn-bg-warning btn-light btn-sm me-1 "
                            href="'.route("user_rate.index","user_id=".$item->id).'" >
                            <span class="svg-icon svg-icon-3" style="font-size:12px">
                                <span class="svg-icon svg-icon-3">
                                    <i class="fa fa-star text-warning "></i>
                                </span>
                            </span>
                            </button>';
                })
                ->editColumn('verified', function ($user) {
                    $color = $user->verified == 0 ? "dark" : "primary";
                    $text = $user->verified == 0 ? "لا" : "نعم";
                    $icon = $user->verified == 0 ? "thumbs-down" : "thumbs-up";
                    $button = '';
                    if ($user['verify_images'] != null){
                        $button = '<br><span data-id="' . $user->id . '" style="cursor: pointer" class="verify_images badge badge-sm badge-warning" >صور التوثيق</span>';
                    }
                    return '<a style="font-size: xx-large;" class="verify_account fw-1  text-' . $color . '"
                    data-id="' . $user->id . '" data-text="' . $text . '" style="cursor: pointer;">
                    <i class="py-2 fw-1  fa fa-' . $icon . ' text-' . $color . '" ></i></a>
                    ' . $button;
                })
                ->addColumn('checkbox', function ($user) {
                    return '<input type="checkbox" class="sub_chk" data-id="' . $user->id . '">';
                })
                ->escapeColumns([])
                ->make(true);
        }
        return view('Admin.User.index');
    }

    ################ multiple Delete  #################
    public function multiDelete(Request $request)
    {
        $ids = explode(",", $request->ids);
        User::whereIn('id', $ids)->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }

    ################ Delete user #################
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }
    ################ block user #################
    public function block($id)
    {
        $user = User::where('id',$id)->first();
        $text = $user->block == "yes" ? "تم الغاء الحظر بنجاح" :"تم الحظر بنجاح";
        $user->block = $user->block =='yes'?'no':'yes';
        $user->save();
        return response()->json(
            [
                'code' => 200,
                'message' => $text
            ]);
    }

    public function verify_account(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $text = $user->verified == 1 ? "تم الغاء التوثيق بنجاح" : "تم التوثيق بنجاح";
        $user->verified = $user->verified == 1 ? 0 : 1;
        $user->save();
        return response()->json(
            [
                'code' => 200,
                'message' => $text
            ]);
    }

    public function verify_images(Request $request)
    {
        $verify_account = VerifyAccount::where('user_id', $request->id)->latest()->first();
        $verify_account_images = VerifyAccountImage::where('user_id', $request->id)->get();
        return view('Admin.User.parts.verify_account', compact('verify_account', 'verify_account_images'))->render();
    }
}
