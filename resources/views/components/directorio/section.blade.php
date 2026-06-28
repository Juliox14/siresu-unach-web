@props(['areas'])

@if ($areas->count() > 0)
    <x-page-banner titulo="Directorio Institucional"
        descripcion="Conoce a las personas que conforman la SIRESU, sus cargos, áreas de trabajo y formas de contacto."
        :isHome="false" :redes="\App\Models\RedSocial::all()" />

    {{-- Ajuste móvil: Cambié el px-24 por un padding progresivo (px-5 en celular, px-24 en escritorio). Cambié div por section --}}
    <section
        class="relative flex flex-col gap-8 md:gap-12 z-20 -mt-10 md:-mt-16 bg-white rounded-t-[3rem] md:rounded-t-[4rem] pt-10 md:pt-16 px-5 md:px-12 lg:px-24 pb-20 font-poppins shadow-xl">
        <div class="container mx-auto px-0 lg:px-8">

            <div class="max-w-4xl mx-auto space-y-4 md:space-y-6">
                @foreach ($areas as $area)
                    {{-- x-data inicializado en true para que todos abran por defecto --}}
                    <div x-data="{ open: true }"
                        class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden transition-all duration-300">

                        {{-- Cabecera con padding dinámico y protección contra textos largos --}}
                        <button @click="open = !open"
                            class="w-full px-5 py-4 md:px-8 md:py-6 flex items-center justify-between transition-colors hover:bg-gray-50 focus:outline-none cursor-pointer text-left">
                            <h3 class="text-lg md:text-xl font-bold text-unach-azul-oscuro font-heading flex items-center">
                                {{-- shrink-0 evita que esta barrita dorada se aplaste si el texto es muy largo en celular --}}
                                <span class="w-1.5 h-5 md:h-6 bg-unach-dorado rounded-full mr-3 md:mr-4 shrink-0"></span>
                                <span>{{ $area->nombre }}</span>
                            </h3>
                            <x-heroicon-m-chevron-down :class="{'rotate-180': open}"
                                class="w-5 h-5 md:w-6 md:h-6 text-unach-azul transition-transform duration-300 shrink-0 ml-2" />
                        </button>

                        {{-- Contenido --}}
                        <div x-show="open" x-collapse class="px-5 pb-5 md:px-8 md:pb-8">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                                @forelse ($area->personas as $persona)
                                    <div
                                        class="flex items-center gap-3 md:gap-4 p-3 md:p-4 rounded-xl border border-gray-100 hover:border-unach-azul/20 hover:bg-unach-fondo transition-colors">
                                        {{-- Foto: Ajuste de tamaño ligero para celulares --}}
                                        <div class="shrink-0">
                                            @if ($persona->foto)
                                                <img src="{{ asset('storage/' . $persona->foto) }}"
                                                    alt="{{ $persona->nombre }}"
                                                    class="w-14 h-14 md:w-16 md:h-16 rounded-full object-cover border-2 border-unach-dorado/30">
                                            @else
                                                <div
                                                    class="w-14 h-14 md:w-16 md:h-16 rounded-full bg-unach-azul-oscuro flex items-center justify-center text-white">
                                                    <x-heroicon-o-user class="w-6 h-6 md:w-8 md:h-8" />
                                                </div>
                                            @endif
                                        </div>

                                        {{-- Datos: Ajuste tipográfico y flex-1 para que el truncate funcione perfecto --}}
                                        <div class="min-w-0 flex-1">
                                            <h4 class="font-bold text-unach-azul-oscuro text-sm md:text-base truncate">
                                                {{ $persona->nombre }}
                                            </h4>
                                            <p class="text-[10px] md:text-xs font-bold text-unach-dorado uppercase tracking-wide truncate mb-1">
                                                {{ $persona->cargo }}
                                            </p>

                                            <div class="text-[11px] text-gray-500 space-y-0.5">
                                                @if ($persona->correo)
                                                    <p class="truncate">{{ $persona->correo }}</p>
                                                @endif
                                                @if ($persona->telefono)
                                                    <p class="truncate">{{ $persona->telefono }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-sm text-gray-400 italic">No hay personal registrado en esta área.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
@endif