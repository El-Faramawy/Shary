<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function (){
   return redirect('admin/login');
})->name('welcome');

// ****************** web view *****************************

Route::get('terms',function (){
    return view('WebView.terms', ['setting' => setting()]);
})->name('terms');

Route::get('about',function (){
    return view('WebView.about', ['setting' => setting()]);
})->name('about');

Route::get('privacy',function (){
    return view('WebView.privacy', ['setting' => setting()]);
})->name('privacy');


