<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('instalaciones', function (Blueprint $table) {
            // Agregamos la columna JSON
            $table->json('caracteristicas')->nullable()->after('descripcion_corta');
        });
    }

    public function down(): void
    {
        Schema::table('instalaciones', function (Blueprint $table) {
            $table->dropColumn('caracteristicas');
        });
    }
};

