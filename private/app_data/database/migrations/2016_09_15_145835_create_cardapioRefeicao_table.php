<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardapioRefeicaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardapio_refeicao', function (Blueprint $table) {
            $table->increments('idCardapioRefeicao');
            $table->integer('idCardapio')->unsigned();
            $table->integer('idRefeicao')->unsigned();
            $table->index(['idCardapio','idRefeicao']);
            $table->foreign('idCardapio')->references('idCardapio')->on('cardapio');
            $table->foreign('idRefeicao')->references('idRefeicao')->on('refeicao');
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
        Schema::dropIfExists('cardapio_refeicao');
    }
}
