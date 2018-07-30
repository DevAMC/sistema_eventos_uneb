<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento_labels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_evento')->unsigned();
            $table->string('label');
            $table->timestamps();

            $table->foreign('id_evento')->on('eventos')->references('id')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evento_labels');
    }
}
