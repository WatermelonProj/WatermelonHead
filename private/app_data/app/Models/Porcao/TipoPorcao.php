<?php

namespace App\Models\Porcao;

use Illuminate\Database\Eloquent\Model;

class TipoPorcao extends Model
{
    protected $table = 'tipo_porcao';

    public function receitaPorcao()
    {
        return $this->hasMany('App\Models\Porcao\receitaPorcao', 'idTipoPorcao');
    }
}
