<?php

namespace App\Http\Controllers\WebView;

use App\Http\Controllers\Controller;
use App\Models\Setting;

class WebViewController extends Controller
{
    public function terms(){
        $setting = Setting::first();
        return view('WebView.terms', ['setting' => $setting]);
    }
    public function privacy(){
        $setting = Setting::first();
        return view('WebView.privacy', ['setting' => $setting]);
    }
    public function about(){
        $setting = Setting::first();
        return view('WebView.about', ['setting' => $setting]);
    }
}
