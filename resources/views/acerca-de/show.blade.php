<x-layout :title="'Acerca de - SIRESU UNACH'">
    <x-page-banner titulo="Acerca de SIRESU"
        descripcion="Conoce más sobre nuestra misión, visión, valores y la estructura organizacional que impulsa el bienestar de nuestra comunidad universitaria."
        :isHome="false" :redes="\App\Models\RedSocial::all()" />
    <!-- Se cambió el fondo blanco puro por unach-fondo para dar profundidad -->
    <div
        class="relative z-20 -mt-10 md:-mt-16 bg-white rounded-t-[3rem] md:rounded-t-[4rem] pt-18 px-10 pb-20 font-poppins shadow-xl">



        <div class="container mx-auto px-4 relative z-10 font-poppins">

            {{-- IDENTIDAD --}}
            <div id="identidad">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center mb-20">
                    <div>
                        <p class="text-unach-dorado font-bold tracking-widest uppercase text-sm mb-2">Sobre Nosotros</p>
                        <!-- Aplicación de font-heading para el título -->
                        <h2
                            class="text-4xl md:text-5xl font-extrabold text-unach-azul-oscuro leading-tight font-heading">
                            {{ $info->titulo_1 }} <br>
                            <!-- Degradado actualizado con los colores de la universidad -->
                            <span
                                class="text-transparent bg-clip-text bg-linear-to-r from-unach-azul-oscuro to-unach-azul">
                                {{ $info->titulo_2 }}
                            </span>
                        </h2>
                    </div>
                    <div class="flex items-end justify-center">
                        <div class="border-l-4 border-unach-dorado pl-6">
                            <!-- Uso de unach-gris-texto para lectura cómoda -->
                            <p class="text-unach-gris-texto text-lg leading-relaxed text-justify">
                                {{ $info->descripcion_hero }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 mb-24">

                    {{-- Imagen principal --}}
                    <div class="lg:col-span-5 relative">
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl border-8 border-white">
                            <img src="{{ asset('storage/' . $info->imagen_principal) }}" alt="Imagen Principal"
                                class="w-full h-auto object-cover transform hover:scale-105 transition duration-700">

                            <div class="absolute bottom-0 right-0 bg-white p-6 rounded-tl-3xl shadow-lg">
                                <div class="flex items-center gap-3">
                                    <img src="{{ asset('images/logo-siresu-color.png') }}" alt="Logo"
                                        class="h-12 w-auto">
                                    <div>
                                        <p class="text-unach-azul-oscuro font-bold text-lg leading-none font-heading">
                                            {{ $info->badge_titulo }}
                                        </p>
                                        <p class="text-unach-dorado font-bold text-sm uppercase tracking-wide">
                                            {{ $info->badge_subtitulo }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="absolute -bottom-6 -left-6 w-full h-full border-2 border-unach-dorado rounded-2xl -z-10">
                        </div>
                    </div>

                    {{-- Puntos clave --}}
                    <div class="lg:col-span-7 flex flex-col justify-center">
                        <h3 class="text-2xl font-bold text-unach-azul-oscuro mb-6 font-heading">
                            {{ $info->titulo_puntos }}
                        </h3>

                        <div class="space-y-8">
                            @if ($info->puntos_clave)
                                @foreach ($info->puntos_clave as $punto)
                                    @php
                                        $iconoFinal = 'heroicon-o-check';
                                        if (!empty($punto['icono'])) {
                                            try {
                                                svg($punto['icono']);
                                                $iconoFinal = $punto['icono'];
                                            } catch (\Throwable $e) {
                                            }
                                        }
                                    @endphp

                                    <div class="flex items-start group">
                                        {{-- Ícono --}}
                                        <div
                                            class="shrink-0 mt-1 w-8 h-8 rounded-full bg-unach-dorado/20 flex items-center justify-center group-hover:bg-unach-dorado transition-colors duration-300">
                                            <!-- El ícono cambia a blanco en hover para contrastar con el fondo dorado -->
                                            <x-dynamic-component :component="$iconoFinal"
                                                class="w-4 h-4 text-unach-dorado group-hover:text-white transition-colors duration-300" />
                                        </div>

                                        {{-- Texto --}}
                                        <div class="ml-4">
                                            <h4 class="text-lg font-bold text-unach-azul-oscuro font-heading">
                                                {{ $punto['titulo'] }}</h4>
                                            <p class="text-unach-gris-texto mt-2 leading-relaxed text-justify">
                                                {{ $punto['descripcion'] }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                </div>
            </div>

            {{-- MISIÓN, VISIÓN Y VALORES --}}
            <div id="mision-vision-valores" class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-24">

                {{-- Misión --}}
                <div
                    class="bg-unach-azul p-8 rounded-xl relative overflow-hidden group hover:-translate-y-2 transition-transform duration-300 shadow-lg">
                    <div class="absolute top-0 left-0 w-full h-1 bg-unach-dorado"></div>
                    <h3 class="text-2xl font-bold text-white mb-4 font-heading">Misión</h3>
                    <p class="text-gray-200 text-sm leading-relaxed">{{ $info->mision }}</p>
                    <div
                        class="absolute -bottom-4 -right-4 text-unach-dorado/20 group-hover:text-unach-dorado/20 transition-colors">
                        <span class="text-9xl font-bold font-heading">01</span>
                    </div>
                </div>

                {{-- Visión --}}
                <div
                    class="bg-unach-dorado p-8 rounded-xl relative overflow-hidden group hover:-translate-y-2 transition-transform duration-300 shadow-lg">
                    <div class="absolute top-0 left-0 w-full h-1 bg-unach-azul-oscuro"></div>
                    <h3 class="text-2xl font-bold text-unach-azul-oscuro mb-4 font-heading">Visión</h3>
                    <p class="text-unach-azul-oscuro/80 text-sm leading-relaxed font-medium">{{ $info->vision }}</p>
                    <div class="absolute -bottom-4 -right-4 text-white/30 group-hover:text-white/40 transition-colors">
                        <span class="text-9xl font-bold font-heading">02</span>
                    </div>
                </div>

                {{-- Valores --}}
                <div
                    class="bg-unach-azul p-8 rounded-xl relative overflow-hidden group hover:-translate-y-2 transition-transform duration-300 shadow-lg">
                    <div class="absolute top-0 left-0 w-full h-1 bg-unach-dorado"></div>
                    <h3 class="text-2xl font-bold text-white mb-4 font-heading">Valores</h3>
                    <ul class="text-gray-200 text-sm space-y-2">
                        @if ($info->valores)
                            @foreach ($info->valores as $valor)
                                <li class="flex items-center">
                                    <span class="w-1.5 h-1.5 bg-unach-dorado rounded-full mr-2"></span>
                                    {{ $valor['valor'] }}
                                </li>
                            @endforeach
                        @endif
                    </ul>
                    <div
                        class="absolute -bottom-4 -right-4 text-unach-dorado/20 group-hover:text-unach-dorado/20 transition-colors">
                        <span class="text-9xl font-bold font-heading">03</span>
                    </div>
                </div>

            </div>

            {{-- ESTRUCTURA Y CONTACTO --}}
            <div id="estructura-contacto">
                <div class="text-center mb-10">
                    <div class="inline-block mb-2">
                        <span
                            class="bg-unach-azul/10 text-unach-azul-oscuro text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">Organización</span>
                    </div>
                    <h2 class="text-3xl font-bold text-unach-azul-oscuro font-heading">Estructura y Contacto</h2>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                    {{-- Organigrama --}}
                    <div class="lg:col-span-8">
                        <div
                            class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100 overflow-hidden relative group">
                            <div class="absolute top-0 left-0 w-1.5 h-full bg-unach-dorado"></div>
                            <h3 class="text-2xl text-center font-bold text-unach-azul-oscuro mb-2 pl-4 font-heading">
                                Organigrama SIRESU</h3>
                            <div class="overflow-x-auto pb-2 custom-scrollbar">
                                <img src="{{ asset('storage/' . $info->organigrama) }}" alt="Organigrama"
                                    class="min-w-175 w-full h-auto transition-transform duration-500 origin-top-left">
                            </div>
                        </div>
                    </div>

                    {{-- Contacto y enlaces --}}
                    <div class="lg:col-span-4 space-y-6 sticky top-24">

                        {{-- Ubicación --}}
                        <div class="bg-unach-azul-oscuro text-white p-6 rounded-2xl shadow-xl relative overflow-hidden">
                            <div
                                class="absolute -top-10 -right-10 w-32 h-32 bg-unach-dorado rounded-full mix-blend-multiply filter blur-2xl opacity-20">
                            </div>

                            <h3 class="text-lg font-bold text-unach-dorado mb-4 flex items-center font-heading">
                                <x-heroicon-m-map-pin class="w-5 h-5 mr-2" /> Ubicación
                            </h3>

                            <div class="space-y-4 text-sm text-gray-200">
                                <p class="leading-relaxed whitespace-pre-line">{{ $info->direccion }}</p>
                                <hr class="border-white/10">
                                <p class="flex items-center">
                                    <x-heroicon-m-phone class="w-4 h-4 mr-2 text-unach-dorado" />
                                    <span>{{ $info->telefono }}
                                        @if ($info->extension)
                                            <span
                                                class="text-xs bg-unach-dorado/20 text-unach-dorado px-1 rounded ml-1">
                                                Ext. {{ $info->extension }}
                                            </span>
                                        @endif
                                    </span>
                                </p>
                                <div
                                    class="rounded-lg overflow-hidden h-40 w-full border border-white/10 mt-4 shadow-inner">
                                    <div
                                        class="w-full h-full [&>iframe]:w-full [&>iframe]:h-full grayscale-20 contrast-125">
                                        {!! $info->mapa_iframe !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Enlaces rápidos --}}
                        <div class="bg-white border border-gray-100 p-6 rounded-2xl shadow-lg">
                            <h3 class="text-lg font-bold text-unach-azul-oscuro mb-4 flex items-center font-heading">
                                <x-heroicon-m-link class="w-5 h-5 mr-2 text-unach-dorado" /> Enlaces Rápidos
                            </h3>
                            <div class="space-y-3">
                                @if ($info->links_rapidos)
                                    @foreach ($info->links_rapidos as $link)
                                        @php
                                            $iconoLink = 'heroicon-o-link';
                                            if (!empty($link['icono'])) {
                                                try {
                                                    svg($link['icono']);
                                                    $iconoLink = $link['icono'];
                                                } catch (\Throwable $e) {
                                                }
                                            }
                                        @endphp

                                        <a href="{{ $link['url'] }}" target="_blank"
                                            class="flex items-center justify-between p-3 rounded-lg bg-unach-fondo hover:bg-unach-azul-oscuro group transition-colors duration-300">
                                            <span
                                                class="text-sm font-medium text-unach-gris-texto group-hover:text-white transition-colors">
                                                {{ $link['texto'] }}
                                            </span>
                                            <x-dynamic-component :component="$iconoLink"
                                                class="w-4 h-4 text-unach-azul opacity-60 group-hover:text-unach-dorado group-hover:opacity-100 transition-colors" />
                                        </a>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        </section>

</x-layout>
