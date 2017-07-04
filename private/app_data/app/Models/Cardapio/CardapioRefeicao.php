<?php

namespace App\Models\Cardapio;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Cardapio\CardapioRefeicao
 *
 * @property int $idCardapio
 * @property int $idRefeicao
 * @property string $dataUtilizacao
 * @property-read \App\Models\Cardapio\Cardapio $cardapio
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Receita\ReceitaRefeicao[] $receitaRefeicao
 * @property-read \App\Models\Refeicao\Refeicao $refeicao
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Cardapio\CardapioRefeicao whereDataUtilizacao($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Cardapio\CardapioRefeicao whereIdCardapio($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Cardapio\CardapioRefeicao whereIdRefeicao($value)
 * @mixin \Eloquent
 */
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
