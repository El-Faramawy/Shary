<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Authentication\ConfirmRegisterCodeRequest;
use App\Http\Requests\Api\Authentication\GetRegisterCodeRequest;
use App\Http\Requests\Api\Authentication\LoginRequest;
use App\Http\Requests\Api\Authentication\LogoutRequest;
use App\Http\Requests\Api\Authentication\RegisterRequest;
use App\Http\Requests\Api\Authentication\UpdateProfileRequest;
use App\Http\Requests\Api\Product\UserProductsRequest;
use App\Http\Traits\DeleteTokenTrait;
use App\Http\Traits\PaginateTrait;
use App\Models\Favourate;
use App\Models\Following;
use App\Models\PhoneToken;
use App\Models\Product;
use App\Models\Rate;
use App\Models\VerifyAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Traits\PhotoTrait;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    use PhotoTrait;
    use PaginateTrait;
    use DeleteTokenTrait;

    public function login(LoginRequest $request)
    {
        try {
            $data = $request->only('phone', 'password', 'fcm_token');
            $credentials = ['phone' => $data['phone'], 'password' => $data['password']];
            $token = user_api()->attempt($credentials);
            if ($token) {
                $user = User::where('id', user_api()->user()->id)->first();
                $user->token = $token;
                $this->delete($data['fcm_token']);
                PhoneToken::updateOrCreate([
                    'user_id' => $user->id,
                    'phone_token' => $data['fcm_token'],
                    'type' => 'android',
                ]);
                return $this->apiResponse($user, '', 'simple');
            } else {
                return $this->apiResponse(null, 'خطا فى البيانات  ', 'simple', '409');
            }

        } catch (\Exception $ex) {
            return $this->apiResponse($ex->getCode(), $ex->getMessage(), 'simple', '422');
        }

    }

    public function register(RegisterRequest $request)
    {
        try {
            $data = $request->except('fcm_token', 'password');
            $data['password'] = Hash::make($request->password);
            if (isset($request->image))
                $data['image'] = $this->saveImage($request->image, 'uploads/user');
            $user = User::create($data);

            $token = user_api()->login($user);
            $user = User::where('id', $user->id)->first();
            $user->token = $token;

            PhoneToken::updateOrCreate([
                'user_id' => $user->id,
                'phone_token' => $request->fcm_token,
                'type' => 'android',
            ]);

            return $this->apiResponse($user, '', 'simple');

        } catch (\Exception $ex) {
            return $this->apiResponse($ex->getCode(), $ex->getMessage(), 'simple', '422');
        }

    }

    public function get_register_code(GetRegisterCodeRequest $request)
    {
//        if (strlen($request->phone) == 11){
        return $this->apiResponse(Hash::make('111111'), 'code sent successfully', 'simple');
//        }
//        else{
//            $code = rand('100000', '999999');
//            $this->sendOtp(strval($request->phone),' رمز تاكيد الهاتف لتطبيق Geetcom هو '.$code);
//            return $this->apiResponse(Hash::make($code),'code sent successfully','simple');
//        }
    }

    public function ConfirmRegisterCode(ConfirmRegisterCodeRequest $request)
    {
        if (Hash::check($request->code, $request->hashed_code)) {
            return $this->apiResponse(null, 'correct', 'simple');
        } else {
            return $this->apiResponse(null, ' الكود خطا', 'simple', 409);
        }
    }

    public function profile(Request $request)
    {
        $user = User::where('id', user_api()->user()->id)->first();
        $user->token = getToken();
        return $this->apiResponse($user, '', 'simple');
    }

    public function completed_profile(UserProductsRequest $request)
    {
        $user = User::where('id', $request->user_id)->first();
        $user->token = getToken();
        $user->followers_count = Following::where([['following_user_id', $request->user_id], ['follower_user_id', '!=', null]])->count();
        $user->users_i_follow_count = Following::where([['follower_user_id', $request->user_id], ['following_user_id', '!=', null]])->count();
        $user->favourite_count = Product::where('user_id', $request->user_id)->withCount('favourites')
            ->whereHas('favourites')->pluck('favourites_count')->sum();
        $user->rate_count = Rate::where('rated_user_id', $request->user_id)->count();
        $products_with_video = Product::where('user_id', $request->user_id)
            ->where('video', '!=', null)->select('id', 'image');
        $user->products_with_video = $this->apiResponse($products_with_video);
        $products_with_image = Product::where('user_id', $request->user_id)
            ->where('video', null)->select('id', 'image');
        $user->products_with_image = $this->apiResponse($products_with_image);
        return $this->apiResponse($user, '', 'simple');
    }

    public function update_profile(UpdateProfileRequest $request)
    {
        $data = $request->except('password', 'image', 'fcm_token');
        if ($request->password && $request->password != null) {
            $data['password'] = Hash::make($request->password);
        }
        $user = User::where('id', user_api()->user()->id)->first();
        if (isset($request->image))
            $data['image'] = $this->saveImage($request->image, 'uploads/user', $user->getAttributes()['image']);

        $user->update($data);
        $user->token = getToken();

        return $this->apiResponse($user, '', 'simple');

    }

    public function logout(LogoutRequest $request)
    {

        if (!\auth()->check()) {
            return $this->apiResponse(null, 'logout once or token is not valid', 'simple');
        }

        PhoneToken::where(['user_id' => user_api()->user()->id, 'phone_token' => $request->token])->delete();

        $token = getToken();
        if ($token != null) {
            try {
                JWTAuth::setToken($token)->invalidate();
                return $this->apiResponse(null, 'logout done', 'simple');
            } catch (TokenInvalidException $e) {
                return $this->apiResponse(null, $e->getMessage(), 'simple');
            }
        } else {
            return $this->apiResponse(null, 'done', 'simple');
        }
    }

    public function deleteAccount(Request $request)
    {
        PhoneToken::where('user_id', user_api()->user()->id)->delete();
        user_api()->user()->delete();
        return $this->apiResponse(null, 'done', 'simple');
    }

    public function verify_account(Request $request)
    {
        if (isset($request->images)) {
            foreach ($request->images as $image) {
                VerifyAccount::create([
                    'user_id' => user_api()->id(),
                    'image' => $this->saveImage($image, 'uploads/VerifyAccountImage')
                ]);
            }
        }
        if ($request->from_sa){
            $user = user_api()->user();
//            if ($request->from_sa == 'yes'){
//                $user->verified = 1;
//            }
            $user->from_sa = $request->from_sa;
            $user->save();
        }
        return $this->apiResponse(null, 'done', 'simple');

    }

    public function search_for_user(Request $request)
    {
        $data = User::query();
        if ($request->name) {
            $data->where('name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->phone) {
            $data->where('phone', 'LIKE', '%' . $request->phone . '%');
        }
        return $this->apiResponse($data);
    }


}
