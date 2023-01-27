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

Route::get('/', 'UsersController@home');
Route::get('/add', function(){
	return view('add');
});

Route::POST('/add', 'UsersController@add');
Route::get('/load', 'UsersController@load');
Route::get('/modal', 'UsersController@modal');
Route::put('/update/{id}', 'UsersController@update');
Route::delete('/delete/{id}', 'UsersController@delete');