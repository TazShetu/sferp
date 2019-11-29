<?php


Route::get('/', function () {
    return view('welcome');
});
Route::get('/cancel', function () {
    return redirect()->back();
})->name('cancel');


Auth::routes();

Route::get('/forbidden', 'HomeController@test')->name('test');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/permission', 'AclController@permission')->name('permission');
Route::get('/role', 'AclController@role')->name('role');
Route::post('/role-store', 'AclController@roleStore')->name('role.store');
Route::get('/role-delete/{rid}', 'AclController@roleDelete')->name('role.delete');
Route::get('/role-edit/{rid}', 'AclController@roleEdit')->name('role.edit');
Route::post('/role-update/{rid}', 'AclController@roleUpdate')->name('role.update');
Route::get('/user', 'HomeController@user')->name('users');
Route::post('/user-store', 'HomeController@userStore')->name('user.store');
Route::get('/user-delete/{uid}', 'HomeController@userDelete')->name('user.delete');
Route::get('/user-edit/{uid}', 'HomeController@userEdit')->name('user.edit');
Route::post('/user-update/{uid}', 'HomeController@userUpdate')->name('user.update');
Route::get('/user-permission', 'AclController@userPermission')->name('user.permission');

Route::get('/customer-create', 'CustomerController@create')->name('customer.create');
Route::post('/customer-store', 'CustomerController@store')->name('customer.store');
Route::get('/customers', 'CustomerController@list')->name('customer.list');
Route::get('/customer-profile/{cid}', 'CustomerController@show')->name('customer.profile');
Route::get('/customer-delete/{cid}', 'CustomerController@destroy')->name('customer.delete');

Route::get('/customer-edit/{cid}', 'CustomerController@edit')->name('customer.edit');
Route::post('/customer-update/{cid}', 'CustomerController@update')->name('customer.update');
Route::post('/customer-update-contact-person/{cid}', 'CustomerController@updateContactPerson')->name('customer.update.contact.person');

