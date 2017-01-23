<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlimentoReceitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alimento_receita', function (Blueprint $table) {
            $table->integer('idAlimento')->unsigned();
            $table->integer('idReceita')->unsigned();
            $table->integer('unidadeMedida')->unsigned();
            $table->float('qtde');
            $table->index(['idAlimento', 'idReceita', 'unidadeMedida']);
            $table->foreign('idAlimento')->references('idAlimento')->on('alimento')->onDelete('cascade');
            $table->foreign('idReceita')->references('idReceita')->on('receita')->onDelete('cascade');
            $table->foreign('unidadeMedida')->references('idUnidade')->on('unidadeMedida')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alimento_receita');
    }
}
