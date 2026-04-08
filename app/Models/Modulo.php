<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $fillable = [
        'departamento_id',
        'titulo',
        'descripcion'
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function archivos()
    {
        return $this->morphMany(Archivo::class, 'fileable');
    }
}
