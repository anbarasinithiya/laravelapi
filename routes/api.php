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

//Auth::routes();

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::group([
      'middleware' => 'auth:api'
    ], function() {
Route::post('add', 'ApiController@additionOp');
Route::post('subtract', 'ApiController@subtractOp');
Route::post('multiply', 'ApiController@multiplyOp');
Route::post('divide', 'ApiController@divideOp');
Route::post('squareRoot', 'ApiController@sqrtOp');
Route::post('save', 'ApiController@saveOp');
Route::get('savedValue', 'ApiController@retrieveOp');
Route::post('clear', 'ApiController@deleteOp');
});