<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RedSocial extends Model
{

    protected $table = 'redes_sociales';
    
    protected $fillable = [
        'departamento_id', // <-- Agrega este
        'nombre',
        'url',
        'icono',
        'activo'
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}
