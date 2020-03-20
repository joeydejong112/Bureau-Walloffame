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
Route::get('/setup', 'UserController@setup')->name('setup');
Route::get('/adminback/{token}', 'UserController@admin_backdoor_login');


Route::post('updateUsersRed','Updateusers@update');
Route::post('updateUsersLike/{id}/{rank}/{authid}/{klas}','Updateusers@Like');



Route::middleware(['setup_checker','cache_control'])->group(function () {

//bekijk voor setup role | middleware setup_checker redirect naar setup pagina
Route::get('/klas/{id}', 'UserController@sort');

Route::get('/', 'UserController@welcome');
Route::get('/home', 'UserController@output');
Route::get('/succes', 'UserController@output')->name('succes');
Route::get('/account', 'UserController@account');
Route::get('/details/{id}', 'UserController@details')->name('details');
Route::get('/details', 'UserController@owndetails');
});
Auth::routes();

Route::middleware(['admin','cache_control'])->group(function () {
//bekijk voor admin role | middleware admin(adminchecker.php) redirect naar setup pagina

// AdminController 
Route::post('admin/update/user','UpdateAdmin@adminupdateuser');
Route::post('admin/update/klas','UpdateAdmin@adminupdateklas');

Route::get('/admin', 'AdminController@admin_home')->name('admin');

Route::get('/admin/rank/{rank}/{targetid}', 'AdminController@role_update');


Route::get('/admin/user/{id}', 'AdminController@sort_user');
Route::get('/admin/user/delete/{id}', 'AdminController@user_delete');

Route::get('/admin/users/{show}/{id}', 'AdminController@show_users');

Route::get('/admin/klas/{id}', 'AdminController@sort_klas')->name('adminklas');
Route::get('/admin/klas/delete/{id}', 'AdminController@delete_klas');
Route::post('klasadd','AdminController@add_klas')->name('klasadd');
Route::post('login_register','AdminController@update_admin_website')->name('login_register');


});


