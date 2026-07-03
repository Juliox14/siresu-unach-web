<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InstalacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('instalaciones')->truncate();
        
        DB::table('instalaciones')->insert([
                [
                    'id' => 1,
                    'nombre' => 'Auditorio',
                    'subtitulo' => 'Belisario Domínguez',
                    'descripcion_corta' => 'Te ofrece sus instalaciones de primer nivel para eventos académicos, culturales y sociales. Un espacio diseñado para inspirar.',
                    'caracteristicas' => '["Conciertos","Clausuras Escolares","Conferencias y Foros","Eventos VIP"]',
                    'descripcion_detallada' => '<p>La Universidad Autónoma de Chiapas cuenta con uno de los auditorios mas vanguardistas del país y esta a un costado de la Facultad de Ciencias Administrativas de la UNACH en Comitán, Chiapas.</p><p><br>Cuenta con un sistema dual de espacio escénico: sala con aforo 799 al interior del auditorio y 1000 personas en el foro al aire libre.</p>',
                    'imagen_portada' => 'instalaciones/portadas/01KJ26M9QPC7K9DYV5CYDBAG80.png',
                    'es_destacado' => 1,
                    'disponible_renta' => 1,
                    'telefono' => '(961) 617-8000',
                    'extension' => 'Ext. 5551',
                    'created_at' => '2026-02-22 08:07:35',
                    'updated_at' => '2026-02-22 08:14:35',
                ],
            ]);
        Schema::enableForeignKeyConstraints();
    }
}