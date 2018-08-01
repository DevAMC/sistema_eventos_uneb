<?php

use Illuminate\Foundation\Inspiring;
use App\User;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

//Executa comando para criação de usuários
Artisan::command('CriarUsuario', function () {
    $this->info('========= CRIAR USUÁRIO =========');
    $nome = $this->ask('qual o nome??');
    $email = $this->ask('qual o email??');
    $senha = $this->secret('Qual a senha? (os caracteres ficarão ocultos)');

    if($usuario = User::create(['name' => $nome, 'email' => $email, 'password' => bcrypt($senha)])){
        $this->info('Criado com sucesso :)');
    }else{
        $this->error('Erro ao inserir usuário!');
    }
});
