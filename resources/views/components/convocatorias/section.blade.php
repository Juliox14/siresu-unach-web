@props(['convocatorias'])

<style>
    /* Ocultar scrollbar pero permitir funcionalidad */
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    /* Sombra especial para el título dorado */
    .text-shadow-gold {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
    }
</style>

<section class="relative py-16 font-sans border-t border-blue-900 overflow-hidden">

    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/explanada-biblioteca.jpg') }}"
            class="w-full h-full object-cover filter blur-[1px] scale-105" alt="Fondo">
        <div class="absolute inset-0 bg-[#001B3A]/50 mix-blend-multiply"></div>
    </div>

    <div class="relative z-10 container mx-auto px-4">

        <div class="mb-10 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white tracking-wider text-shadow-gold mb-2">
                Convocatorias Vigentes
            </h2>
            <p class="text-gray-200 mt-4 max-w-2xl mx-auto text-sm drop-shadow-md">
                Consulta las bases y requisitos para aplicar a las becas y programas disponibles.
            </p>
        </div>

        <div class="flex overflow-x-auto pb-8 gap-4 snap-x snap-mandatory scroll-smooth no-scrollbar">

            @forelse ($convocatorias as $convocatoria)
                <x-convocatorias.card :convocatoria="$convocatoria" />
            @empty
                <div class="w-full text-center py-10 text-gray-300">
                    <p>No hay convocatorias activas por el momento.</p>
                </div>
            @endforelse
        </div>

        <div class="text-center mt-4">
            <a href="#"
                class="inline-flex items-center text-[#FCF4C3] hover:text-white font-medium transition-colors border-b border-[#EAB308] pb-0.5 hover:border-white text-shadow-gold">
                Ver todas las convocatorias
                <x-heroicon-m-arrow-right class="w-4 h-4 ml-2" />
            </a>
        </div>

    </div>
</section>
