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
            'nomeTMC' => 'Colher',
            'classeTMC' => 'COL'
        ]);

        DB::table('tipomedidacaseira')->insert([
            'nomeTMC' => 'Xicara',
            'classeTMC' => 'X'
        ]);

        DB::table('tipomedidacaseira')->insert([
            'nomeTMC' => 'Copo',
            'classeTMC' => 'Cp'
        ]);

    }
}
