<?php

namespace App\Models\Faixa_Etaria;

use Illuminate\Database\Eloquent\Model;

class FaixaEtaria extends Model
{
    protected $table = 'faixaEtaria';
    protected $primaryKey = 'idFEtaria';
    public $timestamps = false;

    public function cardapio()
    {
        return $this->hasMany('App\Models\Cardapio\Cardapio', 'idFEtaria', 'idFEtaria');
    }

    public function nutrientesPorFaixa()
    {
        return $this->hasMany('App\Models\Nutrientes\NutrientePorFaixa', 'idFEtaria');
    }

}
