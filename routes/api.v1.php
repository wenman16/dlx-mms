<?php

/*
|--------------------------------------------------------------------------
| API Routes {V1}
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');

Route::group(['middleware' => ['auth:sanctum']], function() {

    Route::post('logout', 'AuthController@logout');

    Route::apiResource('website', 'Api\V1\WebsiteController');
    
});