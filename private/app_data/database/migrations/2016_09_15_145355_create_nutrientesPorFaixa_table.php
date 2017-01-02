<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNutrientesPorFaixaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutrientesPorFaixa', function (Blueprint $table) {
            $table->integer('idFEtaria')->unsigned();
            $table->integer('idNutriente')->unsigned();
            $table->float('qtdeMin');
            $table->float('qdteMax')->nullable();
            $table->index(['idFEtaria','idNutriente']);
            $table->foreign('idFEtaria')->references('idFEtaria')->on('faixaEtaria');
            $table->foreign('idNutriente')->references('idNutriente')->on('nutriente');
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
        Schema::dropIfExists('nutrientesPorFaixa');
    }
}
