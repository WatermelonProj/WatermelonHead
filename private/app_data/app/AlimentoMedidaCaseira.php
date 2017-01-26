<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlimentoMedidaCaseira extends Model
{
    protected $table = 'alimento_medidaCaseira';
    // protected $primaryKey = 'idNutriente';
    public $timestamps = false;

    public function alimento() {
      return $this->belongsTo("App\Alimento", "idAlimento");
    }

    public function tipoMedidaCaseira() {
      return $this->belongsTo('App\TipoMedidaCaseira', 'idTMCaseira', 'idTMCaseira');
    }

    public function unidadeMedida(){
        return $this->belongsTo('App\UnidadeMedida', 'tipoUnidade');
    }

}
