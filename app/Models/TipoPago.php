<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoPago extends Model
{
    protected $table = 'tipo_pago';
    protected $primaryKey = 'id_tipo_pago';
    public $timestamps = false;

    protected $fillable = [
        'id_tipo_pago',
        'descrip_tipo_pago'
    ];
}
