<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoPago extends Model
{
    protected $table = 'tipo_pago';
    protected $primaryKey = 'id_tipo_pago';
    public $timestamps = false;

    protected $fillable = [
        'descrip_tipo_pago'
    ];

    public function pagos() {
        return $this->hasMany(PagoConsulta::class, 'id_tipo_pago', 'id_tipo_pago');
    }

}
