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
Route::delete('/role-delete/{rid}', 'AclController@roleDelete')->name('role.delete');
Route::get('/role-edit/{rid}', 'AclController@roleEdit')->name('role.edit');
Route::post('/role-update/{rid}', 'AclController@roleUpdate')->name('role.update');
Route::get('/user', 'HomeController@user')->name('users');
Route::post('/user-store', 'HomeController@userStore')->name('user.store');
Route::delete('/user-delete/{uid}', 'HomeController@userDelete')->name('user.delete');
Route::get('/user-edit/{uid}', 'HomeController@userEdit')->name('user.edit');
Route::post('/user-update/{uid}', 'HomeController@userUpdate')->name('user.update');
//Route::get('/user-permission', 'AclController@userPermission')->name('user.permission');

Route::get('/customers', 'CustomerController@list')->name('customer.list');
Route::get('/customer-create', 'CustomerController@create')->name('customer.create');
Route::post('/customer-store', 'CustomerController@store')->name('customer.store');
Route::post('/customer-sub-dealer-update/{cid}', 'CustomerController@subDealerUpdate')->name('customer.sub.dealer.update');
Route::post('/customer-individual-update/{cid}', 'CustomerController@individualUpdate')->name('customer.individual.update');
Route::get('/customer-profile/{cid}', 'CustomerController@show')->name('customer.profile');
Route::delete('/customer-delete/{cid}', 'CustomerController@destroy')->name('customer.delete');

Route::get('/customer-edit/{cid}', 'CustomerController@edit')->name('customer.edit');
Route::post('/customer-update/{cid}', 'CustomerController@update')->name('customer.update');
Route::post('/customer-update-contact-person/{cid}', 'CustomerController@updateContactPerson')->name('customer.update.contact.person');

Route::get('/factories', 'FactoryController@list')->name('factory.list');
Route::get('/factories/create', 'FactoryController@create')->name('factory.create');
Route::post('/factories/store', 'FactoryController@store')->name('factory.store');
Route::get('/factories/edit/{fid}', 'FactoryController@edit')->name('factory.edit');
Route::post('/factories/update/{fid}', 'FactoryController@update')->name('factory.update');
Route::delete('/factories/delete/{fid}', 'FactoryController@destroy')->name('factory.delete');

Route::get('/machines', 'MachineController@list')->name('machine.list');
Route::get('/machine/create', 'MachineController@create')->name('machine.create');
Route::post('/machine/store', 'MachineController@store')->name('machine.store');
Route::delete('/machine/delete/{mid}', 'MachineController@destroy')->name('machine.delete');
Route::get('/machine/edit/{mid}', 'MachineController@edit')->name('machine.edit');
Route::post('/machine/update/{mid}', 'MachineController@update')->name('machine.update');

Route::get('/spare-parts', 'SparepartsController@list')->name('spareParts.list');
Route::get('/spare-parts/create', 'SparepartsController@create')->name('spareParts.create');
Route::post('/spare-parts/store', 'SparepartsController@store')->name('spareParts.store');
Route::delete('/spare-parts/delete/{spid}', 'SparepartsController@destroy')->name('spareParts.delete');
Route::get('/spare-parts/edit/{spid}', 'SparepartsController@edit')->name('spareParts.edit');
Route::post('/spare-parts/update/{spid}', 'SparepartsController@update')->name('spareParts.update');

Route::get('/raw-material', 'RawmaterialController@list')->name('rawMaterial.list');
Route::get('/raw-material/create', 'RawmaterialController@create')->name('rawMaterial.create');
Route::post('/raw-material/store', 'RawmaterialController@store')->name('rawMaterial.store');
Route::delete('/raw-material/delete/{rmid}', 'RawmaterialController@destroy')->name('rawMaterial.delete');
Route::get('/raw-material/edit/{rmid}', 'RawmaterialController@edit')->name('rawMaterial.edit');
Route::post('/raw-material/update/{rmid}', 'RawmaterialController@update')->name('rawMaterial.update');

Route::get('/product', 'ProductController@list')->name('product.list');
Route::get('/product/create', 'ProductController@create')->name('product.create');
Route::post('/product/store', 'ProductController@store')->name('product.store');
Route::delete('/product/delete/{pid}', 'ProductController@destroy')->name('product.delete');
Route::get('/product/edit/{pid}', 'ProductController@edit')->name('product.edit');
Route::post('/product/update/{pid}', 'ProductController@update')->name('product.update');


Route::get('/warehouse', 'WarehouseController@index')->name('warehouse.index');
Route::post('/warehouse/store', 'WarehouseController@store')->name('warehouse.store');
Route::delete('/warehouse/delete/{wid}', 'WarehouseController@destroy')->name('warehouse.delete');
Route::get('/warehouse/edit/{wid}', 'WarehouseController@edit')->name('warehouse.edit');
Route::post('/warehouse/update/{wid}', 'WarehouseController@update')->name('warehouse.update');
Route::post('/floor/update/{wid}', 'WarehouseController@floorUpdate')->name('floor.update');
Route::post('/rack/update/{wid}', 'WarehouseController@rackUpdate')->name('rack.update');










