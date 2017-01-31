<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nutriente extends Model
{
    protected $table = 'nutriente';
    protected $primaryKey = 'idNutriente';
    public $timestamps = false;

    public function nutrienteAlimento() {
        return $this->hasMany('App\NutrienteAlimento', 'idNutriente');
    }

    public function unidadeMedida() {
        return $this->belongsTo('App\unidadeMedida', 'unidadeNutriente');
    }

    public function nutrientesPorFaixa()
    {
        return $this->hasMany('App\NutrientesPorFaixa', 'idNutriente');
    }

}
