<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestApp extends TestCase
{
    /**
     * Faz um teste se a aplicação está rodando na rota base /
     *
     * @return void
     */
    public function TestFuncionamentoApp()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
