<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultaMedicamento extends Model
{
    protected $table = 'consulta_medicamento';
    //protected $primaryKey = 'id_medicamento';
    
    public $incrementing = false;
    public $timestamps = false;


    protected $fillable = [
        'id_medicamento',
        'id_consulta'
    ];
}
