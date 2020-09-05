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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/reservas/home/show/{hotel}',['as'=>'reservas.home.show','uses'=>'HomeController@show']);


Auth::routes();
Route::get('/admin/usuario/adicionar', ['as'=>'admin.usuario.adicionar','uses'=>'UserController@showAdminRegistrationForm']);
Route::post('/admin/usuario/salvar',['as'=>'admin.usuario.salvar','uses'=>'UserController@store']);

Route::get('/gerencia/home', ['as' => 'gerencia.home', 'uses' => 'HomeController@gerencia'])->middleware('check_user_role:' . \App\Role\UserRole::ROLE_GERENTE);
Route::get('/hospede/home', ['as' => 'gerencia.hospede', 'uses' => 'HomeController@hospede']);

Route::group(['prefix' => 'gerencia/hoteis','middleware'=> ['auth','check_user_role:' . \App\Role\UserRole::ROLE_GERENTE]],function(){
    Route::get('/',['as'=>'gerencia.hotel','uses'=>'HotelController@index']);
    Route::get('/adicionar',['as'=>'gerencia.hotel.adicionar','uses'=>'HotelController@create']);
    Route::post('/salvar',['as'=>'gerencia.hotel.salvar','uses'=>'HotelController@store']);
    Route::get('/editar/{id}',['as'=>'gerencia.hotel.editar','uses'=>'HotelController@edit']);
    Route::put('/atualizar/{id}',['as'=>'gerencia.hotel.atualizar','uses'=>'HotelController@update']);
    Route::get('/deletar/{id}',['as'=>'gerencia.hotel.deletar','uses'=>'HotelController@destroy']);
});

Route::group(['middleware'=>'auth'],function(){
    Route::get('/reservas/pessoa',['as'=>'reservas.pessoa','uses'=>'PessoaController@index']);
    Route::get('/reservas/pessoa/adicionar',['as'=>'reservas.pessoa.adicionar','uses'=>'PessoaController@create']);
    Route::post('/reservas/pessoa/salvar',['as'=>'reservas.pessoa.salvar','uses'=>'PessoaController@store']);
    Route::get('/reservas/pessoa/editar/{pessoa}',['as'=>'reservas.pessoa.editar','uses'=>'PessoaController@edit']);
    Route::put('/reservas/pessoa/atualizar/{pessoa}',['as'=>'reservas.pessoa.atualizar','uses'=>'PessoaController@update']);
    Route::get('/reservas/pessoa/deletar/{pessoa}',['as'=>'reservas.pessoa.deletar','uses'=>'PessoaController@destroy']);
});
