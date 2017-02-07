<?php

use Illuminate\Database\Seeder;

class tipoMedidaCaseiraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipomedidacaseira')->insert([
            'nomeTMC' => 'Colher de Chá',
            'classeTMC' => 'COL CHÁ'
        ]);

        DB::table('tipomedidacaseira')->insert([
            'nomeTMC' => 'Colher de Arroz',
            'classeTMC' => 'COL A'
        ]);

    }
}
