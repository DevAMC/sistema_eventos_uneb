<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresencasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presencas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_participante')->unsigned();
            $table->integer('id_label_evento')->unsigned();
            $table->timestamps();

            $table->foreign('id_participante')->on('participantes')->references('id')->onDelete('cascade');
            $table->foreign('id_label_evento')->on('evento_labels')->references('id')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presencas');
    }
}
