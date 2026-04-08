<x-layout title="Noticias y Eventos - SIRESU">

    <section class="py-12 bg-gray-50 font-sans" x-data="{ activeTab: '{{ request('tab', 'noticias') }}' }">
        <div class="container mx-auto px-4 lg:px-8">

            <div class="flex flex-col lg:flex-row gap-8 mb-8 items-center lg:items-end">
                
                <div class="w-full lg:w-1/4 flex justify-center items-end">
                    <img src="{{ asset('images/logo-noticias-eventos.png') }}" 
                         alt="Icono de Noticias y Eventos" 
                         class="h-16 md:h-30 w-auto">
                </div>
                
                <div class="w-full lg:w-3/4 text-center lg:text-left">
                    <h1 class="text-4xl font-extrabold text-[#001B3A] tracking-tight">
                        Noticias y <span class="text-[#EAB308]">Eventos</span>
                    </h1>
                    <div class="h-1 w-16 bg-[#EAB308] mt-4 rounded-full mx-auto lg:mx-0"></div>
                    <p class="mt-4 text-gray-600 text-lg">
                        Mantente al día con nuestras publicaciones, comunicados y próximas actividades.
                    </p>
                </div>
                
            </div>

            
            <form action="{{ route('noticias.index') }}" method="GET"
                class="flex flex-col lg:flex-row gap-8 items-start">

                <input type="hidden" name="tab" :value="activeTab">

                <aside class="w-full lg:w-1/4 flex flex-col gap-6 sticky top-24">

                    <div class="bg-white p-2 rounded-2xl shadow-sm border border-gray-100 flex flex-col space-y-1">
                        <button type="button" @click="activeTab = 'noticias'"
                            :class="activeTab === 'noticias' ? 'bg-[#001B3A] text-white' : 'text-gray-600 hover:bg-gray-100'"
                            class="px-4 py-3 text-sm font-bold rounded-xl transition-colors text-left flex items-center justify-between">
                            <span>Noticias</span>
                            <x-heroicon-m-newspaper class="w-5 h-5" />
                        </button>
                        <button type="button" @click="activeTab = 'eventos'"
                            :class="activeTab === 'eventos' ? 'bg-[#001B3A] text-white' : 'text-gray-600 hover:bg-gray-100'"
                            class="px-4 py-3 text-sm font-bold rounded-xl transition-colors text-left flex items-center justify-between">
                            <span>Eventos</span>
                            <x-heroicon-m-calendar-days class="w-5 h-5" />
                        </button>
                    </div>

                    <div x-show="activeTab === 'noticias'" style="display: none;" x-transition class="space-y-6">
                        <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100">
                            <h3 class="font-bold text-[#001B3A] mb-3 uppercase tracking-wider text-sm">Buscar Noticia
                            </h3>
                            <div class="relative">
                                <input type="text" name="buscar" value="{{ request('buscar') }}"
                                    placeholder="Palabra clave..."
                                    class="w-full pl-10 pr-4 py-2 border-gray-200 rounded-lg focus:ring-[#EAB308] focus:border-[#EAB308] text-sm">
                                <x-heroicon-m-magnifying-glass class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" />
                            </div>
                        </div>

                        <div class="bg-[#001B3A] p-6 rounded-2xl shadow-md text-white">
                            <h3
                                class="font-bold text-[#EAB308] mb-4 uppercase tracking-wider text-sm border-b border-white/20 pb-2">
                                Año de Publicación
                            </h3>
                            <div class="space-y-3">
                                @php
                                    $anioActual = date('Y');
                                    $anios = [$anioActual, $anioActual - 1, $anioActual - 2, $anioActual - 3];
                                @endphp
                                @foreach ($anios as $anio)
                                    <label class="flex items-center space-x-3 cursor-pointer group">
                                        <input type="checkbox" name="anios[]" value="{{ $anio }}"
                                            {{ in_array($anio, request('anios', [])) ? 'checked' : '' }}
                                            onchange="this.form.submit()"
                                            class="form-checkbox h-4 w-4 text-[#EAB308] border-gray-400 rounded focus:ring-[#EAB308] focus:ring-offset-[#001B3A]">
                                        <span
                                            class="text-sm text-gray-200 group-hover:text-white transition-colors">{{ $anio }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div x-show="activeTab === 'eventos'" style="display: none;" x-transition class="space-y-6">
                        <div class="bg-[#001B3A] p-6 rounded-2xl shadow-md text-white">
                            <h3
                                class="font-bold text-[#EAB308] mb-4 uppercase tracking-wider text-sm border-b border-white/20 pb-2">
                                Estado del Evento
                            </h3>
                            <div class="space-y-3">
                                @php $filtroEvento = request('filtro_eventos', 'proximos'); @endphp

                                <label class="flex items-center space-x-3 cursor-pointer group">
                                    <input type="radio" name="filtro_eventos" value="proximos"
                                        onchange="this.form.submit()"
                                        {{ $filtroEvento === 'proximos' ? 'checked' : '' }}
                                        class="form-radio h-4 w-4 text-[#EAB308] border-gray-400 focus:ring-[#EAB308] focus:ring-offset-[#001B3A]">
                                    <span
                                        class="text-sm text-gray-200 group-hover:text-white transition-colors">Próximos
                                        a realizarse</span>
                                </label>

                                <label class="flex items-center space-x-3 cursor-pointer group">
                                    <input type="radio" name="filtro_eventos" value="pasados"
                                        onchange="this.form.submit()" {{ $filtroEvento === 'pasados' ? 'checked' : '' }}
                                        class="form-radio h-4 w-4 text-[#EAB308] border-gray-400 focus:ring-[#EAB308] focus:ring-offset-[#001B3A]">
                                    <span class="text-sm text-gray-200 group-hover:text-white transition-colors">Eventos
                                        pasados</span>
                                </label>

                                <label class="flex items-center space-x-3 cursor-pointer group">
                                    <input type="radio" name="filtro_eventos" value="todos"
                                        onchange="this.form.submit()" {{ $filtroEvento === 'todos' ? 'checked' : '' }}
                                        class="form-radio h-4 w-4 text-[#EAB308] border-gray-400 focus:ring-[#EAB308] focus:ring-offset-[#001B3A]">
                                    <span class="text-sm text-gray-200 group-hover:text-white transition-colors">Ver
                                        todos</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    @if (request()->hasAny(['buscar', 'anios', 'filtro_eventos']))
                        <a href="{{ route('noticias.index') }}"
                            class="text-center text-sm text-gray-500 hover:text-red-500 font-bold transition-colors">
                            Limpiar Filtros
                        </a>
                    @endif

                </aside>


                <div class="w-full lg:w-3/4 flex flex-col gap-6">

                    <div x-show="activeTab === 'noticias'" style="display: none;" x-transition>
                        @if ($noticias->count() > 0)
                            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                                @foreach ($noticias as $noticia)
                                    <x-noticias.card :noticia="$noticia" />
                                @endforeach
                            </div>
                        @else
                            <div
                                class="bg-white rounded-2xl p-12 text-center border border-gray-100 shadow-sm flex flex-col items-center">
                                <x-heroicon-o-document-magnifying-glass class="w-16 h-16 text-gray-300 mb-4" />
                                <h3 class="text-xl font-bold text-[#001B3A]">No se encontraron noticias</h3>
                                <p class="text-gray-500 mt-2">Intenta ajustar tus filtros de búsqueda.</p>
                            </div>
                        @endif

                        <div class="mt-8">
                            {{ $noticias->appends(request()->query())->links() }}
                        </div>
                    </div>


                    <div x-show="activeTab === 'eventos'" style="display: none;" x-transition>
                        @if ($eventos && $eventos->count() > 0)
                            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                                @foreach ($eventos as $evento)
                                    <div class="min-w-[70%] md:min-w-[35%] lg:min-w-[23%] snap-center h-full"
                                        x-data="{ open: false }">
                                        {{-- Pasamos el array individual al componente card --}}
                                        <x-eventos.card :evento="$evento" @click="open = true" />

                                        {{-- Pasamos el array individual al componente modal --}}
                                        <x-eventos.modal :evento="$evento" />
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div
                                class="bg-white rounded-2xl p-12 text-center border border-gray-100 shadow-sm flex flex-col items-center">
                                <x-heroicon-o-calendar class="w-16 h-16 text-gray-300 mb-4" />
                                <h3 class="text-xl font-bold text-[#001B3A]">No se encontraron eventos</h3>
                                <p class="text-gray-500 mt-2">Prueba cambiando el filtro de estado de evento.</p>
                            </div>
                        @endif


                        <div class="mt-8">
                            {{ $eventos->appends(request()->query())->links() }}
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>

</x-layout>