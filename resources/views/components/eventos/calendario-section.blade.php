@props(['eventos'])

<section class="font-sans px-4 lg:px-8">
    <div class="flex flex-col md:flex-row justify-between items-end mb-8 border-b border-gray-100 pb-5 gap-4">
        <div>
            <span
                class="bg-unach-azul/10 text-unach-azul-oscuro text-[11px] font-bold px-3 py-1 rounded-full uppercase tracking-widest">Agenda
                Institucional</span>
            <h2 class="text-2xl md:text-3xl font-bold text-unach-azul-oscuro tracking-tight font-heading mt-2">Eventos
                Próximos</h2>
        </div>
        <a href="{{ route('noticias.index') ?? '#' }}"
            class="hidden md:flex items-center text-unach-dorado hover:text-unach-azul-oscuro font-semibold transition-colors text-sm font-poppins">
            Ver calendario completo <x-heroicon-m-arrow-right class="w-4 h-4 ml-1" />
        </a>
    </div>

    @if ($eventos && $eventos->isNotEmpty())

        <!-- Grid configurado para tarjetas más cuadradas -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse ($eventos as $evento)
                <div x-data="{ open: false }"
                    class="relative bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300 group">

                    @if (isset($evento->is_api) && $evento->is_api)
                        <a href="{{ $evento->url }}" target="_blank" class="flex flex-col h-full">
                        @else
                            <div @click="open = true" class="flex flex-col cursor-pointer h-full">
                    @endif

                    <!-- IMAGEN SUPERIOR -->
                    <div class="relative w-full h-48 overflow-hidden bg-unach-fondo">
                        <img src="{{ str_starts_with($evento->imagen, 'http') ? $evento->imagen : asset('storage/' . $evento->imagen) }}"
                            alt="{{ $evento->titulo }}" class="w-full h-full object-cover">

                        <!-- FECHA SUPERPUESTA -->
                        <div
                            class="absolute top-3 left-3 bg-unach-azul-oscuro/90 backdrop-blur-sm text-white flex flex-col items-center justify-center w-12 h-14 rounded-lg shadow-md border border-white/10">
                            <span
                                class="text-[9px] font-bold uppercase opacity-80">{{ \Carbon\Carbon::parse($evento->fecha_evento)->translatedFormat('M') }}</span>
                            <span
                                class="text-lg font-extrabold font-heading leading-none">{{ \Carbon\Carbon::parse($evento->fecha_evento)->format('d') }}</span>
                        </div>
                    </div>

                    <!-- CONTENIDO INFERIOR -->
                    <div class="p-5 flex-1 flex flex-col">
                        <h3 class="text-base font-bold text-unach-azul-oscuro mb-2 font-heading line-clamp-2">
                            {{ $evento->titulo }}
                        </h3>

                        <p class="text-xs text-unach-gris-texto mb-4 line-clamp-2 font-poppins">
                            {{ $evento->descripcion }}
                        </p>

                        <div class="mt-auto space-y-2 text-[11px] text-gray-500 font-poppins">
                            <div class="flex items-center">
                                <x-heroicon-o-clock class="w-3.5 h-3.5 mr-1.5 text-unach-dorado" />
                                <span>{{ $evento->horario }}</span>
                            </div>
                            <div class="flex items-center">
                                <x-heroicon-o-map-pin class="w-3.5 h-3.5 mr-1.5 text-unach-dorado" />
                                <span class="truncate">{{ $evento->direccion }}</span>
                            </div>
                        </div>
                    </div>
                    @if (isset($evento->is_api) && $evento->is_api)
                        </a>
                    @else
                </div>
                <x-eventos.modal :evento="$evento" />
            @endif
        </div>
    @empty
        <p class="col-span-full text-center text-unach-gris-texto py-10">No hay eventos próximos.</p>
    @endforelse
    </div>
@else
    <p class="text-center text-unach-gris-texto opacity-70 py-8">No hay eventos programados en este momento.</p>
    @endif
</section>
