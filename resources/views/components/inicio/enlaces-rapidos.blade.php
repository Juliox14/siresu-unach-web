<div class="w-full py-6 md:py-12">
    <div class="container mx-auto px-2 md:px-4">
        
        {{-- Ajuste móvil: Grid de 2 columnas en celular, Flex con divide-x en escritorio --}}
        <div class="grid grid-cols-2 gap-4 md:flex md:flex-row md:justify-center md:items-start md:gap-0 md:divide-x md:divide-gray-300">

            @foreach($enlaces as $enlace)
                <a href="{{ $enlace->enlace_url }}" target="_blank" class="group flex flex-col items-center px-2 md:px-12 py-4 transition duration-300 hover:-translate-y-1 w-full md:w-auto text-center">
                    
                    @if($enlace->icono)
                        {{-- Ajuste móvil: Íconos un poco más pequeños en celular (h-12 w-12) --}}
                        <x-dynamic-component 
                            :component="$enlace->icono" 
                            class="h-12 w-12 md:h-16 md:w-16 text-[#002173] group-hover:text-[#EAB308] transition duration-300" 
                        />
                    @endif

                    <p class="mt-3 md:mt-4 text-[#002173] font-bold text-xs md:text-base group-hover:text-[#EAB308] transition duration-300 max-w-37.5 md:max-w-37.5 leading-tight">
                        {{ $enlace->titulo }}
                    </p>
                </a>
            @endforeach

        </div>
    </div>
</div>