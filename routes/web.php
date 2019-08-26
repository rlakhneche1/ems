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
    return view('login');
});
route::get('/profile', function(){
    return view('profile');
});
route::put('/updateuser/{id}','UserController@update_user')->middleware('auth');
route::put('/updatepassword/{id}','UserController@update_password')->middleware('auth');
route::resource('employe','EmployeController')->middleware('role:agent');
route::resource('permission','PermissionController')->middleware('role:admin');
route::resource('role','RoleController')->middleware('role:admin');
route::resource('user','UserController')->middleware('role:admin');
route::post('/affecterpermissions', 'RoleController@affecter_permissions')->middleware('role:admin');
route::get('/detacherpermission/{id_role}/{id_permission}','RoleController@detacher_permission')->middleware('role:admin');
route::post('/affecterrole','UserController@affecter_role')->middleware('role:admin');
route::get('/detacherrole/{id_user}/{id_role}', 'UserController@detache_role')->middleware('role:admin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
