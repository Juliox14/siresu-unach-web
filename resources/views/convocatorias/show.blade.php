<x-layout :title="$convocatoria->titulo . ' - SIRESU'">
    
    <!-- Barra superior de navegación -->
    <div class="bg-unach-fondo py-4 border-b border-gray-200 font-poppins">
        <div class="container mx-auto px-4 lg:px-8">
            <a href="{{ route('noticias.index') }}" class="inline-flex items-center text-sm font-bold text-unach-azul-oscuro hover:text-unach-dorado transition-colors group">
                <x-heroicon-m-arrow-left class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform" />
                Volver a Convocatorias
            </a>
        </div>
    </div>

    <!-- Sección Principal -->
    <section class="py-12 bg-white font-sans">
        <div class="container mx-auto px-4 lg:px-8">
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">
                
                <!-- === COLUMNA IZQUIERDA: CONTENIDO (2/3) === -->
                <article class="lg:col-span-2 flex flex-col">
                    
                    <!-- Etiquetas (Badges) -->
                    <div class="flex flex-wrap items-center gap-3 mb-6 font-poppins">
                        @if ($convocatoria->departamento->nombre)
                            <span class="px-3 py-1 bg-unach-fondo text-unach-azul-oscuro text-xs font-bold rounded-lg uppercase tracking-wider border border-gray-200">
                                {{ $convocatoria->departamento->nombre }}
                            </span>
                        @endif
                        <span class="px-3 py-1 bg-unach-dorado text-unach-azul-oscuro text-xs font-bold rounded-lg uppercase tracking-wider">
                            {{ $convocatoria->categoria }}
                        </span>
                    </div>

                    <!-- Título -->
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-unach-azul-oscuro leading-tight mb-8 font-heading">
                        {{ $convocatoria->titulo }}
                    </h1>

                    <!-- Imagen de Portada -->
                    @if ($convocatoria->imagen)
                        <div class="w-full mb-10 rounded-3xl overflow-hidden shadow-sm border border-gray-100 bg-unach-fondo">
                            <img src="{{ asset('storage/' . $convocatoria->imagen) }}" 
                                 alt="{{ $convocatoria->titulo }}" 
                                 class="w-full h-auto max-h-125 object-cover">
                        </div>
                    @endif

                    <!-- Contenido Textual (Prose) -->
                    <div class="prose prose-lg max-w-none text-unach-gris-texto font-poppins leading-relaxed mb-12
                                prose-headings:font-heading prose-headings:text-unach-azul-oscuro prose-headings:font-bold 
                                prose-a:text-unach-azul hover:prose-a:text-unach-dorado prose-a:transition-colors prose-a:font-semibold">
                        @if ($convocatoria->descripcion_detallada)
                            {!! $convocatoria->descripcion_detallada !!}
                        @else
                            <p class="text-xl font-light">{{ $convocatoria->descripcion }}</p>
                        @endif
                    </div>

                    <!-- Visualizador PDF Integrado (Si aplica) -->
                    @php
                        $pdf = $convocatoria->archivos->where('tipo', 'documento')->first();
                    @endphp
                    
                    @if ($pdf && $convocatoria->mostrar_pdf_visualizador)
                        <div class="mt-8 pt-10 border-t border-gray-100">
                            <h3 class="text-2xl font-bold text-unach-azul-oscuro font-heading mb-6 flex items-center">
                                <x-heroicon-s-document-text class="w-6 h-6 mr-3 text-unach-dorado" />
                                Documento Oficial
                            </h3>
                            <div class="h-150 w-full rounded-3xl overflow-hidden shadow-inner border border-gray-200 bg-unach-fondo">
                                <iframe src="{{ asset('storage/' . $pdf->ruta) }}" class="w-full h-full border-0"></iframe>
                            </div>
                        </div>
                    @endif

                </article>

                <!-- === COLUMNA DERECHA: SIDEBAR (1/3) === -->
                <aside class="lg:col-span-1 sticky top-28 font-poppins flex flex-col gap-6">
                    
                    <!-- Tarjeta: Estado y Fechas -->
                    <div class="bg-unach-fondo p-6 md:p-8 rounded-3xl border border-gray-100 shadow-sm">
                        
                        <!-- Estado -->
                        @if (in_array($convocatoria->estado, ['Abierta', 'Nueva']))
                            <div class="inline-flex items-center px-4 py-2 bg-green-100 text-green-800 text-xs font-bold rounded-xl mb-6 uppercase tracking-wider">
                                <span class="w-2.5 h-2.5 bg-green-500 rounded-full mr-2 animate-pulse shadow-[0_0_5px_#4ade80]"></span>
                                {{ $convocatoria->estado }}
                            </div>
                        @else
                            <div class="inline-flex items-center px-4 py-2 bg-red-100 text-red-800 text-xs font-bold rounded-xl mb-6 uppercase tracking-wider">
                                <span class="w-2.5 h-2.5 bg-red-500 rounded-full mr-2"></span>
                                {{ $convocatoria->estado }}
                            </div>
                        @endif
                        
                        <h3 class="text-lg font-bold text-unach-azul-oscuro mb-5 font-heading">Información Clave</h3>
                        
                        <div class="space-y-5">
                            <div class="flex items-start">
                                <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center mr-4 shadow-sm shrink-0">
                                    <x-heroicon-s-calendar-days class="w-5 h-5 text-unach-dorado" />
                                </div>
                                <div>
                                    <p class="text-[10px] text-gray-500 uppercase tracking-widest font-bold mb-1">Cierre de registro</p>
                                    <p class="text-sm font-bold text-unach-azul-oscuro">
                                        {{ \Carbon\Carbon::parse($convocatoria->fecha_limite)->translatedFormat('d \d\e F, Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tarjeta: Acciones / Descargas -->
                    @if ($pdf || $convocatoria->link_externo)
                        <div class="bg-unach-azul-oscuro p-6 md:p-8 rounded-3xl shadow-[0_10px_30px_rgba(0,27,58,0.15)] text-white relative overflow-hidden group">
                            <!-- Círculo decorativo -->
                            <div class="absolute -right-8 -top-8 w-32 h-32 bg-unach-azul rounded-full opacity-50 pointer-events-none"></div>
                            
                            <div class="relative z-10">
                                <h3 class="text-lg font-bold text-white mb-6 font-heading border-b border-white/20 pb-4">Acciones y Enlaces</h3>
                                
                                <div class="flex flex-col gap-4">
                                    @if ($pdf)
                                        <a href="{{ asset('storage/' . $pdf->ruta) }}" download
                                            class="w-full inline-flex items-center justify-center px-6 py-3.5 bg-unach-dorado text-unach-azul-oscuro font-bold text-sm rounded-xl hover:bg-white transition-all hover:-translate-y-1 shadow-sm">
                                            Descargar Bases <x-heroicon-m-arrow-down-tray class="w-5 h-5 ml-2" />
                                        </a>
                                    @endif

                                    @if ($convocatoria->link_externo)
                                        <a href="{{ $convocatoria->link_externo }}" target="_blank"
                                            class="w-full inline-flex items-center justify-center px-6 py-3.5 bg-white/10 text-white font-bold text-sm rounded-xl hover:bg-unach-azul transition-all hover:-translate-y-1 shadow-sm border border-white/20 backdrop-blur-sm">
                                            Ir a la plataforma <x-heroicon-m-arrow-top-right-on-square class="w-5 h-5 ml-2" />
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif

                </aside>

            </div>
        </div>
    </section>

</x-layout>