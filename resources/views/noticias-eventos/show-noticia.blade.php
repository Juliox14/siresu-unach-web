<x-layout title="{{ $noticia->titulo }} - SIRESU">
    <div class="bg-gray-50 py-4 border-b border-gray-200">
        <div class="container mx-auto px-4 lg:px-8">
            <a href="{{ route('noticias.index') }}" class="inline-flex items-center text-sm font-bold text-[#001B3A] hover:text-[#EAB308] transition-colors">
                <x-heroicon-m-arrow-left class="w-4 h-4 mr-2" />
                Volver a Noticias
            </a>
        </div>
    </div>

    <section class="p-12 bg-white font-sans">
        <div class="container mx-auto px-4 lg:px-8">
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">
                
                <article class="lg:col-span-2 flex flex-col">
                    
                    <h1 class="text-3xl md:text-3xl font-bold text-[#001B3A] leading-tight mb-8">
                        {{ $noticia->titulo }}
                    </h1>

                    <div class="w-full mb-3 rounded-2xl overflow-hidden shadow-md bg-gray-100">
                        <img src="{{ asset('storage/' . $noticia->imagen_portada) }}" 
                             alt="{{ $noticia->titulo }}" 
                             class="w-full h-auto max-h-96 object-cover">
                    </div>
                    

                    @if($noticia->autor_imagen)
                        <p class="text-xs text-gray-400 text-right mb-8 italic">
                            Fotografía: {{ $noticia->autor_imagen }}
                        </p>
                    @else
                        <div class="mb-8"></div> @endif

                    <div class="prose prose-lg max-w-none prose-blue text-gray-700 leading-relaxed mb-12">
                        {!! $noticia->contenido !!}
                    </div>

                    <div class="mt-auto pt-6 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-gray-50 p-6 rounded-xl">
                        
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-[#001B3A] text-white flex items-center justify-center font-bold text-lg mr-3 shadow-inner">
                                <x-heroicon-s-pencil-square class="w-5 h-5 text-[#EAB308]"/>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 uppercase tracking-wider font-bold mb-0.5">Escrito por</p>
                                <p class="text-sm font-bold text-[#001B3A]">
                                    {{ $noticia->autor_texto ?? 'Equipo SIRESU' }}
                                </p>
                            </div>
                        </div>

                        <div class="text-left sm:text-right">
                            <p class="text-xs text-gray-500 uppercase tracking-wider font-bold mb-0.5">Publicado el</p>
                            <p class="text-sm font-bold text-[#001B3A] flex items-center sm:justify-end">
                                <x-heroicon-m-calendar-days class="w-4 h-4 mr-1 text-[#EAB308]" />
                                {{ \Carbon\Carbon::parse($noticia->fecha_publicacion)->translatedFormat('d \d\e F \d\e Y') }}
                            </p>
                        </div>

                    </div>
                </article>

                <aside class="lg:col-span-1 sticky top-24">
                    
                    <div class="bg-gray-50 p-6 md:p-8 rounded-2xl border border-gray-100 shadow-sm">
                        <h3 class="text-xl font-bold text-[#001B3A] mb-2 relative inline-block">
                            Últimas Noticias
                            <span class="absolute -bottom-2 left-0 w-1/2 h-1 bg-[#EAB308] rounded-full"></span>
                        </h3>
                        
                        <div class="mt-8 flex flex-col gap-6">
                            @forelse($otrasNoticias as $otra)
                                <a href="{{ route('noticias.show', $otra->slug) }}" class="group flex gap-4 items-center p-3 -mx-3 rounded-xl hover:bg-white hover:shadow-md transition-all duration-300">
                                    
                                    <div class="w-24 h-24 shrink-0 rounded-lg overflow-hidden bg-gray-200">
                                        <img src="{{ asset('storage/' . $otra->imagen_portada) }}" alt="{{ $otra->titulo }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    </div>
                                    
                                    <div class="flex flex-col justify-center">
                                        <p class="text-[10px] font-bold text-[#EAB308] uppercase tracking-wider mb-1">
                                            {{ \Carbon\Carbon::parse($otra->fecha_publicacion)->translatedFormat('d M, Y') }}
                                        </p>
                                        <h4 class="text-sm font-bold text-[#001B3A] line-clamp-3 group-hover:text-blue-700 transition-colors leading-snug">
                                            {{ $otra->titulo }}
                                        </h4>
                                    </div>
                                </a>
                            @empty
                                <p class="text-sm text-gray-500">No hay otras noticias publicadas por el momento.</p>
                            @endforelse
                        </div>

                        <div class="mt-8 pt-6 border-t border-gray-200 text-center">
                            <a href="{{ route('noticias.index') }}" class="inline-flex items-center text-sm font-bold text-[#001B3A] hover:text-[#EAB308] transition-colors">
                                Ver todo el archivo
                                <x-heroicon-m-arrow-right class="w-4 h-4 ml-2" />
                            </a>
                        </div>
                    </div>

                </aside>

            </div>
        </div>
    </section>

</x-layout>