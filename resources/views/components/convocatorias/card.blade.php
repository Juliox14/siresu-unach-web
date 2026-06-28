@props(['convocatoria'])

<div class="h-full flex flex-col bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 hover:shadow-[0_20px_40px_rgb(0,0,0,0.08)] hover:border-unach-dorado/30 transition-all duration-500 overflow-hidden font-poppins group">

    <div class="relative h-48 overflow-hidden bg-unach-fondo">
        
        <img src="{{ asset('storage/' . $convocatoria->imagen) }}"
            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
            alt="{{ $convocatoria->titulo }}">

        <div class="absolute inset-0 bg-linear-to-t from-unach-azul-oscuro/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>

        <div class="absolute top-4 left-4 bg-white/95 backdrop-blur-sm text-unach-azul-oscuro px-3 py-1.5 rounded-lg text-[10px] font-bold uppercase shadow-sm flex items-center gap-2 border border-white/50">
            <span @class([
                'w-2 h-2 rounded-full',
                'bg-green-500 animate-pulse shadow-[0_0_5px_#4ade80]' => $convocatoria->estado === 'Abierta',
                'bg-unach-dorado' => $convocatoria->estado === 'Próxima',
                'bg-red-500' => $convocatoria->estado === 'Cerrada',
                'bg-unach-azul' => $convocatoria->estado === 'Nueva',
            ])></span>
            {{ $convocatoria->estado }}
        </div>

        <div class="absolute top-4 right-4 bg-unach-dorado px-2.5 py-1.5 rounded-xl text-center shadow-lg leading-none min-w-12.5 border border-white/20">
            <span class="block text-[9px] font-bold uppercase text-unach-azul-oscuro/80 mb-0.5">{{ $convocatoria->mes_limite }}</span>
            <span class="block text-lg font-black text-unach-azul-oscuro">{{ $convocatoria->dia_limite }}</span>
        </div>
    </div>

    <div class="p-6 flex-1 flex flex-col">

        <div class="mb-2">
            <span class="inline-block text-[10px] font-bold text-unach-dorado uppercase tracking-widest">
                {{ $convocatoria->categoria }}
            </span>
        </div>

        <h3 class="text-lg font-bold text-unach-azul-oscuro leading-snug mb-4 line-clamp-2 font-heading group-hover:text-unach-azul transition-colors">
            {{ $convocatoria->titulo }}
        </h3>

        <div class="flex items-center text-unach-gris-texto text-xs mb-6 mt-auto">
            <div class="w-7 h-7 rounded-full bg-unach-fondo flex items-center justify-center mr-2.5 shrink-0 group-hover:bg-unach-dorado/20 transition-colors">
                <x-heroicon-o-calendar class="w-3.5 h-3.5 text-unach-dorado" />
            </div>
            <span class="font-medium">Cierra el {{ $convocatoria->fecha_formateada }}</span>
        </div>

        <div>
            <a href="{{ route('convocatorias.show', $convocatoria->slug) }}" target="_blank"
                class="flex items-center justify-between w-full bg-unach-fondo hover:bg-unach-dorado text-unach-azul-oscuro font-bold px-5 py-3.5 rounded-xl transition-all duration-300 group/btn">
                <span class="text-sm">Ver detalles</span>
                <x-heroicon-m-arrow-right class="w-4 h-4 group-hover/btn:translate-x-1 transition-transform" />
            </a>
        </div>

    </div>
</div>