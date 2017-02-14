<?php

namespace App\Models\Medida;

use Illuminate\Database\Eloquent\Model;

class UnidadeMedida extends Model
{
    protected $table = 'unidadeMedida';
    protected $primaryKey = 'idUnidade';
    public $timestamps = false;

    public function nutriente()
    {
        return $this->hasMany('App\Models\Nurtiente\Nutriente', 'unidadeNutriente');
    }

    public function alimentoMedidaCaseira()
    {
        return $this->hasMany('App\Models\Alimento\AlimentoMedidaCaseira', 'tipoUnidade');
    }

    public function alimentoReceita()
    {
        return $this->hasMany('App\Models\Alimento\AlimentoReceita', 'unidadeMedida');
    }
}