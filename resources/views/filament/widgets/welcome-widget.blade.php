<x-filament-widgets::widget>
    <x-filament::section>
        <div style="display: flex; align-items: center; gap: 1.5rem;">
            
            <div class="hidden sm:block" style="color: #EAB308; padding: 1rem; border-radius: 9999px; box-shadow: inset 0 2px 4px 0 rgba(0,0,0,0.1);">
                <img src="{{ asset('images/logo-unach-color.png') }}" alt="SIRESU Logo" style="width: 3rem; height: 3rem; object-fit: contain;">
            </div>

            <div style="flex: 1;">
                <h2 style="font-size: 1.8rem; font-weight: 700; margin: 0; color: #111827; letter-spacing: -0.025em;">
                    ¡Bienvenido, {{ auth()->user()->name }}! 👋
                </h2>
                
                <p style="margin-top: 1rem; font-size: 1rem; line-height: 1.6; color: #4B5563; max-width: 56rem;">
                    Este es el <b>Panel de Administración del portal web de SIRESU</b>. 
                    <br><br>
                    
                    @if (auth()->user()->hasRole('super_admin'))
                        Como Administrador, tienes el control total sobre la configuración y estructura de la plataforma. Utiliza el menú lateral izquierdo para:
                        <ul style="margin-top: 0.5rem; margin-bottom: 0.5rem; padding-left: 1.5rem; list-style-type: disc;">
                            <li><b>Contenido:</b> Publicar Noticias, agendar Eventos y gestionar Convocatorias.</li>
                            <li><b>Configuración:</b> Modificar las imágenes de Inicio (Hero) y la sección Acerca de.</li>
                            <li><b>Catálogos y Directorio:</b> Actualizar Departamentos, Áreas, Instalaciones, Enlaces Rápidos y el personal del Directorio Institucional.</li>
                            <li><b>Administración:</b> Dar de alta nuevos usuarios y asignar roles y permisos.</li>
                        </ul>
                    @else
                        Aquí tienes el control para gestionar el contenido dinámico de la página. Utiliza el menú lateral izquierdo para navegar entre las diferentes secciones: podrás publicar nuevas <b>Noticias</b>, agendar próximos <b>Eventos</b> y administrar las <b>Convocatorias</b>.
                        <br><br>
                    @endif

                    Cualquier cambio que realices y guardes aquí, se reflejará automáticamente en la página web pública.
                </p>
            </div>
            
        </div>
    </x-filament::section>
</x-filament-widgets::widget>