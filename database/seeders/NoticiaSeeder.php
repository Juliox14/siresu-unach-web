<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class NoticiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('noticias')->truncate();
        
        DB::table('noticias')->insert([
                [
                    'id' => 1,
                    'titulo' => 'XIII Encuentro Nacional y V Foro Internacional sobre Desarrollo Local y Territorial',
                    'slug' => 'xiii-encuentro-nacional-y-v-foro-internacional-sobre-desarrollo-local-y-territorial',
                    'resumen' => 'Será UNACH sede del XIII Encuentro Nacional y V Foro Internacional sobre Desarrollo Local y Territorial en mayo de 2026',
                    'contenido' => '<p>La <strong>Benemérita Universidad Autónoma de Chiapas</strong> convoca a investigadores, académicos, estudiantes y actores sociales a participar en el <strong>XIII Encuentro de la Red Nacional de Programas de Posgrado en Desarrollo Local</strong> y el <strong>V Foro Internacional de Desarrollo Territorial. Retos y Oportunidades actuales</strong>, que se realizarán del <strong>20 al 22 de mayo de 2026</strong> en la <strong>Facultad de Ciencias Sociales</strong>, <strong>Campus III</strong>, en San Cristóbal de Las Casas, Chiapas.</p><p style="text-align: justify;"></p><p style="text-align: justify;">El evento busca generar un espacio de <strong>análisis</strong>, <strong>intercambio de experiencias</strong> y <strong>construcción de propuestas</strong> en torno a los desafíos y oportunidades del desarrollo local y territorial, con un enfoque <strong>sostenible</strong>, <strong>inclusivo</strong> y <strong>participativo</strong>. Está dirigido a especialistas en <strong>políticas públicas</strong>, <strong>gestión territorial</strong>, <strong>economía social</strong>, <strong>sustentabilidad ambiental</strong>, <strong>innovación tecnológica</strong> y <strong>estudios culturales</strong>, entre otras disciplinas afines.</p><p style="text-align: justify;"></p><p style="text-align: justify;">Los ejes temáticos principales incluyen:</p><ul><li><p><strong>Gobernanza</strong> y políticas públicas.</p></li><li><p><strong>Desarrollo económico local</strong> y economía social.</p></li><li><p><strong>Sustentabilidad ambiental</strong> y cambio climático.</p></li><li><p><strong>Tecnología</strong> e innovación para el desarrollo territorial.</p></li><li><p><strong>Cultura</strong>, identidad y patrimonio.</p></li><li><p><strong>Evaluación de impacto</strong> territorial.</p></li></ul><p style="text-align: justify;"></p><p style="text-align: justify;">Este encuentro representa una oportunidad estratégica para fortalecer la <strong>vinculación académica</strong>, la <strong>investigación aplicada</strong> y la <strong>cooperación interinstitucional</strong> en temas clave para el desarrollo regional y nacional, posicionando a la UNACH como referente en el estudio y la promoción del <strong>desarrollo territorial sostenible</strong> en México e Iberoamérica.</p><p style="text-align: justify;"></p><p style="text-align: justify;">La convocatoria invita a la presentación de ponencias, mesas de trabajo y experiencias que contribuyan al debate académico y a la generación de propuestas concretas para enfrentar los retos actuales del desarrollo local con perspectiva sustentable y equitativa.</p>',
                    'autor_texto' => 'Yadira Fontes G.',
                    'imagen_portada' => 'noticias/01KGK0ZEWTDSZBEQ9C0TBWPDDB.jpg',
                    'autor_imagen' => 'UNACH',
                    'fecha_publicacion' => '2026-02-04',
                    'activo' => 1,
                    'created_at' => '2026-02-04 00:31:31',
                    'updated_at' => '2026-06-28 08:42:56',
                    'departamento_id' => null,
                    'estado_publicacion' => 'publicado',
                    'comentarios_revision' => null,
                ],
                [
                    'id' => 2,
                    'titulo' => 'Celebra UNACH el centenario del natalicio de Jaime Sabines',
                    'slug' => 'celebra-unach-el-centenario-del-natalicio-de-jaime-sabines',
                    'resumen' => 'Celebra UNACH el centenario del natalicio de Jaime Sabines',
                    'contenido' => '<p>• Se desarrollarán actividades alusivas en distintas unidades académicas.</p><p></p><p></p><p>Berriozábal, Chiapas.- La Benemérita Universidad Autónoma de Chiapas, a través de la Secretaría Académica, se suma a los festejos del centenario del natalicio del poeta mayor de Chiapas, Jaime Sabines, con el evento “Tú tienes lo que busco, 2026”.</p><p></p><p>Por lo anterior y en cumplimiento a las políticas de difusión cultural, se estarán llevando a cabo distintas actividades en las unidades académicas de: Ocozocoautla, San Cristóbal de Las Casas y Tuxtla Gutiérrez, que evocan el legado del poeta chiapaneco.</p><p></p><p>Bajo esta premisa, la primera actividad se desarrolló en el parque central de Berriozábal y su objetivo fue reflexionar y recordar la palabra del escritor chiapaneco, a través de la visión de distintos académicos.</p><p></p><p>En su mensaje, el Encargado de la Extensión Berriozábal, Fredy Vázquez Pérez, aseguró que la UNACH tiene la tarea de promover la cultura, y hablar de Jaime Sabines es referirse a uno de los escritores más influyentes en México.</p><p></p><p>Ante estudiantes, docentes y público en general, el reconocimiento incluyó una proyección audiovisual, donde el escritor compartía algunas de sus obras más importantes, además de un recital poético y una mesa de reflexión en torno a su obra.</p><p></p><p>Entre el legado más importante que nos heredó el poeta chiapaneco en su recorrido poético destacan: Harald (1950), Yuria (1967), Algo sobre la muerte del mayor Sabines (1973) y Tarumba (1979), entre otros.</p>',
                    'autor_texto' => 'Yadira Fontes G.',
                    'imagen_portada' => 'noticias/01KPW567F7SHVXFAQ9XAH04D4V.jpg',
                    'autor_imagen' => 'Juan Pérez',
                    'fecha_publicacion' => '2026-04-23',
                    'activo' => 1,
                    'created_at' => '2026-04-23 03:12:28',
                    'updated_at' => '2026-06-28 08:01:18',
                    'departamento_id' => 3,
                    'estado_publicacion' => 'publicado',
                    'comentarios_revision' => null,
                ],
            ]);
        Schema::enableForeignKeyConstraints();
    }
}