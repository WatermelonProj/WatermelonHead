<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoPiramide extends Model
{
    protected $table = 'grupoPiramide';
    protected $primaryKey = 'idGPiramide';
    public $timestamps = false;

    public function alimento() {
        return $this->hasMany('App\Alimento', 'idGPiramide', 'idGPiramide');
    }
}
