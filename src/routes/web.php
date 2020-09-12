<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/gerencia/home', ['as' => 'gerencia.home', 'uses' => 'HomeController@gerencia'])->middleware('check_user_role:' . \App\Role\UserRole::ROLE_GERENTE);

Route::prefix('/gerencia/hotel')->middleware('auth', 'check_user_role:' . \App\Role\UserRole::ROLE_GERENTE)->group(function() {
    Route::get('/', ['as' => 'gerencia.hotel', 'uses' => 'HotelController@index']);
    Route::get('/adicionar', ['as' => 'gerencia.hotel.adicionar', 'uses' => 'HotelController@create']);
    Route::post('/salvar', ['as' => 'gerencia.hotel.salvar', 'uses' => 'HotelController@store']);
    Route::get('/editar/{id}', ['as' => 'gerencia.hotel.editar', 'uses' => 'HotelController@edit']);
    Route::put('/atualizar/{id}', ['as' => 'gerencia.hotel.atualizar', 'uses' => 'HotelController@update']);
    Route::get('/deletar/{id}', ['as' => 'gerencia.hotel.deletar', 'uses' => 'HotelController@destroy']);
});
Route::prefix('/gerencia/hotel/quarto')->middleware('auth', 'check_user_role:' . \App\Role\UserRole::ROLE_GERENTE)->group(function() {
    Route::get('/{id}', ['as' => 'gerencia.hotel.quarto', 'uses' => 'HotelQuartoController@index']);
    Route::get('/adicionar/{id}', ['as' => 'gerencia.hotel.quarto.adicionar', 'uses' => 'HotelQuartoController@create']);
    Route::post('/salvar/{id}', ['as' => 'gerencia.hotel.quarto.salvar', 'uses' => 'HotelQuartoController@store']);
    Route::get('/editar/{id}', ['as' => 'gerencia.hotel.quarto.editar', 'uses' => 'HotelQuartoController@edit']);
    Route::put('/atualizar/{id}', ['as' => 'gerencia.hotel.quarto.atualizar', 'uses' => 'HotelQuartoController@update']);
    Route::get('/deletar/{id}', ['as' => 'gerencia.hotel.quarto.deletar', 'uses' => 'HotelQuartoController@destroy']);
});

Route::prefix('/gerencia/categoria')->middleware('auth', 'check_user_role:' . \App\Role\UserRole::ROLE_GERENTE)->group(function() {
    Route::get('/', ['as' => 'gerencia.categoria', 'uses' => 'CategoriaController@index']);
    Route::get('/adicionar', ['as' => 'gerencia.categoria.adicionar', 'uses' => 'CategoriaController@create']);
    Route::post('/salvar', ['as' => 'gerencia.categoria.salvar', 'uses' => 'CategoriaController@store']);
    Route::get('/editar/{id}', ['as' => 'gerencia.categoria.editar', 'uses' => 'CategoriaController@edit']);
    Route::put('/atualizar/{id}', ['as' => 'gerencia.categoria.atualizar', 'uses' => 'CategoriaController@update']);
    Route::get('/deletar/{id}', ['as' => 'gerencia.categoria.deletar', 'uses' => 'CategoriaController@destroy']);
});

Route::prefix('/gerencia/quarto')->middleware('auth', 'check_user_role:' . \App\Role\UserRole::ROLE_GERENTE)->group(function() {
    Route::get('/', ['as' => 'gerencia.quarto', 'uses' => 'QuartoController@index']);
    Route::get('/adicionar', ['as' => 'gerencia.quarto.adicionar', 'uses' => 'QuartoController@create']);
    Route::post('/salvar', ['as' => 'gerencia.quarto.salvar', 'uses' => 'QuartoController@store']);
    Route::get('/editar/{id}', ['as' => 'gerencia.quarto.editar', 'uses' => 'QuartoController@edit']);
    Route::put('/atualizar/{id}', ['as' => 'gerencia.quarto.atualizar', 'uses' => 'QuartoController@update']);
    Route::get('/deletar/{id}', ['as' => 'gerencia.quarto.deletar', 'uses' => 'QuartoController@destroy']);
});

Route::prefix('/gerencia/hospede')->middleware('auth', 'check_user_role:' . \App\Role\UserRole::ROLE_GERENTE)->group(function() {
    Route::get('/', ['as' => 'gerencia.hospede', 'uses' => 'HospedeController@index']);
    Route::get('/adicionar', ['as' => 'gerencia.hospede.adicionar', 'uses' => 'HospedeController@create']);
    Route::post('/salvar', ['as' => 'gerencia.hospede.salvar', 'uses' => 'HospedeController@store']);
    Route::get('/editar/{id}', ['as' => 'gerencia.hospede.editar', 'uses' => 'HospedeController@edit']);
    Route::put('/atualizar/{id}', ['as' => 'gerencia.hospede.atualizar', 'uses' => 'HospedeController@update']);
    Route::get('/deletar/{id}', ['as' => 'gerencia.hospede.deletar', 'uses' => 'HospedeController@destroy']);
});

Route::prefix('/gerencia/reserva')->middleware('auth', 'check_user_role:' . \App\Role\UserRole::ROLE_GERENTE)->group(function() {
    Route::get('/', ['as' => 'gerencia.reserva', 'uses' => 'ReservaController@index']);
    Route::get('/adicionar', ['as' => 'gerencia.reserva.adicionar', 'uses' => 'ReservaController@create']);
    Route::post('/salvar', ['as' => 'gerencia.reserva.salvar', 'uses' => 'ReservaController@store']);
    Route::get('/editar/{id}', ['as' => 'gerencia.reserva.editar', 'uses' => 'ReservaController@edit']);
    Route::put('/atualizar/{id}', ['as' => 'gerencia.reserva.atualizar', 'uses' => 'ReservaController@update']);
    Route::get('/deletar/{id}', ['as' => 'gerencia.reserva.deletar', 'uses' => 'ReservaController@destroy']);
});

Route::prefix('/hospede/reserva')->middleware('auth', 'check_user_role:' . \App\Role\UserRole::ROLE_HOSPEDE)->group(function() {
    Route::get('/', ['as' => 'hospede.reserva', 'uses' => 'ReservaHospedeController@index']);
    Route::get('/adicionar', ['as' => 'hospede.reserva.adicionar', 'uses' => 'ReservaHospedeController@create']);
    Route::post('/salvar', ['as' => 'hospede.reserva.salvar', 'uses' => 'ReservaHospedeController@store']);
    Route::get('/ver/{id}', ['as' => 'hospede.reserva.ver', 'uses' => 'ReservaHospedeController@show']);
});
