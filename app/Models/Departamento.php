<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = ['nombre', 'slug', 'imagen_portada', 'descripcion'];


    public function modulos()
    {
        return $this->hasMany(Modulo::class);
    }

    public function usuarios()
    {
        return $this->hasMany(User::class);
    }

    public function noticias()
    {
        return $this->hasMany(Noticia::class);
    }

    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }

    public function convocatorias()
    {
        return $this->hasMany(Convocatoria::class);
    }
}
