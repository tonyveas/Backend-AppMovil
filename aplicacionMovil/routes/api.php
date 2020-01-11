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

Route::post('registrarmascota','MascotaController@registrarMascota');
Route::get('allmascotas','MascotaController@get_all_mascotas');
Route::get('mascotasperdidas','MascotaController@getMascotasPerdidas');
Route::get('mascotasadopcion','MascotaController@getMascotasAdopcion');
Route::get('alltipos','TipoMascotaController@get_all_tipos');
Route::get('allrazas','RazaMascotaController@get_all_razas');
Route::get('allusuarios','UsuarioController@get_all_usuarios');
Route::put('reportarperdida','MascotaController@ReportMascotaPerdida');
Route::post('login','UsuarioController@login');