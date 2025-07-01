<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    protected $table = 'mascota'; // nombre exacto en la BD
    protected $primaryKey = 'id_mascota'; // PK que definiste
    public $timestamps = false; // tu tabla no usa created_at / updated_at

    protected $fillable = [
        'nombre_mascota',
        'cuit_duenio',
        'id_tipo_animal',
        'peso_kg',
        'id_raza'
    ];
}
