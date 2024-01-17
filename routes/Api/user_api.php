<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'user', 'namespace' => 'User'], function () {

    /* ---------------------- Authentication -------------------*/
    Route::post('login','AuthController@login');
    Route::post('register', 'AuthController@register');

    Route::post('get_register_code','AuthController@get_register_code');
    Route::post('ConfirmRegisterCode','AuthController@ConfirmRegisterCode');

    Route::group(['middleware' => 'all_guards:user_api'], function () {

        Route::get('profile', 'AuthController@profile');
        Route::get('completed_profile', 'AuthController@completed_profile');
        Route::post('update_profile', 'AuthController@update_profile');
        Route::post('verify_account','AuthController@verify_account');
        Route::post('logout', 'AuthController@logout');
        Route::post('deleteAccount', 'AuthController@deleteAccount');
        Route::get('search_for_user', 'AuthController@search_for_user');

        /* ---------------------- User Questions -------------------*/
        Route::get('questions','QuestionController@questions');
        Route::post('edit_questions','QuestionController@edit_questions');

        /* ---------------------- home -------------------*/
        Route::get('home','HomeController@index');
        Route::get('slider','HomeController@slider');

        /* ---------------------- notifications -------------------*/
        Route::get('notifications', 'NotificationController@notifications');
        Route::get('getNotificationsCount', 'NotificationController@getNotificationsCount');

        /* ---------------------- car types -------------------*/
        Route::get('car_types','CarTypeController@car_types');
        Route::get('car_categories','CarTypeController@car_categories');
        Route::get('car_models','CarTypeController@car_models');
        Route::get('car_colors','CarTypeController@car_colors');

        /* ---------------------- product -------------------*/
        Route::group(['prefix' => 'product'], function () {
            Route::get('one_product', 'ProductController@one_product');
            Route::get('user_products', 'ProductController@user_products');
            Route::post('store', 'ProductController@store');
            Route::post('update/{id}', 'ProductController@update');
            Route::post('delete', 'ProductController@delete');
        });

        /* ---------------------- follow -------------------*/
        Route::post('add_delete_follow','FollowController@add_delete_follow');
        Route::get('followers', 'FollowController@followers');
        Route::get('users_i_follow', 'FollowController@users_i_follow');

        /* ---------------------- reports -------------------*/
        Route::post('add_report','ReportController@add_report');

        /* ---------------------- favourite -------------------*/
        Route::post('add_delete_favourite','FavouriteController@add_delete_favourite');
        Route::get('favourite_products','FavouriteController@favourite_products');

        /* ---------------------- comments -------------------*/
        Route::post('add_comment','CommentController@add_comment');
        Route::post('delete_comment','CommentController@delete_comment');
        Route::post('add_reply','CommentController@add_reply');
        Route::post('delete_reply','CommentController@delete_reply');

        Route::post('add_rate','RateController@add_rate');
        Route::get('rates','RateController@rates');

        /* ---------------------- chat -------------------*/
        Route::get('getChatRooms','ChatController@getChatRooms');
        Route::get('get_chat','ChatController@get_chat');
        Route::post('send_message','ChatController@send_message');

        /* ---------------------- rewards -------------------*/
        Route::get('rewards','RewardController@rewards');

        /* ---------------------- bills -------------------*/
        Route::post('add_bill','BillController@add_bill');
        Route::get('bills','BillController@bills');

        /* ---------------------- commissions -------------------*/
        Route::post('add_commission','CommissionController@add_commission');
        Route::get('commissions','CommissionController@commissions');

        /* ---------------------- ad_packages -------------------*/
        Route::get('ad_packages','AdPackageController@ad_packages');
        Route::post('updateAdPackage','AdPackageController@updateAdPackage');

        /* ---------------------- packages -------------------*/
        Route::get('packages','PackageController@packages');
        Route::post('store_package','PackageController@store');


    });
});
