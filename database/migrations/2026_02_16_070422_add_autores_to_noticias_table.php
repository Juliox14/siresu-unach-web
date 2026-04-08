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
        Schema::table('noticias', function (Blueprint $table) {
            // Agregamos los campos como 'nullable' por si tienes noticias viejas sin este dato
            $table->string('autor_texto')->nullable()->after('contenido');
            $table->string('autor_imagen')->nullable()->after('imagen_portada');
        });
    }

    public function down(): void
    {
        Schema::table('noticias', function (Blueprint $table) {
            $table->dropColumn(['autor_texto', 'autor_imagen']);
        });
    }
};
