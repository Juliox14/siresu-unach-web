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
        Schema::create('redes_sociales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('departamento_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('nombre');
            $table->string('url');
            $table->boolean('activo')->default(true);
            $table->timestamps();

            $table->unique(['departamento_id', 'nombre']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redes_sociales');
    }
};
