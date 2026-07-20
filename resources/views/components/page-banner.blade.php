@props([
    'titulo',
    'descripcion' => null,
    'isHome' => false,
    'redes' => [],
    'imagen' => asset('images/ocelote-unach-blue.png'),
])

<div class="relative overflow-hidden font-poppins"
     style="
         background: transparent linear-gradient(180deg, #0039C7 0%, #001D64 100%) 0% 0% no-repeat padding-box;
         min-height: 400px;
     ">

    <div class="absolute pointer-events-none"
         style="
             top: 43px;
             left: 265px;
             width: 1666px;
             height: 600px;
             background: transparent linear-gradient(158deg, #1A2927 0%, #1A292700 100%) 0% 0% no-repeat padding-box;
             mix-blend-mode: overlay;
             opacity: 0.3;
             transform: matrix(1, 0.09, -0.09, 1, 0, 0);
         ">
    </div>

     <div class="container mx-auto px-6 relative z-10 flex items-center"
         style="min-height: 400px; padding-top: 7rem; padding-bottom: 8rem;">

        <div class="flex flex-col md:flex-row items-center justify-between w-full gap-8">

            @if($isHome && count($redes) > 0)
                <div class="hidden md:flex flex-col space-y-5 mr-6 border-r-2 pr-6"
                     style="border-color: rgba(255,255,255,0.25);">
                    @foreach($redes as $red)
                        <a href="{{ $red->url }}" target="_blank"
                           class="text-white/70 hover:text-white transition-transform hover:scale-110">
                            <x-utils.social-icon :name="$red->nombre" class="w-5 h-5 md:w-6 md:h-6" />
                        </a>
                    @endforeach
                </div>
            @endif

            <div class="flex-1 text-center md:text-left max-w-3xl">
                <h1 class="font-bold text-white leading-tight tracking-tight"
                    style="font-size: clamp(1.75rem, 4vw, 3.5rem);">
                    {{ $titulo }}
                </h1>

                @if($descripcion)
                    <p class="mt-4 font-medium"
                       style="color: rgba(255,255,255,0.85); font-size: clamp(0.9rem, 1.5vw, 1.1rem); line-height: 1.7;">
                        {{ $descripcion }}
                    </p>
                @endif
            </div>

            <div class="shrink-0 relative flex justify-center"
                 style="width: clamp(160px, 24vw, 340px);">
                <img src="{{ $imagen }}"
                     alt="Ilustración"
                     width="340"
                     height="340"
                     class="relative w-full h-auto object-contain"
                     style="
                         opacity: 0.85;
                         transition: transform 0.7s ease;
                     "
                     onmouseover="this.style.transform='scale(1.05)'"
                     onmouseout="this.style.transform='scale(1)'">
            </div>

        </div>
    </div>
</div>