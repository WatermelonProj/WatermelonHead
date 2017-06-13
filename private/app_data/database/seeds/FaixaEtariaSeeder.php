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
            'descricaoFaixa' => 'Creche 0-6 Mêses',
            'ativoFaixa' => '1',
        ));
        DB::table('faixaEtaria')->insert(array(
            'descricaoFaixa' => 'Creche 7-11 Mêses',
            'ativoFaixa' => '1',
        ));
        DB::table('faixaEtaria')->insert(array(
            'descricaoFaixa' => 'Creche 1-3 Anos',
            'ativoFaixa' => '1',
        ));
        DB::table('faixaEtaria')->insert(array(
            'descricaoFaixa' => 'Pré-Escola 4-5 anos',
            'ativoFaixa' => '1',
        ));
        DB::table('faixaEtaria')->insert(array(
            'descricaoFaixa' => 'Ensino Fundamental 6-10 Anos',
            'ativoFaixa' => '1',
        ));
        DB::table('faixaEtaria')->insert(array(
            'descricaoFaixa' => 'Ensino Fundamental 11-15 Anos',
            'ativoFaixa' => '1',
        ));
        DB::table('faixaEtaria')->insert(array(
            'descricaoFaixa' => 'Ensino Fundamental 16-18 Anos',
            'ativoFaixa' => '1',
        ));
        DB::table('faixaEtaria')->insert(array(
            'descricaoFaixa' => 'EJA 19-30 Anos',
            'ativoFaixa' => '1',
        ));
        DB::table('faixaEtaria')->insert(array(
            'descricaoFaixa' => 'EJA 31-60 Anos',
            'ativoFaixa' => '1',
        ));
    }
}
