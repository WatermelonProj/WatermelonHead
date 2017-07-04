<?php

namespace App\Models\Refeicao;

use App\Models\Nutriente\Nutriente;
use function foo\func;
use Illuminate\Database\Eloquent\Model;

class Refeicao extends Model
{
    public $timestamps = false;
    protected $table = 'refeicao';
    protected $primaryKey = 'idRefeicao';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cardapioRefeicao()
    {
        return $this->hasMany('App\Models\Cardapio\CardapioRefeicao', 'idRefeicao', 'idRefeicao');
    }

    public function receitaRefeicao()
    {
        return $this->hasMany('App\Models\Receita\ReceitaRefeicao', 'idRefeicao');
    }

    /**
     * Retorna a soma de nutrientes de uma refeição
     */
    public function getSomaNutrientes($idFetaria)
    {
        $somaNutrientes = Nutriente::all()->pluck(0, 'idNutriente');

        // retornando todos os nutrientes das refeições contidas em uma receita
        foreach ($this->receitaRefeicao as $receitaRefeicao) {
            $nutrientes = $receitaRefeicao->receita->getNutrientes($idFetaria);
            foreach ($somaNutrientes as $index => $item) {
                $somaNutrientes[$index] += $nutrientes[$index];
            }
        }

        return $somaNutrientes;
    }
}
