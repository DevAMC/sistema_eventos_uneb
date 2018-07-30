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
    }
}
