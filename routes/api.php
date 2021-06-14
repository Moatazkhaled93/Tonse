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
Route::middleware('guest')->group(function () {
    // @TODO: Login not required as there is a oauth endpoint oauth/token to request tokens for accessing the API using username/password
    Route::post('login', '\App\Http\Controllers\Api\LoginController')->name('login');
    Route::post('register', '\App\Http\Controllers\Api\RegisterController')->name('register');
});
Route::group(['middleware' => 'auth:api'], function () {
    Route::put('user/{id}', '\App\Http\Controllers\Api\UserController@update');
    Route::post('friendship', '\App\Http\Controllers\Api\UserController@friendship');
    Route::post('sendMessages', '\App\Http\Controllers\Api\UserController@sendMessages');
});

