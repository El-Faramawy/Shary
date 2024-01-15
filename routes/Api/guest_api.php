<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'guest', 'namespace' => 'User'], function () {

    Route::get('completed_profile', 'AuthController@completed_profile');
    Route::get('questions','QuestionController@questions');
    Route::get('home','HomeController@index');
    Route::get('slider','HomeController@slider');

    Route::group(['prefix' => 'product'], function () {
        Route::get('one_product', 'ProductController@one_product');
    });

});
