<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receita', function (Blueprint $table) {
            $table->increments('idReceita');
            $table->string('nomeReceita');
            $table->text('preparoReceita');
            $table->boolean('ativoReceita');
            $table->timestamps();
            $table->integer('idUsuario')->unsigned();
            $table->foreign('idUsuario')->references('id')->on("users")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receita');
    }
}
