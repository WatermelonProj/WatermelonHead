<?php

use Illuminate\Database\Seeder;

class TipoPorcaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_porcao')->insert(array(
            'nome' => 'Fatias',
        ));
        DB::table('tipo_porcao')->insert(array(
            'nome' => 'Copos',
        ));
        DB::table('tipo_porcao')->insert(array(
            'nome' => 'Pratos',
        ));
    }
}
