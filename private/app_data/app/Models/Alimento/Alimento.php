<?php

namespace App\Models\Alimento;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Alimento\Alimento
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Alimento\AlimentoMedidaCaseira[] $alimentoMedidaCaseira
 * @property-read \App\Models\Grupo\GrupoAlimentar $grupoAlimentar
 * @property-read \App\Models\Grupo\GrupoPiramide $grupoPiramide
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Nutriente\NutrienteAlimento[] $nutrienteAlimento
 * @mixin \Eloquent
 * @property int $idAlimento
 * @property bool $ativoAlimento
 * @property int $idGAlimentar
 * @property int $idGPiramide
 * @property string $descricaoAlimento
 * @property int $idTACO
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Alimento\Alimento whereAtivoAlimento($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Alimento\Alimento whereDescricaoAlimento($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Alimento\Alimento whereIdAlimento($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Alimento\Alimento whereIdGAlimentar($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Alimento\Alimento whereIdGPiramide($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Alimento\Alimento whereIdTACO($value)
 */
class Alimento extends Model
{
    public $timestamps = false;
    protected $table = 'alimento';
    protected $primaryKey = 'idAlimento';
    protected $fillable = ['idGAlimentar', 'idGPiramide', 'descricaoAlimento', 'idTACO'];

    public function grupoAlimentar()
    {
        return $this->belongsTo('App\Models\Grupo\GrupoAlimentar', 'idGAlimentar');
    }

    public function grupoPiramide()
    {
        return $this->belongsTo('App\Models\Grupo\GrupoPiramide', 'idGPiramide');
    }

    public function nutrienteAlimento()
    {
        return $this->hasMany('App\Models\Nutriente\NutrienteAlimento', 'idAlimento');
    }

    public function alimentoMedidaCaseira()
    {
        return $this->hasMany('App\Models\Alimento\alimentoMedidaCaseira', 'idAlimento');
    }

}