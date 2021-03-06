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

Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::group(['prefix'=>'admin', 'middleware' => 'auth:api'], function(){
  Route::post('user', 'UserController@user');
  Route::get('logout', 'UserController@logout');
  Route::resource('products', 'ProductController');
});
//
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
