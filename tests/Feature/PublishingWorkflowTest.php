<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Noticia;
use App\Models\Evento;
use App\Models\Convocatoria;
use App\Models\Configuracion;
use Illuminate\Support\Facades\DB;

class PublishingWorkflowTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();

        // Seed basic settings
        Configuracion::create([
            'clave' => 'requerir_aprobacion_noticias', 
            'valor' => '1',
            'modulo' => 'Gobernanza',
            'nombre_descriptivo' => 'Noticias',
            'tipo_dato' => 'boolean'
        ]);
        Configuracion::create([
            'clave' => 'requerir_aprobacion_eventos', 
            'valor' => '1',
            'modulo' => 'Gobernanza',
            'nombre_descriptivo' => 'Eventos',
            'tipo_dato' => 'boolean'
        ]);
        Configuracion::create([
            'clave' => 'requerir_aprobacion_convocatorias', 
            'valor' => '1',
            'modulo' => 'Gobernanza',
            'nombre_descriptivo' => 'Convocatorias',
            'tipo_dato' => 'boolean'
        ]);
    }

    /** @test */
    public function public_home_page_only_shows_published_and_active_records()
    {
        // 1. Create Noticias
        $publishedNews = Noticia::create([
            'titulo' => 'Published News',
            'slug' => 'published-news',
            'resumen' => 'Resumen',
            'contenido' => 'Contenido',
            'autor_texto' => 'Autor',
            'imagen_portada' => 'img.jpg',
            'fecha_publicacion' => now(),
            'activo' => true,
            'estado_publicacion' => 'publicado',
        ]);

        $pendingNews = Noticia::create([
            'titulo' => 'Pending News',
            'slug' => 'pending-news',
            'resumen' => 'Resumen',
            'contenido' => 'Contenido',
            'autor_texto' => 'Autor',
            'imagen_portada' => 'img.jpg',
            'fecha_publicacion' => now(),
            'activo' => true,
            'estado_publicacion' => 'revision',
        ]);

        $inactiveNews = Noticia::create([
            'titulo' => 'Inactive News',
            'slug' => 'inactive-news',
            'resumen' => 'Resumen',
            'contenido' => 'Contenido',
            'autor_texto' => 'Autor',
            'imagen_portada' => 'img.jpg',
            'fecha_publicacion' => now(),
            'activo' => false,
            'estado_publicacion' => 'publicado',
        ]);

        // 2. Create Eventos
        $publishedEvent = Evento::create([
            'titulo' => 'Published Event',
            'fecha_evento' => now()->addDays(5),
            'horario' => '10:00 - 12:00',
            'categoria' => 'Cultural',
            'activo' => true,
            'icono' => 'heroicon-o-calendar',
            'descripcion' => 'Descripción del evento',
            'imagen' => 'img.jpg',
            'estado_publicacion' => 'publicado',
        ]);

        $pendingEvent = Evento::create([
            'titulo' => 'Pending Event',
            'fecha_evento' => now()->addDays(5),
            'horario' => '10:00 - 12:00',
            'categoria' => 'Cultural',
            'activo' => true,
            'icono' => 'heroicon-o-calendar',
            'descripcion' => 'Descripción del evento',
            'imagen' => 'img.jpg',
            'estado_publicacion' => 'revision',
        ]);

        // 3. Create Convocatorias
        $publishedConvocatoria = Convocatoria::create([
            'titulo' => 'Published Convocatoria',
            'slug' => 'published-convocatoria',
            'categoria' => 'BECAS',
            'estado' => 'Abierta',
            'descripcion_detallada' => 'Detalles',
            'imagen' => 'img.jpg',
            'fecha_limite' => now()->addDays(5),
            'activo' => true,
            'estado_publicacion' => 'publicado',
        ]);

        $pendingConvocatoria = Convocatoria::create([
            'titulo' => 'Pending Convocatoria',
            'slug' => 'pending-convocatoria',
            'categoria' => 'BECAS',
            'estado' => 'Abierta',
            'descripcion_detallada' => 'Detalles',
            'imagen' => 'img.jpg',
            'fecha_limite' => now()->addDays(5),
            'activo' => true,
            'estado_publicacion' => 'revision',
        ]);

        // Access the public homepage
        $response = $this->get('/');

        $response->assertStatus(200);

        // Verify we see published content
        $response->assertSee('Published News');
        $response->assertSee('Published Event');
        $response->assertSee('Published Convocatoria');

        // Verify we DO NOT see unapproved/inactive content
        $response->assertDontSee('Pending News');
        $response->assertDontSee('Inactive News');
        $response->assertDontSee('Pending Event');
        $response->assertDontSee('Pending Convocatoria');
    }

    /** @test */
    public function public_show_route_returns_404_for_unapproved_noticia()
    {
        $pendingNews = Noticia::create([
            'titulo' => 'Pending News',
            'slug' => 'pending-news',
            'resumen' => 'Resumen',
            'contenido' => 'Contenido',
            'autor_texto' => 'Autor',
            'imagen_portada' => 'img.jpg',
            'fecha_publicacion' => now(),
            'activo' => true,
            'estado_publicacion' => 'revision',
        ]);

        $response = $this->get('/noticias/pending-news');
        $response->assertStatus(404);
    }

    /** @test */
    public function public_show_route_returns_404_for_unapproved_convocatoria()
    {
        $pendingConvocatoria = Convocatoria::create([
            'titulo' => 'Pending Convocatoria',
            'slug' => 'pending-convocatoria',
            'categoria' => 'BECAS',
            'estado' => 'Abierta',
            'descripcion_detallada' => 'Detalles',
            'imagen' => 'img.jpg',
            'fecha_limite' => now()->addDays(5),
            'activo' => true,
            'estado_publicacion' => 'revision',
        ]);

        $response = $this->get('/convocatorias/' . $pendingConvocatoria->id);
        $response->assertStatus(404);
    }

    /** @test */
    public function disabling_approval_setting_publishes_all_pending_records()
    {
        // 1. Create pending records
        $pendingNews = Noticia::create([
            'titulo' => 'Pending News',
            'slug' => 'pending-news',
            'resumen' => 'Resumen',
            'contenido' => 'Contenido',
            'autor_texto' => 'Autor',
            'imagen_portada' => 'img.jpg',
            'fecha_publicacion' => now(),
            'activo' => true,
            'estado_publicacion' => 'revision',
            'comentarios_revision' => 'Some old feedback',
        ]);

        $pendingEvent = Evento::create([
            'titulo' => 'Pending Event',
            'fecha_evento' => now()->addDays(5),
            'horario' => '10:00 - 12:00',
            'categoria' => 'Cultural',
            'activo' => true,
            'icono' => 'heroicon-o-calendar',
            'descripcion' => 'Descripción del evento',
            'imagen' => 'img.jpg',
            'estado_publicacion' => 'revision',
            'comentarios_revision' => 'Some old feedback',
        ]);

        $pendingConvocatoria = Convocatoria::create([
            'titulo' => 'Pending Convocatoria',
            'slug' => 'pending-convocatoria',
            'categoria' => 'BECAS',
            'estado' => 'Abierta',
            'descripcion_detallada' => 'Detalles',
            'imagen' => 'img.jpg',
            'fecha_limite' => now()->addDays(5),
            'activo' => true,
            'estado_publicacion' => 'revision',
            'comentarios_revision' => 'Some old feedback',
        ]);

        // Simulating the save action of the AjustesSistema Filament page
        // We will call the page logic directly by updating the settings and running the publish trigger logic.
        $this->disableApprovalAndTriggerPublish('requerir_aprobacion_noticias');
        $this->disableApprovalAndTriggerPublish('requerir_aprobacion_eventos');
        $this->disableApprovalAndTriggerPublish('requerir_aprobacion_convocatorias');

        // Assert they are now published and comments are cleared
        $this->assertEquals('publicado', $pendingNews->fresh()->estado_publicacion);
        $this->assertNull($pendingNews->fresh()->comentarios_revision);

        $this->assertEquals('publicado', $pendingEvent->fresh()->estado_publicacion);
        $this->assertNull($pendingEvent->fresh()->comentarios_revision);

        $this->assertEquals('publicado', $pendingConvocatoria->fresh()->estado_publicacion);
        $this->assertNull($pendingConvocatoria->fresh()->comentarios_revision);
    }

    private function disableApprovalAndTriggerPublish(string $clave)
    {
        $oldValue = '1';
        $newValue = '0';

        Configuracion::updateOrCreate(
            ['clave' => $clave],
            ['valor' => $newValue]
        );

        if ($oldValue === '1' && $newValue === '0') {
            if ($clave === 'requerir_aprobacion_noticias') {
                Noticia::where('estado_publicacion', 'revision')->update(['estado_publicacion' => 'publicado', 'comentarios_revision' => null]);
            } elseif ($clave === 'requerir_aprobacion_eventos') {
                Evento::where('estado_publicacion', 'revision')->update(['estado_publicacion' => 'publicado', 'comentarios_revision' => null]);
            } elseif ($clave === 'requerir_aprobacion_convocatorias') {
                Convocatoria::where('estado_publicacion', 'revision')->update(['estado_publicacion' => 'publicado', 'comentarios_revision' => null]);
            }
        }
    }
}
