<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('modulos')->truncate();
        
        DB::table('modulos')->insert([
                [
                    'id' => 1,
                    'departamento_id' => 1,
                    'titulo' => 'Servicio Social',
                    'descripcion' => '<p>El departamento de Servicio Social es el Vínculo entre las coordinaciones de servicio social de las Unidades Académicas, con las dependencias del sector público, social y productivo; para que los alumnos realicen su servicio social universitario.</p><p><a target="_blank" rel="noopener noreferrer nofollow" href="https://sistema.serviciosocial.unach.mx/">Visita el sistema SISSUR</a></p>',
                    'created_at' => '2026-02-19 20:15:43',
                    'updated_at' => '2026-02-19 20:15:43',
                ],
                [
                    'id' => 2,
                    'departamento_id' => 1,
                    'titulo' => 'Vinculación y Prácticas Profesionales',
                    'descripcion' => '<p><strong>Objetivo</strong></p><p style="text-align: justify;">Son instrumentos flexibles que permiten adaptar los contenidos temáticos de los planes de estudio a la solución de la problemática de desarrollo económico, social y cultural; no fueron concebidos para sustituir o modificar la currícula, sino para enriquecerla. Son procesos que al mismo tiempo que tienen impacto en los fenómenos sociales, presentan efectos positivos en lo académico, dinamizando las funciones sustantivas.</p><p style="text-align: justify;">Lanza convocatoria de Unidades de Vinculación Docente dirigida a Docentes de Tiempo Completo y de medio tiempo Autoriza o rechaza las solicitudes da seguimiento a los proyectos.</p><p style="text-align: justify;"><a target="_blank" rel="noopener noreferrer nofollow" href="https://siresu.unach.mx/images/carteles/UVD2015.pdf"><strong>Unidades de Vinculación Docente 2015</strong></a></p><p style="text-align: justify;"><a target="_blank" rel="noopener noreferrer nofollow" href="https://siresu.unach.mx/images/carteles/UVD2014.pdf"><strong>Unidades de Vinculación Docente 2014</strong></a></p><p style="text-align: justify;"><a target="_blank" rel="noopener noreferrer nofollow" href="https://siresu.unach.mx/images/carteles/servicio-social-comunitario.pdf"><strong>El servicio Social Comunitario en comunidades Vulnerables de Chiapas</strong></a></p>',
                    'created_at' => '2026-02-19 21:05:30',
                    'updated_at' => '2026-02-19 21:05:30',
                ],
                [
                    'id' => 3,
                    'departamento_id' => 1,
                    'titulo' => 'Gestión Ambiental',
                    'descripcion' => '<p>Fomentar en los universitarios la adopción de conocimiento, hábitos y valores para la adopción de conocimientos, hábitos y valores para la construcción de la cultura ambiental, a través de asesorar, coordinar y normar la operación del Plan Ambiental Institucional (PAI-UNACH)y del Sistema de Gestión Ambiental (SGA-UNACH/ISO); así como también, a través de fortalecer el vínculo con el sector ambiental gubernamental y organización de la sociedad civil; en beneficio de la sociedad en general.</p><p style="text-align: justify;"></p><p style="text-align: justify;"><strong>Objetivos Específicos: </strong></p><ul><li><p style="text-align: justify;">I. Asegurar la atención de la temática ambiental (lineas de generación del conocimiento) así como de las líneas generales de acción del PAI-UNACH, por parte de las DAC´s y UA´s de todos los campus.</p></li><li><p style="text-align: justify;">II. Consolidar la operación del Sistema de Gestión Ambiental-UNACH, en la unidades Académicas y Dependencias de la Administración Central, dentro del alcance.</p></li><li><p style="text-align: justify;">III. Fortalecer la vinculación con Instituciones Gubernamentales del Sector Ambiental, así como con Empresas, Instituciones de Educación Superior y Organizaciones no gubernamentales.</p></li></ul>',
                    'created_at' => '2026-02-20 00:09:14',
                    'updated_at' => '2026-02-20 00:09:24',
                ],
                [
                    'id' => 4,
                    'departamento_id' => 3,
                    'titulo' => 'Identidad Universitaria',
                    'descripcion' => '<p>El departamento de Identidad Universitaria se encarga de contribuir al fortalecimiento de la Identidad en la comunidad universitaria, en cada uno de los UNACHENSES</p><p>Que se refiere a:</p><p>•	Alumnos</p><p>•	Administrativos</p><p>•	Personal por Honorarios</p><p>•	Docentes</p>',
                    'created_at' => '2026-02-20 00:55:25',
                    'updated_at' => '2026-02-20 00:55:25',
                ],
                [
                    'id' => 5,
                    'departamento_id' => 3,
                    'titulo' => 'Bienestar Estudiantil',
                    'descripcion' => '<p>El área de <strong>Bienestar Estudiantil</strong> tiene como propósito fundamental acompañarte de manera integral durante tu trayectoria por la universidad. Entendemos que la vida académica puede presentar diversos retos, por lo que estamos aquí para brindarte las herramientas, la orientación y el apoyo emocional que necesites para superarlos.</p><p>A través de este espacio, promovemos iniciativas orientadas al cuidado de tu salud física y mental, ofreciendo servicios de orientación, asesoría preventiva y fomento de estilos de vida saludables. Nuestro compromiso es garantizar un entorno armónico e inclusivo, donde tu tranquilidad sea la base que te permita alcanzar tu máximo potencial académico y personal. ¡No estás solo en este camino!</p>',
                    'created_at' => '2026-02-20 00:55:25',
                    'updated_at' => '2026-02-20 00:55:25',
                ],
                [
                    'id' => 6,
                    'departamento_id' => 3,
                    'titulo' => 'Seguro Facultativo',
                    'descripcion' => '<p>El Seguro Facultativo para Estudiantes es un esquema de aseguramiento médico que otorga el IMSS de forma gratuita a las y los estudiantes de las instituciones públicas de los niveles medio superior, superior y posgrado. A partir del 2016 por mandato presidencial, los números de afiliación para estudiantes pasan de ser números convencionales a números ordinarios para garantizar su derecho a la salud y la seguridad social.</p><p><br><strong>Objetivo:</strong><br>Tramitar la afiliación de las personas aspirantes, estudiantes presenciales y a distancia (Profesional superior universitario, licenciatura, maestría y doctorado) al régimen de seguro facultativo modalidad Números Ordinarios, con la incorporaciónde los Número de Seguridad Social (NSS) en el sistema IDSE (IMSS desde su empresa) para que puedan tener acceso al servicio médico del IMSS.</p><p>Lo primero que debes hacer es obtener tu Número de Seguridad Social (NSS), que es para toda la vida. Es muy sencillo y tienes tres alternativas para hacerlo:</p><p>1.     Web <a target="_blank" rel="noopener noreferrer nofollow" href="http://www.imss.gob.mx">www.imss.gob.mx</a> : Utiliza el trámite de asignación o localización del Número de Seguridad Social. Para ello necesitas tener a la mano CURP, comprobante de domicilio y correo electrónico</p><p></p><p>2.     App: Descarga la App IMSS Digital en tu celular, ó consúltala desde el sitio web  <a target="_blank" rel="noopener noreferrer nofollow" href="https://www.imss.gob.mx/imssdigital">https://www.imss.gob.mx/imssdigital</a> y genéralo en la sección de trámites y servicios. También necesitas tu CURP, comprobante de domicilio y correo electrónico.</p><p>3.     Subdelegación: En caso de tener algún problema con la generación de tu NSS o la obtención de vigencia de derechos, debes acudir a alguna de las Subdelegaciones del IMSS con los mismos documentos, además de una identificación oficial y acta de nacimiento.</p><ul><li><p>Subdelegación Tuxtla Gutiérrez (Poliforum): Blvd. Antonio Pariente Algarín No. 250, Colonia Reserva. Teléfono: 961 121 2046</p></li><li><p>Subdelegación Tapachula: Boulevard Príncipe Akismino sn, Adolfo Zamora Cruz, 30799. Teléfono: 962 628 1715</p></li></ul><p></p><p>4.     Cuando hayas obtenido tu NSS, proporciónalo al responsable de seguro facultativo de tu unidad académica para que soliciten tu registro como estudiante en el IMSS, quien a su vez te notificará cuando hayas sido dado de alta, en un lapso de 72 hrs.<br><br></p><p>5.     Consulta a la persona responsable de seguro facultativo de tu Unidad Académica aquí.<br><br></p><p>6.     Posteriormente debes acudir a la unidad médica familiar a canjear tu carnet médico de citas con los siguientes documentos en original y copia:</p><ul><li><p>Acta de nacimiento</p></li><li><p>Documento con el Número de seguridad social</p></li><li><p>CURP</p></li><li><p>Identificación Oficial</p></li><li><p>Comprobante de domicilio vigente</p></li><li><p>2 fotografías tamaño infantil<br></p></li></ul><p>Si ya cuentas con tu carnet, debes mantenerlo vigente acudiendo a visitas médicas semestralmente o acudiendo a las jornadas PREVENIMSS que se realizan semestralmente en las Unidades Académicas.</p><p></p>',
                    'created_at' => '2026-02-20 00:55:25',
                    'updated_at' => '2026-02-20 01:26:29',
                ],
                [
                    'id' => 7,
                    'departamento_id' => 3,
                    'titulo' => 'Becas',
                    'descripcion' => '<h2>Área de Becas SIRESU</h2><p>El área de becas de la SIRESU se encarga de apoyar en los trámites de gestión de becas económicas para la continuación de estudios que emiten diversas instituciones públicas y privadas.</p><p>Se cuenta con una red de responsables de becas capacitados en cada una de las Unidades Académicas.</p><p>Si eres alumno interesado y deseas consultar al responsable que te corresponde, puedes hacerlo accediendo a:<br><a target="_blank" rel="noopener noreferrer nofollow" href="https://becas.unach.mx/">https://becas.unach.mx/</a></p><h2>Propósito</h2><p>Evitar la deserción escolar de alumnos de nivel licenciatura mediante la gestión de solicitudes de becas y estímulos que permitan la continuación y/o culminación de sus estudios, a través de la difusión de diversas convocatorias en todas las sedes académicas.</p><h2>¿Qué hacemos?</h2><ul><li><p>Búsqueda y difusión de convocatorias</p></li><li><p>Gestión de solicitudes y asesoría en el proceso</p></li><li><p>Seguimiento a las solicitudes</p></li></ul><h2>Histórico de Convocatorias de Becas 2022</h2><ul><li><p>Beca Benito Juárez (BBJ) – Jóvenes Escribiendo el Futuro</p></li><li><p>Becas Benito Juárez (BBJ) Elisa Acuña – Manutención, Titulación</p></li><li><p>Becas Apoyo a Madres Mexicanas Jefas de Familia – CONACyT</p></li><li><p>Beca de Titulación – Instituto de Ciencia y Tecnología e Innovación del Estado de Chiapas</p></li><li><p>Bécalos</p></li><li><p>Bécalos Telmex – Telcel</p></li><li><p>Becas BBVA</p></li></ul><h2>Requisitos para solicitar apoyos de la SEP</h2><p>Para solicitar alguno de los apoyos que otorga la Secretaría de Educación Pública (SEP), a través de la Coordinación Nacional de Becas para el Bienestar Benito Juárez (CNBBBJ), es necesario que el alumno:</p><ul><li><p>Se encuentre inscrito en los tiempos establecidos por la Dirección General de Docencia y Servicios Escolares.</p></li><li><p>Genere una cuenta en el SUBES:<br><a target="_blank" rel="noopener noreferrer nofollow" href="https://subes.becasbenitojuarez.gob.mx/">https://subes.becasbenitojuarez.gob.mx/</a></p></li></ul><h2>Becas Jóvenes Escribiendo el Futuro</h2><p><img src="http://siresu.test/storage/Om0ROpFnjGfiWpOn4mtTNCDsyJyJMDr2iTcJdrGu.jpg" data-id="Om0ROpFnjGfiWpOn4mtTNCDsyJyJMDr2iTcJdrGu.jpg"></p><p>Si tienes dudas sobre alguno de los programas antes mencionados, te sugerimos visitar el siguiente enlace para conocer quién es la persona responsable de becas que te corresponde:</p><p></p>',
                    'created_at' => '2026-02-20 01:49:16',
                    'updated_at' => '2026-02-22 04:42:37',
                ],
                [
                    'id' => 8,
                    'departamento_id' => 3,
                    'titulo' => 'Deportes',
                    'descripcion' => '<p>Fortalecer en los alumnos los valores, actitudes, habilidades y trabajo en equipo; así como fomentar la promoción de la salud y generar hábitos saludables a través de la activación física y de la práctica del deporte en la comunidad universitaria y la sociedad en general.</p><p style="text-align: justify;"><strong>Objetivos específicos:</strong></p><p style="text-align: justify;">    I.   Brindar al estudiante los elementos necesarios que le permitan su desarrollo físico, mental y emocional a través de la práctica deportiva recreativa.</p><p style="text-align: justify;">    II.   Identificar y apoyar el desarrollo constante de las habilidades y actitudes de los estudiantes de alto rendimiento deportivo.</p><p style="text-align: justify;">    III.  Promover, impulsar y fomentar la práctica deportiva y el desarrollo de actividades vinculadas con el deporte, así mismo concertar con los diversos            organismos y asociaciones del deporte para consolidar la cultura física.</p><p style="text-align: justify;"><img src="http://siresu.test/storage/wB5s6EqQVy0OXVSUER0oUK92LmUhMNDHhuvlouAC.jpg" alt="beca jovenes escribiendo el futuro" data-id="wB5s6EqQVy0OXVSUER0oUK92LmUhMNDHhuvlouAC.jpg"></p><p style="text-align: justify;">Así mismo el departamento de Deporte te brinda las instalaciones pertinentes en el que puedes desarrollar tus actividades físicas como lo es el Multideportivo de Ciudad Universitaria UNACH.</p>',
                    'created_at' => '2026-02-20 02:39:27',
                    'updated_at' => '2026-02-22 04:42:37',
                ],
                [
                    'id' => 9,
                    'departamento_id' => 3,
                    'titulo' => 'Multideportivo',
                    'descripcion' => '<p><strong>El multideportivo te brinda las siguientes instalaciones:</strong></p><p>Alberca Semiolimpica</p><p>Cancha Techada</p><p>Cancha Digital</p><p>Pista de Atletismo</p>',
                    'created_at' => '2026-02-20 02:53:12',
                    'updated_at' => '2026-02-20 02:53:12',
                ],
                [
                    'id' => 10,
                    'departamento_id' => 3,
                    'titulo' => 'Arte y Cultura',
                    'descripcion' => '<p>El Departamento de Arte y Cultura, tiene como objetivo brindar a nuestros estudiantes los diferentes Talleres Artísticos en donde puedan desarrollar sus habilidades artísticas y culturales.</p><p>Te compartimos los Talleres Artísticos que ofertamos para este ciclo agosto-diciembre 2023.</p><p><strong>Para mayor información da clic en el siguiente link:</strong></p><p><a target="_blank" rel="noopener noreferrer nofollow" href="https://siresu.unach.mx/talleres/">https://siresu.unach.mx/talleres/</a></p>',
                    'created_at' => '2026-02-20 03:00:05',
                    'updated_at' => '2026-02-22 04:42:38',
                ],
                [
                    'id' => 11,
                    'departamento_id' => 2,
                    'titulo' => 'Procesos Editoriales',
                    'descripcion' => '<p>El área de Procesos Editoriales es el corazón de nuestra producción bibliográfica. Aquí acompañamos a nuestros autores —investigadores, docentes y miembros de la comunidad universitaria— en cada etapa del camino para transformar sus ideas en obras publicadas de la más alta calidad.</p><p>Nos encargamos de gestionar el ciclo de vida completo de cada publicación: desde la recepción y evaluación rigurosa de manuscritos (revisión por pares), hasta la corrección de estilo, el diseño editorial y la maquetación final en formatos impresos y digitales.</p><p>Nuestro compromiso no termina con la impresión; también nos encargamos de la difusión y comercialización de nuestro acervo para que el conocimiento universitario llegue a tus manos. Te invitamos a explorar nuestro catálogo completo, descubrir nuestras novedades literarias y adquirir tus obras favoritas de manera rápida y segura en nuestra plataforma oficial.</p><p><a target="_blank" rel="noopener noreferrer nofollow" href="https://www.editorial.unach.mx">https://www.editorial.unach.mx</a></p>',
                    'created_at' => '2026-02-20 22:07:52',
                    'updated_at' => '2026-02-20 22:07:52',
                ],
            ]);
        Schema::enableForeignKeyConstraints();
    }
}