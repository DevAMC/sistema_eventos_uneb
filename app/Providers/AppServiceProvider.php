<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        //Ajuste erro de tamanho do string padrão
        Schema::defaultStringLength(191);

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add('MENU PRINCIPAL');
            $event->menu->add([
                'text' => 'Inicial',
                'url' => '/home',
                'icon' => 'home'
            ]);
            $event->menu->add([
                'text' => 'Cadastros',
                'url' => '#',
                'icon' => 'clipboard',
                'submenu' => [
                [
                    'text' => 'Participantes',
                    'icon' => 'users',
                    'url' => '/cadastros/participantes',
                ],
                [
                    'text' => 'Eventos',
                    'icon' => 'calendar',
                    'url' => '/cadastros/eventos',
                ],
            ],
            ]);
            $event->menu->add([
                'text' => 'Relatórios',
                'url' => '/relatorios',
                'icon' => 'list-ol'

            ]);
            $event->menu->add([
                'text' => 'Sorteio',
                'url' => '/sorteios',
                'icon' => 'columns',
                'submenu' => [
                    [
                        'text' => 'Sorteio por label',
                        'icon' => 'refresh',
                        'url' => '/sorteios/porlabels',
                    ],
                    [
                        'text' => 'Sorteio todos os participantes',
                        'icon' => 'refresh',
                        'url' => '/sorteios/todos',
                    ],
                ]

            ]);
            // $event->menu->add([
            //     'text' => 'Configurações',
            //     'url' => '/configuracoes',
            //     'icon' => 'cogs'

            // ]);
            // $event->menu->add([
            //     'text' => 'Apresentação',
            //     'url' => '/apresentacao',
            //     'icon' => 'desktop'

            // ]);

            $event->menu->add([
                'text' => 'Mudar Label Evento',
                'url' => '/selecionaLabelEvento',
                'icon' => 'exchange'

            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
