<?php

use Illuminate\Database\Seeder;

class CriaEventoModelo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('eventos')->insert([
            'evento' => "Evento modelo",
        ]);
    }
}
