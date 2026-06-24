@props(['noticias'])

<section class="py-12 font-poppins">
    <div class="container mx-auto px-4 lg:px-8">

        <!-- === ENCABEZADO MODERNO === -->
        <div class="flex flex-col md:flex-row justify-between items-end mb-10 border-b border-gray-100 pb-5 gap-4">
            <div>
                <span
                    class="bg-unach-azul/10 text-unach-azul-oscuro text-[11px] font-bold px-3 py-1 rounded-full uppercase tracking-widest">Comunicación</span>
                <h2 class="text-2xl md:text-3xl font-bold text-unach-azul-oscuro tracking-tight font-heading mt-2">
                    Noticias y publicaciones</h2>
            </div>

            <!-- Enlace de acción -->
            <div class="hidden md:block">
                <a href="{{ route('noticias.index') }}"
                    class="inline-flex items-center text-unach-dorado hover:text-unach-azul-oscuro font-semibold transition-colors text-sm font-poppins group">
                    Ver todas las noticias
                    <x-heroicon-m-arrow-right
                        class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" />
                </a>
            </div>
        </div>

        <!-- === GRID DE NOTICIAS === -->
        <!-- Mantenemos la estructura de 4 columnas, asegurando espacios consistentes -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse ($noticias as $noticia)
                <x-noticias.card :noticia="$noticia" />
            @empty
                <div class="col-span-full py-12 text-center text-unach-gris-texto opacity-60">
                    <p>No hay noticias disponibles en este momento.</p>
                </div>
            @endforelse
        </div>

        <!-- === BOTÓN MÓVIL (Solo visible en pantallas pequeñas) === -->
        <div class="mt-8 text-center md:hidden">
            <a href="{{ route('noticias.index') }}"
                class="inline-flex items-center justify-center w-full bg-unach-fondo hover:bg-unach-azul-oscuro text-unach-azul-oscuro hover:text-white px-6 py-3 rounded-xl font-semibold transition-colors font-poppins text-sm border border-gray-200">
                Ver todas las noticias
            </a>
        </div>

    </div>
</section>
