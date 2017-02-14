<?php

namespace App\Models\Grupo;

use Illuminate\Database\Eloquent\Model;

class GrupoPiramide extends Model
{
    protected $table = 'grupoPiramide';
    protected $primaryKey = 'idGPiramide';
    public $timestamps = false;

    public function alimento() {
        return $this->hasMany('App\Models\Alimento\Alimento', 'idGPiramide', 'idGPiramide');
    }
}
