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

//Rota padrão da raiz
Route::get('/', function () {
    return redirect('/home');
});

//Rotas de autenticação
 // Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//Rotas home
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/validacao', 'ValidacaoController@valida');
Route::get('/estatisticas', 'ValidacaoController@receber_estatisticas');

//Rotas sorteio
Route::get('/sorteios/acao/porlabels', 'SorteioController@sortear');
Route::get('/sorteios/acao/todos', 'SorteioController@sortear_todos_participantes');
Route::get('/sorteios/porlabels', 'SorteioController@view_sorteio_labels');
Route::get('/sorteios/todos', 'SorteioController@view_sorteio_todos');

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

