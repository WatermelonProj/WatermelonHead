<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NutrienteAlimento extends Model
{
    protected $table = 'nutrienteAlimento';
    protected $primaryKey = 'idNutriente';
    public $timestamps = false;

    public function alimento() {
        return $this->belongsTo('App\Alimento', 'idAlimento');
    }

    public function nutriente() {
        return $this->belongsTo('App\Nutriente', 'idNutriente');
    }

}
