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

Route::post('register','Api\Auth\RegisterController@register');
Route::post('login','Api\Auth\LoginController@login');
Route::post('refresh','Api\Auth\LoginController@refresh');
Route::get('organizations','Api\OrganizationController@display');


Route::middleware('auth:api')->group( function () {
    Route::get('logout','Api\Auth\LoginController@logout');
    Route::get('organizations','Api\OrganizationController@display');
});
