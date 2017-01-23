<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrupoAlimentarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupoAlimentar', function (Blueprint $table) {
            $table->increments('idGAlimentar');
            $table->string('descricaoGA');
        });

        DB::table('grupoAlimentar')->insert(array(
            'idGAlimentar'=> 1,
            'descricaoGA' => 'Alimentos Infantis'
        ));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupoAlimentar');
    }
}
