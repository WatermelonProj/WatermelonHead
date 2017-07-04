<?php

namespace App\Models\Grupo;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Grupo\GrupoAlimentar
 *
 * @property int $idGAlimentar
 * @property string $descricaoGA
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Alimento\Alimento[] $alimento
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Grupo\GrupoAlimentar whereDescricaoGA($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Grupo\GrupoAlimentar whereIdGAlimentar($value)
 * @mixin \Eloquent
 */
class GrupoAlimentar extends Model
{
    protected $table = 'grupoAlimentar';
    protected $primaryKey = 'idGAlimentar';
    public $timestamps = false;

    public function alimento() {
        return $this->hasMany('App\Models\Alimento\Alimento', 'idGAlimentar', 'idGAlimentar');
    }
}
