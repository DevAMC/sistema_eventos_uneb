<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CriaUsuariosPadrao::class);
        $this->call(CriaEventoModelo::class);
        $this->call(CriaLabelsEventoModelo::class);
        $this->call(CriaParticipanteModelo::class);
    }
}
