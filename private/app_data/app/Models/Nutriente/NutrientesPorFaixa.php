<?php

namespace App\Models\Nutriente;

use Illuminate\Database\Eloquent\Model;

class NutrientesPorFaixa extends Model
{
    protected $table = 'nutrientesPorFaixa';
    // protected $primaryKey = 'idNutriente';
    public $timestamps = false;

    public function nutriente()
    {
        return $this->belongsTo('App\Models\Nutriente\Nutriente', 'idNutriente');
    }

    public function faixaEtaria()
    {
        return $this->belongsTo('App\Models\Faixa_Etaria\FaixaEtaria', 'idFEtaria');
    }
}
