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
Route::get('/sorteios/sortear', 'SorteioController@sortear');

//Rotas relatório
Route::get('/relatorios', 'RelatorioController@view');

//Rotas cadastro
Route::get('/cadastros/participantes', 'CadastroController@view_participantes');
Route::get('/cadastros/eventos', 'CadastroController@view_eventos');
Route::post('/cadastros/eventos', 'CadastroController@cadastra_evento');
Route::post('/cadastros/participantes', 'CadastroController@cadastra_participante');

//Rotas Label Evento
Route::get('/selecionaLabelEvento', 'ConfiguraLabelEvento@configuraLabelView');
Route::get('/selecionaLabelEvento/{id_label}/{id_evento}', 'ConfiguraLabelEvento@configuraLabel');
Route::post('/criaLabelEvento', 'ConfiguraLabelEvento@criaLabel');

