<?php

namespace App\Models\Alimento;

use Illuminate\Database\Eloquent\Model;

class AlimentoMedidaCaseira extends Model
{
    protected $table = 'alimento_medidaCaseira';
    // protected $primaryKey = 'idNutriente';
    public $timestamps = false;

    public function alimento() {
      return $this->belongsTo('App\Models\Alimento\Alimento', 'idAlimento');
    }

    public function tipoMedidaCaseira() {
      return $this->belongsTo('App\Models\Medida\TipoMedidaCaseira', 'idTMCaseira', 'idTMCaseira');
    }

    public function unidadeMedida(){
        return $this->belongsTo('App\Models\Medida\UnidadeMedida', 'tipoUnidade');
    }

}
