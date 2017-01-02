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
            $table->integer('idCardapioRefeicao')->unsigned();
            $table->index(['idReceita','idCardapioRefeicao']);
            $table->foreign('idReceita')->references('idReceita')->on('receita');
            $table->foreign('idCardapioRefeicao')->references('idCardapioRefeicao')->on('cardapio_refeicao');
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
        Schema::dropIfExists('receita_refeicao');
    }
}
