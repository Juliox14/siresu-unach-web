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

    public function getImagenUrlAttribute()
    {
        return asset('storage/' . $this->imagen);
    }

    // Atributo para el Mes (ej: ENE)
    public function getMesLimiteAttribute()
    {
        return strtoupper($this->fecha_limite->translatedFormat('M'));
    }

    // Atributo para el Día (ej: 15)
    public function getDiaLimiteAttribute()
    {
        return $this->fecha_limite->format('d');
    }

    // Atributo para la Fecha Completa
    public function getFechaFormateadaAttribute()
    {
        return $this->fecha_limite->translatedFormat('d \d\e F, Y');
    }
}
