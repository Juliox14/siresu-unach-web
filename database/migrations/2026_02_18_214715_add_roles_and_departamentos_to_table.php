<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('rol')->default('editor')->after('email'); 
            $table->foreignId('departamento_id')->nullable()->constrained('departamentos')->nullOnDelete()->after('rol');
        });

        Schema::table('noticias', function (Blueprint $table) {
            $table->foreignId('departamento_id')->nullable()->constrained('departamentos')->nullOnDelete()->after('contenido');
        });

        Schema::table('eventos', function (Blueprint $table) {
            $table->foreignId('departamento_id')->nullable()->constrained('departamentos')->nullOnDelete()->after('descripcion');
        });

        Schema::table('convocatorias', function (Blueprint $table) {
            $table->foreignId('departamento_id')->nullable()->constrained('departamentos')->nullOnDelete()->after('descripcion');
        });
    }

    public function down(): void
    {
        // Para revertir en caso de errores
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['departamento_id']);
            $table->dropColumn(['rol', 'departamento_id']);
        });

        Schema::table('noticias', function (Blueprint $table) {
            $table->dropForeign(['departamento_id']);
            $table->dropColumn('departamento_id');
        });

        Schema::table('eventos', function (Blueprint $table) {
            $table->dropForeign(['departamento_id']);
            $table->dropColumn('departamento_id');
        });

        Schema::table('convocatorias', function (Blueprint $table) {
            $table->dropForeign(['departamento_id']);
            $table->dropColumn('departamento_id');
        });
    }
};