<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceitaRefeicaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receita_refeicao', function (Blueprint $table) {
            $table->integer('idReceita')->unsigned();
            $table->integer('idRefeicao')->unsigned();
            $table->index(['idReceita','idRefeicao']);
            $table->foreign('idReceita')->references('idReceita')->on('receita')->onDelete('cascade');
            $table->foreign('idRefeicao')->references('idRefeicao')->on('refeicao')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receita_refeicao');
    }
}
