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
    return view('principal');
})->name('/');
//

//Rutas del login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Rutas de registro de clientes
Route::get('registro', 'Auth\RegisterController@showRegistrationForm')->name('registro');
Route::post('registro', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


//Rutas solo accesibles por clientes
Route::group(['middleware' => 'cliente'], function () {
	//Dashboard Cliente
	Route::group(['middleware' => 'info'], function () {
		Route::get('Cliente', 'Cliente\DashboardClienteController@showDashboardForm')->name('Cliente');
		//Actualizarcontraseña
		Route::get('Cliente/Contraseña/Editar/', 'Cliente\CambioPasswordController@edit')->name('Cliente/Contraseña/Editar/');
		Route::post('Cliente/Contraseña/Editar/', 'Cliente\CambioPasswordController@update');
		//Seleccionar negocio para facturar
		Route::get('Cliente/Facturar/Seleccionar', 'Cliente\FacturarController@showSeleccionarForm')->name('Cliente/Facturar/Seleccionar');
		//Seleccionar negocio para facturar
		Route::get('Cliente/Facturar/Confirmar', 'Cliente\FacturarController@showConfirmar')->name('Cliente/Facturar/Confirmar');
		//Ver facturas Historial
		Route::get('Cliente/VerHistorial', 'Cliente\ClienteController@showHistorialForm')->name('Cliente/VerHistorial');
		//Ver facturas Historial
		Route::post('Cliente/Facturar/{id}', 'Cliente\FacturarController@facturar')->name('Cliente/Facturar');
	});
	//Actualización datos administradores
	Route::get('Cliente/MisDatos', 'Cliente\ClienteController@edit')->name('Cliente/MisDatos');
	Route::post('Cliente/MisDatos', 'Cliente\ClienteController@update');
});

//Rutas solo accesibles por negocios
Route::group(['middleware' => 'negocio'], function () {
	//Route::group(['middleware' => 'info'], function () {
		//Dashboard Negocio
		Route::get('Negocio', 'Negocio\DashboardNegocioController@showDashboardForm')->name('Negocio');
		//Editar contraseña negocio
		Route::get('Negocio/Contraseña/Editar/', 'Negocio\CambioPasswordController@edit')->name('Negocio/Contraseña/Editar/');
		Route::post('Negocio/Contraseña/Editar/', 'Negocio\CambioPasswordController@update');
		//Crear un nuevo negocio
		Route::get('Negocio/Registro', 'Negocio\NegocioController@create')->name('Negocio/Registro');
		Route::post('Negocio/Registro', 'Negocio\NegocioController@store');
		//Mostrar mis negocios index
		Route::get('Negocio/MisNegocios', 'Negocio\NegocioController@index')->name('Negocio/MisNegocios');
		//Mostrar info de negocio
		Route::get('Negocio/MisNegocios/{id}', 'Negocio\NegocioController@show')->name('Negocio/MisNegocios/');
		//Editar info de negocio
		Route::get('Negocio/MisNegocios/Editar/{id}', 'Negocio\NegocioController@edit')->name('Negocio/MisNegocios/Editar/');
		Route::post('Negocio/MisNegocios/Editar/{id}', 'Negocio\NegocioController@update');
		//Borrar negocio
		Route::get('Negocio/MisNegocios/Borrar/{id}', 'Negocio\NegocioController@delete')->name('Negocio/MisNegocios/Borrar/');
		//Ver facturas index
		Route::get('Negocio/Facturas', 'Negocio\NegocioController@showIndexFacturasExpForm')->name('Negocio/Facturas');
		//Ver facturas expedidas
		Route::get('Negocio/Facturas/{id}', 'Negocio\NegocioController@showFacturasExpForm')->name('Negocio/Facturas/');
		//Ver mis clientes index
		Route::get('Negocio/Clientes', 'Negocio\NegocioController@showIndexMisClientesForm')->name('Negocio/Clientes');
		//Ver mis clientes negocio
		Route::get('Negocio/Clientes/{id}', 'Negocio\NegocioController@showMisClientesForm')->name('Negocio/Clientes/');


	//});
	//Actualización datos administradores
	Route::get('Negocio/MisDatos', 'Negocio\NegocioController@edit')->name('Negocio/MisDatos');
	Route::post('Negocio/MisDatos', 'Negocio\NegocioController@update'); 
});

//Rutas solo accesibles por administradores
Route::group(['middleware' => 'admin'], function () {
	
	Route::group(['middleware' => 'info'], function () {
		//Dashboard Administrador
		Route::get('Admin', 'Admin\DashboardAdminController@showDashboardForm')->name('Admin');

		//Registro de clientes
		Route::get('Admin/Cliente/Registro', 'Admin\ClienteController@showRegistrationForm')->name('Admin/Cliente/Registro');
		Route::post('Admin/Cliente/Registro', 'Admin\ClienteController@register');
		//Mostrar clientes index
		Route::get('Admin/Cliente', 'Admin\ClienteController@index')->name('Admin/Cliente');
		//Mostrar info de cliente
		Route::get('Admin/Cliente/{id}', 'Admin\ClienteController@show')->name('Admin/Cliente/');
		//Editar info de cliente
		Route::get('Admin/Cliente/Editar/{id}', 'Admin\ClienteController@edit')->name('Admin/Cliente/Editar/');
		Route::post('Admin/Cliente/Editar/{id}', 'Admin\ClienteController@update');
		//Desactivar cliente
		Route::get('Admin/Cliente/Borrar/{id}', 'Admin\ClienteController@delete')->name('Admin/Cliente/Borrar/');
		//Activar cliente
		Route::get('Admin/Cliente/Activar/{id}', 'Admin\ClienteController@activate')->name('Admin/Cliente/Activar/');
 

		//Registro de negocios
		Route::get('Admin/Negocio/Registro', 'Admin\NegociosController@showRegistrationForm')->name('Admin/Negocio/Registro');
		Route::post('Admin/Negocio/Registro', 'Admin\NegociosController@register');
		//Mostrar usuarios tipo negocios index
		Route::get('Admin/Negocio', 'Admin\NegociosController@index')->name('Admin/Negocio');
		//Mostrar negocios de usuario index
		Route::get('Admin/Negocio/MisNegocios/{id}' , 'Admin\MisNegociosController@index')->name('Admin/Negocio/MisNegocios/');
		//Desactivar negocio de usuario
		Route::get('Admin/Negocio/Borrar/{id}', 'Admin\NegociosController@delete')->name('Admin/Negocio/Borrar/');
		//Activar negocio de usuario
		Route::get('Admin/Negocio/Activar/{id}', 'Admin\NegociosController@activate')->name('Admin/Negocio/Activar/');

		//Agregar negocio a usuario
		Route::get('Admin/Negocio/MisNegocios/Agregar/{id}', 'Admin\MisNegociosController@create')->name('Admin/Negocio/MisNegocios/Agregar/');
		Route::post('Admin/Negocio/MisNegocios/Agregar/{id}', 'Admin\MisNegociosController@store')->name('Admin/Negocio/MisNegocios/Agregar/');
		//Mostrar info de negocio
		Route::get('Admin/Negocio/MisNegocios/{id}/Ver/{id2}', 'Admin\MisNegociosController@show')->name('Admin/Negocio/MisNegocios/Ver/');
		//Editar info de negocio
		Route::get('Admin/Negocio/MisNegocios/{id}/Editar/{id2}', 'Admin\MisNegociosController@edit')->name('Admin/Negocio/MisNegocios/Editar/');
		Route::post('Admin/Negocio/MisNegocios/{id}/Editar/{id2}', 'Admin\MisNegociosController@update')->name('Admin/Negocio/MisNegocios/Editar/');
		//Desactivar negocio de usuario
		Route::get('Admin/Negocio/MisNegocios/{id}/Borrar/{id2}', 'Admin\MisNegociosController@delete')->name('Admin/Negocio/MisNegocios/Borrar/');
		//Activar negocio de usuario
		Route::get('Admin/Negocio/MisNegocios/{id}/Activar/{id2}', 'Admin\MisNegociosController@activate')->name('Admin/Negocio/MisNegocios/Activar/');
		

		//Registro de Administradores
		Route::get('Admin/Administrador/Registro', 'Admin\AdminController@showRegistrationForm')->name('Admin/Administrador/Registro');
		Route::post('Admin/Administrador/Registro', 'Admin\AdminController@register');
		//Mostrar administradores index
		Route::get('Admin/Administrador', 'Admin\AdminController@index')->name('Admin/Administrador');
		//Mostrar info de administrador
		Route::get('Admin/Administrador/{id}', 'Admin\AdminController@show')->name('Admin/Administrador/');
		//Editar info de administrador
		Route::get('Admin/Administrador/Editar/{id}', 'Admin\AdminController@edit')->name('Admin/Administrador/Editar/');
		Route::post('Admin/Administrador/Editar/{id}', 'Admin\AdminController@update');
		//Desactivar administrador
		Route::get('Admin/Administrador/Borrar/{id}', 'Admin\AdminController@delete')->name('Admin/Administrador/Borrar/');
		//Activar administrador
		Route::get('Admin/Administrador/Activar/{id}', 'Admin\AdminController@activate')->name('Admin/Administrador/Activar/');

		//Registro de uso de cfdi
		Route::get('Admin/UsoCFDI/Registro', 'Admin\UsoCFDIController@showRegistrationForm')->name('Admin/UsoCFDI/Registro');
		Route::post('Admin/UsoCFDI/Registro', 'Admin\UsoCFDIController@store');
		//Mostrar uso de cfdi index
		Route::get('Admin/UsoCFDI', 'Admin\UsoCFDIController@index')->name('Admin/UsoCFDI');
		//Mostrar info de uso cfdi
		Route::get('Admin/UsoCFDI/{id}', 'Admin\UsoCFDIController@show')->name('Admin/UsoCFDI/');
		//Editar info de uso cfdi
		Route::get('Admin/UsoCFDI/Editar/{id}', 'Admin\UsoCFDIController@edit')->name('Admin/UsoCFDI/Editar/');
		Route::post('Admin/UsoCFDI/Editar/{id}', 'Admin\UsoCFDIController@update');
		//Desactivar uso cfdi
		Route::get('Admin/UsoCFDI/Borrar/{id}', 'Admin\UsoCFDIController@delete')->name('Admin/UsoCFDI/Borrar/');
		//Activar uso cfdi
		Route::get('Admin/UsoCFDI/Activar/{id}', 'Admin\UsoCFDIController@activate')->name('Admin/UsoCFDI/Activar/');

		//Registro tipo de usuarios
		Route::get('Admin/TipoUsuarios/Registro', 'Admin\TipoUserController@showRegistrationForm')->name('Admin/TipoUsuarios/Registro');
		Route::post('Admin/TipoUsuarios/Registro', 'Admin\TipoUserController@store');
		//Mostrar tipo de usuarios index
		Route::get('Admin/TipoUsuarios', 'Admin\TipoUserController@index')->name('Admin/TipoUsuarios'); 
		//Mostrar info tipo de usuario
		Route::get('Admin/TipoUsuarios/{id}', 'Admin\TipoUserController@show')->name('Admin/TipoUsuarios/');
		//Editar info tipo de usuario
		Route::get('Admin/TipoUsuarios/Editar/{id}', 'Admin\TipoUserController@edit')->name('Admin/TipoUsuarios/Editar/');
		Route::post('Admin/TipoUsuarios/Editar/{id}', 'Admin\TipoUserController@update');
		//Desactivar tipo de usuario
		Route::get('Admin/TipoUsuarios/Borrar/{id}', 'Admin\TipoUserController@delete')->name('Admin/TipoUsuarios/Borrar/');
		//Activar tipo de usuario
		Route::get('Admin/TipoUsuarios/Activar/{id}', 'Admin\TipoUserController@activate')->name('Admin/TipoUsuarios/Activar/');
 

		//Registro de tipo de negocio
		Route::get('Admin/TipoNegocio/Registro', 'Admin\TipoNegocioController@showRegistrationForm')->name('Admin/TipoNegocio/Registro');
		Route::post('Admin/TipoNegocio/Registro', 'Admin\TipoNegocioController@store');
		//Mostrar tipo de negocio index
		Route::get('Admin/TipoNegocio', 'Admin\TipoNegocioController@index')->name('Admin/TipoNegocio');
		//Mostrar info tipo de negocio
		Route::get('Admin/TipoNegocio/{id}', 'Admin\TipoNegocioController@show')->name('Admin/TipoNegocio/');
		//Editar info tipo de usuario
		Route::get('Admin/TipoNegocio/Editar/{id}', 'Admin\TipoNegocioController@edit')->name('Admin/TipoNegocio/Editar/');
		Route::post('Admin/TipoNegocio/Editar/{id}', 'Admin\TipoNegocioController@update');
		//Desactivar tipo de negocio
		Route::get('Admin/TipoNegocio/Borrar/{id}', 'Admin\TipoNegocioController@delete')->name('Admin/TipoNegocio/Borrar/');
		//Activar tipo de negocio
		Route::get('Admin/TipoNegocio/Activar/{id}', 'Admin\TipoNegocioController@activate')->name('Admin/TipoNegocio/Activar/');


		//Registro de estatus
		Route::get('Admin/Estatus/Registro', 'Admin\EstatusController@showRegistrationForm')->name('Admin/Estatus/Registro');
		Route::post('Admin/Estatus/Registro', 'Admin\EstatusController@store');
		//Mostrar estatus index
		Route::get('Admin/Estatus', 'Admin\EstatusController@index')->name('Admin/Estatus');
		//Mostrar info tipo de usuario
		Route::get('Admin/Estatus/{id}', 'Admin\EstatusController@show')->name('Admin/Estatus/');
		//Editar info tipo de usuario
		Route::get('Admin/Estatus/Editar/{id}', 'Admin\EstatusController@edit')->name('Admin/Estatus/Editar/');
		Route::post('Admin/Estatus/Editar/{id}', 'Admin\EstatusController@update');
		//Desactivar estatus
		Route::get('Admin/Estatus/Borrar/{id}', 'Admin\EstatusController@delete')->name('Admin/Estatus/Borrar/');
		//Activar estatus
		Route::get('Admin/Estatus/Activar/{id}', 'Admin\EstatusController@activate')->name('Admin/Estatus/Activar/');

		//Editar contraseña administrador
		Route::get('Admin/Contraseña/Editar/', 'Admin\CambioPasswordController@edit')->name('Admin/Contraseña/Editar/');
		Route::post('Admin/Contraseña/Editar/', 'Admin\CambioPasswordController@update');


		//Facturas
		Route::get('Admin/Facturas/Todas', 'Admin\FacturasController@showTodasFacturas')->name('Admin/Facturas/Todas');
		Route::get('Admin/Negocios/Facturas', 'Admin\FacturasController@showNegocios')->name('Admin/Negocios/Facturas');
		Route::get('Admin/Negocios/Facturas/{id}', 'Admin\FacturasController@showFacturasNegocio')->name('Admin/Negocios/Facturas/');
	});	
	//Actualización datos administradores
	Route::get('Admin/MisDatos', 'Admin\AdminController@editinfo')->name('Admin/MisDatos');
	Route::post('Admin/MisDatos', 'Admin\AdminController@updateinfo');
});

//Redireccion
Route::get('/home', 'HomeController@index')->name('home');

//Redireccion info
Route::get('/info', 'InfoController@info')->name('home');

//Buscar municipios
Route::get('/getmunicipios/', 'MunicipiosController@getmunicipios')->name("/getmunicipios");

//Buscar municipios
Route::get('/getmunicipios2/', 'MunicipiosController@getmunicipios2')->name("/getmunicipios2");


