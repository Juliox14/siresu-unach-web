<header id="main-header" x-data="{
    show: true,
    isModalOpen: false,
    isScrolled: false,
    lastScroll: 0,
    height: 0,
    init() {
        this.height = this.$el.offsetHeight;
        document.body.style.paddingTop = this.height + 'px';

        window.addEventListener('resize', () => {
            this.height = this.$el.offsetHeight;
            document.body.style.paddingTop = this.height + 'px';
        });
    },
    handleScroll() {
        if (this.isModalOpen) return;
        const currentScroll = window.scrollY;

        // <-- 2. Evaluamos si el usuario bajó más de 50px para activar la opacidad
        this.isScrolled = currentScroll > 50;

        if (currentScroll > this.lastScroll && currentScroll > 120) {
            this.show = false;
        } else {
            this.show = true;
        }
        this.lastScroll = currentScroll;
    }
}" @scroll.window="handleScroll()"
    @modal-abierto.window="isModalOpen = true; show = false" @modal-cerrado.window="isModalOpen = false; show = true"
    class="bg-unach-azul text-white fixed top-0 left-0 w-full z-40 transition-all duration-300 ease-in-out shadow-md hover:opacity-100"
    :class="{ 
        '-translate-y-full': !show,
        'opacity-70 backdrop-blur-md': isScrolled
    }">
    
    @php
        $enlacesFila1 = $menuEnlaces->where('fila', 1);
        $enlacesFila2 = $menuEnlaces->where('fila', 2);

        // Función Helper para detectar si la ruta está activa de forma segura
        if (!function_exists('verificarRutaActiva')) {
            function verificarRutaActiva($url) {
                if (empty($url) || $url === '#') return false;
                $path = ltrim(parse_url($url, PHP_URL_PATH) ?? '', '/');
                if ($path === '') return request()->is('/');
                return request()->is($path) || request()->is($path . '/*');
            }
        }
    @endphp

    <div class="container mx-auto px-6 py-3 flex flex-col lg:flex-row justify-between items-center">
        
        <div class="flex items-center mb-4 lg:mb-0 w-full lg:w-auto justify-center lg:justify-start">
            <div class="flex items-center space-x-3">
                @foreach ($headerLogos as $logo)
                    <img src="{{ asset('storage/' . $logo->imagen) }}" alt="{{ $logo->nombre }}" class="h-12 md:h-14 w-auto object-contain">
                @endforeach
            </div>

            <div class="h-12 w-px bg-white opacity-50 mx-4"></div>

            <a href="{{ route('inicio') }}" class="text-white font-bold text-xs md:text-[18px] uppercase leading-tight max-w-50 md:max-w-62.5">
                Secretaría de Identidad y Responsabilidad Social Universitaria
            </a>
        </div>

        <nav class="w-full lg:w-auto flex flex-col items-center lg:items-end font-poppins">
            
            <ul class="flex justify-center lg:justify-end items-center space-x-4 uppercase md:space-x-6 text-[15px] tracking-wide mb-2 w-full lg:w-auto">
                @foreach ($enlacesFila1 as $enlace)
                    @php $isActive = verificarRutaActiva($enlace->url); @endphp
                    <li>
                        <a href="{{ $enlace->url ?? '#' }}"
                            class="hover:text-unach-dorado transition-colors {{ $isActive ? 'font-bold' : 'font-normal opacity-90' }}"
                            @if ($enlace->nueva_pestana) target="_blank" @endif>
                            {{ $enlace->titulo }}
                        </a>
                    </li>
                @endforeach
                
                <li class="pl-2 ml-2">
                    <button class="flex items-center justify-center w-10 h-10 rounded-full bg-[#335FCB] text-[#FFFFFF] border border-[#FFFFFF] hover:scale-105 transition-transform shadow-sm focus:outline-none" aria-label="Abrir buscador">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </li>
            </ul>

            <div class="w-[120%] h-px bg-white/44 mb-4 hidden lg:block"></div>

            <ul class="flex flex-col md:flex-row justify-center lg:justify-end items-center uppercase space-y-3 md:space-y-0 md:space-x-6 text-[15px] tracking-wide w-full lg:w-auto">
                @foreach ($enlacesFila2 as $enlace)
                    @php $isActive = verificarRutaActiva($enlace->url); @endphp

                    @if ($enlace->es_menu_desplegable && $enlace->hijos->isNotEmpty())
                        <li x-data="{ open: false }" class="relative w-full md:w-auto text-center md:text-left" @mouseenter="open = true" @mouseleave="open = false">
                            <a href="{{ $enlace->url ?? '#' }}"
                                class="inline-flex items-center hover:text-unach-dorado transition-colors focus:outline-none py-2 md:py-0 {{ $isActive ? 'font-bold' : 'font-normal opacity-90' }}"
                                @if ($enlace->nueva_pestana) target="_blank" @endif>
                                {{ $enlace->titulo }}
                                <svg class="w-4 h-4 ml-1 transition-transform duration-200" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </a>
                            <div x-show="open" style="display: none;" 
                                x-transition:enter="transition ease-out duration-150"
                                x-transition:enter-start="opacity-0 translate-y-2"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 translate-y-2"
                                class="absolute left-1/2 md:left-auto md:right-0 transform -translate-x-1/2 md:translate-x-0 mt-2 w-60 bg-white rounded-lg shadow-xl z-50 overflow-hidden border border-gray-100">
                                @foreach ($enlace->hijos as $hijo)
                                    @php $isChildActive = verificarRutaActiva($hijo->url); @endphp
                                    <a href="{{ $hijo->url }}"
                                        class="block px-5 py-3 text-sm hover:bg-unach-fondo hover:text-[#0038C3] border-b border-gray-50 last:border-0 text-left transition-colors {{ $isChildActive ? 'font-bold text-[#0038C3]' : 'font-normal text-unach-gris-texto' }}"
                                        @if ($hijo->nueva_pestana) target="_blank" @endif>
                                        {{ $hijo->titulo }}
                                    </a>
                                @endforeach
                            </div>
                        </li>
                    @else
                        <li class="w-full md:w-auto text-center">
                            <a href="{{ $enlace->url ?? '#' }}"
                                class="block md:inline-block hover:text-unach-dorado transition-colors py-2 md:py-0 border-b-2 hover:border-unach-dorado {{ $isActive ? 'font-bold' : 'font-normal border-transparent opacity-90' }}"
                                @if ($enlace->nueva_pestana) target="_blank" @endif>
                                {{ $enlace->titulo }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </nav>
    </div>
</header>