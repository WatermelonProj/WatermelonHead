<?php

namespace App\Models\Medida;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Medida\TipoMedidaCaseira
 *
 * @property int $idTMCaseira
 * @property string $nomeTMC
 * @property string $classeTMC
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Alimento\AlimentoMedidaCaseira[] $alimentoMedidaCaseira
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Medida\TipoMedidaCaseira whereClasseTMC($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Medida\TipoMedidaCaseira whereIdTMCaseira($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Medida\TipoMedidaCaseira whereNomeTMC($value)
 * @mixin \Eloquent
 */
class TipoMedidaCaseira extends Model
{
    protected $table = 'tipoMedidaCaseira';
    protected $primaryKey = 'idTMCaseira';
    public $timestamps = false;

    public function alimentoMedidaCaseira() {
      return $this->hasMany('App\Models\Alimento\AlimentoMedidaCaseira', 'idTMCaseira', 'idTMCaseira');
    }


}
