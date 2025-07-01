<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Raza extends Model
{
    protected $table = 'raza';
    protected $primaryKey = 'id_raza';

    public $timestamps = false;

    protected $fillable = [
        'id_raza',
        'descrip_raza'
    ];
}
