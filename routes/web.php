<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing/home');
});

Route::group(['prefix' => 'dash'], function () {
    Auth::routes();
    Route::get('jam', 'Auth\JamController@auth');
    Route::get('', 'Dash\HomeController@index');
    Route::group(['prefix' => 'organizations'], function () {
        Route::get('', 'Dash\OrganizationsController@index');
        Route::get('create', 'Dash\OrganizationsController@create');
        Route::post('', 'Dash\OrganizationsController@store');
        Route::put('{id}', 'Dash\OrganizationsController@update');
        Route::get('{id}/manage', 'Dash\OrganizationsController@manage');
        Route::post('{id}/invite', 'Dash\OrganizationsController@invite');
        Route::get('{id}/user/{user_id}/remove', 'Dash\OrganizationsController@removeMember');
        Route::get('{id}/user/{user_id}/role/{role}', 'Dash\OrganizationsController@changeMemberRole');
    });
    Route::group(['prefix' => 'apps'], function () {
        Route::get('', 'Dash\AppsController@index');
        Route::get('create', 'Dash\AppsController@create');
        Route::post('', 'Dash\AppsController@store');
        Route::get('{id}/edit', 'Dash\AppsController@edit');
        Route::put('{id}/edit', 'Dash\AppsController@update');
        Route::put('{id}/owner', 'Dash\AppsController@changeOwner');
    });

    Route::get('profile', 'Dash\UserController@edit');
    Route::put('profile', 'Dash\UserController@update');
});
