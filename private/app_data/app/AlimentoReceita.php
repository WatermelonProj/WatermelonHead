<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlimentoReceita extends Model
{
    protected $table = 'alimento_receita';
    // protected $primaryKey = 'idNutriente';
    public $timestamps = false;

    public function alimento() {
      return $this->belongsTo("App\Alimento", "idAlimento", "idAlimento");
    }

    public function receita() {
      return $this->belongsTo("App\Receita", "idReceita", "idReceita");
    }
}
