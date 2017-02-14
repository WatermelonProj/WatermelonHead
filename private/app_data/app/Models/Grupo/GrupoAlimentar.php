<?php

namespace App\Models\Grupo;

use Illuminate\Database\Eloquent\Model;

class GrupoAlimentar extends Model
{
    protected $table = 'grupoAlimentar';
    protected $primaryKey = 'idGAlimentar';
    public $timestamps = false;

    public function alimento() {
        return $this->hasMany('App\Models\Alimento\Alimento', 'idGAlimentar', 'idGAlimentar');
    }
}
