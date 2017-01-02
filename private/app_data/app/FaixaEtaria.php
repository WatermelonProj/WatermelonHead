<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaixaEtaria extends Model
{
    protected $table = 'faixaEtaria';
    protected $primaryKey = 'idFEtaria';
    public $timestamps = false;

    public function cardapio() {
      return $this->hasMany("App\Cardapio","idFEtaria", "idFEtaria");
    }
}
