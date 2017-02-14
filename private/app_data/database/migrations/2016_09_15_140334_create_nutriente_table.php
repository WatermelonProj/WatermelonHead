<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNutrienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutriente', function (Blueprint $table) {
            $table->increments('idNutriente');
            $table->string('nomeNutriente');
            $table->string('cientificoNutriente')->nullable();
            $table->integer('unidadeNutriente')->unsigned();
            $table->foreign("unidadeNutriente")->references("idUnidade")->on("unidadeMedida")->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nutriente');
    }
}
