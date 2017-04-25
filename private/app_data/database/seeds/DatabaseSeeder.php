<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GruposSeeder::class);
        $this->call(tipoMedidaCaseiraSeeder::class);
        $this->call(UnidadeMedidaSeeder::class);
        $this->call(NutrientesSeeder::class);
        $this->call(AlimentoSeeder::class);
        $this->call(nutrienteAlimentoSeeder::class);
        $this->call(FaixaEtariaSeeder::class);
    }
}