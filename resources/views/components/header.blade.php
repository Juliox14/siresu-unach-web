<header id="main-header" x-data="{
    show: true,
    isModalOpen: false, // <-- Agregamos esta bandera para saber el estado del modal
    lastScroll: 0,
    height: 0,
    init() {
        // Calcular altura inicial para el padding del body
        this.height = this.$el.offsetHeight;
        document.body.style.paddingTop = this.height + 'px';

        // Recalcular si cambia el tamaño de ventana
        window.addEventListener('resize', () => {
            this.height = this.$el.offsetHeight;
            document.body.style.paddingTop = this.height + 'px';
        });
    },
    handleScroll() {
        // Si el modal está abierto, congelamos el header arriba y no calculamos el scroll
        if (this.isModalOpen) return;

        const currentScroll = window.scrollY;

        if (currentScroll > this.lastScroll && currentScroll > 120) {
            this.show = false; // Ocultar
        } else {
            this.show = true; // Mostrar
        }
        this.lastScroll = currentScroll;
    }
}" @scroll.window="handleScroll()"
    @modal-abierto.window="isModalOpen = true; show = false" @modal-cerrado.window="isModalOpen = false; show = true"
    class="bg-[#001B3A] text-white font-sans fixed top-0 left-0 w-full z-40 transition-transform duration-300 ease-in-out"
    :class="{ '-translate-y-full': !show }">
    <div
        class="container mx-auto px-4 py-4 flex flex-col md:flex-row justify-between items-center border-b border-gray-700">

        <div class="flex items-center space-x-4 mb-4 md:mb-0">
            @foreach ($headerLogos as $logo)
                <img src="{{ asset('storage/' . $logo->imagen) }}" alt="{{ $logo->nombre }}" class="h-14 w-auto">

                @if (!$loop->last)
                    <div class="h-16 w-0.5 bg-yellow-500"></div>
                @endif
            @endforeach
        </div>

        <div class="flex items-center space-x-4">
            @foreach ($redesSociales as $red)
                <a href="{{ $red->url }}" target="_blank" class="hover:text-yellow-500 transition">
                    <x-utils.social-icon :name="$red->nombre" class="w-5 h-5" />
                </a>
            @endforeach
        </div>
    </div>

    <nav class="container mx-auto px-4 py-4">
        <ul
            class="flex flex-col md:flex-row justify-center items-center space-y-4 md:space-y-0 md:space-x-8 text-sm font-medium text-gray-300 tracking-wide">
            @foreach ($menuEnlaces as $enlace)
                {{-- Enlace con submenú (desplegable) --}}
                @if ($enlace->es_menu_desplegable && $enlace->hijos->isNotEmpty())
                    <li x-data="{ open: false }" class="relative" @mouseenter="open = true" @mouseleave="open = false">

                        <a href="{{ $enlace->url ?? '#' }}"
                            class="flex items-end hover:text-yellow-400 transition focus:outline-none"
                            @if ($enlace->nueva_pestana) target="_blank" @endif>
                            {{ $enlace->titulo }}
                        </a>

                        <div x-show="open" style="display: none;" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-2"
                            class="absolute left-1/2 transform rounded-md -translate-x-1/2 mt-2 w-64 bg-gray-200 shadow-xl z-40 overflow-hidden text-left">

                            @foreach ($enlace->hijos as $hijo)
                                <a href="{{ $hijo->url }}"
                                    class="block px-4 py-3 text-sm text-[#001B3A] font-bold hover:bg-gray-50 hover:text-[#EAB308] border-b border-gray-100 last:border-0 transition-colors"
                                    @if ($hijo->nueva_pestana) target="_blank" @endif>
                                    {{ $hijo->titulo }}
                                </a>
                            @endforeach
                        </div>
                    </li>

                    {{-- Enlace simple --}}
                @else
                    <li>
                        <a href="{{ $enlace->url ?? '#' }}"
                            class="hover:text-yellow-400 transition pb-1 border-b-2 border-transparent hover:border-yellow-400"
                            @if ($enlace->nueva_pestana) target="_blank" @endif>
                            {{ $enlace->titulo }}
                        </a>
                    </li>
                @endif
            @endforeach

        </ul>
    </nav>
</header>
