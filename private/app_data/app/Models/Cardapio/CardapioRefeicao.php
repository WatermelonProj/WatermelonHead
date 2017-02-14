<?php

namespace App\Models\Cardapio;

use Illuminate\Database\Eloquent\Model;

class CardapioRefeicao extends Model
{
    protected $table = 'cardapio_refeicao';
    protected $primaryKey = 'idCardapioRefeicao';
    public $timestamps = false;

    public function cardapio()
    {
        return $this->belongsTo('App\Models\Cardapio\Cardapio', 'idCardapio', 'idCardapio');
    }

    public function refeicao()
    {
        return $this->belongsTo('App\Models\Refeicao\Refeicao', 'idRefeicao', 'idRefeicao');
    }

    public function receitaRefeicao()
    {
        return $this->hasMany('App\Models\Receita\ReceitaRefeicao', 'idCardapioRefeicao');
    }
}
