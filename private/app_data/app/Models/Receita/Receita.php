<?php

namespace App\Models\Receita;

use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    protected $table = 'receita';
    protected $primaryKey = 'idReceita';
    public $timestamps = true;

    public function alimentoReceita()
    {
        return $this->hasMany('App\Models\Alimento\AlimentoReceita', 'idReceita', 'idReceita');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'idUsuario', 'id');
    }

    public function receitaRefeicao()
    {
        return $this->hasMany('\App\Models\Receita\ReceitaRefeicao', 'idReceita');
    }

    /**
     * Retorna os nutrientes contidos na receita atual
     */
    public function getNutrientes()
    {
        $quantidadeNutrientes = [];

        // P/ cada alimento da receita
        foreach ($this->alimentoReceita as $index => $alimentoReceita) {
            foreach ($alimentoReceita->alimento->nutrienteAlimento as $nutrienteAlimento) {
                // realiza a soma dos nutrientes e retorna uma array com a quantidade de nutrientes, sendo o indice o id do nutriente
                if (!array_key_exists($nutrienteAlimento->idNutriente, $quantidadeNutrientes)) {
                    $quantidadeNutrientes[$nutrienteAlimento->idNutriente] = 0;
                }

                $quantidadeNutrientes[$nutrienteAlimento->idNutriente] +=
                    $alimentoReceita->qtde * ($nutrienteAlimento->qtde/100);
            }
        }

        return $quantidadeNutrientes;
    }
}
