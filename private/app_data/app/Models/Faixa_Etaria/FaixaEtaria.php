<?php

namespace App\Models\Faixa_Etaria;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Faixa_Etaria\FaixaEtaria
 *
 * @property int $idFEtaria
 * @property string $descricaoFaixa
 * @property string $ativoFaixa
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cardapio\Cardapio[] $cardapio
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Nutriente\NutrientesPorFaixa[] $nutrientesPorFaixa
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Porcao\TipoPorcao[] $receitaPorcao
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Faixa_Etaria\FaixaEtaria whereAtivoFaixa($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Faixa_Etaria\FaixaEtaria whereDescricaoFaixa($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Faixa_Etaria\FaixaEtaria whereIdFEtaria($value)
 * @mixin \Eloquent
 */
class FaixaEtaria extends Model
{
    public $timestamps = false;
    protected $table = 'faixaEtaria';
    protected $primaryKey = 'idFEtaria';

    public function cardapio()
    {
        return $this->hasMany('App\Models\Cardapio\Cardapio', 'idFEtaria', 'idFEtaria');
    }

    public function nutrientesPorFaixa()
    {
        return $this->hasMany('App\Models\Nutriente\NutrientesPorFaixa', 'idFEtaria');
    }

    public function receitaPorcao()
    {
        return $this->hasMany('App\Models\Porcao\TipoPorcao', 'idFEtaria');
    }



}
