<?php

namespace App\Models\Receita;

use Illuminate\Database\Eloquent\Model;

class ReceitaRefeicao extends Model
{
    protected $table = 'receita_refeicao';
    // protected $primaryKey = 'idNutriente';
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function receita()
    {
        return $this->belongsTo('\App\Models\Receita\Receita', 'idReceita');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function refeicao()
    {
        return $this->belongsTo('\App\Models\Refeicao\Refeicao', 'idRefeicao');
    }
}
