<footer class="bg-[#052449] text-white font-sans text-sm border-t-4 border-[#001B3A]">

    <div class="container mx-auto px-6 py-12">

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

            <div class="space-y-6">
                <h4 class="uppercase tracking-[0.2em] font-bold text-white mb-6 text-xs">Más Información</h4>
                <ul class="space-y-4 text-gray-300">
                    <li><a href="/" class="hover:text-white transition-colors">Inicio</a></li>
                    <li><a href="/acerca-de" class="hover:text-white transition-colors">Acerca de</a></li>
                    <li><a href="/noticias" class="hover:text-white transition-colors">Noticias y eventos</a></li>
                    <li><a href="/instalaciones" class="hover:text-white transition-colors">Instalaciones</a></li>
                    <li><a href="/directorio" class="hover:text-white transition-colors">Directorio</a></li>
                </ul>
            </div>

            <div class="space-y-6">
                <h4 class="uppercase tracking-[0.2em] font-bold text-white mb-6 text-xs">Dirección</h4>
                <div class="text-gray-300 space-y-2 leading-relaxed">
                    {{ $infoSiresu->direccion ?? 'Dirección no configurada' }}
                </div>
            </div>

            <div class="space-y-6">
                <h4 class="uppercase tracking-[0.2em] font-bold text-white mb-6 text-xs">Contacto</h4>
                <div class="text-gray-300 space-y-2">
                    <p>Tel: {{ $infoSiresu->telefono ?? '' }} ext. {{ $infoSiresu->extension ?? '' }}</p>
                    <p class="mt-4">
                        <a href="mailto:siresu@unach.mx"
                            class="hover:text-[#EAB308] transition-colors">siresu@unach.mx</a>
                    </p>
                </div>
            </div>

            <div class="flex flex-col items-center md:items-end space-y-6">

                <div class="flex items-center gap-4">
                    <img src="{{ asset('images/logo-unach.png') }}" alt="UNACH"
                        class="h-20 w-auto opacity-90 grayscale hover:grayscale-0 transition duration-500">

                    <img src="{{ asset('images/logo-siresu.png') }}" alt="SIRESU"
                        class="h-16 w-auto opacity-90 grayscale hover:grayscale-0 transition duration-500 ml-4">
                </div>



                <div class="flex space-x-4">
                    @foreach ($redesSociales as $red)
                        <a href="{{ $red->url }}" target="_blank" class="text-gray-400 hover:text-white transition">
                            <x-utils.social-icon :name="$red->nombre" class="w-6 h-6 fill-current" />
                        </a>
                    @endforeach
                </div>

            </div>
        </div>

        <hr class="border-gray-700 my-10">

        <div class="flex flex-col md:flex-row justify-between items-center text-xs text-gray-400 gap-4">
            <div>
                Sitio desarrollado por Julian Castro, estudiante de la FCA Campus I - UNACH. <br>
            </div>
            <div class="flex flex-wrap justify-center gap-6">
                <a href="#" class="hover:text-white transition-colors">Términos y Condiciones de Uso</a>
                <a href="#" class="hover:text-white transition-colors">Transparencia</a>
                <a href="#" class="hover:text-white transition-colors">Avisos de privacidad</a>
            </div>
        </div>

    </div>

    <div class="bg-[#001B3A] py-6 text-center">
        <p class="text-white text-sm tracking-wide">Universidad Autónoma de Chiapas</p>
    </div>
</footer>
