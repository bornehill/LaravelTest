<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::post('autentica', 'WelcomeController@autentica');
Route::get('logout', 'WelcomeController@logout');

Route::get('home', 'HomeController@index');
//Route::get('tipoArticulo/{idTipoArticulo?}', function(){ return 'Hola inventario';});

Route::group(array('prefix'=>'admin'), function(){
	Route::group(array('before' => 'admin'), function(){
		Route::get('/', 'Inventarios\AdminController@index');

		Route::get('tipoArticulo/{idTipoArticulo?}', 'Inventarios\TipoArticuloController@catalogoTipoArticulos');
		Route::post('tipoArticulo', 'Inventarios\TipoArticuloController@agregaTipoArticulo');
		Route::get('modificaTipoArticulo/{idTipoArticulo}', 'Inventarios\TipoArticuloController@modificaTipoArticulo');
		Route::post('modificaTipoArticulo/{idTipoArticulo}', 'Inventarios\TipoArticuloController@actualizaTipoArticulo');
		Route::get('eliminaTipoArticulo/{idTipoArticulo}', 'Inventarios\TipoArticuloController@eliminaTipoArticulo');

		Route::get('estatus/{idEstatus?}', 'Inventarios\EstatusController@catalogoEstatus');
		Route::post('estatus', 'Inventarios\EstatusController@agregaEstatus');
		Route::get('modificaEstatus/{idEstatus}', 'Inventarios\EstatusController@modificaEstatus');
		Route::post('modificaEstatus/{idEstatus}', 'Inventarios\EstatusController@actualizaEstatus');
		Route::get('eliminaEstatus/{idEstatus}', 'Inventarios\EstatusController@eliminaEstatus');

		Route::get('pais/{idPais?}', 'Inventarios\PaisController@catalogoPais');
		Route::get('agregarPais', 'Inventarios\PaisController@formularioPais');
		Route::post('agregarPais', 'Inventarios\PaisController@agregaPais');
		Route::get('modificaPais/{idPais}', 'Inventarios\PaisController@modificaPais');
		Route::post('modificaPais/{idPais}', 'Inventarios\PaisController@actualizaPais');
		Route::get('eliminaPais/{idPais}', 'Inventarios\PaisController@eliminaPais');

		Route::get('ciudad/{idCiudad?}', 'Inventarios\CiudadController@catalogoCiudad');
		Route::get('agregarCiudad', 'Inventarios\CiudadController@formularioCiudad');
		Route::post('agregarCiudad', 'Inventarios\CiudadController@agregaCiudad');
		Route::get('modificaCiudad/{idCiudad}', 'Inventarios\CiudadController@modificaCiudad');
		Route::post('modificaCiudad/{idCiudad}', 'Inventarios\CiudadController@actualizaCiudad');
		Route::get('eliminaCiudad/{idCiudad}', 'Inventarios\CiudadController@eliminaCiudad');

		Route::get('sucursal/{idSucursal?}', 'Inventarios\SucursalController@catalogoSucursal');
		Route::get('agregarSucursal/{idPais?}', 'Inventarios\SucursalController@formularioSucursal');
		Route::post('agregarSucursal/{idPais?}', 'Inventarios\SucursalController@agregaSucursal');
		Route::get('modificaSucursal/{idSucursal}/{idPais?}', 'Inventarios\SucursalController@modificaSucursal');
		Route::post('modificaSucursal/{idSucursal}', 'Inventarios\SucursalController@actualizaSucursal');
		Route::get('eliminaSucursal/{idSucursal}', 'Inventarios\SucursalController@eliminaSucursal');

		Route::get('almacen/{idAlmacen?}', 'Inventarios\AlmacenController@catalogoAlmacen');
		Route::get('agregarAlmacen/{idPais?}/{idCiudad?}', 'Inventarios\AlmacenController@formularioAlmacen');
		Route::post('agregarAlmacen/{idPais?}/{idCiudad?}', 'Inventarios\AlmacenController@agregaAlmacen');
		Route::get('modificaAlmacen/{idAlmacen}/{idPais?}/{idCiudad?}', 'Inventarios\AlmacenController@modificaAlmacen');
		Route::post('modificaAlmacen/{idAlmacen}', 'Inventarios\AlmacenController@actualizaAlmacen');
		Route::get('eliminaAlmacen/{idAlmacen}', 'Inventarios\AlmacenController@eliminaAlmacen');

		Route::get('departamento/{idDepartamento?}', 'Inventarios\DepartamentoController@catalogoDepartamento');
		Route::get('agregarDepartamento/{idPais?}/{idCiudad?}', 'Inventarios\DepartamentoController@formularioDepartamento');
		Route::post('agregarDepartamento/{idPais?}/{idCiudad?}', 'Inventarios\DepartamentoController@agregaDepartamento');
		Route::get('modificaDepartamento/{idDepartamento}/{idPais?}/{idCiudad?}', 'Inventarios\DepartamentoController@modificaDepartamento');
		Route::post('modificaDepartamento/{idDepartamento}', 'Inventarios\DepartamentoController@actualizaDepartamento');
		Route::get('eliminaDepartamento/{idDepartamento}', 'Inventarios\DepartamentoController@eliminaDepartamento');

		Route::get('empleado/{idEmpleado?}', 'Inventarios\EmpleadoController@catalogoEmpleado');
		Route::get('agregarEmpleado/{idPais?}/{idCiudad?}/{idSucursal?}', 'Inventarios\EmpleadoController@formularioEmpleado');
		Route::post('agregarEmpleado/{idPais?}/{idCiudad?}/{idSucursal?}', 'Inventarios\EmpleadoController@agregaEmpleado');
		Route::get('modificaEmpleado/{idEmpleado}/{idPais?}/{idCiudad?}/{idSucursal?}', 'Inventarios\EmpleadoController@modificaEmpleado');
		Route::post('modificaEmpleado/{idEmpleado}', 'Inventarios\EmpleadoController@actualizaEmpleado');
		Route::get('eliminaEmpleado/{idEmpleado}', 'Inventarios\EmpleadoController@eliminaEmpleado');

		Route::get('articulo/{buscar?}', 'Inventarios\ArticuloController@index');
		Route::get('agregarArticulo', 'Inventarios\ArticuloController@formularioArticulo');
		Route::post('agregarArticulo', 'Inventarios\ArticuloController@agregaArticulo');
		Route::get('modificaArticulo/{idArticulo}', 'Inventarios\ArticuloController@modificaArticulo');
		Route::post('modificaArticulo/{idArticulo}', 'Inventarios\ArticuloController@actualizaArticulo');
		Route::get('eliminaArticulo/{idArticulo}', 'Inventarios\ArticuloController@eliminaArticulo');
		Route::get('detalleArticulo/{idArticulo}', 'Inventarios\ArticuloController@detalleArticulo');

		Route::get('usuario/{idUsuario?}', 'Inventarios\UsuarioController@catalogoUsuario');
		Route::get('agregarUsuario', 'Inventarios\UsuarioController@formularioUsuario');
		Route::post('agregarUsuario', 'Inventarios\UsuarioController@agregaUsuario');
		Route::get('modificaUsuario/{idUsuario}', 'Inventarios\UsuarioController@modificaUsuario');
		Route::post('modificaUsuario/{idUsuario}', 'Inventarios\UsuarioController@actualizaUsuario');
		Route::get('eliminaUsuario/{idUsuario}', 'Inventarios\UsuarioController@eliminaUsuario');
		Route::get('cambiaPassword/{idUsuario}', 'Inventarios\UsuarioController@cambiaPassword');
		Route::post('actualizaPassword/{idUsuario}', 'Inventarios\UsuarioController@actualizaPassword');

		Route::get('getEmpleadoResguardo/{buscar?}', 'Inventarios\ResguardoController@index');
		Route::get('ConsultaResguardos/{idEmpleado}', 'Inventarios\ResguardoController@consultaResguardos');
		Route::get('asignaResguardo/{idEmpleado}/{buscar?}', 'Inventarios\ResguardoController@asignaResguardo');
		Route::post('asignaResguardo/{idEmpleado}/{idArtiulo}', 'Inventarios\ResguardoController@agregaResguardo');
		Route::get('detalleResguardo/{idResguardo}', 'Inventarios\ResguardoController@detalleResguardo');
		Route::post('detalleResguardo/{idResguardo}', 'Inventarios\ResguardoController@actualizaResguardo');
	});
});


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
