<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Infraccion extends Model
{
    protected $table = 'infracciones';

    protected $fillable = [
        'cedula',
        'nombres',
        'apellidos',
        'placa_vehiculo',
        'tipo_infraccion',
        'estado',
        'direccion',
        'numero',
        'bitacora',
        'documentos'
    ];

    protected $casts = [
        'documentos' => 'array',
    ];
}
