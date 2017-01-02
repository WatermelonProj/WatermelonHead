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

        DB::table('unidadeMedida')->insert(array(
          'idUnidade'=> 1,
          'nomeUnidade' => 'Miligrama',
          'siglaUnidade' => 'mg',
          'qtdePadrao' => 1000,
          'isPadrao' => false,
          'grupoMedida' => 1
        ));

        DB::table('unidadeMedida')->insert(array(
          'idUnidade'=> 2,
          'nomeUnidade' => 'Grama',
          'siglaUnidade' => 'g',
          'qtdePadrao' => 1000000,
          'isPadrao' => false,
          'grupoMedida' => 1
        ));

        DB::table('unidadeMedida')->insert(array(
          'idUnidade'=> 3,
          'nomeUnidade' => 'Mililitro',
          'siglaUnidade' => 'ml',
          'qtdePadrao' => 1,
          'isPadrao' => true,
          'grupoMedida' => 2
        ));

        DB::table('unidadeMedida')->insert(array(
          'idUnidade'=> 4,
          'nomeUnidade' => 'Litro',
          'siglaUnidade' => 'l',
          'qtdePadrao' => 1000,
          'isPadrao' => false,
          'grupoMedida' => 2
        ));

        DB::table('unidadeMedida')->insert(array(
          'idUnidade'=> 5,
          'nomeUnidade' => 'Micrograma',
          'siglaUnidade' => 'µg',
          'qtdePadrao' => 1,
          'isPadrao' => true,
          'grupoMedida' => 1
        ));

        DB::table('unidadeMedida')->insert(array(
          'idUnidade'=> 6,
          'nomeUnidade' => 'Caloria',
          'siglaUnidade' => 'cal',
          'qtdePadrao' => 1,
          'isPadrao' => true,
          'grupoMedida' => 3
        ));

        DB::table('unidadeMedida')->insert(array(
          'idUnidade'=> 7,
          'nomeUnidade' => 'Kilocaloria',
          'siglaUnidade' => 'kcal',
          'qtdePadrao' => 1000,
          'isPadrao' => false,
          'grupoMedida' => 3
        ));

        DB::table('unidadeMedida')->insert(array(
          'idUnidade'=> 8,
          'nomeUnidade' => 'Joule',
          'siglaUnidade' => 'J',
          'qtdePadrao' => 1,
          'isPadrao' => true,
          'grupoMedida' => 4
        ));

        DB::table('unidadeMedida')->insert(array(
          'idUnidade'=> 9,
          'nomeUnidade' => 'Kilojoule',
          'siglaUnidade' => 'kJ',
          'qtdePadrao' => 1000,
          'isPadrao' => false,
          'grupoMedida' => 4
        ));


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidadeMedida');
    }
}
