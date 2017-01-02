<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nutriente extends Model
{
    protected $table = 'nutriente';
    protected $primaryKey = 'idNutriente';
    public $timestamps = false;
}
