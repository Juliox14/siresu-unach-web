@if($instalacionDestacada)
    <style>
        /* Animación suave para la imagen */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        /* Sombra de texto para mejorar lectura sobre video */
        .text-shadow-soft {
            text-shadow: 0 4px 6px rgba(0,0,0,0.5);
        }
    </style>

    @php
        // Buscamos si hay un archivo de tipo video asociado a esta instalación
        $videoFondo = $instalacionDestacada->archivos->where('tipo', 'video')->first();
    @endphp

    <section class="relative py-20 mb-14 font-sans border-t border-blue-900 overflow-hidden group {{ $videoFondo ? '' : 'bg-[#001B3A]' }}">

        <div class="absolute inset-0 z-0">
            @if($videoFondo)
                <video src="{{ asset('storage/' . $videoFondo->ruta) }}" 
                       autoplay loop muted playsinline
                       class="w-full h-full object-cover filter blur-[2px] scale-105 transition-transform duration-[20s] group-hover:scale-110" 
                       alt="Fondo {{ $instalacionDestacada->nombre }}">
                </video>
            @endif
            <div class="absolute inset-0 bg-[#001B3A]/85 mix-blend-multiply"></div>
            <div class="absolute inset-0 bg-linear-to-r from-[#001B3A]/90 via-transparent to-[#001B3A]/40"></div>
        </div>

        <div class="relative z-10 container mx-auto px-6 md:px-12">
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                
                <div class="flex justify-center lg:justify-end order-2 lg:order-1">
                    @if($instalacionDestacada->imagen_portada)
                        <img src="{{ asset('storage/' . $instalacionDestacada->imagen_portada) }}" 
                             alt="{{ $instalacionDestacada->nombre }}" 
                             class="relative w-3/4 h-auto drop-shadow-2xl animate-float">
                    @endif
                </div>

                <div class="text-white order-1 lg:order-2 text-center lg:text-left">
                    
                    <h2 class="text-4xl md:text-5xl font-extrabold tracking-wide text-shadow-soft leading-tight">
                        {{ $instalacionDestacada->nombre }} <br>
                        @if($instalacionDestacada->subtitulo)
                            <span class="text-[#EAB308]">{{ $instalacionDestacada->subtitulo }}</span>
                        @endif
                    </h2>

                    <div class="h-1 w-24 bg-[#EAB308] my-6 mx-auto lg:mx-0 rounded-full"></div>

                    <p class="text-gray-200 text-lg mb-8 leading-relaxed font-light">
                        {{ $instalacionDestacada->descripcion_corta }}
                    </p>

                    @if($instalacionDestacada->caracteristicas && count($instalacionDestacada->caracteristicas) > 0)
                        <ul class="grid grid-cols-2 gap-x-4 gap-y-3 mb-8 text-sm md:text-base font-medium text-gray-100">
                            @foreach($instalacionDestacada->caracteristicas as $bullet)
                                <li class="flex items-center justify-center lg:justify-start">
                                    <span class="w-2 h-2 bg-[#EAB308] rounded-full mr-3"></span>
                                    {{ $bullet }}
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    @if($instalacionDestacada->telefono)
                        <div class="border-t border-gray-600/50 pt-6 mb-8">
                            <p class="text-sm text-gray-300 mb-1">Contrataciones e informes:</p>
                            <p class="text-xl font-bold text-white flex items-center justify-center lg:justify-start gap-2">
                                <x-heroicon-m-phone class="w-5 h-5 text-[#EAB308]" />
                                {{ $instalacionDestacada->telefono }} 
                                @if($instalacionDestacada->extension)
                                    <span class="text-sm font-normal text-[#EAB308]">({{ $instalacionDestacada->extension }})</span>
                                @endif
                            </p>
                            <p class="mt-2 text-[#EAB308]/80 text-sm font-medium tracking-wider">
                                #{{ str_replace(' ', '', $instalacionDestacada->subtitulo ?? $instalacionDestacada->nombre) }}UNACH
                            </p>
                        </div>
                    @endif

                    <div>
                        
                        <a href="{{ route('instalaciones.index') }}#instalacion-{{ $instalacionDestacada->id }}" class="group relative inline-flex items-center justify-center px-8 py-3 font-bold text-white transition-all duration-200 bg-[#EAB308] font-pj rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#EAB308] hover:bg-[#dca600]">
                            <span class="relative flex items-center text-[#001B3A]">
                                Conocer más
                            </span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endif