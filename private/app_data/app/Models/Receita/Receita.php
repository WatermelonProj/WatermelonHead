<?php

namespace App\Models\Receita;

use App\Models\Nutriente\Nutriente;
use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    public $timestamps = true;
    protected $table = 'receita';
    protected $primaryKey = 'idReceita';

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

    public function receitaPorcao()
    {
        return $this->hasMany('\App\Models\Porcao\ReceitaPorcao', 'idReceita');
    }

    /**
     * Retorna os nutrientes contidos na receita atual
     */
    public function getNutrientes($idFEtaria)
    {
        $quantidadeNutrientes = Nutriente::all()->pluck('0', 'idNutriente');

        $porcao = $this->receitaPorcao->where('idFEtaria', $idFEtaria)->first()->qtde;

        // P/ cada alimento da receita
        foreach ($this->alimentoReceita as $index => $alimentoReceita) {
            foreach ($alimentoReceita->alimento->nutrienteAlimento as $nutrienteAlimento) {
                // realiza a soma dos nutrientes e retorna uma array com a quantidade de nutrientes, sendo o indice o id do nutriente
                $quantidadeNutrientes[$nutrienteAlimento->idNutriente] +=
                    ($alimentoReceita->qtde * ($nutrienteAlimento->qtde / 100)) / $porcao;
            }
        }

        return $quantidadeNutrientes;
    }

    /**
     * Retorna a quantidade de porcao de acordo com o id da faixa etaria fornecida
     *
     * @param $idFEtaria
     */
    public function getPorcao($idFEtaria)
    {
        return $this->receitaPorcao->where('idFEtaria', $idFEtaria)->first()->qtde;
    }
}
