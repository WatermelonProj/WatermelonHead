<?php

namespace App\Models\Grupo;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Grupo\GrupoPiramide
 *
 * @property int $idGPiramide
 * @property string $descricaoGP
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Alimento\Alimento[] $alimento
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Grupo\GrupoPiramide whereDescricaoGP($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Grupo\GrupoPiramide whereIdGPiramide($value)
 * @mixin \Eloquent
 */
class GrupoPiramide extends Model
{
    protected $table = 'grupoPiramide';
    protected $primaryKey = 'idGPiramide';
    public $timestamps = false;

    public function alimento() {
        return $this->hasMany('App\Models\Alimento\Alimento', 'idGPiramide', 'idGPiramide');
    }
}
