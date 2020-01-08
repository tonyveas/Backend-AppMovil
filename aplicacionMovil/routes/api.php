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

Route::post('mascota','MascotaController@registrarMascota');
Route::get('mascotas','MascotaController@get_all_mascotas');
Route::get('tipos','TipoMascotaController@get_all_tipos');
Route::get('razas','RazaMascotaController@get_all_razas');
Route::get('usuarios','UsuarioController@get_all_usuarios');
Route::put('estadomascota','MascotaController@changeStateMascota');
Route::post('login','UsuarioController@login');