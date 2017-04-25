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
            $table->float('qtde');
            $table->index(['idTipoPorcao', 'idReceita']);
            $table->foreign('idTipoPorcao')->references('idTipoPorcao')->on('tipo_porcao')->onDelete('cascade');
            $table->foreign('idReceita')->references('idReceita')->on('receita')->onDelete('cascade');
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
