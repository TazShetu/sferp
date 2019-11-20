<?php


Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/test', 'HomeController@test')->name('test');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/permission', 'AclController@permission')->name('permission');
Route::get('/role', 'AclController@role')->name('role');
Route::get('/user', 'HomeController@user')->name('users');
Route::get('/user-permission', 'AclController@userPermission')->name('user.permission');

Route::get('/customer-list', 'CustomerController@list')->name('customer.list');
Route::get('/customer-create', 'CustomerController@create')->name('customer.create');
Route::get('/customer-edit', 'CustomerController@edit')->name('customer.edit');
Route::get('/customer-profile', 'CustomerController@show')->name('customer.profile');
