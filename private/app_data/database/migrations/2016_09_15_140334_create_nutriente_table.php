<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNutrienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutriente', function (Blueprint $table) {
            $table->increments('idNutriente');
            $table->string('nomeNutriente');
            $table->string('cientificoNutriente')->nullable();
            $table->integer('unidadeNutriente')->unsigned();
            $table->foreign("unidadeNutriente")->references("idUnidade")->on("unidadeMedida");
        });

        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 1,
        	'nomeNutriente' => 'Energia',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 7,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 2,
        	'nomeNutriente' => 'Energia(J)',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 9,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 3,
        	'nomeNutriente' => 'Proteína',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 2,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 4,
        	'nomeNutriente' => 'Lipídeos',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 2,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 5,
        	'nomeNutriente' => 'Colesterol',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 1,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 6,
        	'nomeNutriente' => 'Carboidrato',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 2,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 7,
        	'nomeNutriente' => 'Fibra Alimentar',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 2,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 8,
        	'nomeNutriente' => 'Cinzas',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 2,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 9,
        	'nomeNutriente' => 'Cálcio',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 1,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 10,
        	'nomeNutriente' => 'Magnésio',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 1,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 11,
        	'nomeNutriente' => 'Manganês',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 1,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 12,
        	'nomeNutriente' => 'Fósforo',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 1,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 13,
        	'nomeNutriente' => 'Ferro',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 1,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 14,
        	'nomeNutriente' => 'Sódio',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 1,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 15,
        	'nomeNutriente' => 'Potássio',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 1,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 16,
        	'nomeNutriente' => 'Cobre',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 1,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 17,
        	'nomeNutriente' => 'Zinco',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 1,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 18,
        	'nomeNutriente' => 'Retinol',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 5,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 19,
        	'nomeNutriente' => 'RE',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 5,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 20,
        	'nomeNutriente' => 'RAE',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 5,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 21,
        	'nomeNutriente' => 'Tiamina',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 1,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 22,
        	'nomeNutriente' => 'Riboflavina',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 1,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 23,
        	'nomeNutriente' => 'Piridoxina',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 1,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 24,
        	'nomeNutriente' => 'Niacina',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 1,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 25,
        	'nomeNutriente' => 'Vitamina C',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 1,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 26,
        	'nomeNutriente' => 'Triptofano',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 2,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 27,
        	'nomeNutriente' => 'Treonina',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 2,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 28,
        	'nomeNutriente' => 'Isoleucina',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 2,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 29,
        	'nomeNutriente' => 'Leucina',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 2,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 30,
        	'nomeNutriente' => 'Lisina',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 2,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 31,
        	'nomeNutriente' => 'Metionina',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 2,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 32,
        	'nomeNutriente' => 'Cistina',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 2,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 33,
        	'nomeNutriente' => 'Fenilalanina',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 2,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 34,
        	'nomeNutriente' => 'Tirosina',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 2,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 35,
        	'nomeNutriente' => 'Valina',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 2,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 36,
        	'nomeNutriente' => 'Arginina',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 2,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 37,
        	'nomeNutriente' => 'Histidina',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 2,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 38,
        	'nomeNutriente' => 'Alanina',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 2,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 39,
        	'nomeNutriente' => 'Ácido Aspártico',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 2,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 40,
        	'nomeNutriente' => 'Ácido Glutâmico',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 2,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 41,
        	'nomeNutriente' => 'Glicina',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 2,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 42,
        	'nomeNutriente' => 'Prolina',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 2,
        ));
        DB::table('nutriente')->insert(array(
        	'idNutriente'=> 43,
        	'nomeNutriente' => 'Serina',
        	'cientificoNutriente' => '',
        	'unidadeNutriente'=> 2,
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nutriente');
    }
}
