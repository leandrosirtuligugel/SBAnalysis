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
    return view('auth.login');
});
Route::get('/login','Auth\LoginController@getLogin');
Route::post('/login','Auth\LoginController@postLogin');
Route::get('/logout','Auth\LoginController@getLogout');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('confirmacao/conta/{token}',['as' => 'confirmacao.conta', 'uses' => 'UsuariosController@confirmacaoConta']);
Route::post('confirmacao/active',['as' => 'confirmacao.active', 'uses' => 'UsuariosController@active']);

Route::group(['prefix' => 'admin', 'where' => ['id' => '[0-9]+'] , 'middleware' => 'auth'], function(){
    Route::get('/', ['as' => 'admin', 'uses' => 'UsuariosController@create']);
    Route::group(['prefix' => 'usuarios'], function(){
        Route::get('/',['as' => 'usuarios', 'uses' => 'UsuariosController@index']);
        Route::post('/',['as' => 'usuarios.store', 'uses' =>'UsuariosController@store']);
        Route::get('create',['as' => 'usuarios.create', 'uses' => 'UsuariosController@create']);
        Route::get('{id}/destroy',['as' => 'usuarios.destroy', 'uses' => 'UsuariosController@destroy']);
        Route::get('{id}/edit',['as' => 'usuarios.edit', 'uses' => 'UsuariosController@edit']);
        Route::put('{id}/update',['as' => 'usuarios.update', 'uses' => 'UsuariosController@update']);
    });
});