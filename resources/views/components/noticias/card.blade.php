<article
    class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden group hover:shadow-md transition-all duration-300 flex flex-col h-full relative cursor-pointer">

    <div class="relative h-36 overflow-hidden bg-gray-100">
        <img src="{{ asset('storage/' . $noticia->imagen_portada) }}" alt="{{ $noticia->titulo }}"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">

        <div
            class="absolute inset-0 bg-linear-to-t from-[#001B3A]/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
        </div>

        <div
            class="absolute bottom-2 left-2 bg-[#001B3A]/90 backdrop-blur-sm text-white text-[10px] font-bold px-2 py-1 rounded shadow-sm flex items-center">
            <x-heroicon-m-calendar class="w-3 h-3 mr-1 text-[#EAB308]" />
            {{ \Carbon\Carbon::parse($noticia->fecha_publicacion)->isoFormat('D MMM YYYY') }}
        </div>
    </div>

    <div class="p-4 flex flex-col grow justify-between">
        <div>
            <h3
                class="text-base font-bold text-[#001B3A] leading-snug mb-2 group-hover:text-[#EAB308] transition-colors line-clamp-2">
                <a href="{{ route('noticias-eventos.show-noticia', $noticia->slug) }}" class="focus:outline-none">
                    <span class="absolute inset-0" aria-hidden="true"></span>
                    {{ $noticia->titulo }}
                </a>
            </h3>


            <p class="text-gray-500 text-xs line-clamp-3 leading-relaxed mb-2">
                {{ $noticia->resumen }}
            </p>

            @if ($noticia->autor_texto)
                <div class="flex items-center text-gray-400 text-xs mt-auto mb-3">
                    <x-heroicon-m-pencil class="w-3.5 h-3.5 mr-1" />
                    {{ $noticia->autor_texto }}
                </div>
            @endif

                <div
                    class="mt-auto pt-3 border-t border-gray-100 flex items-center justify-between text-[#EAB308] font-bold text-[11px] uppercase tracking-wider group-hover:text-[#001B3A] transition-colors">
                    <span>Leer nota</span>
                    <x-heroicon-m-arrow-right
                        class="w-3.5 h-3.5 transform group-hover:translate-x-1 group-hover:text-[#EAB308] transition-all" />
                </div>
        </div>

</article>
