<x-layout :title="$convocatoria->titulo . ' - SIRESU'">

    <section class="relative pt-32 pb-48 overflow-hidden">

        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/explanada-biblioteca.jpg') }}"
                class="w-full h-full object-cover filter blur-[2px] scale-105" alt="Fondo {{ $convocatoria->titulo }}">

            <div class="absolute inset-0 bg-[#001B3A]/70 mix-blend-multiply"></div>

            <div class="absolute inset-0 bg-[#001B3A]/50 mix-blend-multiply"></div>
        </div>

        <div
            class="absolute inset-0 opacity-20 bg-[radial-gradient(circle_at_top_right, var(--tw-gradient-stops))] from-[#EAB308] via-transparent to-transparent z-0">
        </div>

        <div class="container mx-auto px-6 md:px-12 lg:px-24 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

                <div class="lg:col-span-7 text-white">
                    <div class="flex flex-wrap items-center gap-3 mb-6">

                        @if ($convocatoria->departamento->nombre)
                            <span
                                class="px-4 py-1.5 bg-[#113963] text-[#ffffff] text-sm font-bold rounded-full uppercase tracking-wider shadow-sm">
                                {{ $convocatoria->departamento->nombre}}
                            </span>
                        @endif

                        <span
                            class="px-4 py-1.5 bg-[#EAB308] text-[#001B3A] text-sm font-bold rounded-full uppercase tracking-wider shadow-sm">
                            {{ $convocatoria->categoria }}
                        </span>

                        @if (in_array($convocatoria->estado, ['Abierta', 'Nueva']))
                            <span
                                class="px-4 py-1.5 bg-green-500/30 backdrop-blur-sm text-green-300 border border-green-400/50 text-sm font-bold rounded-full flex items-center">
                                <span
                                    class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse shadow-[0_0_5px_#4ade80]"></span>
                                {{ $convocatoria->estado }}
                            </span>
                        @else
                            <span
                                class="px-4 py-1.5 bg-red-500/30 backdrop-blur-sm text-red-200 border border-red-500/50 text-sm font-bold rounded-full">
                                {{ $convocatoria->estado }}
                            </span>
                        @endif
                    </div>

                    <h1
                        class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight mb-6 tracking-tight drop-shadow-lg">
                        {{ $convocatoria->titulo }}
                    </h1>

                    <div class="flex items-center text-gray-200 text-lg drop-shadow-md">
                        <x-heroicon-o-calendar class="w-6 h-6 mr-3 text-[#EAB308]" />
                        Fecha de cierre: <span
                            class="font-bold text-white ml-2">{{ \Carbon\Carbon::parse($convocatoria->fecha_limite)->translatedFormat('d \d\e F, Y') }}</span>
                    </div>
                </div>

                <div class="lg:col-span-5 hidden lg:block">
                    @if ($convocatoria->imagen)
                        <img src="{{ asset('storage/' . $convocatoria->imagen) }}" alt="{{ $convocatoria->titulo }}"
                            class="rounded-2xl shadow-2xl border-4 border-white/20 w-full object-cover aspect-4/3 transform hover:scale-105 transition-transform duration-500">
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="pb-24 relative">
        <div class="container mx-auto">
            <div
                class="w-full h-full mx-auto px-6 md:px-12 lg:px-24 bg-white shadow-xl shadow-blue-900/5 border border-gray-100 p-8 md:p-12 lg:p-16 -mt-32 relative z-20">

                @if ($convocatoria->descripcion_detallada)
                    <div class="prose prose-lg prose-blue max-w-none text-gray-700">
                        {!! $convocatoria->descripcion_detallada !!}
                    </div>
                @else
                    <p class="text-xl text-gray-600 leading-relaxed font-light">
                        {{ $convocatoria->descripcion }}
                    </p>
                @endif

                @php
                    $pdf = $convocatoria->archivos->where('tipo', 'documento')->first();
                @endphp

                @if ($pdf || $convocatoria->link_externo)
                    <div class="mt-16 pt-12 border-t border-gray-100 flex flex-col items-center">
                        <h3 class="text-2xl font-bold text-[#001B3A] mb-8">Documentos y Enlaces Oficiales</h3>

                        @if ($pdf)
                            @if ($convocatoria->mostrar_pdf_visualizador)
                                <div
                                    class="h-150 md:h-200 w-2/3 rounded-2xl overflow-hidden shadow-inner border border-gray-200 bg-gray-100 mb-6 relative group">
                                    <iframe src="{{ asset('storage/' . $pdf->ruta) }}"
                                        class="w-full h-full border-0"></iframe>
                                </div>
                                <div class="flex justify-end mb-10">
                                    <a href="{{ asset('storage/' . $pdf->ruta) }}" download
                                        class="inline-flex items-center text-sm font-bold text-[#001B3A] hover:text-[#EAB308] transition-colors">
                                        <x-heroicon-o-arrow-down-tray class="w-4 h-4 mr-2" />
                                        ¿Problemas para visualizar? Descargar PDF
                                    </a>
                                </div>
                            @else
                                <div
                                    class="bg-blue-50/50 rounded-2xl p-6 border border-blue-100 flex flex-col sm:flex-row items-center justify-between gap-6 mb-8 hover:shadow-md transition-shadow">
                                    <div class="flex items-center">
                                        <div
                                            class="w-14 h-14 bg-red-100 text-red-600 rounded-xl flex items-center justify-center mr-5 shrink-0">
                                            <x-heroicon-s-document-text class="w-7 h-7" />
                                        </div>
                                        <div>
                                            <h4 class="text-lg font-bold text-[#001B3A]">Bases de la Convocatoria</h4>
                                            <p class="text-gray-500 text-sm">Documento oficial en formato PDF</p>
                                        </div>
                                    </div>
                                    <a href="{{ asset('storage/' . $pdf->ruta) }}" download
                                        class="w-full sm:w-auto text-center inline-flex items-center justify-center px-8 py-3 bg-[#EAB308] text-[#001B3A] font-bold rounded-xl hover:bg-yellow-400 transition-transform hover:-translate-y-1 shadow-sm">
                                        Descargar Bases <x-heroicon-m-arrow-down-tray class="w-5 h-5 ml-2" />
                                    </a>
                                </div>
                            @endif
                        @endif

                        @if ($convocatoria->link_externo)
                            <div
                                class="bg-gray-50 rounded-2xl p-6 border border-gray-200 flex flex-col sm:flex-row items-center justify-between gap-6 hover:shadow-md transition-shadow">
                                <div class="flex items-center">
                                    <div
                                        class="w-14 h-14 bg-[#001B3A] text-[#EAB308] rounded-xl flex items-center justify-center mr-5 shrink-0">
                                        <x-heroicon-s-globe-alt class="w-7 h-7" />
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-bold text-[#001B3A]">Sitio Web Oficial</h4>
                                        <p class="text-gray-500 text-sm">Realiza tu registro o consulta más detalles en
                                            la plataforma oficial.</p>
                                    </div>
                                </div>
                                <a href="{{ $convocatoria->link_externo }}" target="_blank"
                                    class="w-full sm:w-auto text-center inline-flex items-center justify-center px-8 py-3 bg-[#001B3A] text-white font-bold rounded-xl hover:bg-blue-900 transition-transform hover:-translate-y-1 shadow-sm">
                                    Ir a la plataforma <x-heroicon-m-arrow-top-right-on-square class="w-5 h-5 ml-2" />
                                </a>
                            </div>
                        @endif

                    </div>
                @endif

            </div>
        </div>
    </section>

</x-layout>
