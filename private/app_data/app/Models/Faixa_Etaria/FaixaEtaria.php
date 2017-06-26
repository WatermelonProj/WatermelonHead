<?php

namespace App\Models\Faixa_Etaria;

use Illuminate\Database\Eloquent\Model;

class FaixaEtaria extends Model
{
    public $timestamps = false;
    protected $table = 'faixaEtaria';
    protected $primaryKey = 'idFEtaria';

    public function cardapio()
    {
        return $this->hasMany('App\Models\Cardapio\Cardapio', 'idFEtaria', 'idFEtaria');
    }

    public function nutrientesPorFaixa()
    {
        return $this->hasMany('App\Models\Nutriente\NutrientesPorFaixa', 'idFEtaria');
    }

    public function receitaPorcao()
    {
        return $this->hasMany('App\Models\Porcao\TipoPorcao', 'idFEtaria');
    }



}
