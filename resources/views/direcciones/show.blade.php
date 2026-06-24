<x-layout :title="$departamento->nombre . ' - SIRESU'">

    <x-page-banner titulo="Dirección {{ $departamento->nombre }}" :descripcion="$departamento->subtitulo ?? null" :isHome="false"
        :redes="\App\Models\RedSocial::all()" />

    <!-- === SECCIÓN PRINCIPAL: DESCRIPCIÓN Y SIDEBAR === -->
    <section class="bg-white py-20 md:py-28 font-sans relative overflow-hidden">

        <div
            class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-unach-fondo rounded-full blur-3xl opacity-50 pointer-events-none">
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="flex flex-col lg:flex-row gap-12 lg:gap-16 items-start">

                <div class="w-full lg:w-2/3 flex flex-col space-y-12">
                    @if ($departamento->imagen_portada)
                        <div
                            class="w-full relative rounded-3xl p-2 bg-white shadow-[0_8px_30px_rgb(0,0,0,0.06)] border border-gray-100">
                            <div class="w-full overflow-hidden rounded-2xl group">
                                <img src="{{ asset('storage/' . $departamento->imagen_portada) }}"
                                    alt="{{ $departamento->nombre }}"
                                    class="w-full h-72 md:h-112.5 object-cover object-center group-hover:scale-105 transition-transform duration-1000 ease-out">
                            </div>
                        </div>
                    @endif

                    @if ($departamento->descripcion)
                        <div
                            class="prose prose-lg max-w-none text-gray-600 leading-loose text-justify font-poppins
                                    prose-headings:font-heading prose-headings:text-unach-azul-oscuro prose-headings:font-bold 
                                    prose-a:text-unach-azul prose-a:font-semibold hover:prose-a:text-unach-dorado prose-a:transition-colors">
                            {!! $departamento->descripcion !!}
                        </div>
                    @endif
                </div>

                <aside class="w-full lg:w-1/3 lg:sticky lg:top-28">
                    <div class="bg-white shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 rounded-3xl p-8">
                        <div class="flex items-center mb-8 border-b border-gray-100 pb-4">
                            <div class="w-10 h-10 rounded-full bg-unach-fondo flex items-center justify-center mr-4">
                                <x-heroicon-s-building-office class="w-5 h-5 text-unach-dorado" />
                            </div>
                            <h3 class="text-xl font-bold text-unach-azul-oscuro font-heading tracking-tight">Estructura
                            </h3>
                        </div>

                        @php
                            $otrosDepartamentos = \App\Models\Departamento::orderBy('nombre', 'asc')->get();
                        @endphp

                        @if ($otrosDepartamentos->count() > 0)
                            <div class="flex flex-col space-y-2 font-poppins">
                                @foreach ($otrosDepartamentos as $depto)
                                    @if ($depto->id === $departamento->id)
                                        <div
                                            class="flex items-center justify-between px-5 py-4 bg-unach-azul-oscuro text-white rounded-2xl shadow-md transform scale-[1.02] transition-transform">
                                            <span class="font-semibold text-sm">{{ $depto->nombre }}</span>
                                            <div
                                                class="w-2 h-2 rounded-full bg-unach-dorado shadow-[0_0_8px_rgba(234,179,8,0.8)]">
                                            </div>
                                        </div>
                                    @else
                                        <a href="{{ route('direcciones.show', $depto->slug) }}"
                                            class="flex items-center justify-between px-5 py-4 bg-transparent rounded-2xl text-gray-500 font-medium text-sm hover:bg-unach-fondo hover:text-unach-azul-oscuro transition-all duration-300 group border border-transparent hover:border-gray-100">
                                            <span
                                                class="group-hover:translate-x-1 transition-transform duration-300">{{ $depto->nombre }}</span>
                                            <x-heroicon-m-arrow-right
                                                class="w-4 h-4 opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-300 text-unach-dorado" />
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        @else
                            <span class="block px-4 py-3 text-sm text-gray-400 italic font-poppins">No hay departamentos
                                aún.</span>
                        @endif
                    </div>
                </aside>

            </div>
        </div>
    </section>

    <!-- === SECCIÓN SECUNDARIA: MÓDULOS CON EXPANSIÓN === -->
    @if ($departamento->modulos && $departamento->modulos->count() > 0)
        <section class="bg-unach-fondo py-24 border-t border-gray-100 relative font-sans">
            <div class="absolute top-0 left-0 w-full h-1 bg-unach-dorado"></div>

            <div class="container mx-auto px-4 lg:px-8">

                <div
                    class="text-center md:text-left mb-16 flex flex-col md:flex-row md:items-end justify-between gap-6">
                    <div>
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span
                                class="text-unach-dorado text-xs font-bold uppercase tracking-widest font-poppins">Servicios
                                Internos</span>
                        </div>
                        <h2 class="text-3xl md:text-5xl font-bold text-unach-azul-oscuro tracking-tight font-heading">
                            Áreas y Servicios</h2>
                    </div>
                    <p class="text-gray-500 text-base max-w-md font-poppins pb-2">
                        Explora las diferentes secciones, plataformas y funciones operativas que conforman esta
                        dirección.
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 xl:gap-10">
                    @foreach ($departamento->modulos as $index => $modulo)
                        <!-- Tarjeta con estado Alpine.js: detecta automáticamente si el contenido es muy largo -->
                        <div x-data="{ expanded: false, showButton: false }" x-init="setTimeout(() => { showButton = $refs.contentBox.scrollHeight > 300 }, 100)"
                            class="bg-white rounded-3xl p-8 md:p-10 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white hover:border-unach-dorado/30 relative flex flex-col h-full hover:shadow-[0_20px_40px_rgb(0,0,0,0.08)] transition-all duration-500 group overflow-hidden">

                            <!-- Número de fondo -->
                            <div
                                class="absolute -top-4 -right-4 text-9xl font-black text-gray-50 opacity-60 group-hover:text-unach-dorado/5 transition-colors duration-500 font-heading select-none pointer-events-none">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </div>

                            <div class="relative z-10 flex flex-col h-full">
                                <h3
                                    class="text-2xl font-bold text-unach-azul-oscuro mb-6 font-heading group-hover:text-unach-azul transition-colors">
                                    {{ $modulo->titulo }}</h3>

                                @php
                                    $imagenes = $modulo->archivos->where('tipo', 'imagen');
                                    $videos = $modulo->archivos->where('tipo', 'video');
                                    $documentos = $modulo->archivos->whereIn('tipo', ['pdf', 'enlace']);
                                @endphp

                                <!-- CONTENEDOR COLAPSABLE -->
                                <div x-ref="contentBox"
                                    class="relative overflow-hidden transition-[max-height] duration-500 ease-in-out"
                                    :style="expanded ? `max-height: ${$refs.contentBox.scrollHeight}px` : 'max-height: 300px'">

                                    <!-- Media: Imágenes -->
                                    @if ($imagenes->count() > 0)
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                                            @foreach ($imagenes as $imagen)
                                                <a href="{{ asset('storage/' . $imagen->ruta) }}" target="_blank"
                                                    class="block group/img relative overflow-hidden rounded-2xl h-48 bg-gray-50">
                                                    <img src="{{ asset('storage/' . $imagen->ruta) }}"
                                                        alt="{{ $imagen->nombre ?? $modulo->titulo }}"
                                                        class="w-full h-full object-cover transform group-hover/img:scale-110 transition-transform duration-700">
                                                    <div
                                                        class="absolute inset-0 bg-unach-azul-oscuro/0 group-hover/img:bg-unach-azul-oscuro/30 transition-colors duration-300 flex items-center justify-center opacity-0 group-hover/img:opacity-100 backdrop-blur-sm">
                                                        <x-heroicon-m-arrows-pointing-out
                                                            class="w-8 h-8 text-white drop-shadow-md" />
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                    @endif

                                    <!-- Media: Videos -->
                                    @if ($videos->count() > 0)
                                        <div class="space-y-4 mb-8">
                                            @foreach ($videos as $video)
                                                <div
                                                    class="w-full overflow-hidden rounded-2xl shadow-sm bg-black aspect-video relative">
                                                    <video controls preload="metadata"
                                                        class="w-full h-full object-contain">
                                                        <source src="{{ asset('storage/' . $video->ruta) }}"
                                                            type="video/mp4">
                                                    </video>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                    <!-- Contenido Texto -->
                                    @if ($modulo->descripcion)
                                        <div
                                            class="prose prose-sm max-w-none text-gray-600 mb-6 leading-relaxed font-poppins">
                                            {!! $modulo->descripcion !!}
                                        </div>
                                    @endif

                                    <!-- Gradiente para desvanecer el final si está colapsado -->
                                    <div x-show="showButton && !expanded"
                                        class="absolute bottom-0 left-0 w-full h-24 bg-linear-to-t from-white via-white/90 to-transparent pointer-events-none">
                                    </div>
                                </div>

                                <!-- Botón Expandir/Contraer -->
                                <div x-show="showButton" style="display: none;" class="mt-2 mb-6">
                                    <button @click="expanded = !expanded"
                                        class="inline-flex items-center px-4 py-2 bg-unach-fondo hover:bg-unach-azul/10 text-unach-azul-oscuro font-bold text-sm rounded-xl transition-colors duration-300 focus:outline-none">
                                        <span x-text="expanded ? 'Ocultar detalles' : 'Mostrar todo'"></span>
                                        <x-heroicon-m-chevron-down :class="expanded ? 'rotate-180' : ''"
                                            class="w-4 h-4 ml-2 transition-transform duration-500 text-unach-dorado" />
                                    </button>
                                </div>

                                <!-- Acciones (SIEMPRE VISIBLES, FUERA DEL ÁREA COLAPSABLE) -->
                                @if ($documentos->count() > 0)
                                    <div
                                        class="mt-auto pt-6 border-t border-gray-100 flex flex-wrap gap-3 font-poppins">
                                        @foreach ($documentos as $doc)
                                            @if ($doc->tipo === 'pdf')
                                                <a href="{{ asset('storage/' . $doc->ruta) }}" target="_blank"
                                                    class="inline-flex items-center px-6 py-3 bg-unach-fondo text-unach-azul-oscuro font-semibold text-sm rounded-xl hover:bg-unach-dorado hover:text-white transition-all duration-300 group/btn">
                                                    <x-heroicon-o-document-arrow-down
                                                        class="w-5 h-5 mr-2 text-unach-azul group-hover/btn:text-white transition-colors" />
                                                    {{ $doc->nombre ?? 'Descargar Documento' }}
                                                </a>
                                            @elseif($doc->tipo === 'enlace')
                                                <a href="{{ $doc->ruta }}" target="_blank"
                                                    class="inline-flex items-center px-6 py-3 bg-unach-azul-oscuro text-white font-semibold text-sm rounded-xl hover:bg-unach-azul transition-all duration-300 shadow-md hover:shadow-lg group/btn">
                                                    {{ $doc->nombre ?? 'Visitar Enlace' }}
                                                    <x-heroicon-m-arrow-top-right-on-square
                                                        class="w-4 h-4 ml-2 text-unach-dorado group-hover/btn:-translate-y-0.5 group-hover/btn:translate-x-0.5 transition-transform" />
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

</x-layout>
