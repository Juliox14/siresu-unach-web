<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('eventos', function (Blueprint $table) {
            // Agregamos el campo para guardar la ruta del archivo
            $table->string('archivo_adjunto')->nullable()->after('mapa_iframe');
        });
    }

    public function down(): void
    {
        Schema::table('eventos', function (Blueprint $table) {
            $table->dropColumn('archivo_adjunto');
        });
    }
};
