<div class="w-full py-12">
    <div class="container mx-auto px-4">
        
        <div class="flex flex-col md:flex-row justify-center items-start md:divide-x md:divide-gray-300">

            @foreach($enlaces as $enlace)
                <a href="{{ $enlace->enlace_url }}" target="_blank" class="group flex flex-col items-center px-12 md:px-12 py-4 transition duration-300 hover:-translate-y-1 w-full md:w-auto">
                    
                    @if($enlace->icono)
                        <x-dynamic-component 
                            :component="$enlace->icono" 
                            class="h-16 w-16 text-[#001B3A] group-hover:text-[#EAB308] transition duration-300" 
                        />
                    @endif

                    <p class="mt-4 text-[#001B3A] font-bold text-center group-hover:text-[#EAB308] transition duration-300 max-w-37.5 leading-tight">
                        {{ $enlace->titulo }}
                    </p>
                </a>
            @endforeach

        </div>
    </div>
</div>