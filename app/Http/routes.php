<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    return view('welcome');
});

Route::post('login','UsuarioController@loginEspol');

Route::get('nuevo','NuevoDocController@indexNuevoDoc');

Route::get('principal', 'UsuarioController@index');

Route::get('compartidos','CompartidosController@indexCompartidos');

Route::get('perfil','UsuarioController@indexPerfil');

Route::get('logout','UsuarioController@logout');

Route::post('registro','UsuarioController@guardar');

Route::post('newDoc', 'DocumentoController@crearDoc');

Route::post('loadDocum', 'DocumentoController@cargarDoc');

Route::post('modDocum', 'DocumentoController@modificarDoc');

Route::get('CargarDocDesdePrincipal','DocumentoController@cargarDesdePrincipal');

Route::get('CargarDocDesdePrincipalComp','DocumentoController@cargarDesdePrincipalComp');

Route ::get('BorrarDoc','DocumentoController@eliminarDoc');

Route::get('/lfmember','CompartidosController@search');

Route::get('/addmember','CompartidosController@store');

Route::post('/CompartirDocu','CompartidosController@store');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
