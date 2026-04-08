<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('noticias', function (Blueprint $table) {
        $table->id();
        $table->string('titulo');
        $table->string('slug')->unique();
        $table->text('resumen')->nullable();
        $table->longText('contenido');
        $table->string('imagen_portada');
        $table->date('fecha_publicacion');
        $table->boolean('activo')->default(true);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noticias');
    }
};
