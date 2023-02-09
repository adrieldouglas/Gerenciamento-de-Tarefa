<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great
|
*/

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function(){

	/* FORMULÁRIO DE LOGIN */
	Route::get('/', 'AuthController@showLoginForm')->name('login');
	Route::post('login', 'AuthController@login')->name('login.do');

	/* ROTAS PROTEGIDAS */
	Route::group(['middleware' => ['auth']], function() {

		/* ROTAS DASHBOARD */
		Route::get('home', 'AuthController@home')->name('home');

		/* ROTAS USUÁRIOS */
		Route::get('usuarios', 'UsuarioController@index')->name('usuarios.index');
		Route::get('usuarios/create', 'UsuarioController@create')->name('usuarios.create');
		Route::post('usuarios/store', 'UsuarioController@store')->name('usuarios.store');
		Route::get('usuarios/edit/{id}', 'UsuarioController@edit')->name('usuarios.edit');
		Route::put('usuarios/update/{id}', 'UsuarioController@update')->name('usuarios.update');
		Route::delete('usuarios/destroy/{id}', 'UsuarioController@destroy')->name('usuarios.destroy');

		/* ROTAS TAREFAS */
		Route::get('tarefas', 'TarefaController@index')->name('tarefas.index');
		Route::get('tarefas/create', 'TarefaController@create')->name('tarefas.create');
		Route::post('tarefas/store', 'TarefaController@store')->name('tarefas.store');
		Route::get('tarefas/edit/{id}', 'TarefaController@edit')->name('tarefas.edit');
		Route::put('tarefas/update/{id}', 'TarefaController@update')->name('tarefas.update');
		Route::delete('tarefas/destroy/{id}', 'TarefaController@destroy')->name('tarefas.destroy');

	});

	/* LOGOUT */
	Route::get('logout', 'AuthController@logout')->name('logout');
});
