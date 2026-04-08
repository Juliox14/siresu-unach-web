<x-layout :title="'Secretaría de Identidad y Responsabilidad Social Universitaria'">
    
    @if ($heroes && $heroes->isNotEmpty())
        <x-inicio.hero :heroes="$heroes" />
    @else
        <p>No hay contenido configurado para el Hero.</p>
    @endif

    <x-inicio.enlaces-rapidos :enlaces="$enlaces" />

    
        <x-convocatorias.section :convocatorias="$convocatorias" />
    

    @if ($eventos && $eventos->isNotEmpty())
        <x-eventos.calendario-section :eventos="$eventos" />
    @else
        <p class="text-center text-gray-500 py-8">No hay eventos programados en este momento.</p>
    @endif

    @if ($instalacionDestacada)
        <x-inicio.instalacion-destacada :instalacionDestacada="$instalacionDestacada" />
    @endif

    @if ($noticias && $noticias->isNotEmpty())
        <x-noticias.section :noticias="$noticias" />
    @else
        <p class="text-center text-gray-500 py-8">No hay noticias o eventos disponibles en este momento.</p>
    @endif

</x-layout>