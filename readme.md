# Sistema de Eventos - UNeB 🖥📔📆
A Aplicação foi desenvolvida com intuíto de organizar o check-in, sorteios e relatórios de presença em nossos eventos.

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Versão
0.0.1 (Alpha)

## Implementação

 - Após realizar o download da aplicação clicando em **'Clone or Download'**, certifique-se de ter um ambiente Linux, Mac ou Windows rodando com PHP 7.1.2 ou superior e MySQL 5.6 ou superior;
 - Instale o composer (https://getcomposer.org/download/);
 - Abra o terminal e navegue até a pasta do projeto;
 - Execute **'compose install'** para realizar o download das dependências;
 - Duplique o arquivo .env.example renomeando para .env, 
 - Abra o arquivo .env em um edtor de textos de sua preferência; 
 - Altere a flag APP_ENV para 'production';
 - Altere as configurações de host, username e password do MySQL para que a aplicação consiga se conectar com o banco;
 - Execute o comando **'php artisan key:generate'** para gerar uma chave;
 - Finalize a instalação executando o comando **'php artisan migrate'** (este comando é responsável de criar a estrutura de tabelas da aplicação);
 - Para criar um usuário para gerir o sistema, execute o comando **'php artisan CriaUsuario'** na raiz do sistema e informe os dados solicitados.

## Atualização da aplicação

Você pode automatizar a atualização da aplicação instalando o git (https://git-scm.com/downloads) e clonando o repositório com o comando **'git clone https://github.com/devuneb/sistema_eventos_uneb'** e sempre que precisar atualizar a versão, poderá utilizar o comando **'git pull'** na raiz do projeto.
Você também pode automatizar este processo criando um cron ou uma tarefa no windows que faça extamente o processo descrito neste passo.

## Precedimento para importação de participantes via planilha do excel

Por problemas de encodificação e padronização da versão do office, recomendamos converter o arquivo do excel (XLSX ou similiar) para um CSV separados por vírgula e importar na base de dados usando um cliente do MySQL, recomendamos o MySQL Workbench para Windows e Linux e o Sequel Pro para Mac.

## Documentação de uso

Estamos preparando um material para auxilio de uso do sistema;

## Sugestões ou problemas

Sinta-se à vontade para abrir uma issue neste repositório em caso de sugestões ou problemas no sistema;

## Uso com docker

Estamos preparando um ambiente docker.

## Créditos

Esta aplicação é totalmente produzida e mentida pela União Nordeste Brasileira;

## Copywrite

Todos os direitos reservados para União Nordeste Brasileira;
