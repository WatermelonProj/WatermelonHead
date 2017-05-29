<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceitaPorcao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receita_porcao', function (Blueprint $table) {
            $table->integer('idTipoPorcao')->unsigned();
            $table->integer('idReceita')->unsigned();
            $table->integer('idFEtaria')->unsigned()->nullable();
            $table->float('qtde');
            $table->index(['idTipoPorcao', 'idReceita', 'idFEtaria']);
        });

        Schema::table('receita_porcao', function ($table) {
            $table->foreign('idTipoPorcao')->references('idTipoPorcao')->on('tipo_porcao')->onDelete('cascade');
            $table->foreign('idReceita')->references('idReceita')->on('receita')->onDelete('cascade');
            $table->foreign('idFEtaria')->references('idFEtaria')->on('faixaEtaria')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('receita_porcao');
    }
}
