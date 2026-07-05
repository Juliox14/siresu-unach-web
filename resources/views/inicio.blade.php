<x-layout :title="'Secretaría de Identidad y Responsabilidad Social Universitaria'">

    <x-page-banner titulo="Secretaría de Identidad y Responsabilidad Social Universitaria"
        descripcion="Promovemos el desarrollo, el bienestar y la comunicación efectiva de nuestra comunidad universitaria."
        :isHome="true" :redes="\App\Models\RedSocial::all()" />

    {{-- Ajuste móvil: px-24 se volvió dinámico (px-5 md:px-12 lg:px-24) y gap-12 se ajustó a gap-8 en celulares --}}
    <div
        class="relative flex flex-col gap-8 md:gap-12 z-20 -mt-10 md:-mt-16 bg-white rounded-t-[3rem] md:rounded-t-[4rem] pt-8 px-5 md:px-12 lg:px-24 pb-20 font-poppins shadow-xl">

        <x-inicio.enlaces-rapidos :enlaces="$enlaces" />

        <div class="pt-2 md:pt-4">
            <x-convocatorias.section :convocatorias="$convocatorias" />
        </div>

        <x-eventos.calendario-section :eventos="$eventos" />


        @if ($instalacionDestacada)
            <div class="rounded-2xl overflow-hidden shadow-lg border border-gray-100">
                <x-inicio.instalacion-destacada :instalacionDestacada="$instalacionDestacada" />
            </div>
        @endif

 s       <x-noticias.section :noticias="$noticias" />


    </div>

</x-layout>
