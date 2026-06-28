@props(['convocatorias'])

<style>
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>

<section class="relative font-sans rounded-2xl shadow-xl overflow-hidden bg-unach-azul-oscuro">
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/explanada-biblioteca.jpg') }}"
            class="w-full h-full object-cover opacity-20 mix-blend-luminosity" alt="Fondo UNACH">
        <div class="absolute inset-0 bg-linear-to-t from-unach-azul/80 via-transparent to-unach-azul-oscuro/80"></div>
    </div>

    <div class="relative z-10 p-5 md:p-8">

        <div class="mb-6 text-center md:text-left flex flex-col md:flex-row md:items-end justify-between border-b border-white/10 pb-4 gap-4">
            <div>
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
                    <x-heroicon-m-arrow-right class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" />
                </a>
            </div>
        </div>

        <div class="flex overflow-x-auto pb-4 gap-4 md:gap-5 snap-x snap-mandatory scroll-smooth no-scrollbar -mx-5 px-5 md:mx-0 md:px-0">
            @forelse ($convocatorias as $convocatoria)
                <div class="snap-center shrink-0 w-[85vw] md:w-70 lg:w-[320px]">
                    <x-convocatorias.card :convocatoria="$convocatoria" />
                </div>
            @empty
                @endforelse
        </div>

        <div class="mt-2 text-center md:hidden">
            <a href="{{ route('noticias.index') }}"
                class="inline-flex items-center justify-center w-full bg-white/10 hover:bg-white/20 text-white px-6 py-3 rounded-lg font-semibold transition-colors font-poppins text-sm border border-white/10">
                Ver todas las convocatorias
            </a>
        </div>
    </div>
</section>