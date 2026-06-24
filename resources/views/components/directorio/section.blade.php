@props(['areas'])

@if ($areas->count() > 0)
    <x-page-banner titulo="Directorio Institucional"
        descripcion="Conoce a las personas que conforman la SIRESU, sus cargos, áreas de trabajo y formas de contacto."
        :isHome="false" :redes="\App\Models\RedSocial::all()" />

    <div
        class="relative flex flex-col gap-12 z-20 -mt-10 md:-mt-16 bg-white rounded-t-[3rem] md:rounded-t-[4rem] pt-16 px-24 pb-20 font-poppins shadow-xl">
        <div class="container mx-auto px-4 lg:px-8">

            <div class="max-w-4xl mx-auto space-y-6">
                @foreach ($areas as $area)
                    {{-- x-data inicializado en true para que todos abran por defecto --}}
                    <div x-data="{ open: true }"
                        class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden transition-all duration-300">

                        {{-- Cabecera con cursor-pointer --}}
                        <button @click="open = !open"
                            class="w-full px-8 py-6 flex items-center justify-between transition-colors hover:bg-gray-50 focus:outline-none cursor-pointer">
                            <h3 class="text-xl font-bold text-unach-azul-oscuro font-heading flex items-center">
                                <span class="w-1.5 h-6 bg-unach-dorado rounded-full mr-4"></span>
                                {{ $area->nombre }}
                            </h3>
                            <x-heroicon-m-chevron-down :class="{'rotate-180': open}"
                                class="w-6 h-6 text-unach-azul transition-transform duration-300" />
                        </button>

                        {{-- Contenido --}}
                        <div x-show="open" x-collapse class="px-8 pb-8">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @forelse ($area->personas as $persona)
                                    <div
                                        class="flex items-center gap-4 p-4 rounded-xl border border-gray-100 hover:border-unach-azul/20 hover:bg-unach-fondo transition-colors">
                                        {{-- Foto --}}
                                        <div class="shrink-0">
                                            @if ($persona->foto)
                                                <img src="{{ asset('storage/' . $persona->foto) }}"
                                                    alt="{{ $persona->nombre }}"
                                                    class="w-16 h-16 rounded-full object-cover border-2 border-unach-dorado/30">
                                            @else
                                                <div
                                                    class="w-16 h-16 rounded-full bg-unach-azul-oscuro flex items-center justify-center text-white">
                                                    <x-heroicon-o-user class="w-8 h-8" />
                                                </div>
                                            @endif
                                        </div>

                                        {{-- Datos --}}
                                        <div class="min-w-0">
                                            <h4 class="font-bold text-unach-azul-oscuro truncate">{{ $persona->nombre }}
                                            </h4>
                                            <p
                                                class="text-xs font-bold text-unach-dorado uppercase tracking-wide truncate mb-1">
                                                {{ $persona->cargo }}</p>

                                            <div class="text-[11px] text-gray-500 space-y-0.5">
                                                @if ($persona->correo)
                                                    <p class="truncate">{{ $persona->correo }}</p>
                                                @endif
                                                @if ($persona->telefono)
                                                    <p>{{ $persona->telefono }}</p>
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
