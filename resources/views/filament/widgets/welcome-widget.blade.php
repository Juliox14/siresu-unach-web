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
                    Aquí tienes el control total para gestionar el contenido dinámico de la página. Utiliza el menú lateral izquierdo para navegar entre las diferentes secciones: podrás publicar nuevas <b>Noticias</b>, agendar próximos <b>Eventos</b>, actualizar la información del <b>Directorio</b> institucional, y administrar las <b>Convocatorias</b> y <b>Aliados</b>. 
                    <br><br>
                    Cualquier cambio que realices y guardes aquí, se reflejará automáticamente en la página web pública.
                </p>
            </div>
            
        </div>
    </x-filament::section>
</x-filament-widgets::widget>