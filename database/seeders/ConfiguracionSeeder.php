<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ConfiguracionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('configuracion')->truncate();
        
        DB::table('configuracion')->insert([
                [
                    'id' => 1,
                    'clave' => 'requerir_aprobacion_noticias',
                    'modulo' => 'Gobernanza',
                    'nombre_descriptivo' => 'Requerir aprobación para publicar noticias',
                    'tipo_dato' => 'boolean',
                    'valor' => '1',
                    'created_at' => '2026-06-28 06:02:11',
                    'updated_at' => '2026-06-28 08:35:07',
                ],
                [
                    'id' => 2,
                    'clave' => 'requerir_aprobacion_eventos',
                    'modulo' => 'Gobernanza',
                    'nombre_descriptivo' => 'Requerir aprobación para publicar eventos',
                    'tipo_dato' => 'boolean',
                    'valor' => '1',
                    'created_at' => '2026-06-28 06:02:11',
                    'updated_at' => '2026-06-28 08:43:10',
                ],
                [
                    'id' => 3,
                    'clave' => 'requerir_aprobacion_convocatorias',
                    'modulo' => 'Gobernanza',
                    'nombre_descriptivo' => 'Requerir aprobación para publicar convocatorias',
                    'tipo_dato' => 'boolean',
                    'valor' => '1',
                    'created_at' => '2026-06-28 06:02:12',
                    'updated_at' => '2026-06-28 08:35:07',
                ],
            ]);
        Schema::enableForeignKeyConstraints();
    }
}