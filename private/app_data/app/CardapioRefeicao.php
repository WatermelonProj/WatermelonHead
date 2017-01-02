<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardapioRefeicao extends Model
{
    protected $table = 'cardapio_refeicao';
    protected $primaryKey = 'idCardapioRefeicao';
    public $timestamps = false;

    public function cardapio () {
      return $this->belongsTo("App\Cardapio", "idCardapio", "idCardapio");
    }

    public function refeicao () {
      return $this->belongsTo("App\Refeicao", "idRefeicao", "idRefeicao");
    }
}
