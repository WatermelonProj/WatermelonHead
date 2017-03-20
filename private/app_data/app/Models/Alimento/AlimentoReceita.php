<?php

namespace App\Models\Alimento;

use Illuminate\Database\Eloquent\Model;

class AlimentoReceita extends Model
{
    protected $table = 'alimento_receita';
    // protected $primaryKey = 'idNutriente';
    public $timestamps = false;

    public function alimento() {
      return $this->belongsTo('App\Models\Alimento\Alimento', 'idAlimento', 'idAlimento');
    }

    public function receita() {
      return $this->belongsTo('App\Models\Receita\Receita', 'idReceita', 'idReceita');
    }

    public function unidadeMedida()
    {
        return $this->belongsTo('App\Models\Medida\UnidadeMedida', 'unidadeMedida');
    }
}
