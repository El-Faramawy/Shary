<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'admin'], function () {
    Route::get('login','AuthController@index')->name('login');
    Route::post('post_login','AuthController@login')->name('post_login');


    //******* after login *******
    Route::group(['middleware' => 'admin'], function () {

        Route::get('logout','AuthController@logout')->name('logout');

        Route::get('/',function (){
            return redirect('admin/home');
        })->name('/');
        Route::get('home','HomeController@index')->name('home');

        ################################### Profile ##########################################
        Route::get('profile','AdminController@profile')->name('profile');
        Route::post('update-profile','AdminController@update_profile')->name('profile.update');

        ################################### Admins ##########################################
        Route::resource('admins','AdminController');
        Route::post('multi_delete_admins','AdminController@multiDelete')->name('admins.multiDelete');

        ################################### users ##########################################
        Route::resource('users','UserController');
        Route::get('verify_account','UserController@verify_account')->name('verify_account');
        Route::get('verify_images','UserController@verify_images')->name('verify_images');
        Route::post('multi_delete_users','UserController@multiDelete')->name('users.multiDelete');
        Route::post('change_points_number','UserController@change_points_number')->name('change_points_number');
        Route::get('block_user/{id}','UserController@block')->name('users.block');

        ################################### categories ##########################################
        Route::resource('categories','CategoryController');
        Route::post('multi_delete_categories','CategoryController@multiDelete')->name('categories.multiDelete');

        ################################### sub_categories ##########################################
        Route::resource('sub_categories','SubCategoryController');
        Route::post('multi_delete_sub_categories','SubCategoryController@multiDelete')->name('sub_categories.multiDelete');

        ################################### reports ##########################################
        Route::resource('reports','ReportController');
        Route::post('multi_delete_reports','ReportController@multiDelete')->name('reports.multiDelete');

        ################################### ad_packages ##########################################
        Route::get('user_ad_packages','AdPackageController@user_ad_packages')->name('user_ad_packages.index');
        Route::resource('ad_packages','AdPackageController');
        Route::post('multi_delete_ad_packages','AdPackageController@multiDelete')->name('ad_packages.multiDelete');
        Route::get('edit_ad_packages','AdPackageController@edit')->name('ad_packages.edit_ad_packages');

        ################################### packages ##########################################
        Route::get('user_packages','PackageController@user_packages')->name('user_packages.index');
        Route::resource('packages','PackageController');
        Route::post('multi_delete_packages','PackageController@multiDelete')->name('packages.multiDelete');
        Route::get('edit_packages','PackageController@edit')->name('packages.edit_packages');

        ################################### cities ##########################################
        Route::resource('cities','CityController');
        Route::post('multi_delete_cities','CityController@multiDelete')->name('cities.multiDelete');

        ################################### areas ##########################################
        Route::resource('areas','AreaController');
        Route::post('multi_delete_sub_areas','AreaController@multiDelete')->name('areas.multiDelete');

        ################################### sliders ##########################################
        Route::resource('sliders','SliderController');
        Route::post('multi_delete_sliders','SliderController@multiDelete')->name('sliders.multiDelete');

        ################################### contacts ##########################################
        Route::resource('contacts','ContactController');
        Route::get('replay_contact/{id}','ContactController@replay')->name('replay_contact');
        Route::post('post_replay_contact','ContactController@post_replay')->name('post_replay_contact');
        Route::post('multi_delete_contacts','ContactController@multiDelete')->name('contacts.multiDelete');

        ################################### settings ##########################################
        Route::resource('settings','SettingController');

        ################################### products ##########################################
        Route::resource('products','ProductController');
        Route::get('get_market_categories','ProductController@get_market_categories')->name('get_market_categories');
        Route::get('get_market_sub_categories','ProductController@get_market_sub_categories')->name('get_market_sub_categories');
        Route::post('multi_delete_products','ProductController@multiDelete')->name('products.multiDelete');
        Route::get('favourite_product','ProductController@favourite_product')->name('favourite_product');

        ################################### comment ##########################################
        Route::resource('comment','CommentController');
        Route::post('multi_delete_comment','CommentController@multiDelete')->name('comment.multiDelete');

        ################################### reply ##########################################
        Route::resource('reply','ReplyController');
        Route::post('multi_delete_reply','ReplyController@multiDelete')->name('reply.multiDelete');

        ################################### product_rate ##########################################
        Route::resource('product_rate','ProductRateController');
        Route::post('multi_delete_product_rate','ProductRateController@multiDelete')->name('product_rate.multiDelete');

        ################################### user_rate ##########################################
        Route::resource('user_rate','UserRateController');
        Route::post('multi_delete_user_rate','UserRateController@multiDelete')->name('user_rate.multiDelete');

        ################################### notifications ##########################################
        Route::resource('notifications','NotificationController');

    });//end Middleware Admin


    Route::fallback(function () {
        return redirect('admin/home');
    });
    Route::get('/clear-cache', function() {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('optimize:clear');
        return '<h1> cache cleared</h1>';
    });
});//end Prefix
