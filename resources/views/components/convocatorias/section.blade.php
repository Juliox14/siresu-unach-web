@props(['convocatorias'])

<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

<section class="relative font-sans rounded-2xl shadow-xl overflow-hidden bg-unach-azul-oscuro">

    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/explanada-biblioteca.jpg') }}"
            class="w-full h-full object-cover opacity-20 mix-blend-luminosity" alt="Fondo UNACH">
        <div class="absolute inset-0 bg-linear-to-t from-unach-azul/80 via-transparent to-unach-azul-oscuro/80"></div>
    </div>

    <!-- Padding general reducido (antes md:p-12, ahora p-6 md:p-8) -->
    <div class="relative z-10 p-6 md:p-8">

        <!-- Margen inferior y padding del header reducidos -->
        <div
            class="mb-6 text-center md:text-left flex flex-col md:flex-row md:items-end justify-between border-b border-white/10 pb-4 gap-4">
            <div>

                <!-- Título y texto ligeramente más compactos -->
                <h2 class="text-2xl md:text-3xl font-bold text-white tracking-tight font-heading">
                    Convocatorias Vigentes
                </h2>
                <p class="text-gray-300 mt-2 text-sm max-w-xl font-poppins">
                    Consulta las bases y requisitos para aplicar a las becas y programas disponibles.
                </p>
            </div>

            <div class="hidden md:block shrink-0">
                <a href="{{ route('noticias.index') }}"
                    class="inline-flex items-center text-unach-dorado hover:text-white font-semibold transition-colors group font-poppins text-sm">
                    Ver todas
                    <x-heroicon-m-arrow-right
                        class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" />
                </a>
            </div>
        </div>

        <!-- Ancho de las tarjetas reducido en el carrusel (antes lg:w-[400px], ahora lg:w-[320px]) -->
        <div
            class="flex overflow-x-auto pb-4 gap-5 snap-x snap-mandatory scroll-smooth no-scrollbar -mx-4 px-4 md:mx-0 md:px-0">

            @forelse ($convocatorias as $convocatoria)
                <div class="snap-center shrink-0 w-[80vw] md:w-[280px] lg:w-[320px]">
                    <x-convocatorias.card :convocatoria="$convocatoria" />
                </div>
            @empty
                <div class="w-full text-center py-12 bg-white/5 rounded-xl border border-white/10 backdrop-blur-sm">
                    <svg class="w-10 h-10 text-unach-dorado mx-auto mb-3 opacity-80" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                    </svg>
                    <p class="text-white text-sm font-medium font-poppins">No hay convocatorias activas por el momento.
                    </p>
                </div>
            @endforelse

        </div>

        <div class="mt-4 text-center md:hidden">
            <a href="{{ route('noticias.index') }}"
                class="inline-flex items-center justify-center w-full bg-white/10 hover:bg-white/20 text-white px-6 py-2.5 rounded-lg font-semibold transition-colors font-poppins text-sm border border-white/10">
                Ver todas las convocatorias
            </a>
        </div>

    </div>
</section>
