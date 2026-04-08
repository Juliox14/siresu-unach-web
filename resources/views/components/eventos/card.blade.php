@props(['evento'])

<div
    {{ $attributes->merge(['class' => 'bg-white rounded-lg shadow-sm overflow-hidden transition duration-300 hover:shadow-md cursor-pointer h-full flex flex-col group']) }}>

    <div class="relative h-36 overflow-hidden bg-gray-100">
        <img src="{{ asset('storage/' . $evento->imagen) }}"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
            alt="{{ $evento->titulo }}">

        <div
            class="absolute top-2 right-2 bg-white/95 backdrop-blur-sm px-2 py-1 rounded-md text-center shadow-sm border border-gray-100">
            <span class="block text-[10px] font-bold text-gray-500 uppercase tracking-wider">
                {{ \Carbon\Carbon::parse($evento->fecha_evento)->translatedFormat('M') }}
            </span>
            <span class="block text-lg font-bold text-[#EAB308] leading-none">
                {{ \Carbon\Carbon::parse($evento->fecha_evento)->format('d') }}
            </span>
        </div>
    </div>

    <div class="p-4 flex-1 flex flex-col justify-between">
        <div>
            <h3
                class="text-base font-bold text-[#001B3A] leading-snug mb-2 line-clamp-2 group-hover:text-[#EAB308] transition-colors">
                {{ $evento->titulo }}
            </h3>
            <div class="flex items-center text-gray-400 text-xs mb-2">
                <x-heroicon-m-clock class="w-3.5 h-3.5 mr-1" />
                {{ $evento->horario }}
            </div>
        </div>

        <div class="flex items-center text-[#EAB308] mt-2 pt-2 border-t border-gray-100">
            <x-dynamic-component :component="$evento->icono ?? 'heroicon-o-calendar'" class="w-4 h-4 mr-1" />
            <span class="text-xs font-bold uppercase tracking-wide">{{ $evento->categoria }}</span>
        </div>
    </div>
</div>
