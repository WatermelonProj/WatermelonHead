<?php

namespace App\Models\Receita;

use Illuminate\Database\Eloquent\Model;

class ReceitaRefeicao extends Model
{
    protected $table = 'receita_refeicao';
    // protected $primaryKey = 'idNutriente';
    public $timestamps = false;

    public function receita()
    {
        return $this->belongsTo('\App\Models\Receita\Receita', 'idReceita');
    }

    public function cardapioRefeicao()
    {
        return $this->belongsTo('\App\Models\Cardapio\CardapioRefeicao', 'idCardapioRefeicao');
    }
}