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
        Route::resource('ad_packages','AdPackageController');
        Route::post('multi_delete_ad_packages','AdPackageController@multiDelete')->name('ad_packages.multiDelete');

        ################################### packages ##########################################
        Route::resource('packages','PackageController');
        Route::post('multi_delete_packages','PackageController@multiDelete')->name('packages.multiDelete');

        ################################### countries ##########################################
        Route::resource('countries','CountryController');
        Route::post('multi_delete_countries','CountryController@multiDelete')->name('countries.multiDelete');

        Route::resource('cities','CityController');
        Route::post('multi_delete_cities','CityController@multiDelete')->name('cities.multiDelete');

        Route::resource('areas','AreaController');
        Route::post('multi_delete_sub_areas','AreaController@multiDelete')->name('areas.multiDelete');

        ################################### car_types ##########################################
        Route::resource('car_types','CarTypeController');
        Route::post('multi_delete_car_types','CarTypeController@multiDelete')->name('car_types.multiDelete');

        Route::resource('car_categories','CarCategoryController');
        Route::post('multi_delete_car_categories','CarCategoryController@multiDelete')->name('car_categories.multiDelete');

        Route::resource('car_models','CarModelController');
        Route::post('multi_delete_car_models','CarModelController@multiDelete')->name('car_models.multiDelete');

        Route::resource('car_colors','CarColorController');
        Route::post('multi_delete_car_colors','CarColorController@multiDelete')->name('car_colors.multiDelete');

        ################################### bills ##########################################
        Route::resource('bills','BillController');
        Route::post('multi_delete_bills','BillController@multiDelete')->name('bills.multiDelete');

        ################################### rewords ##########################################
        Route::resource('rewords','RewordController');
        Route::post('multi_delete_rewords','RewordController@multiDelete')->name('rewords.multiDelete');

        ################################### commissions ##########################################
        Route::resource('commissions','CommissionController');
        Route::post('multi_delete_commissions','CommissionController@multiDelete')->name('commissions.multiDelete');

        ################################### contact_categories ##########################################
        Route::resource('contact_categories','ContactCategoryController');
        Route::post('multi_delete_contact_categories','ContactCategoryController@multiDelete')->name('contact_categories.multiDelete');

        Route::resource('contacts','ContactController');
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
