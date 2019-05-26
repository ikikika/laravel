<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/poll_slides', 'HomeController@poll_slides')->name('poll_slides');

Route::resource('slides', 'SlidesController');
Route::post('/upload_image', 'SlidesController@upload_image')->name('upload_image');
