<?php

namespace App\Models\Alimento;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Alimento\AlimentoMedidaCaseira
 *
 * @property-read \App\Models\Alimento\Alimento $alimento
 * @property-read \App\Models\Medida\TipoMedidaCaseira $tipoMedidaCaseira
 * @property-read \App\Models\Medida\UnidadeMedida $unidadeMedida
 * @mixin \Eloquent
 * @property int $idAlimento
 * @property int $idTMCaseira
 * @property int $tipoUnidade
 * @property float $qtde
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Alimento\AlimentoMedidaCaseira whereIdAlimento($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Alimento\AlimentoMedidaCaseira whereIdTMCaseira($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Alimento\AlimentoMedidaCaseira whereQtde($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Alimento\AlimentoMedidaCaseira whereTipoUnidade($value)
 */
class AlimentoMedidaCaseira extends Model
{
    protected $table = 'alimento_medidaCaseira';
    // protected $primaryKey = 'idNutriente';
    public $timestamps = false;

    public function alimento() {
      return $this->belongsTo('App\Models\Alimento\Alimento', 'idAlimento');
    }

    public function tipoMedidaCaseira() {
      return $this->belongsTo('App\Models\Medida\TipoMedidaCaseira', 'idTMCaseira', 'idTMCaseira');
    }

    public function unidadeMedida(){
        return $this->belongsTo('App\Models\Medida\UnidadeMedida', 'tipoUnidade');
    }

}
