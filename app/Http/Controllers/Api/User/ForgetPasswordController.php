<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Traits\PaginateTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Traits\SmsTrait;

class ForgetPasswordController extends Controller
{
    use PaginateTrait,SmsTrait;

    //===========================================
    public function update_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|exists:users,phone',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 'simple', '422');
        }

        $user = User::where('phone', $request->phone)->first();
        if ($request->password && $request->password != null) {
            $user->update(['password'=>Hash::make($request->password)]);
        }

        return $this->apiResponse($user, '', 'simple');

    }
    //===========================================
    public function checkPhone(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|exists:users,phone',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 'simple', '422');
        }
        $user = User::where('phone', $request->phone)->first();
        if($user){
         $code = rand('100000', '999999');
            $this->sendOtp(strval($user->phone_code.$request->phone),' رمز تاكيد الهاتف لتطبيق Haraj Stations هو '.$code);
        return $this->apiResponse(["code2"=>$code,"user"=>$user,"code"=>Hash::make($code)], '', 'simple');   
        }
        return $this->apiResponse('', 'هذا الرقم غير موجود', 'simple',401);   
        
    }


}
