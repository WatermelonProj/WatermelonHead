<?php

namespace App\Models\Receita;

use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    protected $table = 'receita';
    protected $primaryKey = 'idReceita';
    public $timestamps = true;

    public function alimentoReceita()
    {
        return $this->hasMany('App\Models\Alimento\AlimentoReceita', 'idReceita', 'idReceita');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'idUsuario', 'id');
    }

    public function receitaRefeicao()
    {
        return $this->hasMany('\App\Models\Receita\ReceitaRefeicao', 'idReceita');
    }
}
