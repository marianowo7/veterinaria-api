<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'consulta';
    protected $primaryKey = 'id_consulta';

    public $timestamps = false;

    protected $fillable = [
        'id_consulta',
        'id_animal',
        'cuit_duenio',
        'descripcion_consulta',
        'cuit_veterinario'
    ];
}
