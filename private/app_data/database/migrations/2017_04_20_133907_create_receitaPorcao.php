<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->integer('idReceita')->unsingned()->nullable();
            $table->integer('idTipoPorcao')->unsigned()->nullable();
            $table->integer('qtde');
            $table->index(['idReceita','idTipoPorcao']);
            $table->foreign('idReceita')->references('idReceita')->on('receita')->onDelete('cascade');
            $table->foreign('idTipoPorcao')->references('idTipoPorcao')->on('tipo_porcao')->onDelete('cascade');
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
