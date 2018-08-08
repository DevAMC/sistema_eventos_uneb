<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestFuncionamentoApp extends TestCase
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
