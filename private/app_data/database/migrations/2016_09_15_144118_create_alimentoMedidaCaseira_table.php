<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlimentoMedidaCaseiraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alimento_medidaCaseira', function (Blueprint $table) {
            $table->integer('idAlimento')->unsigned();
            $table->integer('idTMCaseira')->unsigned();
            $table->integer('tipoUnidade')->unsigned();
            $table->float('qtde');
            $table->index(['idAlimento','idTMCaseira']);
            $table->foreign('idAlimento')->references('idAlimento')->on('alimento');
            $table->foreign('idTMCaseira')->references('idTMCaseira')->on('tipoMedidaCaseira');
            $table->foreign('tipoUnidade')->references('idUnidade')->on('unidadeMedida');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alimento_medidaCaseira');
    }
}
