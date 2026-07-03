<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('eventos')->truncate();
        
        DB::table('eventos')->insert([
                [
                    'id' => 2,
                    'titulo' => 'Club de fotografía con Hacky Najera',
                    'fecha_evento' => '2026-05-20',
                    'horario' => '10:00 AM - 6:00 PM',
                    'categoria' => 'Talleres',
                    'ciudad' => 'San Cristobal de las Casas, Chiapas',
                    'direccion' => 'Facultad de Ciencias Sociales',
                    'mapa_iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3820.646704658903!2d-92.63380282484951!3d16.744470784037155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ed45251eb2f6c1%3A0x849a376b56c3fe62!2sUNACH%3A%20Facultad%20de%20Ciencias%20Sociales!5e0!3m2!1ses!2smx!4v1770533436252!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                    'icono' => 'heroicon-m-camera',
                    'descripcion' => 'Captura la esencia, domina el instante. 📸 🤳🏽🐾
¿Qué define nuestra identidad? ¿Cómo congelamos el movimiento sin perder la vida? Únete al Club de Fotografía UNACH y aprende de la mano de un experto: @hackynajera ✨
Puedes usar tu celular o cámara.
¡Sé parte de la nueva generación de fotógrafos ocelotes!
Próximamente más información.
¡Pendiente y pasa la voz! Y recuerda a San Cristobal se viene a caminar.',
                    'link_inscripcion' => 'https://docs.google.com/forms/d/e/1FAIpQLSc33-5tpP9jxncQNHxgV6xT8Do_qASHOudALAZQTCuF7HHYhA/viewform?usp=publish-editor',
                    'imagen' => 'eventos/01KGY0BKWE29G8AWV8XMAY04CJ.png',
                    'link_facebook' => null,
                    'link_instagram' => 'https://www.instagram.com/p/DUZE9Ehklgd/',
                    'activo' => 1,
                    'created_at' => '2026-02-08 06:52:19',
                    'updated_at' => '2026-06-28 08:35:17',
                    'departamento_id' => 2,
                    'estado_publicacion' => 'publicado',
                    'comentarios_revision' => null,
                ],
                [
                    'id' => 3,
                    'titulo' => 'Curso Internacional: Gusano Barrenador del Ganado',
                    'fecha_evento' => '2026-07-22',
                    'horario' => '10:00 AM - 6:00 PM',
                    'categoria' => 'Talleres',
                    'ciudad' => 'Tuxtla Gutiérrez, Chiapas',
                    'direccion' => 'FACULTAD DE CIENCIAS AGRICOLAS AUDITORIO "PEDRO RENE BODEGAS VALERA"',
                    'mapa_iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3853.6668254193273!2d-92.39869552504247!3d15.011188985525282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x858e00a38090542d%3A0x7b17873efa6366f6!2sUNACH%20Universidad%20Aut%C3%B3noma%20de%20Chiapas%20%5BCampus%20Huehuet%C3%A1n%5D!5e0!3m2!1ses!2smx!4v1776914800613!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                    'icono' => 'heroicon-m-building-library',
                    'descripcion' => 'IMPACTO DEL GBG EN LOS
MERCADOS
Rogelio Pérez Sánchez
Confederación Nacional de
Organizaciones Ganaderas

CONFERENCIAS ESPECIALES

PREDICCIÓN DE LA DISTRIBUCIÓN
POTENCIAL DEL GBG EN MÉXICO
Uriel Mauricio Valdéz Espinoza
CENID SAI INIFAP

TEMAS

· Análisis de los factores de la reinvasión del gusano barrenador del ganado en México.
· Situación actual y estrategias de erradicación del Gusano Barrenador del Ganado
· Programas fito-zoosanitarios en México
· Organización de Productores en Campañas sanitarias
· Nuevas fronteras biotecnológicas para controlar la miasis y la poblacion del GBG.
· Importancia del diagnóstico en el control y erradicación del gusano barrenador del ganado
· Genética de poblaciones de Cochliomyia hominivorax (Diptera: Calliphoridae): estructura
geográfica e implicaciones para el control.
· Principios de la Técnica del Insecto Estéril
· Cría masiva e importancia del sexado genético en el gusano barrenador del ganado
· Bases teóricas sobre trampeo y atrayentes en moscas: caso Gusano Barrenador del Ganado
· Perspectivas del empleo de enemigos naturales en el control biológico del gusano
barrenador del ganado
· Control químico del GBG y sus repercusiones
· Manejo de lesiones y curación del Gusano Barrenador en Bovino
· Hacia el control sostenible del GBG en el Siglo XXI
· Gusano Barrenador en Fauna Silvestre',
                    'link_inscripcion' => 'https://sysweb.unach.mx/FichaReferenciada/Form/Registro_Participantes.aspx?evento=202600197',
                    'imagen' => 'eventos/01KPW62CHWY7F53WW4VH8NR84Y.jpg',
                    'link_facebook' => null,
                    'link_instagram' => null,
                    'activo' => 1,
                    'created_at' => '2026-04-23 03:27:50',
                    'updated_at' => '2026-06-28 08:35:17',
                    'departamento_id' => 3,
                    'estado_publicacion' => 'publicado',
                    'comentarios_revision' => null,
                ],
            ]);
        Schema::enableForeignKeyConstraints();
    }
}