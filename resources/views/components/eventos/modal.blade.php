@props(['evento'])

<div x-show="open"
    x-effect="document.body.classList.toggle('overflow-hidden', open); $dispatch(open ? 'modal-abierto' : 'modal-cerrado')"
    class="fixed inset-0 z-50 overflow-y-auto" style="display: none;" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0">

    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div x-show="open" class="fixed inset-0 bg-black/40 backdrop-blur-sm transition-opacity" @click="open = false">
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen">​</span>

        <div class="relative inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-md transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100">

            <div class="relative overflow-hidden"
                style="background: linear-gradient(180deg, #0039C7 0%, #001D64 100%); min-height: 180px;">

                {{-- Overlay diagonal (igual que el banner) --}}
                <div class="absolute pointer-events-none"
                    style="
             top: 10px;
             left: 15%;
             width: 100%;
             height: 200px;
             background: linear-gradient(158deg, #1A2927 0%, #1A292700 100%);
             mix-blend-mode: overlay;
             opacity: 0.3;
             transform: matrix(1, 0.09, -0.09, 1, 0, 0);
         ">
                </div>

                {{-- Botón cerrar --}}
                <button @click="open = false"
                    class="absolute top-3 right-3 bg-white/20 hover:bg-white/30 text-white rounded-full p-1.5 transition backdrop-blur-md z-10 cursor-pointer">
                    <x-heroicon-m-x-mark class="w-4 h-4" />
                </button>

                {{-- Contenido: texto izquierda + imagen derecha --}}
                <div class="flex items-center justify-between px-6 py-6 h-full font-poppins" style="min-height: 180px;">

                    {{-- Texto --}}
                    <div class="flex-1 pr-4 max-w-[65%]">
                        <p
                            class="text-xs font-bold bg-[#EAB308] text-[#001B3A] px-2 py-1 rounded w-fit mb-3 uppercase tracking-wide">
                            {{ $evento->categoria }}
                        </p>
                        <h3 class="text-xl md:text-2xl font-bold text-white leading-tight">
                            {{ $evento->titulo }}
                        </h3>
                    </div>

                    {{-- Imagen pequeña a la derecha --}}
                    <div class="shrink-0 relative" style="width: 120px; height: 120px;">
                        {{-- Halo sutil --}}
                        <div class="absolute inset-0 rounded-xl pointer-events-none"
                            style="background: rgba(255,255,255,0.08); filter: blur(8px);"></div>
                        <img src="{{ asset('storage/' . $evento->imagen) }}"
                            class="relative w-full h-full object-cover rounded-xl"
                            style="opacity: 0.9; box-shadow: 0 4px 24px rgba(0,0,80,0.4);">
                    </div>

                </div>
            </div>

            {{-- Cuerpo --}}
            <div class="px-6 py-6 md:px-8 font-sans">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

                    {{-- Columna principal --}}
                    <div class="md:col-span-2 space-y-6">

                        {{-- Fecha --}}
                        <div class="flex items-start gap-4">
                            <div class="bg-unach-fondo rounded-xl p-2 shrink-0 text-center min-w-14">
                                <span class="block text-xs font-poppins font-bold text-unach-gris-texto uppercase">
                                    {{ \Carbon\Carbon::parse($evento->fecha_evento)->translatedFormat('M') }}
                                </span>
                                <span class="block text-xl font-heading font-bold text-unach-azul-oscuro">
                                    {{ \Carbon\Carbon::parse($evento->fecha_evento)->format('d') }}
                                </span>
                            </div>
                            <div>
                                <h4 class="font-heading font-bold text-unach-azul-oscuro">Fecha y Hora</h4>
                                <p class="text-sm text-unach-gris-texto mt-0.5">
                                    {{ \Carbon\Carbon::parse($evento->fecha_evento)->format('d') }} de
                                    {{ \Carbon\Carbon::parse($evento->fecha_evento)->translatedFormat('F') }},
                                    {{ \Carbon\Carbon::parse($evento->fecha_evento)->format('Y') }}
                                </p>
                                <p class="text-sm text-unach-gris-texto flex items-center gap-1 mt-1">
                                    <x-heroicon-m-clock class="w-4 h-4" />
                                    {{ $evento->horario }}
                                </p>
                            </div>
                        </div>

                        {{-- Ubicación --}}
                        <div class="flex items-start gap-4">
                            <div
                                class="bg-unach-fondo rounded-xl p-2 shrink-0 min-w-14 flex items-center justify-center">
                                <x-heroicon-m-map-pin class="w-5 h-5 text-unach-azul" />
                            </div>
                            <div>
                                <h4 class="font-heading font-bold text-unach-azul-oscuro">Ubicación</h4>
                                <p class="text-sm text-unach-gris-texto mt-0.5">{{ $evento->direccion }}</p>
                                <p class="text-sm text-unach-gris-texto">{{ $evento->ciudad }}</p>
                            </div>
                        </div>

                        <hr class="border-gray-100">

                        {{-- Descripción --}}
                        <div>
                            <h4 class="font-heading font-bold text-unach-azul-oscuro mb-2">Acerca del evento</h4>
                            <p class="text-sm text-unach-gris-texto leading-relaxed text-justify">
                                {{ $evento->descripcion }}
                            </p>
                        </div>

                    </div>

                    {{-- Columna lateral --}}
                    <div class="md:col-span-1 space-y-4">

                        {{-- Mapa --}}
                        @if (!empty($evento->mapa_iframe))
                            <div>
                                <p
                                    class="text-xs font-poppins font-bold text-unach-azul-oscuro uppercase tracking-wide mb-2">
                                    Mapa
                                </p>
                                <div
                                    class="rounded-xl overflow-hidden shadow-sm border border-gray-100 h-40 bg-unach-fondo">
                                    <div class="w-full h-full [&>iframe]:w-full [&>iframe]:h-full [&>iframe]:border-0">
                                        {!! $evento->mapa_iframe !!}
                                    </div>
                                </div>
                                <a href="https://maps.google.com/?q={{ urlencode($evento->direccion . ' ' . $evento->ciudad) }}"
                                    target="_blank"
                                    class="inline-flex items-center gap-1 text-xs text-unach-azul mt-2 hover:underline transition-all duration-300">
                                    <x-heroicon-m-arrow-top-right-on-square class="w-3 h-3" />
                                    Ver en Google Maps
                                </a>
                            </div>
                        @endif

                        {{-- Acciones --}}
                        <div class="bg-unach-fondo rounded-xl p-4 border border-gray-100 space-y-3">

                            @if ($evento->archivos->count() > 0)
                                <p
                                    class="text-xs font-poppins font-bold text-unach-azul-oscuro uppercase tracking-wide">
                                    Descargas
                                </p>
                                @foreach ($evento->archivos as $archivo)
                                    <a href="{{ asset('storage/' . $archivo->ruta) }}" target="_blank"
                                        class="flex items-center justify-center gap-2 w-full px-4 py-2 rounded-xl bg-unach-dorado text-unach-azul-oscuro text-sm font-poppins font-medium shadow-sm hover:brightness-95 transition-all duration-300">
                                        <x-heroicon-m-document-arrow-down class="w-4 h-4" />
                                        Descargar {{ $archivo->nombre }}
                                    </a>
                                @endforeach
                                <p class="text-[10px] text-unach-gris-texto text-center">PDF / Imagen disponible</p>
                            @endif

                            @if ($evento->link_inscripcion)
                                <div
                                    class="{{ $evento->archivos->count() > 0 ? 'pt-3 border-t border-gray-200' : '' }}">
                                    <a href="{{ $evento->link_inscripcion }}" target="_blank"
                                        class="flex items-center justify-center gap-2 w-full px-4 py-2 rounded-xl bg-unach-dorado text-unach-azul-oscuro text-sm font-poppins font-medium shadow-sm hover:brightness-95 transition-all duration-300">
                                        <x-heroicon-m-check-circle class="w-5 h-5" />
                                        Confirmar Asistencia
                                    </a>
                                    <p class="text-xs text-unach-gris-texto mt-2 text-center">
                                        Serás redirigido a un formulario externo.
                                    </p>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>

                {{-- Footer del modal --}}
                <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                    <div>
                        @if ($evento->link_facebook || $evento->link_instagram)
                            <p class="text-xs text-unach-gris-texto mb-2 font-sans">
                                Revisa nuestra publicación en redes sociales.
                            </p>
                            <div class="flex items-center gap-3">
                                @if ($evento->link_facebook)
                                    <a href="{{ $evento->link_facebook }}" target="_blank"
                                        class="text-unach-gris-texto hover:text-unach-azul transition-all duration-300">
                                        <x-utils.social-icon name="facebook" class="w-5 h-5" />
                                    </a>
                                @endif
                                @if ($evento->link_instagram)
                                    <a href="{{ $evento->link_instagram }}" target="_blank"
                                        class="text-unach-gris-texto hover:text-unach-azul transition-all duration-300">
                                        <x-utils.social-icon name="instagram" class="w-5 h-5" />
                                    </a>
                                @endif
                            </div>
                        @endif
                    </div>

                    <button @click="open = false"
                        class="text-sm font-poppins font-medium text-unach-gris-texto hover:text-unach-azul-oscuro transition-all duration-300 cursor-pointer">
                        Cerrar
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
