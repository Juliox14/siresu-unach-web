<x-layout :title="'Acerca de - SIRESU UNACH'">

    <section class="relative bg-white font-sans overflow-hidden p-20">
        <div class="container mx-auto px-4 relative z-10">

            {{-- IDENTIDAD --}}
            <div id="identidad">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center mb-20">
                    <div>
                        <p class="text-[#EAB308] font-bold tracking-widest uppercase text-sm mb-2">Sobre Nosotros</p>
                        <h2 class="text-4xl md:text-5xl font-extrabold text-[#001B3A] leading-tight">
                            {{ $info->titulo_1 }} <br>
                            <span class="text-transparent bg-clip-text bg-linear-to-r from-[#001B3A] to-blue-600">
                                {{ $info->titulo_2 }}
                            </span>
                        </h2>
                    </div>
                    <div class="flex items-end justify-center">
                        <div class="border-l-4 border-[#EAB308] pl-6">
                            <p class="text-gray-600 text-lg leading-relaxed text-justify">
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
                                        <p class="text-[#001B3A] font-bold text-lg leading-none">
                                            {{ $info->badge_titulo }}
                                        </p>
                                        <p class="text-[#EAB308] font-bold text-sm uppercase tracking-wide">
                                            {{ $info->badge_subtitulo }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="absolute -bottom-6 -left-6 w-full h-full border-2 border-[#EAB308] rounded-2xl -z-10">
                        </div>
                    </div>

                    {{-- Puntos clave --}}
                    <div class="lg:col-span-7 flex flex-col justify-center">
                        <h3 class="text-2xl font-bold text-[#001B3A] mb-6">
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
                                            class="shrink-0 mt-1 w-8 h-8 rounded-full bg-[#EAB308]/20 flex items-center justify-center group-hover:bg-[#EAB308] transition-colors duration-300">
                                            <x-dynamic-component :component="$iconoFinal" class="w-4 h-4 text-[#EAB308]" />
                                        </div>

                                        {{-- Texto --}}
                                        <div class="ml-4">
                                            <h4 class="text-lg font-bold text-[#001B3A]">{{ $punto['titulo'] }}</h4>
                                            <p class="text-gray-600 mt-2 leading-relaxed text-justify">
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
                    class="bg-[#001B3A] p-8 rounded-xl relative overflow-hidden group hover:-translate-y-2 transition-transform duration-300">
                    <div class="absolute top-0 left-0 w-full h-1 bg-[#EAB308]"></div>
                    <h3 class="text-2xl font-bold text-white mb-4">Misión</h3>
                    <p class="text-gray-300 text-sm leading-relaxed">{{ $info->mision }}</p>
                    <div
                        class="absolute -bottom-4 -right-4 text-[#EAB308]/10 group-hover:text-[#EAB308]/20 transition-colors">
                        <span class="text-9xl font-bold">01</span>
                    </div>
                </div>

                {{-- Visión --}}
                <div
                    class="bg-[#EAB308] p-8 rounded-xl relative overflow-hidden group hover:-translate-y-2 transition-transform duration-300">
                    <div class="absolute top-0 left-0 w-full h-1 bg-[#001B3A]"></div>
                    <h3 class="text-2xl font-bold text-[#001B3A] mb-4">Visión</h3>
                    <p class="text-[#001B3A]/80 text-sm leading-relaxed font-medium">{{ $info->vision }}</p>
                    <div class="absolute -bottom-4 -right-4 text-white/20 group-hover:text-white/30 transition-colors">
                        <span class="text-9xl font-bold">02</span>
                    </div>
                </div>

                {{-- Valores --}}
                <div
                    class="bg-[#001B3A] p-8 rounded-xl relative overflow-hidden group hover:-translate-y-2 transition-transform duration-300">
                    <div class="absolute top-0 left-0 w-full h-1 bg-[#EAB308]"></div>
                    <h3 class="text-2xl font-bold text-white mb-4">Valores</h3>
                    <ul class="text-gray-300 text-sm space-y-2">
                        @if ($info->valores)
                            @foreach ($info->valores as $valor)
                                <li class="flex items-center">
                                    <span class="w-1.5 h-1.5 bg-[#EAB308] rounded-full mr-2"></span>
                                    {{ $valor['valor'] }}
                                </li>
                            @endforeach
                        @endif
                    </ul>
                    <div
                        class="absolute -bottom-4 -right-4 text-[#EAB308]/10 group-hover:text-[#EAB308]/20 transition-colors">
                        <span class="text-9xl font-bold">03</span>
                    </div>
                </div>

            </div>

            {{-- ESTRUCTURA Y CONTACTO --}}
            <div id="estructura-contacto">
                <div class="text-center mb-10">
                    <div class="inline-block mb-2">
                        <span
                            class="bg-blue-100 text-[#001B3A] text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">Organización</span>
                    </div>
                    <h2 class="text-3xl font-bold text-[#001B3A]">Estructura y Contacto</h2>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                    {{-- Organigrama --}}
                    <div class="lg:col-span-8">
                        <div
                            class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100 overflow-hidden relative group">
                            <div class="absolute top-0 left-0 w-1.5 h-full bg-[#EAB308]"></div>
                            <h3 class="text-2xl text-center font-bold text-[#001B3A] mb-2 pl-4">Organigrama SIRESU</h3>
                            <div class="overflow-x-auto pb-2 custom-scrollbar">
                                <img src="{{ asset('storage/' . $info->organigrama) }}" alt="Organigrama"
                                    class="min-w-175 w-full h-auto transition-transform duration-500 origin-top-left">
                            </div>
                        </div>
                    </div>

                    {{-- Contacto y enlaces --}}
                    <div class="lg:col-span-4 space-y-6 sticky top-24">

                        {{-- Ubicación --}}
                        <div class="bg-[#001B3A] text-white p-6 rounded-2xl shadow-xl relative overflow-hidden">
                            <div
                                class="absolute -top-10 -right-10 w-32 h-32 bg-[#EAB308] rounded-full mix-blend-multiply filter blur-2xl opacity-20">
                            </div>

                            <h3 class="text-lg font-bold text-[#EAB308] mb-4 flex items-center">
                                <x-heroicon-m-map-pin class="w-5 h-5 mr-2" /> Ubicación
                            </h3>

                            <div class="space-y-4 text-sm text-gray-300">
                                <p class="leading-relaxed whitespace-pre-line">{{ $info->direccion }}</p>
                                <hr class="border-gray-700">
                                <p class="flex items-center">
                                    <x-heroicon-m-phone class="w-4 h-4 mr-2 text-[#EAB308]" />
                                    <span>{{ $info->telefono }}
                                        @if ($info->extension)
                                            <span class="text-xs bg-[#EAB308]/20 text-[#EAB308] px-1 rounded ml-1">
                                                Ext. {{ $info->extension }}
                                            </span>
                                        @endif
                                    </span>
                                </p>
                                <div class="rounded-lg overflow-hidden h-40 w-full border border-gray-600 mt-4">
                                    <div class="w-full h-full [&>iframe]:w-full [&>iframe]:h-full">
                                        {!! $info->mapa_iframe !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Enlaces rápidos --}}
                        <div class="bg-white border border-gray-100 p-6 rounded-2xl shadow-lg">
                            <h3 class="text-lg font-bold text-[#001B3A] mb-4 flex items-center">
                                <x-heroicon-m-link class="w-5 h-5 mr-2 text-[#EAB308]" /> Enlaces Rápidos
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
                                            class="flex items-center justify-between p-3 rounded-lg bg-gray-50 hover:bg-[#001B3A] group transition-colors duration-300">
                                            <span class="text-sm font-medium text-gray-700 group-hover:text-white">
                                                {{ $link['texto'] }}
                                            </span>
                                            <x-dynamic-component :component="$iconoLink"
                                                class="w-4 h-4 text-gray-400 group-hover:text-white" />
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
