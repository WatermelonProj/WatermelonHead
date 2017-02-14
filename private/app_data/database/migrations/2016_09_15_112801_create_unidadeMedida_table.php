<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadeMedidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidadeMedida', function (Blueprint $table) {
            $table->increments('idUnidade');
            $table->string('nomeUnidade');
            $table->string('siglaUnidade',10);
            $table->integer('qtdePadrao');
            $table->boolean('isPadrao');
            $table->smallInteger('grupoMedida');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('unidadeMedida');
    }
}
