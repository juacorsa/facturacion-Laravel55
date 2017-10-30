<?php

define('FLASH_SUCCESS', 'success');
define('FLASH_ERROR', 'error');
define('ENHORABUENA', 'Enhorabuena!!');
define('ERROR', 'Error!!');
define('CLIENTE_REGISTRADO', 'Cliente registrado con éxito');
define('CLIENTE_NO_REGISTRADO', 'Ha sido imposible registrar un nuevo cliente');
define('CLIENTE_NO_ENCONTRADO', 'Ha sido imposible encontrar el cliente seleccionado');
define('CLIENTE_NO_ACTUALIZADO', 'Ha sido imposible actualizar el cliente seleccionado');
define('CLIENTE_ACTUALIZADO', 'Cliente actualizado correctamente');
define('SERVICIO_REGISTRADO', 'Servicio registrado con éxito');
define('SERVICIO_NO_REGISTRADO', 'Ha sido imposible registrar un nuevo servicio');
define('SERVICIO_NO_ENCONTRADO', 'Ha sido imposible encontrar el servicio seleccionado');
define('SERVICIO_NO_ACTUALIZADO', 'Ha sido imposible actualizar el servicio seleccionado');
define('SERVICIO_ACTUALIZADO', 'Servicio actualizado correctamente');
define('EMPRESA_REGISTRADA', 'Empresa registrada con éxito');
define('EMPRESA_NO_REGISTRADA', 'Ha sido imposible registrar una nueva empresa');
define('EMPRESA_NO_ENCONTRADA', 'Ha sido imposible encontrar la empresa seleccionada');
define('EMPRESA_NO_ACTUALIZADA', 'Ha sido imposible actualizar la empresa seleccionada');
define('EMPRESA_ACTUALIZADA', 'Empresa actualizado correctamente');

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
