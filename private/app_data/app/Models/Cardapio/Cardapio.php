<?php

namespace App\Models\Cardapio;

use App\Models\Nutriente\Nutriente;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Cardapio\Cardapio
 *
 * @property int $idCardapio
 * @property int $idFEtaria
 * @property int $idUsuario
 * @property string $dataUtilizacao
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cardapio\CardapioRefeicao[] $cardapioRefeicao
 * @property-read \App\Models\Faixa_Etaria\FaixaEtaria $faixaEtaria
 * @property-read \App\User $usuario
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Cardapio\Cardapio whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Cardapio\Cardapio whereDataUtilizacao($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Cardapio\Cardapio whereIdCardapio($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Cardapio\Cardapio whereIdFEtaria($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Cardapio\Cardapio whereIdUsuario($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Cardapio\Cardapio whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Cardapio extends Model
{
    protected $table = 'cardapio';
    protected $primaryKey = 'idCardapio';
    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cardapioRefeicao()
    {
        return $this->hasMany('App\Models\Cardapio\CardapioRefeicao', 'idCardapio', 'idCardapio');
    }

    public function faixaEtaria()
    {
        return $this->belongsTo('App\Models\Faixa_Etaria\FaixaEtaria', 'idFEtaria', 'idFEtaria');
    }

    public function usuario()
    {
        return $this->belongsTo('App\User', 'idUsuario', 'id');

    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getTotalNutrientes()
    {
        $somaNutrientesDiarios = Nutriente::all()->pluck(0, 'idNutriente');
        //recuperando topdas as refeições que compões o cardapio
        foreach ($this->cardapioRefeicao as $cardapioRefeicao) {
            $nutrientes = $cardapioRefeicao->refeicao->getSomaNutrientes($this->idFEtaria);
            foreach ($somaNutrientesDiarios as $index => $somaNutrientesDiario) {
                $somaNutrientesDiarios[$index] += $nutrientes[$index];
            }
        }
        return $somaNutrientesDiarios;
    }

    /**
     * Retorna o mês atual do cardapio
     *
     * @param $query
     * @return mixed
     */
    public function scopeCardapioMensal($query, $mes)
    {
        return $query->whereMonth('dataUtilizacao', $mes)->whereYear('dataUtilizacao', Carbon::now()->year);
    }
}
