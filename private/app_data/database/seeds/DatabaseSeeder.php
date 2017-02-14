<?php

use App\Models\Medida\UnidadeMedida;
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
    }
}
