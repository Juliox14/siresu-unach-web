@props(['eventos']) {{-- Recibimos los datos del controlador --}}

<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

<section class="py-16 font-sans ">
    <div class="container mx-auto px-4 md:px-12">

        <div class="flex justify-between items-end mb-6 px-1">
            <div class="w-full text-center">
                <h2 class="text-4xl font-extrabold text-[#001B3A] tracking-tight">
                    Eventos <span class="text-[#EAB308]"> próximos</span>
                </h2>
                <div class="h-1 w-16 bg-[#EAB308] mt-3 mx-auto rounded-full"></div>
                <p class="mt-3 text-gray-500 max-w-2xl mx-auto text-sm">
                    Aquí puedes ver los eventos próximos que se llevarán a cabo en la UNACH. ¡No te los pierdas!
                </p>
            </div>
            @if (count($eventos) > 4)
                <div class="hidden md:flex space-x-2 text-sm text-gray-400">
                    ← Desliza →
                </div>
            @endif
        </div>

        <div class="flex overflow-x-auto pb-6 gap-4 snap-x snap-mandatory scroll-smooth no-scrollbar">

            @foreach ($eventos as $evento)
                <div class="min-w-[70%] md:min-w-[35%] lg:min-w-[23%] snap-center h-full" x-data="{ open: false }">
                    {{-- Pasamos el array individual al componente card --}}
                    <x-eventos.card :evento="$evento" @click="open = true" />

                    {{-- Pasamos el array individual al componente modal --}}
                    <x-eventos.modal :evento="$evento" />
                </div>
            @endforeach

        </div>
    </div>
</section>
