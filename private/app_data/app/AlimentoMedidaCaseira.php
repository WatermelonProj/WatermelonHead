<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlimentoMedidaCaseira extends Model
{
    protected $table = 'alimento_medidaCaseira';
    // protected $primaryKey = 'idNutriente';
    public $timestamps = false;

    public function alimento() {
      return $this->belongsTo("App\Alimento", "idAlimento", "idAlimento");
    }

    public function medidaCaseira() {
      return $this->belongsTo('App\TipoMedidaCaseira', 'idTMCaseira', 'idTMCaseira');
    }
}
