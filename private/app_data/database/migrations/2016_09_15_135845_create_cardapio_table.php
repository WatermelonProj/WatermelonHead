<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardapioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardapio', function (Blueprint $table) {
            $table->increments('idCardapio');
            $table->integer('idFEtaria')->unsigned();
            $table->integer('idUsuario')->unsigned();
            $table->timestamps();
            $table->foreign('idFEtaria')->references("idFEtaria")->on("faixaEtaria");
            $table->foreign('idUsuario')->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cardapio');
    }
}
