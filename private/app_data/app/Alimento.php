<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alimento extends Model
{
    protected $table = 'alimento';
    protected $primaryKey = 'idAlimento';
    protected  $fillable = ['idGAlimentar', 'idGPiramide', 'descricaoAlimento', 'idTACO'];
    public $timestamps = false;

    public function grupoAlimentar() {
        return $this->belongsTo('App\GrupoAlimentar', 'idGAlimentar');
    }

    public function grupoPiramide() {
        return $this->belongsTo('App\GrupoPiramide', 'idGPiramide');
    }

    public function nutrienteAlimento() {
        return $this->hasMany('App\NutrienteAlimento', 'idAlimento');
    }

    public function alimentoMedidaCaseira() {
        return $this->hasMany('App\alimentoMedidaCaseira', 'idAlimento');
    }

}
