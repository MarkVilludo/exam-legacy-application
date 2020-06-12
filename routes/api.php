<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Group by api
Route::group(['prefix' => 'v1'], function () {

	Route::get('users', 'Api\UserController@index')->name('api.users');
	Route::get('users/{id}', 'Api\UserController@show')->name('api.users-show');
	Route::post('users', 'Api\UserController@store')->name('api.users-store');
	Route::post('users/{id}', 'Api\UserController@update')->name('api.users-update');

});
