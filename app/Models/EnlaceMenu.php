<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EnlaceMenu extends Model
{
    protected $guarded = [];

    protected static function booted(): void
    {
        // Limpiar caché en cualquier cambio
        static::saved(fn() => Cache::forget('menu_principal'));
        static::deleted(fn() => Cache::forget('menu_principal'));
    }

    public function hijos(): HasMany
    {
        return $this->hasMany(EnlaceMenu::class, 'padre_id')->orderBy('orden');
    }

    public function padre(): BelongsTo
    {
        return $this->belongsTo(EnlaceMenu::class, 'padre_id');
    }
}