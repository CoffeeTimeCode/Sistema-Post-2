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
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/painel','Admin\PainelController@index');
    Route::get('/categorias','Admin\CategoriasController@index');
    Route::post('/categorias','Admin\CategoriasController@store');

    Route::get('/categorias/editar/{id}','admin\CategoriasController@edit');
    Route::post('/categorias/salvar-alteracao/{id}','Admin\CategoriasController@update');

    Route::get('/categorias/deletar/{id}','Admin\CategoriasController@destroy');

    Route::get('/criar-post','Admin\PostsController@create');
 });
