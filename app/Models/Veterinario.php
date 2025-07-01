<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class veterinario extends Model
{
        protected $table = 'veterinario';
    protected $primaryKey = 'cuit_vet';

    public $timestamps = false;

    protected $fillable = [
        'cuit_vet',
        'nombre_vet',
        'apellido_vet',
        'horario_entrada',
        'horario_salida'
    ];
}
