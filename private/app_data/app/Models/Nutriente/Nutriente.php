<?php

namespace App\Models\Nutriente;

use Illuminate\Database\Eloquent\Model;

class Nutriente extends Model
{
    protected $table = 'nutriente';
    protected $primaryKey = 'idNutriente';
    public $timestamps = false;

    public function nutrienteAlimento() {
        return $this->hasMany('App\Models\Nutriente\NutrienteAlimento', 'idNutriente');
    }

    public function unidadeMedida() {
        return $this->belongsTo('App\Models\Medida\unidadeMedida', 'unidadeNutriente');
    }

    public function nutrientesPorFaixa()
    {
        return $this->hasMany('App\Models\Nutriente\NutrientesPorFaixa', 'idNutriente');
    }

}
