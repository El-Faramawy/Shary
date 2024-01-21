<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\City;
use App\Models\Contact;
use App\Models\Package;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request){

//        $created_from = $request->created_from ? date('Y-m-d',strtotime($request->created_from)):date('2023-1-1');
//        $created_to = $request->created_to ?date('Y-m-d' ,strtotime($request->created_to)):date('Y-m-d' );
//
//        $user_count = User::whereBetween('created_at',[$created_from,$created_to])->count();
//        $admin_count = Admin::whereBetween('created_at',[$created_from,$created_to])->count();
//        $contact_count = Contact::whereBetween('created_at',[$created_from,$created_to])->count();
//        $category_count = Category::whereBetween('created_at',[$created_from,$created_to])->count();
//        $package_count = Package::query()->count();
//        $product_count = Product::whereBetween('created_at',[$created_from,$created_to])->count();
//
//        $cities = City::whereHas('products')->withCount('products')->get();
//        $categories = Category::whereHas('products')->withCount('products')->get();
//
//        return view('Admin.index',['created_from'=>$created_from,'created_to'=>$created_to],
//            compact( 'package_count','user_count','admin_count','contact_count',
//            'product_count','cities','category_count','categories'
//            ));
        return view('Admin.index');
    }

    //###################################################


}
