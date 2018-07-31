<?php

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

Route::get('/', 'HomeController@index');

Auth::routes();

//views
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/selecionaLabelEvento', 'ConfiguraLabelEvento@configuraLabelView');

//Seleciona Label Evento
Route::get('/selecionaLabelEvento/{id}', 'ConfiguraLabelEvento@configuraLabel');


//rotas de retorno JSON
Route::post('/validacao', 'ValidacaoController@valida');
