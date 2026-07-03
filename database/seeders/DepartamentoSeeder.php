<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('departamentos')->truncate();
        
        DB::table('departamentos')->insert([
                [
                    'id' => 1,
                    'nombre' => 'Proyectos y Programas',
                    'slug' => 'proyectos-y-programas',
                    'imagen_portada' => 'departamentos/01KHVVHQHQDTGAK2JKY76W21PM.jpg',
                    'descripcion' => 'La Dirección de Proyectos y Programas es el área encargada de vincular el talento, la vocación y el conocimiento de nuestra comunidad universitaria con las necesidades reales de la sociedad. Somos el puente estratégico entre tu formación académica y el mundo profesional. A través de iniciativas clave como el Servicio Social, coordinamos los esfuerzos entre las unidades académicas y los sectores público, social y productivo de Chiapas, garantizando que tu experiencia práctica tenga un impacto positivo y transforme tu entorno.',
                    'created_at' => '2026-02-18 22:55:37',
                    'updated_at' => '2026-02-19 21:05:30',
                ],
                [
                    'id' => 2,
                    'nombre' => 'Editorial',
                    'slug' => 'editorial',
                    'imagen_portada' => 'departamentos/01KHYHHMTMB90ENF4P6SGJNT33.png',
                    'descripcion' => 'La Dirección Editorial es el espacio donde el conocimiento, la cultura y la creatividad de nuestra comunidad universitaria cobran vida a través de las letras. Nuestro objetivo principal es coordinar, producir y difundir el trabajo intelectual, humanístico y científico de investigadores, docentes y estudiantes de nuestra máxima casa de estudios.

Trabajamos con el compromiso de dar voz a las ideas que transforman nuestro entorno, garantizando publicaciones de la más alta calidad. A través de la edición de libros, revistas académicas y material de divulgación, buscamos no solo preservar el patrimonio cultural e intelectual de la universidad, sino también fomentar el hábito de la lectura y acercar el conocimiento a toda la sociedad.',
                    'created_at' => '2026-02-18 22:59:43',
                    'updated_at' => '2026-02-20 22:08:25',
                ],
                [
                    'id' => 3,
                    'nombre' => 'Integración Universitaria',
                    'slug' => 'integracion-universitaria',
                    'imagen_portada' => 'departamentos/01KHW8PQG0DG420GXYQZEGJQYY.png',
                    'descripcion' => 'La Dirección de Integración Universitaria es el área dedicada a enriquecer tu experiencia como estudiante de la UNACH, yendo mucho más allá de las aulas. Nuestro propósito fundamental es procurar tu desarrollo humano integral, tu salud y tu sentido de pertenencia a nuestra máxima casa de estudios.',
                    'created_at' => '2026-02-18 23:00:56',
                    'updated_at' => '2026-02-20 00:55:25',
                ],
            ]);
        Schema::enableForeignKeyConstraints();
    }
}