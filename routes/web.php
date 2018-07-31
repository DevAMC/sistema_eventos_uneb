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

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

//Rotas home
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/validacao', 'ValidacaoController@valida');
Route::get('/estatisticas', 'ValidacaoController@receber_estatisticas');

//Rotas sorteio
Route::get('/sorteios', 'SorteioController@view');


//Rotas Label Evento
Route::get('/selecionaLabelEvento', 'ConfiguraLabelEvento@configuraLabelView');
Route::get('/selecionaLabelEvento/{id_label}/{id_evento}', 'ConfiguraLabelEvento@configuraLabel');
Route::post('/criaLabelEvento', 'ConfiguraLabelEvento@criaLabel');

