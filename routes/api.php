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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', 'App\Http\Controllers\apiController@login');
Route::post('/register', 'App\Http\Controllers\apiController@login');
Route::post('/my-product', 'App\Http\Controllers\apiController@my_product');
Route::post('/tracking', 'App\Http\Controllers\apiController@tracking');
Route::post('/get-city', 'App\Http\Controllers\apiController@getCity');
Route::post('/my-details', 'App\Http\Controllers\apiController@myDetails');
Route::post('/price', 'App\Http\Controllers\priceController@cal_price' );
Route::post('/addProduct', 'App\Http\Controllers\apiController@addProduct' );
