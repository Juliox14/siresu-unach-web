@props(['instalacion'])

<style>
    /* Personalización del Scrollbar para el modal */
    .custom-scrollbar::-webkit-scrollbar {
        width: 8px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f8fafc; /* Color de fondo suave */
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #cbd5e1; /* Gris claro */
        border-radius: 10px;
        border: 2px solid #f8fafc; /* Espacio interior para que no se vea tan grueso */
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #EAB308; /* Dorado institucional al pasar el cursor */
    }
</style>

<div x-show="modalOpen" 
     style="display: none;"
     x-init="$watch('modalOpen', value => document.body.classList.toggle('overflow-hidden', value))"
     @keydown.escape.window="modalOpen = false"
     class="fixed inset-0 z-[999] flex items-center justify-center bg-unach-azul-oscuro/80 backdrop-blur-md p-4 sm:p-6 font-sans"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0">

    <div @click.away="modalOpen = false" 
         x-data="{ zoomedImage: null }"
         class="bg-white w-full max-w-5xl max-h-[90vh] rounded-3xl shadow-2xl overflow-hidden flex flex-col relative"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-8 scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
         x-transition:leave-end="opacity-0 translate-y-8 scale-95">

        <button @click="modalOpen = false" class="absolute top-6 right-6 z-20 p-2.5 bg-white/90 hover:bg-red-500 hover:text-white backdrop-blur-sm rounded-full text-gray-500 transition-all duration-300 shadow-sm focus:outline-none">
            <x-heroicon-o-x-mark class="w-6 h-6"/>
        </button>

        <div class="overflow-y-auto flex-1 p-8 md:p-12 lg:p-16 custom-scrollbar relative">
            
            <div class="mb-10 max-w-3xl">
                @if($instalacion->subtitulo)
                    <div class="inline-flex items-center gap-2 mb-3">
                        <span class="w-6 h-1 bg-unach-dorado rounded-full"></span>
                        <h3 class="text-sm font-bold text-unach-dorado uppercase tracking-widest font-poppins">{{ $instalacion->subtitulo }}</h3>
                    </div>
                @endif
                <h2 class="text-4xl md:text-5xl font-extrabold text-unach-azul-oscuro font-heading tracking-tight leading-tight">{{ $instalacion->nombre }}</h2>
            </div>

            @php
                $imagenes = $instalacion->archivos->where('tipo', 'imagen');
                $videos = $instalacion->archivos->where('tipo', 'video');
            @endphp

            @if($videos->count() > 0)
                <div class="space-y-6 mb-12">
                    @foreach($videos as $video)
                        <div class="w-full overflow-hidden rounded-3xl shadow-lg border border-gray-100 bg-black aspect-video relative">
                            <template x-if="modalOpen">
                                <video controls preload="none" class="w-full h-full object-contain">
                                    <source src="{{ asset('storage/' . $video->ruta) }}" type="video/mp4">
                                    Tu navegador no soporta la reproducción de videos.
                                </video>
                            </template>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="flex flex-col lg:flex-row gap-12">
                <div class="w-full lg:w-2/3">
                    
                    @if($instalacion->descripcion_detallada)
                        <div class="prose prose-lg max-w-none text-unach-gris-texto font-poppins leading-relaxed mb-10
                                    prose-headings:font-heading prose-headings:text-unach-azul-oscuro prose-headings:font-bold">
                            {!! $instalacion->descripcion_detallada !!}
                        </div>
                    @endif

                    @if($imagenes->count() > 0)
                        <h4 class="text-xl font-bold text-unach-azul-oscuro font-heading mb-6 border-b border-gray-100 pb-2">Galería de fotos</h4>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-10">
                            @foreach($imagenes as $imagen)
                                <div @click="zoomedImage = '{{ asset('storage/' . $imagen->ruta) }}'" 
                                     class="rounded-2xl overflow-hidden aspect-square md:aspect-video shadow-sm border border-gray-100 group cursor-zoom-in relative">
                                    <img src="{{ asset('storage/' . $imagen->ruta) }}" alt="Galería" 
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                    <div class="absolute inset-0 bg-unach-azul-oscuro/0 group-hover:bg-unach-azul-oscuro/20 transition-colors duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100 pointer-events-none">
                                        <x-heroicon-m-arrows-pointing-out class="w-8 h-8 text-white drop-shadow-md" />
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>

                <div class="w-full lg:w-1/3 flex flex-col gap-6">
                    
                    @if($instalacion->caracteristicas && count($instalacion->caracteristicas) > 0)
                        <div class="bg-unach-fondo p-8 rounded-3xl border border-gray-100">
                            <h4 class="text-lg font-bold text-unach-azul-oscuro font-heading mb-5">Características del espacio</h4>
                            <ul class="space-y-4 text-unach-gris-texto font-poppins text-sm">
                                @foreach($instalacion->caracteristicas as $bullet)
                                    <li class="flex items-start">
                                        <div class="mt-1 mr-3 shrink-0 bg-white p-1 rounded-full shadow-sm">
                                            <x-heroicon-s-check class="w-3.5 h-3.5 text-unach-dorado" />
                                        </div> 
                                        <span class="leading-relaxed">{{ $bullet }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if($instalacion->telefono)
                        <div class="bg-unach-azul-oscuro text-white p-8 rounded-3xl shadow-lg relative overflow-hidden group">
                            <div class="absolute -right-8 -top-8 w-32 h-32 bg-unach-azul rounded-full opacity-50 group-hover:scale-150 transition-transform duration-700 pointer-events-none"></div>
                            
                            <div class="relative z-10">
                                <div class="w-14 h-14 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-6">
                                    <x-heroicon-s-calendar-days class="w-7 h-7 text-unach-dorado"/>
                                </div>
                                
                                <p class="text-xs text-gray-300 font-semibold uppercase tracking-widest font-poppins mb-2">
                                    Reservas o informes
                                </p>
                                
                                <p class="text-3xl font-bold font-heading mb-1">{{ $instalacion->telefono }}</p>
                                
                                @if($instalacion->extension) 
                                    <p class="text-unach-dorado font-poppins text-sm">Extensión: <span class="font-bold">{{ $instalacion->extension }}</span></p> 
                                @endif
                            </div>
                        </div>
                    @endif

                </div>
            </div>

            <div x-show="zoomedImage" 
                 style="display: none;"
                 @click="zoomedImage = null"
                 @keydown.escape.window="zoomedImage = null"
                 class="fixed inset-0 z-[1000] flex items-center justify-center bg-black/90 p-4 cursor-zoom-out"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0">
                 
                <button class="absolute top-6 right-6 text-white/70 hover:text-white transition-colors focus:outline-none">
                    <x-heroicon-o-x-mark class="w-10 h-10"/>
                </button>

                <img :src="zoomedImage" @click.stop 
                     class="max-w-full max-h-[90vh] rounded-xl shadow-2xl object-contain cursor-default select-none border border-white/10">
            </div>

        </div>
    </div>
</div>