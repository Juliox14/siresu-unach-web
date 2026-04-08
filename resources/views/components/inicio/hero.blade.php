@props(['heroes'])

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<style>
    .swiper-button-next, .swiper-button-prev { 
        color: white; 
        opacity: 0.7;
        transition: opacity 0.3s;
    }
    .swiper-button-next:hover, .swiper-button-prev:hover { opacity: 1; }
    
    .swiper-pagination-bullet { background: white; opacity: 0.5; }
    .swiper-pagination-bullet-active { background: #EAB308 !important; opacity: 1; }
</style>

<div class="relative w-full h-150 md:h-145 overflow-hidden">
    
    <div class="swiper mySwiper h-full w-full">
        <div class="swiper-wrapper">
            
            @foreach($heroes as $hero)
                <div class="swiper-slide relative h-full w-full">
                    
                    <div class="absolute inset-0">
                        <img 
                            src="{{ asset('storage/' . $hero->imagen) }}" 
                            alt="{{ $hero->texto_alt ?? $hero->titulo }}" 
                            class="w-full h-full object-cover" {{-- object-cover asegura que cubra todo sin deformarse --}}
                        >
                        <div class="absolute inset-0 bg-black/10 md:bg-linear-to-r md:from-black/70 md:to-transparent"></div>
                    </div>

                    <div class="relative z-10 flex flex-col justify-center h-full text-left px-6 md:px-24 text-white container mx-auto">
                        
                        <div class="max-w-3xl"> <h1 class="text-xl md:text-4xl font-bold mb-6 leading-tight drop-shadow-lg">
                                {{ $hero->titulo }}
                            </h1>

                            @if($hero->subtitulo)
                                <p class="text-lg md:text-xl mb-10 leading-relaxed drop-shadow-md">
                                    {{ $hero->subtitulo }}
                                </p>
                            @endif

                            @if($hero->texto_boton && $hero->enlace_boton)
                                <div> <a href="{{ $hero->enlace_boton }}" class="inline-block bg-[#EAB308] hover:bg-yellow-600 text-[#001B3A] font-bold py-4 px-10 rounded-lg transition duration-300 transform hover:-translate-y-1 shadow-lg text-md">
                                        {{ $hero->texto_boton }}
                                    </a>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
                @endforeach

        </div>

        <div class="swiper-button-next hidden! md:flex! pr-4"></div> <div class="swiper-button-prev hidden! md:flex! pl-4"></div>
        <div class="swiper-pagination bottom-8!"></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true, // Slider infinito
        speed: 1000, // Transición suave de 1 segundo
        autoplay: {
            delay: 6000, // Tiempo entre slides (6 segundos)
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        effect: 'fade', // Efecto de desvanecido elegante
        fadeEffect: {
            crossFade: true
        },
    });
</script>