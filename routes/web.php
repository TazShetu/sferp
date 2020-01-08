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
Route::get('/permission-edit/{pid}', 'AclController@permissionEdit')->name('permission.edit');
Route::post('/permission-update/{pid}', 'AclController@permissionUpdate')->name('permission.update');
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
//Route::get('/user-permission', 'AclController@userPermission')->name('user.permission');

Route::get('/customers', 'CustomerController@list')->name('customer.list');
Route::get('/customer-create', 'CustomerController@create')->name('customer.create');
Route::post('/customer-store', 'CustomerController@store')->name('customer.store');
Route::post('/customer-sub-dealer-update/{cid}', 'CustomerController@subDealerUpdate')->name('customer.sub.dealer.update');
Route::post('/customer-individual-update/{cid}', 'CustomerController@individualUpdate')->name('customer.individual.update');
Route::get('/customer-profile/{cid}', 'CustomerController@show')->name('customer.profile');
Route::get('/customer-delete/{cid}', 'CustomerController@destroy')->name('customer.delete');

Route::get('/customer-edit/{cid}', 'CustomerController@edit')->name('customer.edit');
Route::post('/customer-update/{cid}', 'CustomerController@update')->name('customer.update');
Route::post('/customer-update-contact-person/{cid}', 'CustomerController@updateContactPerson')->name('customer.update.contact.person');

Route::get('/factories', 'FactoryController@list')->name('factory.list');
Route::get('/factories/create', 'FactoryController@create')->name('factory.create');
Route::post('/factories/store', 'FactoryController@store')->name('factory.store');
Route::get('/factories/edit/{fid}', 'FactoryController@edit')->name('factory.edit');
Route::post('/factories/update/{fid}', 'FactoryController@update')->name('factory.update');
Route::get('/factories/delete/{fid}', 'FactoryController@destroy')->name('factory.delete');

Route::get('/machines', 'MachineController@list')->name('machine.list');
Route::get('/machine/create', 'MachineController@create')->name('machine.create');
Route::post('/machine/store', 'MachineController@store')->name('machine.store');
Route::delete('/machine/delete/{mid}', 'MachineController@destroy')->name('machine.delete');
Route::get('/machine/edit/{mid}', 'MachineController@edit')->name('machine.edit');
Route::post('/machine/update/{mid}', 'MachineController@update')->name('machine.update');

Route::get('/spare-parts', 'SparepartsController@list')->name('spareParts.list');
Route::get('/spare-parts/create', 'SparepartsController@create')->name('spareParts.create');
//Route::post('/machine/store', 'MachineController@store')->name('machine.store');
//Route::delete('/machine/delete/{mid}', 'MachineController@destroy')->name('machine.delete');
//Route::get('/machine/edit/{mid}', 'MachineController@edit')->name('machine.edit');
//Route::post('/machine/update/{mid}', 'MachineController@update')->name('machine.update');














