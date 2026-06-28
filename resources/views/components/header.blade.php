<header id="main-header" x-data="{
    show: true,
    isModalOpen: false,
    isScrolled: false,
    lastScroll: 0,
    height: 0,
    mobileMenuOpen: false, // <-- Nuevo estado para controlar el menú móvil
    init() {
        this.height = this.$el.offsetHeight;
        document.body.style.paddingTop = this.height + 'px';

        window.addEventListener('resize', () => {
            this.height = this.$el.offsetHeight;
            document.body.style.paddingTop = this.height + 'px';
            // Si la pantalla crece a tamaño de computadora, cerramos el menú móvil para evitar bugs visuales
            if (window.innerWidth >= 1024) {
                this.mobileMenuOpen = false;
            }
        });
    },
    handleScroll() {
        if (this.isModalOpen || this.mobileMenuOpen) return; // Evitamos que se oculte si el menú móvil está abierto
        const currentScroll = window.scrollY;

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
    class="bg-unach-azul text-white fixed top-0 left-0 w-full z-50 transition-all duration-300 ease-in-out shadow-md hover:opacity-100"
    :class="{ 
        '-translate-y-full': !show,
        'opacity-90 lg:opacity-70 backdrop-blur-md': isScrolled && !mobileMenuOpen,
        'opacity-100': mobileMenuOpen
    }">
    
    @php
        $enlacesFila1 = $menuEnlaces->where('fila', 1);
        $enlacesFila2 = $menuEnlaces->where('fila', 2);

        if (!function_exists('verificarRutaActiva')) {
            function verificarRutaActiva($url) {
                if (empty($url) || $url === '#') return false;
                $path = ltrim(parse_url($url, PHP_URL_PATH) ?? '', '/');
                if ($path === '') return request()->is('/');
                return request()->is($path) || request()->is($path . '/*');
            }
        }
    @endphp

    <div class="container mx-auto px-4 md:px-6 py-3">
        
        <div class="flex justify-between items-center w-full">
            
            {{-- Sección Izquierda: Logos y Título --}}
            <div class="flex items-center space-x-2 md:space-x-4">
                <div class="flex items-center space-x-2 md:space-x-3 shrink-0">
                    @foreach ($headerLogos as $logo)
                        <img src="{{ asset('storage/' . $logo->imagen) }}" alt="{{ $logo->nombre }}" class="h-8 md:h-12 lg:h-14 w-auto object-contain">
                    @endforeach
                </div>

                <div class="h-8 md:h-12 w-px bg-white opacity-50 mx-1 md:mx-2"></div>

                <a href="{{ route('inicio') }}" class="text-white font-bold text-[9px] sm:text-[11px] lg:text-[18px] uppercase leading-tight max-w-32.5 sm:max-w-50 lg:max-w-62.5">
                    Secretaría de Identidad y Responsabilidad Social Universitaria
                </a>
            </div>

            {{-- Botón Hamburguesa (Solo Móvil) --}}
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden flex items-center justify-center p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-unach-dorado" aria-label="Menú principal">
                <svg x-show="!mobileMenuOpen" class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg x-show="mobileMenuOpen" style="display: none;" class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            {{-- NAV ESCRITORIO (Oculto en móvil) --}}
            <nav class="hidden lg:flex flex-col items-end font-poppins">
                <ul class="flex justify-end items-center space-x-6 uppercase text-[15px] tracking-wide mb-2">
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

                <div class="w-[120%] h-px bg-white/44 mb-3"></div>

                <ul class="flex justify-end items-center uppercase space-x-6 text-[15px] tracking-wide">
                    @foreach ($enlacesFila2 as $enlace)
                        @php $isActive = verificarRutaActiva($enlace->url); @endphp

                        @if ($enlace->es_menu_desplegable && $enlace->hijos->isNotEmpty())
                            <li x-data="{ open: false }" class="relative text-left" @mouseenter="open = true" @mouseleave="open = false">
                                <a href="{{ $enlace->url ?? '#' }}"
                                    class="inline-flex items-center hover:text-unach-dorado transition-colors py-2 focus:outline-none {{ $isActive ? 'font-bold' : 'font-normal opacity-90' }}"
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
                                    class="absolute right-0 mt-0 w-60 bg-white rounded-lg shadow-xl z-50 overflow-hidden border border-gray-100">
                                    @foreach ($enlace->hijos as $hijo)
                                        @php $isChildActive = verificarRutaActiva($hijo->url); @endphp
                                        <a href="{{ $hijo->url }}"
                                            class="block px-5 py-3 text-sm hover:bg-unach-fondo hover:text-unach-azul border-b border-gray-50 last:border-0 transition-colors {{ $isChildActive ? 'font-bold text-unach-azul' : 'font-normal text-unach-gris-texto' }}"
                                            @if ($hijo->nueva_pestana) target="_blank" @endif>
                                            {{ $hijo->titulo }}
                                        </a>
                                    @endforeach
                                </div>
                            </li>
                        @else
                            <li>
                                <a href="{{ $enlace->url ?? '#' }}"
                                    class="inline-block hover:text-unach-dorado transition-colors py-2 border-b-2 hover:border-unach-dorado {{ $isActive ? 'font-bold border-unach-dorado' : 'font-normal border-transparent opacity-90' }}"
                                    @if ($enlace->nueva_pestana) target="_blank" @endif>
                                    {{ $enlace->titulo }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>

    {{-- NAV MÓVIL (Dropdown) --}}
    <div x-show="mobileMenuOpen" style="display: none;" 
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="lg:hidden bg-unach-azul-oscuro border-t border-white/20 w-full max-h-[75vh] overflow-y-auto shadow-2xl font-poppins">
        
        <div class="flex flex-col px-6 py-4 space-y-4">
            {{-- Buscador Móvil --}}
            <button class="flex items-center justify-center w-full py-3 rounded-lg bg-[#335FCB]/50 text-white border border-white/30 hover:bg-[#335FCB] transition-colors focus:outline-none mb-2" aria-label="Abrir buscador">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                Buscar...
            </button>

            {{-- Enlaces Fila 1 (Móvil) --}}
            <div class="flex flex-col space-y-3 pb-4 border-b border-white/20 uppercase tracking-wide text-sm">
                @foreach ($enlacesFila1 as $enlace)
                    @php $isActive = verificarRutaActiva($enlace->url); @endphp
                    <a href="{{ $enlace->url ?? '#' }}"
                        class="hover:text-unach-dorado transition-colors {{ $isActive ? 'font-bold text-unach-dorado' : 'font-normal text-white/90' }}"
                        @if ($enlace->nueva_pestana) target="_blank" @endif>
                        {{ $enlace->titulo }}
                    </a>
                @endforeach
            </div>

            {{-- Enlaces Fila 2 (Móvil) --}}
            <div class="flex flex-col space-y-3 pt-2 uppercase tracking-wide text-sm pb-4">
                @foreach ($enlacesFila2 as $enlace)
                    @php $isActive = verificarRutaActiva($enlace->url); @endphp

                    @if ($enlace->es_menu_desplegable && $enlace->hijos->isNotEmpty())
                        {{-- Dropdown Móvil estilo Acordeón --}}
                        <div x-data="{ open: false }" class="flex flex-col">
                            <button @click="open = !open" class="flex justify-between items-center w-full py-2 hover:text-unach-dorado transition-colors focus:outline-none {{ $isActive ? 'font-bold text-unach-dorado' : 'font-normal text-white/90' }}">
                                <span>{{ $enlace->titulo }}</span>
                                <svg class="w-4 h-4 transition-transform duration-200" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse style="display: none;" class="flex flex-col pl-4 mt-2 space-y-3 border-l-2 border-unach-dorado/50">
                                @foreach ($enlace->hijos as $hijo)
                                    @php $isChildActive = verificarRutaActiva($hijo->url); @endphp
                                    <a href="{{ $hijo->url }}"
                                        class="py-1 text-xs hover:text-unach-dorado transition-colors {{ $isChildActive ? 'font-bold text-unach-dorado' : 'font-normal text-white/70' }}"
                                        @if ($hijo->nueva_pestana) target="_blank" @endif>
                                        {{ $hijo->titulo }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <a href="{{ $enlace->url ?? '#' }}"
                            class="py-2 hover:text-unach-dorado transition-colors {{ $isActive ? 'font-bold text-unach-dorado' : 'font-normal text-white/90' }}"
                            @if ($enlace->nueva_pestana) target="_blank" @endif>
                            {{ $enlace->titulo }}
                        </a>
                    @endif
                @endforeach
            </div>

        </div>
    </div>
</header>