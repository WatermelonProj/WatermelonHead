<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrupoPiramideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupoPiramide', function (Blueprint $table) {
            $table->increments('idGPiramide');
            $table->string('descricaoGP');
        });

        DB::table('grupoPiramide')->insert(array(
        	'idGPiramide'=> 1,
        	'descricaoGP' => 'Cereais e derivados'
        ));
        DB::table('grupoPiramide')->insert(array(
        	'idGPiramide'=> 2,
        	'descricaoGP' => 'Verduras, hortaliças e derivados'
        ));
        DB::table('grupoPiramide')->insert(array(
        	'idGPiramide'=> 3,
        	'descricaoGP' => 'Frutas e Sucos de Frutas'
        ));
        DB::table('grupoPiramide')->insert(array(
        	'idGPiramide'=> 4,
        	'descricaoGP' => 'Leite e derivados'
        ));
        DB::table('grupoPiramide')->insert(array(
        	'idGPiramide'=> 5,
        	'descricaoGP' => 'Carnes e derivados'
        ));
        DB::table('grupoPiramide')->insert(array(
        	'idGPiramide'=> 6,
        	'descricaoGP' => 'Ovos e derivados'
        ));
        DB::table('grupoPiramide')->insert(array(
        	'idGPiramide'=> 7,
        	'descricaoGP' => 'Pescados e frutos do mar'
        ));
        DB::table('grupoPiramide')->insert(array(
        	'idGPiramide'=> 8,
        	'descricaoGP' => 'Leguminosas e derivados'
        ));
        DB::table('grupoPiramide')->insert(array(
        	'idGPiramide'=> 9,
        	'descricaoGP' => 'Gorduras e Óleos'
        ));
        DB::table('grupoPiramide')->insert(array(
        	'idGPiramide'=> 10,
        	'descricaoGP' => 'Produtos açucarados'
        ));
        DB::table('grupoPiramide')->insert(array(
        	'idGPiramide'=> 11,
        	'descricaoGP' => 'Nozes e sementes'
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupoPiramide');
    }
}
