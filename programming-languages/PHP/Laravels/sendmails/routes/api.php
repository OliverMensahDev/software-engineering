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


Route::post('/v1/users/login', 'UserController@login');
Route::post('/v1/users/register', 'UserController@register');
Route::post('/v1/create', 'PasswordResetController@create');
Route::get('/v1/find/{token}', 'PasswordResetController@find');
Route::post('v1/reset', 'PasswordResetController@reset');
Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function() {
    //sample
    Route::get('/users/details', 'UserController@getDetails');
    Route::post('/users/logout', 'UserController@logout');

});

