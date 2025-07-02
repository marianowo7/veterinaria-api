<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PagoConsulta extends Model
{
    protected $table = 'pago_consulta';
    protected $primaryKey = 'id_pago';

    public $timestamps = false;

    protected $fillable = [
        'id_tipo_pago',
        'importe',
        'id_consulta'
    ];

    public function consulta() {
        return $this->belongsTo(Consulta::class, 'id_consulta', 'id_consulta');
    }

    public function tipoPago() {
        return $this->belongsTo(TipoPago::class, 'id_tipo_pago', 'id_tipo_pago');
    } 

}