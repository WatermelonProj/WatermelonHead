<?php

namespace App\Models\Alimento;

use Illuminate\Database\Eloquent\Model;

class Alimento extends Model
{
    protected $table = 'alimento';
    protected $primaryKey = 'idAlimento';
    protected  $fillable = ['idGAlimentar', 'idGPiramide', 'descricaoAlimento', 'idTACO'];
    public $timestamps = false;

    public function grupoAlimentar() {
        return $this->belongsTo('App\Models\Grupo\GrupoAlimentar', 'idGAlimentar');
    }

    public function grupoPiramide() {
        return $this->belongsTo('App\Models\Grupo\GrupoPiramide', 'idGPiramide');
    }

    public function nutrienteAlimento() {
        return $this->hasMany('App\Models\Nutriente\NutrienteAlimento', 'idAlimento');
    }

    public function alimentoMedidaCaseira() {
        return $this->hasMany('App\Models\Alimento\alimentoMedidaCaseira', 'idAlimento');
    }

}