<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoAnimal extends Model
{
    protected $table = 'tipo_animal';
    protected $primaryKey = 'id_tipo_animal';

    public $timestamps = false;

    protected $fillable = [
        'id_tipo_animal',
        'descrip_tipo_animal'
    ];
}
