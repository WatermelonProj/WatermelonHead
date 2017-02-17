<?php

namespace App\Models\Medida;

use Illuminate\Database\Eloquent\Model;

class TipoMedidaCaseira extends Model
{
    protected $table = 'tipoMedidaCaseira';
    protected $primaryKey = 'idTMCaseira';
    public $timestamps = false;

    public function alimentoMedidaCaseira() {
      return $this->hasMany('App\Models\Alimento\AlimentoMedidaCaseira', 'idTMCaseira', 'idTMCaseira');
    }


}
