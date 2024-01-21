<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\NotificationTrait;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Traits\PhotoTrait;


class SettingController extends Controller
{
    use PhotoTrait,NotificationTrait;

    public function index(){
        $setting = Setting::first();
        return view('Admin.Setting.index',compact('setting'));
    }
    public function update(Request $request , Setting $setting){
//        return $request->all();
        $data = $request->all();
        if ( $request->logo && $request->logo != null ){
            $data['logo']    = $this->saveImage($request->logo,'uploads/setting',$setting->logo);
        }

        if ( $request->fav_icon && $request->fav_icon != null ){
            $data['fav_icon']    = $this->saveImage($request->fav_icon,'uploads/setting',$setting->fav_icon);
        }

        if ( $request->car_image && $request->car_image != null ){
            $data['car_image']    = $this->saveImage($request->car_image,'uploads/setting',$setting->car_image);
        }

        if ( $request->building_image && $request->building_image != null ){
            $data['building_image']    = $this->saveImage($request->building_image,'uploads/setting',$setting->building_image);
        }

        if ( $request->what_verification && $request->what_verification != null ){
            $data['what_verification']    = $this->saveImage($request->what_verification,'uploads/setting',$setting->what_verification);
        }

        if ( $request->how_verification && $request->how_verification != null ){
            $data['how_verification']    = $this->saveImage($request->how_verification,'uploads/setting',$setting->how_verification);
        }

        if ( $request->deleted_action && $request->deleted_action != null ){
            $data['deleted_action']    = $this->saveImage($request->deleted_action,'uploads/setting',$setting->deleted_action);
        }

        if ( $request->no_commission && $request->no_commission != null ){
            $data['no_commission']    = $this->saveImage($request->no_commission,'uploads/setting',$setting->no_commission);
        }

        if ( $request->break_low && $request->break_low != null ){
            $data['break_low']    = $this->saveImage($request->break_low,'uploads/setting',$setting->break_low);
        }

        if ( $request->verification_important && $request->verification_important != null ){
            $data['verification_important']    = $this->saveImage($request->verification_important,'uploads/setting',$setting->verification_important);
        }

        $setting->update($data);
        return response()->json(['messages' => ['تم التعديل بنجاح'], 'success' => 'true']);
    }
}
