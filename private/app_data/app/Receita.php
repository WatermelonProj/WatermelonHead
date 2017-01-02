<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    protected $table = 'receita';
    protected $primaryKey = 'idReceita';
    public $timestamps = true;

    public function alimentoReceita(){
      return $this->hasMany("App\AlimentoReceita", "idReceita", "idReceita");
    }

    public function usuario(){
      return $this->belongsTo('App\Usuario', 'idUsuario', 'id');
    }
}
