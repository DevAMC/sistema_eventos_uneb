<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSorteadoTabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sorteado_tabs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_participante');
            $table->integer('id_evento_label')->unsigned();
            $table->integer('id_sorteio_label')->unsigned()->nullable()->default(null);
            $table->timestamps();

            $table->foreign('id_participante')->on('participantes')->references('identificador')->onDelete('cascade');
            $table->foreign('id_evento_label')->on('evento_labels')->references('id')->onDelete('cascade');
            $table->foreign('id_sorteio_label')->on('sorteio_labels')->references('id')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sorteado_tabs');
    }
}
