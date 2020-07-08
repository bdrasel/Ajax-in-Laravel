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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'CustomerController@index');
Route::post('add/customer/data', 'CustomerController@add');
Route::get('get/customer/data', 'CustomerController@getData');


Route::get('view/customer/data', 'CustomerController@viewData');
Route::get('edit/customer/data', 'CustomerController@editData');
Route::post('update/customer/data', 'CustomerController@updatetData');
Route::get('delete/customer/data', 'CustomerController@deleteData');
