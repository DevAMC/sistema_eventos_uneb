<?php

use Illuminate\Database\Seeder;

class CriaLabelsEventoModelo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('evento_labels')->insert([
            'label' => "Sexta-feira 01/02",
            'id_evento' => 1,
        ]);
    }
}
