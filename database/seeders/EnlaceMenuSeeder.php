<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class EnlaceMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('enlace_menus')->truncate();
        
        DB::table('enlace_menus')->insert([
                [
                    'id' => 1,
                    'titulo' => 'Acerca De',
                    'url' => '/acerca-de',
                    'es_menu_desplegable' => 1,
                    'padre_id' => null,
                    'orden' => 2,
                    'fila' => 2,
                    'nueva_pestana' => 0,
                    'created_at' => '2026-04-26 21:35:35',
                    'updated_at' => '2026-04-27 01:48:30',
                ],
                [
                    'id' => 2,
                    'titulo' => 'Inicio',
                    'url' => '/',
                    'es_menu_desplegable' => 0,
                    'padre_id' => null,
                    'orden' => 1,
                    'fila' => 2,
                    'nueva_pestana' => 0,
                    'created_at' => '2026-04-26 21:37:49',
                    'updated_at' => '2026-04-27 01:48:30',
                ],
                [
                    'id' => 3,
                    'titulo' => 'Identidad Social',
                    'url' => '/acerca-de#identidad',
                    'es_menu_desplegable' => 0,
                    'padre_id' => 1,
                    'orden' => 1,
                    'fila' => 2,
                    'nueva_pestana' => 0,
                    'created_at' => '2026-04-27 00:47:58',
                    'updated_at' => '2026-04-27 00:47:58',
                ],
                [
                    'id' => 4,
                    'titulo' => 'Misión, Visión y Valores',
                    'url' => '/acerca-de#mision-vision-valores',
                    'es_menu_desplegable' => 0,
                    'padre_id' => 1,
                    'orden' => 2,
                    'fila' => 2,
                    'nueva_pestana' => 0,
                    'created_at' => '2026-04-27 00:47:58',
                    'updated_at' => '2026-04-27 00:47:58',
                ],
                [
                    'id' => 5,
                    'titulo' => 'Estructura y Contacto',
                    'url' => '/acerca-de#estructura-contacto',
                    'es_menu_desplegable' => 0,
                    'padre_id' => 1,
                    'orden' => 3,
                    'fila' => 2,
                    'nueva_pestana' => 0,
                    'created_at' => '2026-04-27 00:47:58',
                    'updated_at' => '2026-04-27 00:47:58',
                ],
                [
                    'id' => 6,
                    'titulo' => 'Direcciones',
                    'url' => null,
                    'es_menu_desplegable' => 1,
                    'padre_id' => null,
                    'orden' => 3,
                    'fila' => 2,
                    'nueva_pestana' => 0,
                    'created_at' => '2026-04-27 01:27:16',
                    'updated_at' => '2026-06-05 23:59:56',
                ],
                [
                    'id' => 7,
                    'titulo' => 'Editorial',
                    'url' => '/direcciones/editorial',
                    'es_menu_desplegable' => 0,
                    'padre_id' => 6,
                    'orden' => 1,
                    'fila' => 2,
                    'nueva_pestana' => 0,
                    'created_at' => '2026-04-27 01:27:16',
                    'updated_at' => '2026-06-05 23:59:56',
                ],
                [
                    'id' => 8,
                    'titulo' => 'Proyectos y Programas',
                    'url' => '/direcciones/proyectos-y-programas',
                    'es_menu_desplegable' => 0,
                    'padre_id' => 6,
                    'orden' => 2,
                    'fila' => 2,
                    'nueva_pestana' => 0,
                    'created_at' => '2026-04-27 01:27:16',
                    'updated_at' => '2026-06-05 23:59:56',
                ],
                [
                    'id' => 9,
                    'titulo' => 'Integración Univesitaria',
                    'url' => '/direcciones/integracion-universitaria',
                    'es_menu_desplegable' => 0,
                    'padre_id' => 6,
                    'orden' => 3,
                    'fila' => 2,
                    'nueva_pestana' => 0,
                    'created_at' => '2026-04-27 01:27:16',
                    'updated_at' => '2026-06-05 23:59:56',
                ],
                [
                    'id' => 10,
                    'titulo' => 'Tablero Informativo',
                    'url' => '/noticias',
                    'es_menu_desplegable' => 0,
                    'padre_id' => null,
                    'orden' => 4,
                    'fila' => 2,
                    'nueva_pestana' => 0,
                    'created_at' => '2026-04-27 01:46:21',
                    'updated_at' => '2026-06-23 22:31:24',
                ],
                [
                    'id' => 11,
                    'titulo' => 'Instalaciones',
                    'url' => '/instalaciones',
                    'es_menu_desplegable' => 0,
                    'padre_id' => null,
                    'orden' => 5,
                    'fila' => 2,
                    'nueva_pestana' => 0,
                    'created_at' => '2026-04-27 01:47:02',
                    'updated_at' => '2026-04-27 01:48:30',
                ],
                [
                    'id' => 12,
                    'titulo' => 'Directorio',
                    'url' => '/directorio',
                    'es_menu_desplegable' => 0,
                    'padre_id' => null,
                    'orden' => 6,
                    'fila' => 1,
                    'nueva_pestana' => 0,
                    'created_at' => '2026-04-27 01:47:29',
                    'updated_at' => '2026-06-06 00:00:09',
                ],
            ]);
        Schema::enableForeignKeyConstraints();
    }
}