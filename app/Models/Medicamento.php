<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class medicamento extends Model
{
    protected $table = 'medicamento';
    protected $primaryKey = 'id_medicamento';

    public $timestamps = false;

    protected $fillable = [
        'id_medicamento',
        'descrip_medicamento'
    ];

    public function consultas()
    {
        return $this->belongsToMany(Consulta::class, 'consulta_medicamento', 'id_medicamento', 'id_consulta');
    }

}
