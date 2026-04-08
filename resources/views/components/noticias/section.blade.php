@props(['noticias'])

<section class="mb-12 bg-gray-50 font-sans">
    <div class="container mx-auto px-4 lg:px-8">
        
        <div class="mb-10 text-center">
            <h2 class="text-4xl font-extrabold text-[#001B3A] tracking-tight">
                Noticias y <span class="text-[#EAB308]">Publicaciones</span>
            </h2>
            <div class="h-1 w-16 bg-[#EAB308] mt-3 mx-auto rounded-full"></div>
            <p class="mt-3 text-gray-500 max-w-2xl mx-auto text-sm">
                Aquí puedes ver noticias y publicaciones recientes.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($noticias as $noticia)
                <x-noticias.card :noticia="$noticia" />
            @endforeach
        </div>

        <div class="mt-10 text-center">
            <a href="{{ route('noticias.index') }}" class="inline-flex items-center justify-center px-6 py-2.5 text-sm font-bold text-[#001B3A] transition-all duration-200 bg-white border-2 border-[#001B3A] rounded-md hover:bg-[#001B3A] hover:text-white focus:outline-none">
                Ver todas las noticias
            </a>
        </div>

    </div>
</section>