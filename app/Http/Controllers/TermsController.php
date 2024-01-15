<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class TermsController extends Controller
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
