<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnlaceRapido extends Model
{
    protected $fillable = [
        'titulo',
        'enlace_url',
        'icono',
        'orden',
        'activo',
    ];
}