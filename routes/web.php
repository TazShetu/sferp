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
Route::get('/notification/minimum-storage', 'HomeController@minimumStorage')->name('minimum.storage');
Route::get('/home-production', 'HomeController@dashboardProduction')->name('home.production');
Route::get('/home-inventory', 'HomeController@dashboardInventory')->name('home.inventory');
Route::get('/home-sells', 'HomeController@dashboardSells')->name('home.sells');

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
Route::post('/customer-product-discount-update/{cid}', 'CustomerController@productDiscountUpdate')->name('customer.product.discount.update');
Route::get('/customer-profile/{cid}', 'CustomerController@show')->name('customer.profile');
Route::delete('/customer-delete/{cid}', 'CustomerController@destroy')->name('customer.delete');
Route::get('/customer-edit/{cid}', 'CustomerController@edit')->name('customer.edit');
Route::post('/customer-update/{cid}', 'CustomerController@update')->name('customer.update');
Route::post('/customer-update-contact-person/{cid}', 'CustomerController@updateContactPerson')->name('customer.update.contact.person');
Route::post('/customer-update-extra/{cid}', 'CustomerController@updateExtra')->name('customer.update.extra');

Route::get('/companies', 'FactoryController@list')->name('factory.list');
Route::get('/companies/create', 'FactoryController@create')->name('factory.create');
Route::post('/companies/store', 'FactoryController@store')->name('factory.store');
Route::get('/companies/edit/{fid}', 'FactoryController@edit')->name('factory.edit');
Route::post('/companies/update/{fid}', 'FactoryController@update')->name('factory.update');
Route::delete('/companies/delete/{fid}', 'FactoryController@destroy')->name('factory.delete');

Route::get('/spare-parts', 'SparepartsController@list')->name('spareParts.list');
Route::get('/spare-parts/create', 'SparepartsController@create')->name('spareParts.create');
Route::post('/spare-parts/store', 'SparepartsController@store')->name('spareParts.store');
Route::delete('/spare-parts/delete/{spid}', 'SparepartsController@destroy')->name('spareParts.delete');
Route::get('/spare-parts/edit/{spid}', 'SparepartsController@edit')->name('spareParts.edit');
Route::post('/spare-parts/update/{spid}', 'SparepartsController@update')->name('spareParts.update');

Route::get('/machines', 'MachineController@list')->name('machine.list');
Route::get('/machine/create', 'MachineController@create')->name('machine.create');
Route::post('/machine/store', 'MachineController@store')->name('machine.store');
Route::delete('/machine/delete/{mid}', 'MachineController@destroy')->name('machine.delete');
Route::get('/machine/edit/{mid}', 'MachineController@edit')->name('machine.edit');
Route::get('/machine/manual/download/{mid}', 'MachineController@mmd')->name('machine.manual.download');
Route::post('/machine/update/{mid}', 'MachineController@update')->name('machine.update');
Route::post('/machine/update/sparepart/{mid}', 'MachineController@updateMachineSparePart')->name('machine.update.sparepart');

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
Route::post('/product/update/rawMaterial/{pid}', 'ProductController@updateProductRawmaterial')->name('product.update.rawmaterial');

Route::get('/warehouse', 'WarehouseController@index')->name('warehouse.index');
Route::post('/warehouse/store', 'WarehouseController@store')->name('warehouse.store');
Route::delete('/warehouse/delete/{wid}', 'WarehouseController@destroy')->name('warehouse.delete');
Route::get('/warehouse/edit/{wid}', 'WarehouseController@edit')->name('warehouse.edit');
Route::post('/warehouse/update/{wid}', 'WarehouseController@update')->name('warehouse.update');
Route::post('/floor/update/{wid}', 'WarehouseController@floorUpdate')->name('floor.update');
Route::post('/room/update/{wid}', 'WarehouseController@roomUpdate')->name('room.update');

Route::get('/spare-part-room', 'SroomController@index')->name('sroom.index');
Route::post('/spare-part-room/store', 'SroomController@store')->name('sroom.store');
Route::delete('/spare-part-room/delete/{srid}', 'SroomController@destroy')->name('sroom.delete');
Route::get('/spare-part-room/edit/{srid}', 'SroomController@edit')->name('sroom.edit');
Route::post('/spare-part-room/update/{srid}', 'SroomController@update')->name('sroom.update');
Route::post('/row/update/{srid}', 'SroomController@rowUpdate')->name('row.update');
Route::post('/rack/update/{srid}', 'SroomController@rackUpdate')->name('rack.update');

Route::get('/raw-material-purchase/history', 'RawmaterialpurchaseController@history')->name('raw-material.purchase.history');
Route::get('/raw-material-purchase', 'RawmaterialpurchaseController@index')->name('raw-material.purchase');
Route::get('/ajax/raw-material-purchase/ridToUnit', 'RawmaterialpurchaseController@ajaxRidToUnit');
Route::post('/raw-material-purchase/store', 'RawmaterialpurchaseController@store')->name('raw-material.purchase.store');
Route::delete('/raw-material-purchase/delete/{rpid}', 'RawmaterialpurchaseController@destroy')->name('rawmaterial.purchase.delete');
Route::get('/raw-material-purchase/edit/{rpid}', 'RawmaterialpurchaseController@edit')->name('raw-material.purchase.edit');
Route::post('/raw-material-purchase/update/{rpid}', 'RawmaterialpurchaseController@update')->name('raw-material.purchase.update');

Route::get('/raw-material-purchase/receive', 'RawmaterialpurchaseController@receiveIndex')->name('raw-material.purchase.receive');
Route::post('/raw-material-purchase/received/{rpid}', 'RawmaterialpurchaseController@received')->name('raw-material.purchase.received');
Route::post('/raw-material-purchase/not-received/{rpid}', 'RawmaterialpurchaseController@notReceived')->name('raw-material.purchase.received.not');

Route::get('/raw-material-purchase/store', 'RawmaterialstoreController@storeIndex')->name('raw-material.purchase.store');
Route::get('/raw-material-purchase/store/{rmpid}', 'RawmaterialstoreController@storeSinglePurchase')->name('raw-material.purchase.store.singlePurchase');
Route::get('/ajax/raw-material-store/widToFloor', 'RawmaterialstoreController@ajaxWidToFloor');
Route::get('/ajax/raw-material-store/fidToRoom', 'RawmaterialstoreController@ajaxFidToRoom');
Route::post('/raw-material-purchase/stock/{rmpid}', 'RawmaterialstoreController@stock')->name('raw-material.purchase.stock');

Route::get('/spare-part-purchase/history', 'SparepartspurchaseController@history')->name('spare-part.purchase.history');
Route::get('/spare-part-purchase', 'SparepartspurchaseController@index')->name('spare-part.purchase');
Route::get('/ajax/spare-part-purchase/spidToUnit', 'SparepartspurchaseController@ajaxSpidToUnit');
Route::post('/spare-part-purchase/store', 'SparepartspurchaseController@store')->name('spare-part.purchase.store');
Route::delete('/spare-part-purchase/delete/{spid}', 'SparepartspurchaseController@destroy')->name('spare-part.purchase.delete');
Route::get('/spare-part-purchase/edit/{spid}', 'SparepartspurchaseController@edit')->name('spare-part.purchase.edit');
Route::post('/spare-part-purchase/update/{spid}', 'SparepartspurchaseController@update')->name('spare-part.purchase.update');

Route::get('/spare-part-purchase/receive', 'SparepartspurchaseController@receiveIndex')->name('spare-part.purchase.receive');
Route::post('/spare-part-purchase/received/{spid}', 'SparepartspurchaseController@received')->name('spare-part.purchase.received');
Route::post('/spare-part-purchase/not-received/{spid}', 'SparepartspurchaseController@notReceived')->name('spare-part.purchase.received.not');

Route::get('/spare-part-purchase/store', 'SparepartsstoreController@storeIndex')->name('spare-part.purchase.store');
Route::get('/spare-part-purchase/store/{sphid}', 'SparepartsstoreController@storeSinglePurchase')->name('spare-part.purchase.store.singlePurchase');
Route::get('/ajax/spare-part-store/sridToRooms', 'SparepartsstoreController@ajaxSridToRooms');
Route::get('/ajax/spare-part-store/ridToRacks', 'SparepartsstoreController@ajaxRidToRacks');
Route::post('/spare-part-purchase/stock/{sphid}', 'SparepartsstoreController@stock')->name('spare-part.purchase.stock');

Route::get('/spare-part/stock/out', 'SparepartsstockoutController@out')->name('spare-part.stock.out');
Route::post('/spare-part/stock/out/{spsid}', 'SparepartsstockoutController@outStore')->name('spare-part.stock.out.store');
Route::get('/spare-part/stock/out/history', 'SparepartsstockoutController@history')->name('spare-part.stock.out.history');
Route::get('/spare-part/stock/in', 'SparepartsstockinController@in')->name('spare-part.stock.in');
Route::post('/spare-part/stock/in', 'SparepartsstockinController@inStore')->name('spare-part.stock.in.store');
Route::get('/spare-part/stock/in/history', 'SparepartsstockinController@history')->name('spare-part.stock.in.history');

Route::get('/raw-material/stock/out', 'RawmaterialstockoutController@out')->name('raw-material.stock.out');
Route::post('/raw-material/stock/out/{rmsid}', 'RawmaterialstockoutController@outStore')->name('raw-material.stock.out.store');
Route::get('/raw-material/stock/out/history', 'RawmaterialstockoutController@history')->name('raw-material.stock.out.history');
Route::get('/raw-material/stock/in', 'RawmaterialstockinController@in')->name('raw-material.stock.in');
Route::post('/raw-material/stock/in', 'RawmaterialstockinController@inStore')->name('raw-material.stock.in.store');
Route::get('/raw-material/stock/in/history', 'RawmaterialstockinController@history')->name('raw-material.stock.in.history');

Route::get('/raw-material/production/in', 'RawmaterialproductioninController@in')->name('raw-material.production.in');
Route::get('/ajax/raw-material-production-in/fidToMachine', 'RawmaterialproductioninController@ajaxFidToMachine');
Route::post('/raw-material/production/in', 'RawmaterialproductioninController@inStore')->name('raw-material.production.in.store');
Route::get('/raw-material/production/in/history', 'RawmaterialproductioninController@history')->name('raw-material.production.in.history');

Route::get('/product/production/out', 'ProductproductionoutController@in')->name('product.production.out');
Route::get('/ajax/product-production-out/pidToUnit', 'ProductproductionoutController@ajaxPidToUnit');
Route::post('/product/production/out', 'ProductproductionoutController@inStore')->name('product.production.out.store');
Route::get('/product/production/out/history', 'ProductproductionoutController@history')->name('product.production.out.history');

Route::get('/product/stock/in', 'ProductstockinController@in')->name('product.stock.in');
Route::post('/product/stock/in', 'ProductstockinController@inStore')->name('product.stock.in.store');
Route::get('/product/stock/in/history', 'ProductstockinController@history')->name('product.stock.in.history');
Route::get('/product/stock/out', 'ProductstockoutController@out')->name('product.stock.out');
Route::post('/product/stock/out/{psid}', 'ProductstockoutController@outStore')->name('product.stock.out.store');
Route::get('/product/stock/out/history', 'ProductstockoutController@history')->name('product.stock.out.history');

Route::get('/Designation/setup', 'DesignationController@index')->name('designation');
Route::post('/Designation/store', 'DesignationController@store')->name('designation.store');
Route::delete('/Designation/delete/{did}', 'DesignationController@destroy')->name('designation.delete');
Route::get('/Designation/edit/{did}', 'DesignationController@edit')->name('designation.edit');
Route::post('/Designation/update/{did}', 'DesignationController@update')->name('designation.update');

Route::get('/Employee/list', 'EmployeeController@index')->name('employee.list');
Route::get('/Employee/create', 'EmployeeController@create')->name('employee.create');
Route::get('/ajax/employees/tidToDesignation', 'EmployeeController@tidToDesignation');
Route::post('/Employee/store', 'EmployeeController@store')->name('employee.store');
Route::get('/Employee/edit/{eid}', 'EmployeeController@edit')->name('employee.edit');
Route::post('/Employee/update/main/{eid}', 'EmployeeController@updateMain')->name('employee.update.main');
Route::post('/Employee/update/personal_info/{eid}', 'EmployeedetailsController@updatePinfo')->name('employee.update.pinfo');
Route::post('/Employee/update/staff/academic_background/{eid}', 'EmployeedetailsController@updateStaffAC')->name('employee.update.staff.ac');
Route::post('/Employee/update/address/{eid}', 'EmployeedetailsController@updateAddress')->name('employee.update.address');
Route::post('/Employee/update/contact_info/{eid}', 'EmployeedetailsController@updateCinfo')->name('employee.update.cinfo');
Route::post('/Employee/update/family_info/{eid}', 'EmployeedetailsController@updateFinfo')->name('employee.update.finfo');
Route::post('/Employee/update/staff/sibling/{eid}', 'EmployeedetailsController@updateStaffS')->name('employee.update.staff.sibling');
Route::post('/Employee/update/experience/{eid}', 'EmployeedetailsController@updateExperience')->name('employee.update.experience');

Route::delete('/Employee/delete/{eid}', 'EmployeeController@destroy')->name('employee.delete');










