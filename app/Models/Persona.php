<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Persona extends Model
{
    protected $fillable = ['area_id', 'nombre', 'cargo', 'correo', 'telefono', 'foto', 'orden'];

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }
}
