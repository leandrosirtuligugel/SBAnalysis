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

Route::get('/', function () {

    if(Auth::check()){
        return redirect()->to('/admin/dashboard');
    }


    return view('auth.login');
});
Route::get('/login','Auth\LoginController@getLogin');
Route::post('/login','Auth\LoginController@postLogin');
Route::get('/logout','Auth\LoginController@getLogout');

Route::controllers([
    'password' => 'Auth\PasswordController',
]);

Route::get('confirmacao/conta/{token}',['as' => 'confirmacao.conta', 'uses' => 'UsuariosController@confirmacaoConta']);
Route::post('confirmacao/active',['as' => 'confirmacao.active', 'uses' => 'UsuariosController@active']);

Route::group(['prefix' => 'admin', 'where' => ['id' => '[0-9]+'] , 'middleware' => 'auth'], function(){
    Route::get('/', ['as' => 'admin', 'uses' => 'DashboardController@index']);
    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

    Route::group(['prefix' => 'usuarios'], function(){
        Route::get('/',['as' => 'usuarios', 'uses' => 'UsuariosController@index']);
        Route::post('/',['as' => 'usuarios.store', 'uses' =>'UsuariosController@store']);
        Route::get('create',['as' => 'usuarios.create', 'uses' => 'UsuariosController@create']);
    });

    Route::group(['prefix' => 'gestores'], function(){
        Route::get('/',['as' => 'gestores', 'uses' => 'GestoresController@index']);
        Route::post('/',['as' => 'gestores.store', 'uses' =>'GestoresController@store']);
        Route::get('create',['as' => 'gestores.create', 'uses' => 'GestoresController@create']);
        Route::get('{id}/delete',['as' => 'gestores.delete', 'uses' => 'GestoresController@delete']);
        Route::delete('{id}/destroy',['as' => 'gestores.destroy', 'uses' => 'GestoresController@destroy']);
        Route::get('{id}/edit',['as' => 'gestores.edit', 'uses' => 'GestoresController@edit']);
        Route::put('{id}/update',['as' => 'gestores.update', 'uses' => 'GestoresController@update']);
    });
    Route::group(['prefix' => 'clientes'], function(){
        Route::get('/',['as' => 'clientes', 'uses' => 'ClientesController@index']);
        Route::post('/',['as' => 'clientes.store', 'uses' =>'ClientesController@store']);
        Route::get('create',['as' => 'clientes.create', 'uses' => 'ClientesController@create']);
        Route::get('{id}/delete',['as' => 'clientes.delete', 'uses' => 'ClientesController@delete']);
        Route::delete('{id}/destroy',['as' => 'clientes.destroy', 'uses' => 'ClientesController@destroy']);
        Route::get('{id}/edit',['as' => 'clientes.edit', 'uses' => 'ClientesController@edit']);
        Route::put('{id}/update',['as' => 'clientes.update', 'uses' => 'ClientesController@update']);
    });
});