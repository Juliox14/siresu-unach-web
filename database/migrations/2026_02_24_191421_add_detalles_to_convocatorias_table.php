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
        Schema::table('convocatorias', function (Blueprint $table) {
            $table->longText('descripcion_detallada')->nullable();
            $table->boolean('mostrar_pdf_visualizador')->default(false)->after('descripcion_detallada');
        });
    }

    public function down(): void
    {
        Schema::table('convocatorias', function (Blueprint $table) {
            $table->dropColumn(['descripcion_detallada', 'mostrar_pdf_visualizador']);
        });
    }
};
