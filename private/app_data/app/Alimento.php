<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alimento extends Model
{
    protected $table = 'alimento';
    protected $primaryKey = 'idAlimento';
    protected  $fillable = ['idGAlimentar', 'idGPiramide', 'descricaoAlimento', 'idTACO',
        'idGAlimentar', 'idGPiramide'];
    public $timestamps = false;

    public function grupoAlimentar() {
        return $this->hasOne('App\GrupoAlimentar', 'idGAlimentar', 'idGAlimentar');
    }

    public function grupoPiramide() {
        return $this->hasOne('App\GrupoPiramide', 'idGPiramide', 'idGPiramide');
    }

}
