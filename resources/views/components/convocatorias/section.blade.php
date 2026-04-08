@props(['convocatorias'])

<style>
    /* Ocultar scrollbar pero permitir funcionalidad */
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    /* Sombra especial para el título dorado */
    .text-shadow-gold {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
    }
</style>

<section class="relative py-16 font-sans border-t border-blue-900 overflow-hidden">

    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/explanada-biblioteca.jpg') }}"
            class="w-full h-full object-cover filter blur-[1px] scale-105" alt="Fondo">
        <div class="absolute inset-0 bg-[#001B3A]/50 mix-blend-multiply"></div>
    </div>

    <div class="relative z-10 container mx-auto px-4">

        <div class="mb-10 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white tracking-wider text-shadow-gold mb-2">
                Convocatorias Vigentes
            </h2>
            <p class="text-gray-200 mt-4 max-w-2xl mx-auto text-sm drop-shadow-md">
                Consulta las bases y requisitos para aplicar a las becas y programas disponibles.
            </p>
        </div>

        <div class="flex overflow-x-auto pb-8 gap-4 snap-x snap-mandatory scroll-smooth no-scrollbar">

            @forelse ($convocatorias as $convocatoria)
                <div class="min-w-[70%] md:min-w-[35%] lg:min-w-[22%] snap-center flex h-full">

                    <div
                        class="w-full bg-[#001B3A] border border-gray-600/60 rounded-xl overflow-hidden flex flex-col hover:border-[#EAB308] hover:shadow-[0_0_15px_rgba(234,179,8,0.3)] transition-all duration-300 group">

                        <div class="relative h-36 overflow-hidden">
                            <img src="{{ $convocatoria['imagen'] }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105 opacity-90 group-hover:opacity-100"
                                alt="{{ $convocatoria['titulo'] }}">

                            <div
                                class="absolute top-2 left-2 bg-[#f1e06f] text-[#001B3A] px-2 py-0.5 rounded-md text-[10px] font-bold uppercase shadow-sm flex items-center gap-1">
                                <span @class([
                                    'text-lg leading-none text-center mb-1',
                                    'text-green-600' => $convocatoria['estado'] === 'Abierta',
                                    'text-yellow-600' => $convocatoria['estado'] === 'Próxima',
                                    'text-red-600' => $convocatoria['estado'] === 'Cerrada',
                                    'text-blue-600' => $convocatoria['estado'] === 'Nueva',
                                ])>●</span>
                                {{ $convocatoria['estado'] }}
                            </div>

                            <div
                                class="absolute top-2 right-2 bg-[#f1e06f] text-[#001B3A] px-2 py-1 rounded-md text-center shadow-sm leading-none min-w-12">
                                <span
                                    class="block text-[8px] font-bold uppercase mb-0.5">{{ $convocatoria['mes_limite'] }}.</span>
                                <span class="block text-lg font-bold">{{ $convocatoria['dia_limite'] }}</span>
                            </div>
                        </div>

                        <div class="p-4 flex-1 flex flex-col">

                            <h3 class="text-base font-bold text-white leading-tight mb-3 line-clamp-2">
                                {{ $convocatoria['titulo'] }}
                            </h3>

                            <div class="flex items-center text-gray-300 text-xs mb-3">
                                <x-heroicon-m-calendar-days class="w-4 h-4 mr-1.5 text-[#EAB308]" />
                                <span>Límite: {{ $convocatoria['fecha_completa'] }}</span>
                            </div>

                            <div class="mb-4">
                                <span
                                    class="bg-[#EAB308]/20 text-[#EAB308] border border-[#EAB308] px-1.5 py-0.5 rounded text-[9px] font-bold uppercase tracking-wide">
                                    {{ $convocatoria['categoria'] }}
                                </span>
                            </div>

                            <div class="mt-auto">
                                <a href="{{ route('convocatorias.show', $convocatoria['slug']) }}" target="_blank"
                                    class="block w-full bg-[#f1e06f] hover:bg-[#c79807] text-[#001B3A] font-bold text-center py-2 text-sm rounded-lg transition-colors duration-300 shadow-md">
                                    Ver convocatoria
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <div class="w-full text-center py-10 text-gray-300">
                    <p>No hay convocatorias activas por el momento.</p>
                </div>
            @endforelse
        </div>

        <div class="text-center mt-4">
            <a href="#"
                class="inline-flex items-center text-[#FCF4C3] hover:text-white font-medium transition-colors border-b border-[#EAB308] pb-0.5 hover:border-white text-shadow-gold">
                Ver todas las convocatorias
                <x-heroicon-m-arrow-right class="w-4 h-4 ml-2" />
            </a>
        </div>

    </div>
</section>
