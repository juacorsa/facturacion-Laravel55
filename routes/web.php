<?php

Route::get('/', function () {
    return view('welcome');
});

// Rutas de clientes
Route::get('/clientes', 'ClientesController@index')->name('clientes.index');
Route::get('/cliente', 'ClientesController@create')->name('cliente.create');
Route::post('/cliente', 'ClientesController@store')->name('cliente.store');
Route::get('/cliente/{id}', 'ClientesController@edit')->name('cliente.edit');
Route::put('/cliente', 'ClientesController@update')->name('cliente.update');

// Rutas de servicios
Route::get('/servicios', 'ServiciosController@index')->name('servicios.index');
Route::get('/servicio', 'ServiciosController@create')->name('servicio.create');
Route::post('/servicio', 'ServiciosController@store')->name('servicio.store');
Route::get('/servicio/{id}', 'ServiciosController@edit')->name('servicio.edit');
Route::put('/servicio', 'ServiciosController@update')->name('servicio.update');

// Rutas de empresas
Route::get('/empresas', 'EmpresasController@index')->name('empresas.index');
Route::get('/empresa', 'EmpresasController@create')->name('empresa.create');
Route::post('/empresa', 'EmpresasController@store')->name('empresa.store');
Route::get('/empresa/{id}', 'EmpresasController@edit')->name('empresa.edit');
Route::put('/empresa', 'EmpresasController@update')->name('empresa.update');

// Rutas de facturación
Route::get('/facturacion', 'FacturacionController@index')->name('facturacion.index');
Route::get('/facturacion/create', 'FacturacionController@create')->name('facturacion.create');
Route::post('/facturacion/store', 'FacturacionController@store')->name('facturacion.store');
Route::post('/facturacion/list', 'FacturacionController@list')->name('facturacion.list');
Route::get('/facturacion/show/{id}', 'FacturacionController@show')->name('facturacion.show');
Route::get('/facturacion/exportar', 'FacturacionController@exportar')->name('facturacion.exportar');
Route::get('/facturacion/{id}', 'FacturacionController@edit')->name('facturacion.edit');
Route::put('/facturacion', 'FacturacionController@update')->name('facturacion.update');

Auth::routes();
Route::get('/home', 'FacturacionController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::redirect('/register', '/login');