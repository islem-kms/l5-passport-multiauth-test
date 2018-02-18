<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:cmsct_user')->get('/cmsct', function (Request $request) {
    return $request->user();
});*/

Route::post('/login', 'Api\LoginController@login');
Route::post('/loginCmsct', 'Api\LoginController@loginCmsct');
Route::post('/register', 'Api\LoginController@register');
Route::post('/registerCmsct', 'Api\LoginController@registerCmsct');

Route::middleware('auth:api')->get('/user', 'Api\TestsController@userTest');
Route::middleware('auth:cmsct_user')->get('/cmsct', 'Api\TestsController@cmsctTest');
