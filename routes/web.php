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

Route::get('/chart/{coin}', 'Chart@show');

Route::get('/get', 'FirstController@show');
Route::get('/storedata', 'StoreData@getData');
Route::get('/get_price_data/{coin}', 'GetData@getData');