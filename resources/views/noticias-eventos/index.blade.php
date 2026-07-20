<x-layout 
    title="Tablero Informativo: Noticias, Eventos y Convocatorias - SIRESU UNACH"
    description="Entérate de las últimas noticias, eventos y convocatorias oficiales de la SIRESU UNACH. Mantente conectado con el acontecer institucional de nuestra universidad."
>
    <x-page-banner titulo="Tablero Informativo"
        descripcion="Mantente informado sobre las últimas noticias, eventos y convocatorias de la SIRESU. Descubre lo que está sucediendo en nuestra institución y participa en nuestras iniciativas."
        :isHome="false" :redes="\App\Models\RedSocial::all()" />
    <section class="relative z-10 py-12 bg-gray-50 font-sans">
        <div class="container mx-auto px-4 lg:px-8">
            
            <div class="flex flex-col lg:flex-row gap-8 mb-8 items-center lg:items-end">
                </div>

            <livewire:noticias-eventos />

        </div>
    </section>
</x-layout>