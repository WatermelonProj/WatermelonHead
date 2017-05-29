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
        DB::table('tipoMedidaCaseira')->insert([
            'nomeTMC' => 'Colher',
            'classeTMC' => 'COL'
        ]);

        DB::table('tipoMedidaCaseira')->insert([
            'nomeTMC' => 'Xicara',
            'classeTMC' => 'X'
        ]);

        DB::table('tipoMedidaCaseira')->insert([
            'nomeTMC' => 'Copo',
            'classeTMC' => 'Cp'
        ]);

    }
}
