<x-layout title="Instalaciones - SIRESU">
    
    <!-- === BANNER PRINCIPAL === -->
    <x-page-banner titulo="Instalaciones de la SIRESU"
        descripcion="Espacios de primer nivel diseñados para inspirar, fomentar el deporte, la cultura y el desarrollo académico. Conoce nuestros recintos disponibles para la comunidad universitaria y el público en general."
        :isHome="false" 
        :redes="\App\Models\RedSocial::all()" />

    <!-- === GRID DE INSTALACIONES === -->
    <!-- Se ajustó el padding superior (py-24) ya que eliminamos el header sobrante -->
    <section class="bg-white py-24 px-4 md:px-12 lg:px-24 font-sans relative z-10">
        <div class="max-w-7xl mx-auto">

            <!-- Filtros y Subtítulo -->
            <div class="text-center md:text-left mb-12 flex flex-col md:flex-row justify-between items-end gap-6 border-b border-gray-100 pb-6">
                <div>
                    <!-- Etiqueta reubicada aquí para no perderla -->
                    <div class="inline-flex items-center gap-2 mb-3">
                        <span class="w-6 h-1 bg-unach-dorado rounded-full"></span>
                        <span class="text-unach-dorado text-xs font-bold uppercase tracking-widest font-poppins">Infraestructura</span>
                    </div>
                    <h2 class="text-3xl font-bold text-unach-azul-oscuro mb-2 font-heading">Espacios Universitarios</h2>
                    <p class="text-unach-gris-texto font-poppins">Áreas deportivas, académicas y recreativas a tu disposición.</p>
                </div>
                
                <!-- Filtros (Visuales) -->
                <div class="flex gap-3 font-poppins">
                    <button class="px-6 py-2.5 bg-unach-azul-oscuro text-white text-sm font-bold rounded-xl shadow-md transition-transform hover:-translate-y-0.5">
                        Todos
                    </button>
                    <button class="px-6 py-2.5 bg-white text-unach-gris-texto border border-gray-200 text-sm font-bold rounded-xl hover:bg-unach-fondo hover:text-unach-azul-oscuro transition-all hover:border-transparent">
                        Para Renta
                    </button>
                </div>
            </div>

            @if ($instalaciones->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 xl:gap-10">

                    @foreach ($instalaciones as $instalacion)
                        <!-- TARJETA DE INSTALACIÓN -->
                        <div id="instalacion-{{ $instalacion->id }}" 
                             x-data="{ modalOpen: new URLSearchParams(window.location.search).get('open') == '{{ $instalacion->id }}' }"
                             class="bg-white rounded-3xl overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 flex flex-col group hover:shadow-[0_20px_40px_rgb(0,0,0,0.08)] hover:border-unach-dorado/30 transition-all duration-500">
                            
                            <!-- Imagen y Badges -->
                            <div class="relative h-64 overflow-hidden cursor-pointer" @click="modalOpen = true">
                                <img src="{{ asset('storage/' . $instalacion->imagen_portada) }}"
                                    alt="{{ $instalacion->nombre }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">

                                <!-- Overlay sutil oscuro para destacar badges -->
                                <div class="absolute inset-0 bg-linear-to-t from-unach-azul-oscuro/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                                @if ($instalacion->disponible_renta)
                                    <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-md px-4 py-2 rounded-xl text-[10px] font-black text-unach-azul-oscuro shadow-lg flex items-center font-poppins tracking-wider uppercase border border-white/20">
                                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse shadow-[0_0_8px_rgba(34,197,94,0.6)]"></span>
                                        Disponible Renta
                                    </div>
                                @else
                                    <div class="absolute top-4 right-4 bg-unach-azul-oscuro/90 backdrop-blur-md px-4 py-2 rounded-xl text-[10px] font-bold text-white shadow-lg flex items-center font-poppins tracking-wider uppercase border border-white/10">
                                        <span class="w-2 h-2 bg-unach-dorado rounded-full mr-2"></span> 
                                        Comunidad UNACH
                                    </div>
                                @endif
                                
                                <!-- Icono flotante al hover -->
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none">
                                    <div class="bg-white/20 backdrop-blur-md p-4 rounded-full text-white">
                                        <x-heroicon-o-arrows-pointing-out class="w-8 h-8" />
                                    </div>
                                </div>
                            </div>

                            <!-- Contenido -->
                            <div class="p-8 flex flex-col flex-1">
                                @if ($instalacion->subtitulo)
                                    <p class="text-unach-dorado font-bold text-[10px] mb-2 uppercase tracking-widest font-poppins">
                                        {{ $instalacion->subtitulo }}
                                    </p>
                                @endif
                                
                                <h3 class="text-2xl font-bold text-unach-azul-oscuro mb-4 font-heading group-hover:text-unach-azul transition-colors leading-tight">
                                    {{ $instalacion->nombre }}
                                </h3>

                                <p class="text-unach-gris-texto mb-8 flex-1 text-sm leading-relaxed font-poppins line-clamp-3">
                                    {{ $instalacion->descripcion_corta }}
                                </p>

                                <button @click="modalOpen = true"
                                    class="inline-flex items-center justify-between w-full px-6 py-3.5 bg-unach-fondo text-unach-azul-oscuro font-bold text-sm rounded-xl hover:bg-unach-dorado hover:text-white transition-all duration-300 font-poppins group/btn">
                                    <span>Ver galería y detalles</span> 
                                    <x-heroicon-m-arrow-right class="w-4 h-4 group-hover/btn:translate-x-1 transition-transform" />
                                </button>
                            </div>

                            <!-- Componente Modal -->
                            <x-instalaciones.modal :instalacion="$instalacion" />

                        </div>
                    @endforeach

                </div>
            @else
                <!-- Estado Vacío Moderno -->
                <div class="text-center py-24 bg-unach-fondo rounded-3xl border border-gray-100 shadow-sm">
                    <x-heroicon-o-building-office-2 class="w-16 h-16 text-gray-300 mx-auto mb-4" />
                    <h3 class="text-2xl font-bold text-unach-azul-oscuro mb-2 font-heading">Aún no hay instalaciones registradas</h3>
                    <p class="text-unach-gris-texto font-poppins">Los espacios universitarios y recintos aparecerán aquí pronto.</p>
                </div>
            @endif

        </div>
    </section>

</x-layout>