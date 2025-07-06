<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'consulta';
    protected $primaryKey = 'id_consulta';

    protected $casts = [
        'cuit_veterinario' => 'string',
    ];

    public $timestamps = false;

    protected $fillable = [
        'id_consulta',
        'id_animal',
        'cuit_duenio',
        'descripcion_consulta',
        'cuit_veterinario'
    ];

    public function veterinario() {
        return $this->belongsTo(Veterinario::class, 'cuit_veterinario', 'cuit_vet');
    }

    public function mascota() {
        return $this->belongsTo(\App\Models\Mascota::class, 'id_animal', 'id_mascota');
    }

    public function medicamentos() {
        return $this->belongsToMany(
            \App\Models\Medicamento::class, 
            'consulta_medicamento', 
            'id_consulta', 
            'id_medicamento'
        );
    }

    public function pagoConsulta() {
        return $this->hasOne(PagoConsulta::class, 'id_consulta', 'id_consulta');
    }

}
