@if($instalacionDestacada)
@php
    $videoFondo = $instalacionDestacada->archivos->where('tipo', 'video')->first();
@endphp

<section class="relative py-20 overflow-hidden rounded-2xl group">

    {{-- Fondo: video o color institucional --}}
    <div class="absolute inset-0 z-0 bg-unach-azul">
        @if($videoFondo)
            <video src="{{ asset('storage/' . $videoFondo->ruta) }}"
                   autoplay loop muted playsinline
                   class="w-full h-full object-cover blur-sm scale-105 transition-transform duration-[20s] group-hover:scale-110">
            </video>
        @endif
        <div class="absolute inset-0 bg-unach-azul-oscuro/85 mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-linear-to-r from-unach-azul-oscuro/90 via-transparent to-unach-azul-oscuro/40"></div>
    </div>

    {{-- Contenido --}}
    <div class="relative z-10  container mx-auto px-6 md:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            {{-- Imagen instalación --}}
            <div class="flex justify-center lg:justify-end order-2 lg:order-1">
                @if($instalacionDestacada->imagen_portada)
                    <img src="{{ asset('storage/' . $instalacionDestacada->imagen_portada) }}"
                         alt="{{ $instalacionDestacada->nombre }}"
                         class="w-3/4 h-auto drop-shadow-2xl"
                         style="animation: float 6s ease-in-out infinite;">
                @endif
            </div>

            {{-- Texto --}}
            <div class="text-white order-1 lg:order-2 text-center lg:text-left space-y-6">

                {{-- Título --}}
                <div>
                    <h2 class="font-heading font-extrabold text-4xl md:text-5xl leading-tight tracking-tight text-white"
                        style="text-shadow: 0 4px 6px rgba(0,0,0,0.5);">
                        {{ $instalacionDestacada->nombre }}
                        @if($instalacionDestacada->subtitulo)
                            <br><span class="text-unach-dorado">{{ $instalacionDestacada->subtitulo }}</span>
                        @endif
                    </h2>
                    <div class="h-1 w-20 bg-unach-dorado mt-4 rounded-full mx-auto lg:mx-0"></div>
                </div>

                {{-- Descripción --}}
                <p class="font-poppins text-white/80 text-lg leading-relaxed font-light">
                    {{ $instalacionDestacada->descripcion_corta }}
                </p>

                {{-- Características --}}
                @if($instalacionDestacada->caracteristicas && count($instalacionDestacada->caracteristicas) > 0)
                    <ul class="grid grid-cols-2 gap-x-4 gap-y-3">
                        @foreach($instalacionDestacada->caracteristicas as $bullet)
                            <li class="flex items-center justify-center lg:justify-start gap-2 font-poppins text-sm text-white/90">
                                <span class="w-2 h-2 bg-unach-dorado rounded-full shrink-0"></span>
                                {{ $bullet }}
                            </li>
                        @endforeach
                    </ul>
                @endif

                {{-- Teléfono --}}
                @if($instalacionDestacada->telefono)
                    <div class="border-t border-white/20 pt-6 space-y-1">
                        <p class="font-poppins text-sm text-white/60">Contrataciones e informes:</p>
                        <p class="font-heading font-bold text-xl flex items-center justify-center lg:justify-start gap-2">
                            <x-heroicon-m-phone class="w-5 h-5 text-unach-dorado" />
                            {{ $instalacionDestacada->telefono }}
                            @if($instalacionDestacada->extension)
                                <span class="font-poppins text-sm font-normal text-unach-dorado">
                                    ({{ $instalacionDestacada->extension }})
                                </span>
                            @endif
                        </p>
                        <p class="font-poppins text-sm text-unach-dorado/80 tracking-wider">
                            #{{ str_replace(' ', '', $instalacionDestacada->subtitulo ?? $instalacionDestacada->nombre) }}UNACH
                        </p>
                    </div>
                @endif

                {{-- CTA --}}
                <div>
                    <a href="{{ route('instalaciones.index') }}#instalacion-{{ $instalacionDestacada->id }}"
                       class="inline-flex items-center gap-2 px-8 py-3 bg-unach-dorado text-unach-azul-oscuro font-poppins font-bold rounded-xl shadow-md hover:brightness-95 transition-all duration-300">
                        Conocer más
                        <x-heroicon-m-arrow-right class="w-4 h-4" />
                    </a>
                </div>

            </div>
        </div>
    </div>

</section>

{{-- Keyframe de flotación --}}
<style>
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
</style>

@endif