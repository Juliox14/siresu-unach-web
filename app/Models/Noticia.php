<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $fillable = [
        'titulo', 
        'slug', 
        'resumen', 
        'contenido', 
        'autor_texto',    
        'imagen_portada', 
        'autor_imagen',
        'fecha_publicacion', 
        'activo',
        'departamento_id',
        'estado_publicacion',
        'comentarios_revision',
    ];

    protected $casts = [
        'fecha_publicacion' => 'date',
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