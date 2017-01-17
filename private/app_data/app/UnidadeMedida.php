<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadeMedida extends Model
{
    protected $table = 'unidadeMedida';
    protected $primaryKey = 'idUnidade';
    public $timestamps = false;

    public function nutriente() {
        return $this->hasMany('App\Nutriente', 'unidadeNutriente');
    }
}
