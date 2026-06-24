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
        Schema::table('enlace_menus', function (Blueprint $table) {
            // Agregamos la columna fila, por defecto a la 2 (menú principal)
            $table->tinyInteger('fila')->default(2)->after('orden');
        });
    }

    public function down(): void
    {
        Schema::table('enlace_menus', function (Blueprint $table) {
            $table->dropColumn('fila');
        });
    }
};
