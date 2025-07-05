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
        'id_raza',
        'user_id'
    ];

    public function tipoAnimal(){
        return $this->belongsTo(TipoAnimal::class, 'id_tipo_animal', 'id_tipo_animal');
    }

    public function raza(){
        return $this->belongsTo(Raza::class, 'id_raza', 'id_raza');
    }

    public function consultas() {
        return $this->hasMany(Consulta::class, 'id_animal', 'id_mascota');
    }

    public function duenio() {
        return $this->belongsTo(App\Models\User::class, 'user_id', 'id');
    }

}
