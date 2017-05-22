<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlimentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alimento', function (Blueprint $table) {
            $table->increments('idAlimento');
            $table->boolean('ativoAlimento')->default(1);
            $table->integer('idGAlimentar')->unsigned()->nullable();
            $table->integer('idGPiramide')->unsigned()->nullable();
            $table->string('descricaoAlimento');
            $table->integer('idTACO')->nullable();

            $table->foreign('idGAlimentar')->references('idGAlimentar')->on('grupoAlimentar')->onDelete('cascade');
            $table->foreign('idGPiramide')->references('idGPiramide')->on('grupoPiramide')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alimento');
    }
}
