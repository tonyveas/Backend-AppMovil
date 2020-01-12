<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});








/*API Usuario*/
Route::post('login','UsuarioController@login');
Route::get('allusuarios','UsuarioController@get_all_usuarios');

/*API RazaMascota*/
Route::get('allrazas','RazaMascotaController@get_all_razas');

/* API TipoMascota*/
Route::get('alltipos','TipoMascotaController@get_all_tipos');


/*Api Mascota*/
Route::get('/consultarMascotas','MascotaController@consultarMascotas');
Route::get('/consultarMascotaPorId','MascotaController@consultarMascotaPorId');
Route::get('/consultarMisMascotas','MascotaController@consultarMisMascotas');
Route::put('/registrarAdopcion','MascotaController@registrarAdopcion');
Route::put('/realizarAdopcion','MascotaController@realizarAdopcion');
Route::post('registrarMascota','MascotaController@registrarMascota');
Route::get('allmascotas','MascotaController@get_all_mascotas');
Route::get('consultarPerdidas','MascotaController@consultarPerdidas');
Route::get('consultarAdopciones','MascotaController@consultarAdopciones');
Route::put('reportarMascotaPerdida ','MascotaController@ReportarMascotaPerdida');