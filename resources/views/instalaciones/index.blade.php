<x-layout title="Instalaciones - SIRESU">

    <section class="pt-16 bg-white px-6 md:px-12 lg:px-24 text-center md:text-left">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-extrabold text-[#001B3A] tracking-tight mb-4 leading-tight">
                Instalaciones de <span class="text-[#EAB308]">la SIRESU</span>
            </h1>
            <div class="h-1 w-24 bg-[#EAB308] rounded-full mb-6 mx-auto md:mx-0"></div>
            <p class="text-xl text-gray-500 font-light max-w-3xl py-2 mx-auto md:mx-0">
                Espacios de primer nivel diseñados para inspirar, fomentar el deporte, la cultura y el desarrollo
                académico. Conoce nuestros recintos disponibles para la comunidad universitaria y el público en general.
            </p>
        </div>
    </section>

    <section class="bg-white py-16 px-6 md:px-12 lg:px-24">
        <div class="max-w-7xl mx-auto">

            <div class="text-center md:text-left mb-16 flex flex-col md:flex-row justify-between items-end gap-6">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-[#001B3A] mb-4">Espacios Universitarios</h2>
                    <p class="text-gray-600 text-lg">Áreas deportivas, académicas y recreativas a tu disposición.</p>
                </div>
                <div class="flex gap-2">
                    <span
                        class="px-4 py-2 bg-[#001B3A] text-white text-sm font-bold rounded-full cursor-pointer shadow-sm">Todos</span>
                    <span
                        class="px-4 py-2 bg-white text-gray-600 border border-gray-200 text-sm font-bold rounded-full hover:bg-gray-50 cursor-pointer transition-colors">Para
                        Renta</span>
                </div>
            </div>

            @if ($instalaciones->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

                    @foreach ($instalaciones as $instalacion)
                        <div id="instalacion-{{ $instalacion->id }}" x-data="{ modalOpen: new URLSearchParams(window.location.search).get('open') == '{{ $instalacion->id }}' }"
                            class="bg-white rounded-xl overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 flex flex-col group hover:shadow-[0_8px_30px_rgb(0,0,0,0.12)] transition-shadow duration-300">
                            <div class="relative h-60 overflow-hidden cursor-pointer" @click="modalOpen = true">
                                <img src="{{ asset('storage/' . $instalacion->imagen_portada) }}"
                                    alt="{{ $instalacion->nombre }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">

                                @if ($instalacion->disponible_renta)
                                    <div
                                        class="absolute top-4 right-4 bg-white/95 backdrop-blur-sm px-4 py-1.5 rounded-full text-xs font-black text-[#001B3A] shadow-md flex items-center">
                                        <span class="w-2.5 h-2.5 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                                        DISPONIBLE RENTA
                                    </div>
                                @else
                                    <div
                                        class="absolute top-4 right-4 bg-[#001B3A]/90 backdrop-blur-sm px-4 py-1.5 rounded-full text-xs font-bold text-white shadow-md flex items-center">
                                        <span class="w-2.5 h-2.5 bg-blue-400 rounded-full mr-2"></span> Comunidad UNACH
                                    </div>
                                @endif
                            </div>

                            <div class="p-8 flex flex-col flex-1">
                                <h3 class="text-2xl font-bold text-[#001B3A] mb-1">{{ $instalacion->nombre }}</h3>

                                @if ($instalacion->subtitulo)
                                    <p class="text-[#EAB308] font-bold text-sm mb-3 uppercase tracking-wider">
                                        {{ $instalacion->subtitulo }}</p>
                                @endif

                                <p class="text-gray-600 mb-8 flex-1 text-sm leading-relaxed">
                                    {{ $instalacion->descripcion_corta }}</p>

                                <button @click="modalOpen = true"
                                    class="inline-flex items-center justify-center w-full px-5 py-3 bg-[#EAB308] text-[#001B3A] font-bold text-sm rounded-xl hover:bg-[#dca600] transition-colors border border-gray-200 hover:border-transparent cursor-pointer">
                                    Ver Detalles y Fotos <x-heroicon-m-arrow-right class="w-4 h-4 ml-2" />
                                </button>
                            </div>

                            <x-instalaciones.modal :instalacion="$instalacion" />

                        </div>
                    @endforeach

                </div>
            @else
                <div class="text-center py-20 bg-gray-50 rounded-2xl border border-gray-100">
                    <x-heroicon-o-building-office-2 class="w-16 h-16 text-gray-400 mx-auto mb-4" />
                    <h3 class="text-xl font-bold text-[#001B3A] mb-2">Aún no hay instalaciones registradas</h3>
                    <p class="text-gray-500">Los espacios universitarios aparecerán aquí pronto.</p>
                </div>
            @endif

        </div>
    </section>

</x-layout>
