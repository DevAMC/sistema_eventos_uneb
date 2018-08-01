<?php

use Illuminate\Database\Seeder;

class CriaParticipanteModelo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('participantes')->insert([
            'identificador' => "1",
            'nome' => "José da Silva",
            'campo' => "UNeB",
            'id_evento' => 1,
        ]);
        DB::table('participantes')->insert([
            'identificador' => "2",
            'nome' => "Maria da Silva",
            'campo' => "UNeB",
            'id_evento' => 1,
        ]);
        DB::table('participantes')->insert([
            'identificador' => "3",
            'nome' => "Josefa da Silva",
            'campo' => "UNeB",
            'id_evento' => 1,
        ]);
        DB::table('participantes')->insert([
            'identificador' => "4",
            'nome' => "João da Silva",
            'campo' => "UNeB",
            'id_evento' => 1,
        ]);
    }
}
