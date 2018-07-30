<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateControleSorteiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controle_sorteios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_participante');
            $table->integer('id_evento_label')->unsigned();
            $table->integer('id_sorteio_label')->unsigned();

            $table->foreign('id_evento_label')->on('evento_labels')->references('id')->onDelete('cascade');
            $table->foreign('id_sorteio_label')->on('evento_labels')->references('id')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('controle_sorteios');
    }
}
