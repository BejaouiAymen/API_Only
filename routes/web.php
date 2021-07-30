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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/controlle', function () {
    return view('Controlle_page');
});


Route::resource('view','View_Controller');
Route::get('/list', 'View_Controller@create2');
Route::POST('/list', 'View_Controller@store2');
Route::get('/image', 'View_Controller@create3');
Route::POST('/image', 'View_Controller@store3');

