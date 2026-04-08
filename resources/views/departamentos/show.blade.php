<x-layout :title="$departamento->nombre . ' - SIRESU'">

    <section class="bg-white px-6 md:px-12 lg:px-16 xl:px-24 pt-16 pb-20">

        <div class="max-w-7xl mx-auto mb-10 text-center md:text-left">
            <h1 class="text-4xl md:text-5xl font-extrabold text-[#001B3A] tracking-tight mb-4 leading-tight">
                {{ $departamento->nombre }}
            </h1>
            <div class="h-2 w-24 bg-[#EAB308] rounded-full mb-6 mx-auto md:mx-0"></div>
            @if ($departamento->subtitulo)
                <p class="text-2xl text-gray-500 font-light italic border-l-4 border-[#EAB308] pl-6 py-2">
                    "{{ $departamento->subtitulo }}"
                </p>
            @endif
        </div>

        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-12 lg:gap-16 items-start">

            <div class="w-full lg:w-2/3 flex flex-col space-y-10">
                @if ($departamento->imagen_portada)
                    <div class="w-full overflow-hidden rounded-3xl shadow-sm border border-gray-100">
                        <img src="{{ asset('storage/' . $departamento->imagen_portada) }}"
                            alt="{{ $departamento->nombre }}"
                            class="w-full h-87.5 md:h-112.5 object-cover object-center hover:scale-105 transition-transform duration-1000 ease-out">
                    </div>
                @endif

                @if ($departamento->descripcion)
                    <div class="prose prose-lg prose-blue text-gray-700 leading-relaxed max-w-none text-justify">
                        {!! $departamento->descripcion !!}
                    </div>
                @endif
            </div>

            <aside class="w-full lg:w-1/3 top-24">
                <div class="bg-white shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 rounded-4xl p-8">
                    <div class="flex items-center mb-6">
                        <x-heroicon-s-link class="w-6 h-6 text-[#EAB308] mr-3" />
                        <h3 class="text-xl font-bold text-[#001B3A]">Otros Departamentos</h3>
                    </div>

                    @php
                        $otrosDepartamentos = \App\Models\Departamento::orderBy('nombre', 'asc')->get();
                    @endphp
                    @if ($otrosDepartamentos->count() > 0)
                        <div class="space-y-3">
                            @foreach ($otrosDepartamentos as $depto)
                                @if ($depto->id === $departamento->id)
                                    <div
                                        class="block px-6 py-4 bg-[#F8F9FA] rounded-2xl text-[#001B3A] font-bold text-md border-l-4 border-[#EAB308] shadow-sm">
                                        {{ $depto->nombre }}
                                    </div>
                                @else
                                    <a
                                        href="{{ route('departamentos.show', $depto->slug) }}" class="block px-6 py-4 bg-transparent rounded-2xl text-gray-600 font-semibold text-md hover:bg-gray-50 hover:text-[#001B3A] transition-colors border border-transparent hover:border-gray-100">
                                        {{ $depto->nombre }}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @else
                        <span class="block px-4 py-3 text-sm text-gray-400 italic">No hay departamentos aún.</span>
                    @endif

                    
                </div>
            </aside>

        </div>
    </section>

    @if ($departamento->modulos && $departamento->modulos->count() > 0)
        <section class="bg-[#F8F9FA] px-6 md:px-12 lg:px-16 xl:px-24 py-20 border-t border-b border-gray-200 relative">
            <div class="absolute top-0 left-0 w-full h-1.5 bg-[#EAB308]"></div>

            <div class="max-w-7xl mx-auto">
                <div class="text-center md:text-left mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-[#001B3A] mb-4">Áreas y Servicios</h2>
                    <p class="text-gray-600 text-lg">Conoce las diferentes secciones que conforman esta dirección.</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 xl:gap-14">
                    @foreach ($departamento->modulos as $index => $modulo)
                        <div
                            class="bg-white rounded-4xl p-8 md:p-10 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 relative flex flex-col h-full hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] transition-shadow">

                            <div
                                class="absolute -top-5 -left-5 w-12 h-12 bg-[#EAB308] text-[#001B3A] font-black text-xl flex items-center justify-center rounded-2xl shadow-lg transform -rotate-3 z-10">
                                {{ $index + 1 }}
                            </div>

                            <h3 class="text-2xl font-bold text-[#001B3A] mb-6 mt-2">{{ $modulo->titulo }}</h3>

                            @php
                                $imagenes = $modulo->archivos->where('tipo', 'imagen');
                                $videos = $modulo->archivos->where('tipo', 'video'); // Filtramos los videos
                                $documentos = $modulo->archivos->whereIn('tipo', ['pdf', 'enlace']);
                            @endphp

                            @if ($imagenes->count() > 0)
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                                    @foreach ($imagenes as $imagen)
                                        <a href="{{ asset('storage/' . $imagen->ruta) }}" target="_blank"
                                            class="block group relative overflow-hidden rounded-xl shadow-sm h-48 border border-gray-100">
                                            <img src="{{ asset('storage/' . $imagen->ruta) }}"
                                                alt="{{ $imagen->nombre ?? $modulo->titulo }}"
                                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                                            <div
                                                class="absolute inset-0 bg-[#001B3A]/0 group-hover:bg-[#001B3A]/20 transition-colors duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                                                <x-heroicon-m-magnifying-glass-plus
                                                    class="w-10 h-10 text-white drop-shadow-lg" />
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            @endif

                            @if ($videos->count() > 0)
                                <div class="space-y-4 mb-8">
                                    @foreach ($videos as $video)
                                        <div
                                            class="w-full overflow-hidden rounded-xl shadow-sm border border-gray-200 bg-black aspect-video relative">
                                            <video controls preload="metadata" class="w-full h-full object-contain">
                                                <source src="{{ asset('storage/' . $video->ruta) }}" type="video/mp4">
                                                Tu navegador no soporta la reproducción de videos.
                                            </video>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            @if ($modulo->descripcion)
                                <div class="prose prose-blue text-gray-600 max-w-none mb-8">
                                    {!! $modulo->descripcion !!}
                                </div>
                            @endif

                            @if ($documentos->count() > 0)
                                <div class="mt-auto pt-6 border-t border-gray-100 flex flex-wrap gap-4">
                                    @foreach ($documentos as $doc)
                                        @if ($doc->tipo === 'pdf')
                                            <a href="{{ asset('storage/' . $doc->ruta) }}" target="_blank"
                                                class="inline-flex items-center px-5 py-2.5 bg-[#EAB308] text-[#001B3A] font-bold text-sm rounded-xl hover:bg-red-100 transition border border-red-200 shadow-sm group">
                                                <x-heroicon-o-document-text
                                                    class="w-5 h-5 mr-2 text-[#001B3A] group-hover:scale-110 transition-transform" />
                                                {{ $doc->nombre ?? 'Descargar Folleto' }}
                                            </a>
                                        @elseif($doc->tipo === 'enlace')
                                            <a href="{{ $doc->ruta }}" target="_blank"
                                                class="inline-flex items-center px-5 py-2.5 bg-[#001B3A] text-white font-bold text-sm rounded-xl hover:bg-blue-900 transition shadow-sm group">
                                                <x-heroicon-m-link
                                                    class="w-5 h-5 mr-2 text-[#EAB308] group-hover:rotate-45 transition-transform" />
                                                {{ $doc->nombre ?? 'Visitar Sistema' }}
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            @endif

                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section
        class="py-20 bg-white px-6 md:px-12 lg:px-16 xl:px-24 relative z-10 shadow-[0_-20px_40px_-15px_rgba(0,0,0,0.1)]">
        <div class="max-w-7xl mx-auto space-y-24">
        </div>
    </section>

</x-layout>
