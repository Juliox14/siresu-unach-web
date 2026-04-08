@php
    $aliados = \App\Models\Aliado::where('activo', true)->get();
    if ($aliados->count() > 0) {
        $logosLoop = $aliados->count() < 6 
            ? $aliados->concat($aliados)->concat($aliados)
            : $aliados->concat($aliados);
    } else {
        $logosLoop = [];
    }
@endphp

@if(count($logosLoop) > 0)
    <style>
        @keyframes marquee {
            0% { transform: translateX(0%); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            display: flex;
            width: fit-content;
            animation: marquee 40s linear infinite;
        }
        .hover\:pause:hover .animate-marquee {
            animation-play-state: paused;
        }
    </style>

    <section class="py-16 border-t border-gray-100 overflow-hidden">
        <div class="relative w-full overflow-hidden hover:pause">
            <div class="absolute inset-y-0 left-0 w-20 bg-linear-to-r from-gray-50 to-transparent z-10 pointer-events-none"></div>
            <div class="absolute inset-y-0 right-0 w-20 bg-linear-to-l from-gray-50 to-transparent z-10 pointer-events-none"></div>

            <div class="animate-marquee flex items-center">
                @foreach ($logosLoop as $aliado)
                    <div class="logo-item shrink-0 px-8 md:px-12 transition-all duration-100 opacity-70 hover:opacity-100 hover:scale-105 transform">
                        
                        @if($aliado->url)
                            <a href="{{ $aliado->url }}" target="_blank" rel="noopener noreferrer">
                        @endif

                        <img src="{{ asset('storage/' . $aliado->imagen) }}" 
                             alt="{{ $aliado->nombre }}"
                             class="max-h-15 w-auto object-contain"
                             title="{{ $aliado->nombre }}">

                        @if($aliado->url)
                            </a>
                        @endif

                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif