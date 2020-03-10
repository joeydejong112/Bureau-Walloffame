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

Route::post('updateUsersRed','Updateusers@update');
Route::post('updateUsersLike/{id}/{rank}/{authid}/{klas}','Updateusers@Like');





Route::get('/klas/{id}', 'UserController@sort');

Route::get('/', 'UserController@welcome');
Route::get('/home', 'UserController@output');
Route::get('/succes', 'UserController@output')->name('succes');
Route::get('/account', 'UserController@account');
Route::get('/details/{id}', 'UserController@details')->name('details');
Route::get('/details', 'UserController@owndetails');


Auth::routes();


// AdminController 
Route::post('admin/update/user','UpdateAdmin@adminupdateuser');
Route::post('admin/update/klas','UpdateAdmin@adminupdateklas');
Route::get('/admin', 'AdminController@admin_home')->name('admin');
Route::get('/admin/user/{id}', 'AdminController@sort_user');
Route::get('/admin/klas/{id}', 'AdminController@sort_klas')->name('adminklas');

