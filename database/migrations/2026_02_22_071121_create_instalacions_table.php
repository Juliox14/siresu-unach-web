<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('instalaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('subtitulo')->nullable();
            $table->text('descripcion_corta')->nullable();
            $table->longText('descripcion_detallada')->nullable();
            
            $table->string('imagen_portada')->nullable();
            
            $table->boolean('es_destacado')->default(false);
            $table->boolean('disponible_renta')->default(false);
            
            $table->string('telefono')->nullable();
            $table->string('extension')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('instalaciones');
    }
};