@props(['areas'])

@if ($areas->count() > 0)
    <section class="py-20 bg-gray-50 font-sans" x-data="{ activeTab: 'tab-{{ $areas->first()->id }}' }">
        <div class="container mx-auto px-4 lg:px-8">

            <div class="flex flex-col lg:flex-row gap-8 lg:gap-12 items-start">

                <div class="w-full lg:w-1/3 xl:w-1/4 z-10">
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('images/logo-directorio.png') }}" alt="Directorio"
                            class="h-16 md:h-32 w-auto mb-4">
                    </div>
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">

                        <div class="block lg:hidden p-4 bg-[#001B3A]">
                            <select x-model="activeTab"
                                class="bg-white border-0 text-[#001B3A] text-sm rounded-lg block w-full p-2.5 font-bold">
                                @foreach ($areas as $area)
                                    <option value="tab-{{ $area->id }}">{{ $area->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <ul class="hidden lg:flex flex-col divide-y divide-gray-100">
                            @foreach ($areas as $area)
                                <li>
                                    <button @click="activeTab = 'tab-{{ $area->id }}'"
                                        :class="{ 'bg-[#001B3A] text-white border-l-4 border-[#EAB308]': activeTab === 'tab-{{ $area->id }}', 'text-gray-600 hover:bg-gray-50 hover:text-[#001B3A] border-l-4 border-transparent': activeTab !== 'tab-{{ $area->id }}' }"
                                        class="w-full text-left px-6 py-4 font-semibold text-sm transition-all duration-200 flex items-center justify-between group">
                                        {{ $area->nombre }}
                                        <x-heroicon-m-chevron-right :class="{ 'text-[#EAB308] translate-x-1': activeTab === 'tab-{{ $area->id }}', 'text-gray-400 opacity-0 group-hover:opacity-100': activeTab !== 'tab-{{ $area->id }}' }"
                                            class="w-4 h-4 transition-transform duration-200" />
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="w-full lg:w-2/3 xl:w-3/4">
                    <div class="mb-10 text-center md:text-left">
                        <h2 class="text-3xl md:text-4xl font-extrabold text-[#001B3A] tracking-tight">
                            Directorio <span class="text-[#EAB308]">Institucional</span>
                        </h2>
                        <div class="h-1 w-20 bg-[#EAB308] mt-4 mx-auto md:mx-0 rounded-full"></div>
                        <p class="mt-4 text-gray-600 max-w-3xl text-sm md:text-base">
                            Conoce al equipo de trabajo de la Secretaría de Identidad y Responsabilidad Social Universitaria.
                        </p>
                    </div>
                    @foreach ($areas as $area)
                        <div x-show="activeTab === 'tab-{{ $area->id }}'"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-4"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            class="grid grid-cols-1 lg:grid-cols-2 gap-6" style="display: none;">
                            <div class="col-span-1 lg:col-span-2 block lg:hidden mb-2">
                                <h3
                                    class="text-xl font-bold text-[#001B3A] border-b-2 border-[#EAB308] inline-block pb-1">
                                    {{ $area->nombre }}</h3>
                            </div>

                            @if ($area->personas->count() > 0)
                                @foreach ($area->personas as $index => $persona)
                                    <div
                                        class="bg-white rounded-2xl p-6 shadow-md border border-gray-100 hover:shadow-xl transition-all duration-300 flex flex-col sm:flex-row gap-6 items-center sm:items-start text-center sm:text-left
                                    {{ $index === 0 ? 'col-span-1 lg:col-span-2 border-t-4 border-t-[#EAB308]' : 'col-span-1' }}">

                                        <div class="shrink-0 w-full sm:w-48 lg:w-56 flex justify-center">
                                            @if ($persona->foto)
                                                <img src="{{ asset('storage/' . $persona->foto) }}"
                                                    alt="{{ $persona->nombre }}"
                                                    class="w-auto h-full max-h-36 object-contain drop-shadow-md hover:scale-105 transition-transform duration-300">
                                            @else
                                                <div
                                                    class="w-full aspect-3/2 bg-linear-to-br from-[#001B3A] to-blue-900 rounded-lg shadow-inner flex flex-col items-center justify-center p-4 border-b-4 border-[#EAB308]">
                                                    <x-heroicon-o-user class="w-8 h-8 text-white/50 mb-2" />
                                                    <span
                                                        class="text-white font-bold text-center text-xs opacity-80">Foto
                                                        Pendiente</span>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="flex-1 w-full flex flex-col justify-center h-full space-y-3">
                                            <div>
                                                <h4
                                                    class="{{ $index === 0 ? 'text-xl' : 'text-lg' }} font-bold text-[#001B3A] leading-tight mb-1">
                                                    {{ $persona->nombre }}
                                                </h4>
                                                <p class="text-xs font-bold text-[#EAB308] uppercase tracking-wider">
                                                    {{ $persona->cargo }}</p>
                                            </div>

                                            <div class="space-y-2 pt-3 border-t border-gray-100 mt-auto">
                                                @if ($persona->correo)
                                                    <a href="mailto:{{ $persona->correo }}"
                                                        class="flex items-center justify-center sm:justify-start text-sm text-gray-500 hover:text-[#001B3A] transition-colors group">
                                                        <x-heroicon-m-envelope
                                                            class="w-4 h-4 mr-2 text-gray-400 group-hover:text-[#EAB308] transition-colors" />
                                                        <span class="truncate break-all">{{ $persona->correo }}</span>
                                                    </a>
                                                @endif

                                                @if ($persona->telefono)
                                                    <p
                                                        class="flex items-center justify-center sm:justify-start text-sm text-gray-500 group">
                                                        <x-heroicon-m-phone
                                                            class="w-4 h-4 mr-2 text-gray-400 group-hover:text-[#EAB308] transition-colors" />
                                                        {{ $persona->telefono }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div
                                    class="col-span-1 lg:col-span-2 bg-white rounded-2xl p-6 text-center text-gray-500 border border-gray-100">
                                    Aún no hay personal registrado en esta área.
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
