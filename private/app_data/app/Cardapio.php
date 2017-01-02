<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cardapio extends Model
{
    protected $table = 'cardapio';
    protected $primaryKey = 'idCardapio';
    public $timestamps = true;

    public function cardapioReceicao() {
      return $this->hasMany("App\CardapioReceicao", "idCardapio", "idCardapio");
    }

    public function faixaEtaria() {
      return $this->belongsTo("App\FaixaEtaria", "idFEtaria", "idFEtaria");
    }

    public function usuario(){
      return $this->belongsTo("App\Usuario", "idUsuario", "id");
    }
}
