<div class="relative z-10 font-sans w-full">
    <div class="container mx-auto px-4 lg:px-8">

        <div class="flex flex-col lg:flex-row gap-8 items-start">

            <aside class="w-full lg:w-1/4 flex flex-col gap-6 lg:sticky lg:top-28 z-20 font-poppins">

                <div class="bg-white p-3 rounded-3xl shadow-sm border border-gray-100 flex flex-col space-y-2">
                    <button type="button" wire:click="$set('activeTab', 'noticias')"
                        class="{{ $activeTab === 'noticias' ? 'bg-unach-azul-oscuro text-white shadow-md' : 'text-unach-gris-texto hover:bg-unach-fondo hover:text-unach-azul' }} px-5 py-4 text-sm font-semibold rounded-2xl transition-all duration-300 text-left flex items-center justify-between group cursor-pointer">
                        <span>Noticias</span>
                        <x-heroicon-m-newspaper class="w-5 h-5 {{ $activeTab === 'noticias' ? 'text-unach-dorado' : 'text-gray-400 group-hover:text-unach-azul' }} transition-colors" />
                    </button>
                    
                    <button type="button" wire:click="$set('activeTab', 'eventos')"
                        class="{{ $activeTab === 'eventos' ? 'bg-unach-azul-oscuro text-white shadow-md' : 'text-unach-gris-texto hover:bg-unach-fondo hover:text-unach-azul' }} px-5 py-4 text-sm font-semibold rounded-2xl transition-all duration-300 text-left flex items-center justify-between group cursor-pointer">
                        <span>Eventos</span>
                        <x-heroicon-m-calendar-days class="w-5 h-5 {{ $activeTab === 'eventos' ? 'text-unach-dorado' : 'text-gray-400 group-hover:text-unach-azul' }} transition-colors" />
                    </button>
                    
                    <button type="button" wire:click="$set('activeTab', 'convocatorias')"
                        class="{{ $activeTab === 'convocatorias' ? 'bg-unach-azul-oscuro text-white shadow-md' : 'text-unach-gris-texto hover:bg-unach-fondo hover:text-unach-azul' }} px-5 py-4 text-sm font-semibold rounded-2xl transition-all duration-300 text-left flex items-center justify-between group cursor-pointer">
                        <span>Convocatorias</span>
                        <x-heroicon-m-megaphone class="w-5 h-5 {{ $activeTab === 'convocatorias' ? 'text-unach-dorado' : 'text-gray-400 group-hover:text-unach-azul' }} transition-colors" />
                    </button>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                    <h3 class="font-bold text-unach-azul-oscuro mb-4 uppercase tracking-widest text-xs flex items-center">
                        <x-heroicon-m-building-office class="w-4 h-4 mr-2 text-unach-dorado" />
                        Departamento
                    </h3>
                    <div class="relative">
                        <select wire:model.live="departamento_id"
                            class="w-full pl-4 pr-10 py-3 bg-unach-fondo border-transparent focus:bg-white rounded-xl focus:ring-2 focus:ring-unach-dorado focus:border-unach-dorado text-sm text-unach-azul-oscuro appearance-none cursor-pointer transition-all outline-none">
                            <option value="">Todos los departamentos</option>
                            @foreach ($departamentos as $depto)
                                <option value="{{ $depto->id }}">{{ $depto->nombre }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-unach-azul">
                            <x-heroicon-m-chevron-down class="w-4 h-4" />
                        </div>
                    </div>
                </div>

                @if($activeTab === 'noticias' || $activeTab === 'convocatorias')
                    <div class="space-y-6">
                        
                        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                            <h3 class="font-bold text-unach-azul-oscuro mb-4 uppercase tracking-widest text-xs">
                                Buscar {{ $activeTab === 'noticias' ? 'Noticia' : 'Convocatoria' }}
                            </h3>
                            <div class="relative group">
                                <input type="text" wire:model.live="buscar" placeholder="Palabra clave..."
                                    class="w-full pl-11 pr-4 py-3 bg-unach-fondo border-transparent focus:bg-white rounded-xl focus:ring-2 focus:ring-unach-dorado focus:border-unach-dorado text-sm transition-all text-unach-azul-oscuro placeholder-gray-400 outline-none">
                                <x-heroicon-m-magnifying-glass class="w-5 h-5 text-gray-400 group-focus-within:text-unach-dorado absolute left-4 top-3 transition-colors" />
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                            <h3 class="font-bold text-unach-azul-oscuro mb-4 uppercase tracking-widest text-xs flex items-center">
                                <x-heroicon-m-calendar class="w-4 h-4 mr-2 text-unach-dorado" />
                                Año de Publicación
                            </h3>
                            <div class="space-y-3">
                                @php
                                    $anioActual = date('Y');
                                    $listaAnios = [$anioActual, $anioActual - 1, $anioActual - 2, $anioActual - 3];
                                @endphp
                                @foreach ($listaAnios as $anio)
                                    <label class="flex items-center space-x-3 cursor-pointer group">
                                        <input type="checkbox" wire:model.live="anios" value="{{ $anio }}"
                                            class="form-checkbox h-4 w-4 text-unach-azul-oscuro border-gray-300 rounded focus:ring-unach-dorado focus:ring-offset-0 transition-colors cursor-pointer">
                                        <span class="text-sm text-unach-gris-texto group-hover:text-unach-azul-oscuro font-medium transition-colors">{{ $anio }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                @if($activeTab === 'eventos')
                    <div class="space-y-6">
                        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                            <h3 class="font-bold text-unach-azul-oscuro mb-4 uppercase tracking-widest text-xs flex items-center">
                                <x-heroicon-m-clock class="w-4 h-4 mr-2 text-unach-dorado" />
                                Estado del Evento
                            </h3>
                            <div class="space-y-3">
                                <label class="flex items-center space-x-3 cursor-pointer group">
                                    <input type="radio" wire:model.live="filtroEventos" value="proximos"
                                        class="form-radio h-4 w-4 text-unach-azul-oscuro border-gray-300 focus:ring-unach-dorado focus:ring-offset-0 transition-colors cursor-pointer">
                                    <span class="text-sm text-unach-gris-texto group-hover:text-unach-azul-oscuro font-medium transition-colors">Próximos a realizarse</span>
                                </label>

                                <label class="flex items-center space-x-3 cursor-pointer group">
                                    <input type="radio" wire:model.live="filtroEventos" value="pasados"
                                        class="form-radio h-4 w-4 text-unach-azul-oscuro border-gray-300 focus:ring-unach-dorado focus:ring-offset-0 transition-colors cursor-pointer">
                                    <span class="text-sm text-unach-gris-texto group-hover:text-unach-azul-oscuro font-medium transition-colors">Eventos pasados</span>
                                </label>

                                <label class="flex items-center space-x-3 cursor-pointer group">
                                    <input type="radio" wire:model.live="filtroEventos" value="todos"
                                        class="form-radio h-4 w-4 text-unach-azul-oscuro border-gray-300 focus:ring-unach-dorado focus:ring-offset-0 transition-colors cursor-pointer">
                                    <span class="text-sm text-unach-gris-texto group-hover:text-unach-azul-oscuro font-medium transition-colors">Ver todos</span>
                                </label>
                            </div>
                        </div>
                    </div>
                @endif

                @if (!empty($buscar) || !empty($anios) || !empty($departamento_id) || $filtroEventos !== 'proximos')
                    <button type="button" wire:click="$set('buscar', ''); $set('anios', []); $set('departamento_id', ''); $set('filtroEventos', 'proximos');"
                        class="text-center w-full text-sm text-gray-400 hover:text-red-500 font-bold transition-colors flex items-center justify-center gap-2">
                        <x-heroicon-m-x-mark class="w-4 h-4" />
                        Limpiar Filtros
                    </button>
                @endif

            </aside>


            <div class="relative z-0 w-full lg:w-3/4 flex flex-col gap-6 min-h-125">

                <div wire:loading class="w-full absolute inset-0 bg-unach-fondo/80 backdrop-blur-sm z-10 transition-all duration-300">
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 opacity-60 pt-2">
                        @for ($i = 0; $i < 6; $i++)
                            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 animate-pulse flex flex-col h-87.5">
                                <div class="w-full h-40 bg-gray-200 rounded-xl mb-4"></div>
                                <div class="w-24 h-4 bg-gray-200 rounded-full mb-4"></div>
                                <div class="w-full h-5 bg-gray-200 rounded-md mb-2"></div>
                                <div class="w-3/4 h-5 bg-gray-200 rounded-md mb-4"></div>
                                <div class="w-full h-10 bg-gray-100 rounded-lg mt-auto"></div>
                            </div>
                        @endfor
                    </div>
                </div>

                <div wire:loading.remove class="w-full transition-all duration-300">
                    
                    @if($activeTab === 'noticias')
                        <div>
                            @if ($noticias->count() > 0)
                                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                                    @foreach ($noticias as $noticia)
                                        <x-noticias.card :noticia="$noticia" />
                                    @endforeach
                                </div>
                            @else
                                <div class="bg-white rounded-3xl p-16 text-center border border-gray-100 shadow-sm flex flex-col items-center mt-4">
                                    <x-heroicon-o-document-magnifying-glass class="w-16 h-16 text-gray-300 mb-4" />
                                    <h3 class="text-xl font-bold text-unach-azul-oscuro font-heading">No se encontraron noticias</h3>
                                    <p class="text-unach-gris-texto mt-2 font-poppins">Intenta ajustar tus filtros de búsqueda para ver más resultados.</p>
                                </div>
                            @endif

                            <div class="mt-10">
                                {{ $noticias->links() }}
                            </div>
                        </div>
                    @endif

                    @if($activeTab === 'eventos')
                        <div>
                            @if ($eventos && $eventos->count() > 0)
                                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
                                    @foreach ($eventos as $evento)
                                        <div class="h-full" x-data="{ open: false }">
                                            <x-eventos.card :evento="$evento" @click="open = true" />
                                            <x-eventos.modal :evento="$evento" />
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="bg-white rounded-3xl p-16 text-center border border-gray-100 shadow-sm flex flex-col items-center mt-4">
                                    <x-heroicon-o-calendar class="w-16 h-16 text-gray-300 mb-4" />
                                    <h3 class="text-xl font-bold text-unach-azul-oscuro font-heading">No se encontraron eventos</h3>
                                    <p class="text-unach-gris-texto mt-2 font-poppins">Prueba cambiando el filtro de estado del evento en el panel lateral.</p>
                                </div>
                            @endif

                            <div class="mt-10">
                                {{ $eventos->links() }}
                            </div>
                        </div>
                    @endif

                    @if($activeTab === 'convocatorias')
                        <div>
                            @if ($convocatorias && $convocatorias->count() > 0)
                                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                                    @foreach ($convocatorias as $convocatoria)
                                        <x-convocatorias.card :convocatoria="$convocatoria" />
                                    @endforeach
                                </div>
                            @else
                                <div class="bg-white rounded-3xl p-16 text-center border border-gray-100 shadow-sm flex flex-col items-center mt-4">
                                    <x-heroicon-o-megaphone class="w-16 h-16 text-gray-300 mb-4" />
                                    <h3 class="text-xl font-bold text-unach-azul-oscuro font-heading">No hay convocatorias disponibles</h3>
                                    <p class="text-unach-gris-texto mt-2 font-poppins">Intenta ajustar tus filtros o regresa más tarde.</p>
                                </div>
                            @endif

                            <div class="mt-10">
                                {{ $convocatorias->links() }}
                            </div>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</div>