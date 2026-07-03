<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class EnlaceRapidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('enlace_rapidos')->truncate();
        
        DB::table('enlace_rapidos')->insert([
                [
                    'id' => 1,
                    'titulo' => 'Becas',
                    'enlace_url' => 'https://subes.becasbenitojuarez.gob.mx/',
                    'icono' => 'heroicon-o-academic-cap',
                    'orden' => 1,
                    'activo' => 1,
                    'created_at' => '2026-02-03 23:38:01',
                    'updated_at' => '2026-02-16 14:32:13',
                ],
                [
                    'id' => 2,
                    'titulo' => 'Responsabilidad Social',
                    'enlace_url' => 'https://siresu.unach.mx/images/convocatoria_medio_ambiente1.png',
                    'icono' => 'heroicon-o-globe-alt',
                    'orden' => 2,
                    'activo' => 1,
                    'created_at' => '2026-02-03 23:43:04',
                    'updated_at' => '2026-02-16 14:32:14',
                ],
                [
                    'id' => 3,
                    'titulo' => 'Talleres Culturales',
                    'enlace_url' => 'https://www.siresu.unach.mx/talleres/',
                    'icono' => 'heroicon-o-musical-note',
                    'orden' => 3,
                    'activo' => 1,
                    'created_at' => '2026-02-03 23:43:49',
                    'updated_at' => '2026-02-16 14:32:16',
                ],
                [
                    'id' => 4,
                    'titulo' => 'Egresados',
                    'enlace_url' => 'https://www.egresados.unach.mx',
                    'icono' => 'heroicon-o-user-group',
                    'orden' => 4,
                    'activo' => 1,
                    'created_at' => '2026-02-03 23:45:17',
                    'updated_at' => '2026-02-16 14:32:16',
                ],
                [
                    'id' => 5,
                    'titulo' => 'Integración universitaria',
                    'enlace_url' => 'https://subes.becasbenitojuarez.gob.mx/',
                    'icono' => 'heroicon-o-home-modern',
                    'orden' => 0,
                    'activo' => 0,
                    'created_at' => '2026-02-09 19:42:17',
                    'updated_at' => '2026-02-16 14:31:29',
                ],
            ]);
        Schema::enableForeignKeyConstraints();
    }
}