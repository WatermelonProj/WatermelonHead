<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNutrienteAlimentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutrienteAlimento', function (Blueprint $table) {
          $table->integer('idNutriente')->unsigned();
          $table->integer('idAlimento')->unsigned();
          $table->string('qtde');
          $table->index(['idNutriente','idAlimento']);
          $table->foreign('idNutriente')->references('idNutriente')->on('nutriente')->onDelete('cascade');
          $table->foreign('idAlimento')->references('idAlimento')->on('alimento')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nutrienteAlimento');
    }
}
