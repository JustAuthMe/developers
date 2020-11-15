<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'LandingController@home');
Route::get('/localization/{locale}','LocalizationController@index');
Route::get('/documentation', 'LandingController@documentation');

Route::get('/api/version', function () {
    return [
        'status' => 'success',
        'name' => 'JustAuthMe',
        'version' => [
            'ref' => env('DEPLOYED_REF'),
            'hash' => env('DEPLOYED_COMMIT')
        ]
    ];
});

Route::group(['prefix' => 'dash'], function () {
    Auth::routes();
    Route::match(['GET', 'POST'], '/email', 'Auth\VerificationController@sender');

    Route::get('/password', 'Auth\ResetPasswordController@emailForm');
    Route::post('/password', 'Auth\ResetPasswordController@sendEmail');

    Route::get('/password/validation', 'Auth\ResetPasswordController@resetPasswordForm');
    Route::post('/password/validation', 'Auth\ResetPasswordController@resetPassword');

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
        Route::get('create-integration', 'Dash\AppsController@createIntegration');
        Route::post('', 'Dash\AppsController@store');
        Route::get('{id}/edit', 'Dash\AppsController@edit');
        Route::put('{id}/edit', 'Dash\AppsController@update');
        Route::put('{id}/owner', 'Dash\AppsController@changeOwner');
    });

    Route::get('profile', 'Dash\UserController@edit');
    Route::put('profile', 'Dash\UserController@update');

    Route::get('integration', 'Dash\IntegrationController@integrate');
    Route::get('integration/setup', 'Dash\IntegrationController@setup');
    Route::get('integration/abort', 'Dash\IntegrationController@abort');
});
