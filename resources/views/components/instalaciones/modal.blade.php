@props(['instalacion'])

<div x-show="modalOpen" 
     style="display: none;"
     x-init="$watch('modalOpen', value => document.body.classList.toggle('overflow-hidden', value))"
     @keydown.escape.window="modalOpen = false"
     class="fixed inset-0 z-50 flex items-center justify-center bg-[#001B3A]/80 p-4 sm:p-6"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0">


    <div @click.away="modalOpen = false" 
         class="bg-white w-full max-w-5xl max-h-[90vh] rounded-2xl shadow-2xl overflow-hidden flex flex-col relative"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-8 scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
         x-transition:leave-end="opacity-0 translate-y-8 scale-95">

        <button @click="modalOpen = false" class="absolute top-4 right-4 z-10 p-2 bg-white/80 hover:bg-white backdrop-blur-sm rounded-full text-gray-500 hover:text-red-600 transition-colors shadow-sm">
            <x-heroicon-o-x-mark class="w-6 h-6"/>
        </button>

        <div class="overflow-y-auto flex-1 p-6 md:p-10">
            
            <h2 class="text-3xl md:text-4xl font-extrabold text-[#001B3A] mb-2">{{ $instalacion->nombre }}</h2>
            @if($instalacion->subtitulo)
                <h3 class="text-xl font-bold text-[#EAB308] mb-6">{{ $instalacion->subtitulo }}</h3>
            @endif

            @php
                $imagenes = $instalacion->archivos->where('tipo', 'imagen');
                $videos = $instalacion->archivos->where('tipo', 'video');
            @endphp

            @if($videos->count() > 0)
                <div class="space-y-4 mb-8 mt-4">
                    @foreach($videos as $video)
                        <div class="w-full overflow-hidden rounded-xl shadow-sm border border-gray-200 bg-black aspect-video relative">
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

            @if($instalacion->caracteristicas && count($instalacion->caracteristicas) > 0)
                <div class="mb-10 bg-gray-50 p-6 rounded-xl border border-gray-100">
                    <h4 class="text-lg font-bold text-[#001B3A] mb-4">Características principales:</h4>
                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-y-3 gap-x-6 text-gray-700">
                        @foreach($instalacion->caracteristicas as $bullet)
                            <li class="flex items-start">
                                <div class="w-2.5 h-2.5 bg-[#EAB308] rounded-full mr-3 mt-1.5 shadow-[0_0_5px_rgba(234,179,8,0.5)] shrink-0"></div> 
                                <span class="leading-relaxed">{{ $bullet }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($imagenes->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-10">
                    @foreach($imagenes as $imagen)
                        <div class="rounded-xl overflow-hidden aspect-video shadow-sm border border-gray-100">
                            <img src="{{ asset('storage/' . $imagen->ruta) }}" alt="Galería" class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                        </div>
                    @endforeach
                </div>
            @endif

            @if($instalacion->descripcion_detallada)
                <div class="prose prose-lg prose-blue text-gray-700 max-w-none mb-8">
                    {!! $instalacion->descripcion_detallada !!}
                </div>
            @endif
            
            @if($instalacion->telefono)
                <div class="bg-[#F8F9FA] p-6 rounded-2xl border border-gray-200 flex items-center">
                    <div class="w-12 h-12 bg-[#001B3A] rounded-full flex items-center justify-center mr-4">
                        <x-heroicon-s-phone class="w-6 h-6 text-[#EAB308]"/>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-semibold uppercase tracking-wider">Para rentas o informes</p>
                        <p class="text-xl font-bold text-[#001B3A]">{{ $instalacion->telefono }} 
                            @if($instalacion->extension) 
                                <span class="text-base font-normal text-gray-500">({{ $instalacion->extension }})</span> 
                            @endif
                        </p>
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>