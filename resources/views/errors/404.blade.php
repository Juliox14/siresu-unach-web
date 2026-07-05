<x-layout title="Página no encontrada - SIRESU">
    <section class="min-h-[70vh] flex items-center justify-center bg-gray-50 py-16 px-4 sm:px-6 lg:px-8 font-poppins">
        <div class="max-w-md w-full text-center space-y-8 bg-white p-10 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 transition-all duration-300 hover:shadow-lg">
            
            {{-- Big 404 Graphic --}}
            <div class="relative flex items-center justify-center">
                <div class="text-9xl font-black text-[#001B3A] tracking-widest relative select-none">
                    404
                </div>
                {{-- Decorative Dorado Ring --}}
                <div class="absolute w-24 h-24 rounded-full border-4 border-unach-dorado/30 animate-ping pointer-events-none"></div>
            </div>

            <div class="space-y-4">
                <h1 class="text-2xl font-bold text-unach-azul-oscuro tracking-tight">
                    ¿Te has perdido en el campus?
                </h1>
                <p class="text-sm text-unach-gris-texto leading-relaxed">
                    La página que estás buscando no existe, ha sido movida o está temporalmente fuera de servicio.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center pt-4">
                <a href="{{ route('inicio') }}" 
                   class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3.5 border border-transparent text-sm font-bold rounded-xl text-white bg-[#0039C7] hover:bg-[#001D64] shadow-md hover:scale-[1.02] transition-all duration-300">
                    <x-heroicon-m-home class="w-4 h-4 mr-2 text-unach-dorado" />
                    Ir al Inicio
                </a>
                
                <a href="{{ route('noticias.index') }}" 
                   class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3.5 border border-[#0039C7]/20 text-sm font-bold rounded-xl text-[#0039C7] bg-white hover:bg-gray-50 shadow-sm hover:scale-[1.02] transition-all duration-300">
                    <x-heroicon-m-newspaper class="w-4 h-4 mr-2" />
                    Tablero Informativo
                </a>
            </div>
        </div>
    </section>
</x-layout>
