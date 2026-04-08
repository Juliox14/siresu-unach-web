@props(['evento'])

<div x-show="open" 
     x-effect="document.body.classList.toggle('overflow-hidden', open)"
     class="fixed inset-0 z-50 overflow-y-auto" style="display: none;"
     x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div x-show="open" class="fixed inset-0 bg-black/40 backdrop-blur-sm transition-opacity" @click="open = false">
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen">​</span>

        <div class="relative inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100">

            <div class="relative h-48 md:h-64">
                <img src="{{ asset('storage/' . $evento->imagen) }}" class="w-full h-full object-cover">

                <button @click="open = false"
                    class="absolute top-3 right-3 bg-black/50 hover:bg-black/70 text-white rounded-full p-1 transition backdrop-blur-md z-10 cursor-pointer">
                    <x-heroicon-m-x-mark class="w-5 h-5" />
                </button>

                <div class="absolute inset-0 bg-linear-to-t from-black/60 to-transparent"></div>

                <div class="absolute bottom-4 left-6 text-white pr-4">
                    <p class="text-xs font-bold bg-[#EAB308] text-[#001B3A] px-2 py-1 rounded w-fit mb-2 uppercase tracking-wide">
                        {{ $evento->categoria }}
                    </p>
                    <h3 class="text-2xl md:text-3xl font-bold leading-tight drop-shadow-sm">
                        {{ $evento->titulo }}
                    </h3>
                </div>
            </div>

            <div class="px-6 py-6 md:px-8">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-6">

                    <div class="md:col-span-2 space-y-6">

                        <div class="flex items-start text-gray-700">
                            <div class="bg-gray-100 p-2 rounded-lg mr-4 shrink-0 text-center min-w-14">
                                <span class="block text-xs font-bold text-gray-500 uppercase">
                                    {{ \Carbon\Carbon::parse($evento->fecha_evento)->translatedFormat('M') }}
                                </span>
                                <span class="block text-xl font-bold text-[#001B3A]">
                                    {{ \Carbon\Carbon::parse($evento->fecha_evento)->format('d') }}
                                </span>
                            </div>
                            <div>
                                <h4 class="font-bold text-[#001B3A] text-lg">Fecha y Hora</h4>
                                <p class="text-sm text-gray-600">
                                    {{ \Carbon\Carbon::parse($evento->fecha_evento)->format('d') }} de 
                                    {{ \Carbon\Carbon::parse($evento->fecha_evento)->translatedFormat('F') }},
                                    {{ \Carbon\Carbon::parse($evento->fecha_evento)->format('Y') }}
                                </p>
                                <p class="text-sm text-gray-500 flex items-center mt-1">
                                    <x-heroicon-m-clock class="w-4 h-4 mr-1" />
                                    {{ $evento->horario }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start text-gray-700">
                            <div class="bg-blue-50 p-2 rounded-lg mr-4 shrink-0 text-center min-w-14 flex items-center justify-center">
                                <x-heroicon-m-map-pin class="w-6 h-6 text-[#001B3A]" />
                            </div>
                            <div>
                                <h4 class="font-bold text-[#001B3A] text-lg">Ubicación</h4>
                                <p class="text-sm text-gray-600">{{ $evento->direccion }}</p>
                                <p class="text-sm text-gray-500">{{ $evento->ciudad }}</p>
                            </div>
                        </div>

                        <hr class="border-gray-100">

                        <div class="prose prose-sm text-gray-600">
                            <h4 class="font-bold text-[#001B3A] mb-2">Acerca del evento</h4>
                            <p class="text-justify">{{ $evento->descripcion }}</p>
                        </div>

                    </div>

                    <div class="md:col-span-1 space-y-6">

                        @if (!empty($evento->mapa_iframe))
                            <div>
                                <p class="text-xs font-bold text-[#001B3A] uppercase tracking-wide mb-2">Mapa</p>
                                <div class="rounded-lg overflow-hidden shadow-sm border border-gray-200 h-40 w-full bg-gray-50">
                                    <div class="w-full h-full [&>iframe]:w-full [&>iframe]:h-full [&>iframe]:border-0">
                                        {!! $evento->mapa_iframe !!}
                                    </div>
                                </div>
                                <a href="https://maps.google.com/?q={{ urlencode($evento->direccion . ' ' . $evento->ciudad) }}"
                                    target="_blank" class="inline-flex items-center text-xs text-blue-600 mt-2 hover:underline">
                                    <x-heroicon-m-arrow-top-right-on-square class="w-3 h-3 mr-1" />
                                    Ver en Google Maps
                                </a>
                            </div>
                        @endif

                        @if ($evento->archivos->count() > 0)
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-100">
                                <p class="text-xs font-bold text-[#001B3A] uppercase tracking-wide mb-3">
                                    Descargas
                                </p>
                                @foreach ($evento->archivos as $archivo)
                                    <a href="{{ asset('storage/' . $archivo->ruta) }}" target="_blank"
                                        class="group flex items-center justify-center w-full px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-[#EAB308] hover:bg-yellow-500 transition-all shadow-sm">
                                        <x-heroicon-m-document-arrow-down class="w-5 h-5 mr-2 text-[#001B3A]" />
                                        <span class="text-[#001B3A]">Descargar {{ $archivo->nombre }}</span>
                                    </a>
                                @endforeach
                                <p class="text-[10px] text-gray-400 mt-2 text-center">
                                    PDF / Imagen disponible
                                </p>
                            </div>
                        @endif

                    </div>
                </div>

                <div class="flex justify-between items-center pt-6 border-t border-gray-100">
                    <div class="flex flex-col space-x-4">
                        <p class="text-xs text-gray-500 mb-4">Revisa nuestra publicación sobre este evento en nuestras redes
                            sociales.</p>
                        @if ($evento->link_facebook)
                            <a href="{{ $evento->link_facebook }}" target="_blank"
                                class="text-gray-400 hover:text-blue-600 transition">
                                <span class="sr-only">Facebook</span>
                                </a>
                        @endif
                        @if ($evento->link_instagram)
                            <a href="{{ $evento->link_instagram }}" target="_blank"
                                class="text-gray-400 hover:text-pink-600 transition">
                                <span class="sr-only">Instagram</span>
                                </a>
                        @endif

                    </div>
                    <button @click="open = false"
                        class="text-sm font-medium text-[#001B3A] hover:text-[#EAB308] transition cursor-pointer">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>