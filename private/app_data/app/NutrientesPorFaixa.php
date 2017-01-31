<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NutrientesPorFaixa extends Model
{
    protected $table = 'nutrientesPorFaixa';
    // protected $primaryKey = 'idNutriente';
    public $timestamps = false;

    public function nutriente()
    {
        return $this->belongsTo('App\Nutriente', 'idNutriente');
    }

    public function faixaEtaria()
    {
        return $this->belongsTo('App\FaixaEtaria', 'idFEtaria');
    }
}
