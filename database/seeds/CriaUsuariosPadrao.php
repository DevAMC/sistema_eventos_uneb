<?php

use Illuminate\Database\Seeder;

class CriaUsuariosPadrao extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Meirinaldo",
            'email' => 'meirinaldo.junior@adventistas.org',
            'password' => bcrypt('uneb'),
        ]);
        DB::table('users')->insert([
            'name' => "Cláudio",
            'email' => 'claudio.marques@adventistas.org',
            'password' => bcrypt('uneb'),
        ]);
    }
}
