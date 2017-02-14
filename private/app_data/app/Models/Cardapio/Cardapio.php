<?php

namespace App\Models\Cardapio;

use Illuminate\Database\Eloquent\Model;

class Cardapio extends Model
{
    protected $table = 'cardapio';
    protected $primaryKey = 'idCardapio';
    public $timestamps = true;

    public function cardapioReceicao() {
      return $this->hasMany('App\Models\Cardapio\CardapioReceicao', 'idCardapio', 'idCardapio');
    }

    public function faixaEtaria() {
      return $this->belongsTo('App\Models\Faixa_Etaria\FaixaEtaria', 'idFEtaria', 'idFEtaria');
    }

    public function usuario(){
      return $this->belongsTo('App\Models\User\User', 'idUsuario', 'id');
    }
}
