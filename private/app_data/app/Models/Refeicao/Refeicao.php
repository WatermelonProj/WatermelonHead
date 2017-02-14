<?php

namespace App\Models\Refeicao;

use Illuminate\Database\Eloquent\Model;

class Refeicao extends Model
{
    protected $table = 'refeicao';
    protected $primaryKey = 'idRefeicao';
    public $timestamps = false;

    public function cardapioRefeicao() {
      return $this->hasMany('App\Models\Cardapio\cardapioRefeicao', 'idRefeicao', 'idRefeicao');
    }
}
