<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alimento extends Model
{
    protected $table = 'alimento';
    protected $primaryKey = 'idAlimento';
    public $timestamps = false;

    public alimentoMedidaCaseira() {
      return $this->hasMany("App\AlimentoMedidaCaseira", "idAlimento", "idAlimento");
    }

    public alimentoReceita() {
      return $this->hasMany("App\AlimentoReceita", "idAlimento", "idAlimento");
    }
}
