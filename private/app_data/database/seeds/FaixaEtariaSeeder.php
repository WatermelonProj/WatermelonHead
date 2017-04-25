<?php

use Illuminate\Database\Seeder;

class FaixaEtariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faixaEtaria')->insert(array(
            'descricaoFaixa' => 'Lactante',
            'ativoFaixa' => '1',
        ));
        DB::table('faixaEtaria')->insert(array(
            'descricaoFaixa' => 'PRE',
            'ativoFaixa' => '1',
        ));
        DB::table('faixaEtaria')->insert(array(
            'descricaoFaixa' => 'CMEI',
            'ativoFaixa' => '1',
        ));
        DB::table('faixaEtaria')->insert(array(
            'descricaoFaixa' => 'Fundamental',
            'ativoFaixa' => '1',
        ));
    }
}
