<footer class="bg-[#052449] text-white font-sans text-sm border-t-4 border-[#001B3A]">
    
    <div class="container mx-auto px-6 py-12">
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            
            <div class="space-y-6">
                <h4 class="uppercase tracking-[0.2em] font-bold text-white mb-6 text-xs">Más Información</h4>
                <ul class="space-y-4 text-gray-300">
                    <li><a href="#" class="hover:text-white transition-colors">Inicio</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Convocatorias</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Becas y Apoyos</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Noticias</a></li>
                </ul>
            </div>

            <div class="space-y-6">
                <h4 class="uppercase tracking-[0.2em] font-bold text-white mb-6 text-xs">Dirección</h4>
                <div class="text-gray-300 space-y-2 leading-relaxed">
                    <p>4ta. Poniente Sur # 171,</p>
                    <p>Col. Centro C.P. 29000.</p>
                    <p>Tuxtla Gutiérrez, Chiapas, México.</p>
                </div>
            </div>

            <div class="space-y-6">
                <h4 class="uppercase tracking-[0.2em] font-bold text-white mb-6 text-xs">Contacto</h4>
                <div class="text-gray-300 space-y-2">
                    <p>Tel: (961) 617-8000</p>
                    <p class="mt-4">
                        <a href="mailto:siresu@unach.mx" class="hover:text-[#EAB308] transition-colors">siresu@unach.mx</a>
                    </p>
                </div>
            </div>

            <div class="flex flex-col items-center md:items-end space-y-6">
                
                <div class="flex items-center gap-4">
                <img src="{{ asset('images/logo-unach.png') }}" 
                     alt="UNACH" 
                     class="h-20 w-auto opacity-90 grayscale hover:grayscale-0 transition duration-500">
                
                <img src="{{ asset('images/logo-siresu.png') }}" 
                     alt="SIRESU" 
                     class="h-16 w-auto opacity-90 grayscale hover:grayscale-0 transition duration-500 ml-4">
                </div>

                

                <div class="flex gap-3">
                    <a href="#" class="bg-white text-[#333333] rounded-full p-2 hover:bg-[#EAB308] hover:text-white transition duration-300">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="#" class="bg-white text-[#333333] rounded-full p-2 hover:bg-[#EAB308] hover:text-white transition duration-300">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    <a href="#" class="bg-white text-[#333333] rounded-full p-2 hover:bg-[#EAB308] hover:text-white transition duration-300">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                    </a>
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