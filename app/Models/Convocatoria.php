<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Convocatoria extends Model
{
    protected $fillable = [
        'titulo',
        'fecha_limite',
        'categoria',
        'estado',
        'imagen',
        'activo',
        'departamento_id',
        'descripcion_detallada',
        'mostrar_pdf_visualizador',
        'slug',
    ];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $casts = [
        'fecha_limite' => 'date',
        'activo' => 'boolean',
        'mostrar_pdf_visualizador' => 'boolean',
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
