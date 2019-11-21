<?php


Route::get('/', function () {
    return view('welcome');
});
Route::get('/cancel', function () {
    return redirect()->back();
})->name('cancel');


Auth::routes();

Route::get('/test', 'HomeController@test')->name('test');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/permission', 'AclController@permission')->name('permission');
Route::get('/role', 'AclController@role')->name('role');
Route::get('/user', 'HomeController@user')->name('users');
Route::get('/user-permission', 'AclController@userPermission')->name('user.permission');

Route::get('/customer-create', 'CustomerController@create')->name('customer.create');
Route::post('/customer-store', 'CustomerController@store')->name('customer.store');
Route::get('/customers', 'CustomerController@list')->name('customer.list');

Route::get('/customer-edit/{cid}', 'CustomerController@edit')->name('customer.edit');

Route::get('/customer-profile/{cid}', 'CustomerController@show')->name('customer.profile');
