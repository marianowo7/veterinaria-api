<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class veterinario extends Model
{
    protected $table = 'veterinario';
    protected $primaryKey = 'cuit_vet';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $casts = [
        'cuit_vet' => 'string',
    ];



    public $timestamps = false;

    protected $fillable = [
        'cuit_vet',
        'nombre_vet',
        'apellido_vet',
        'horario_entrada',
        'horario_salida'
    ];

    public function consultas() {
        return $this->hasMany(Consulta::class, 'cuit_veterinario', 'cuit_vet');
    }

}
