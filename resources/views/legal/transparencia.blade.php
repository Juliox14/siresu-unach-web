<x-layout title="Transparencia - SIRESU">

    <section class="bg-[#001B3A] py-16 md:py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="container mx-auto px-4 lg:px-8 relative z-10 text-center">
            <div class="inline-flex items-center justify-center p-3 bg-white/10 rounded-2xl mb-6 backdrop-blur-sm border border-white/20">
                <x-heroicon-o-scale class="w-8 h-8 text-[#EAB308]" />
            </div>
            <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight mb-4">
                Portal de <span class="text-[#EAB308]">Transparencia</span>
            </h1>
            <p class="text-gray-300 max-w-2xl mx-auto text-lg">
                Nuestro compromiso con la rendición de cuentas y la comunidad universitaria.
            </p>
        </div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-[#EAB308] rounded-full mix-blend-multiply filter blur-[100px] opacity-20"></div>
    </section>

    <section class="py-16 bg-gray-50 relative z-20 -mt-8">
        <div class="container mx-auto px-4 lg:px-8 max-w-4xl">
            <div class="bg-white p-8 md:p-12 rounded-3xl shadow-lg shadow-gray-200/50 border border-gray-100">
                
                <div class="text-center max-w-2xl mx-auto mb-12">
                    <h2 class="text-3xl font-extrabold text-[#001B3A] mb-4">Principios de Operación</h2>
                    <p class="text-gray-600 text-lg">
                        El SIRESU opera bajo los principios de máxima publicidad, honestidad y rendición de cuentas. Buscamos mantener siempre canales de comunicación abiertos con la sociedad.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 flex items-start">
                        <div class="bg-white p-3 rounded-xl shadow-sm mr-4">
                            <x-heroicon-o-map-pin class="w-6 h-6 text-[#001B3A]" />
                        </div>
                        <div>
                            <h3 class="font-bold text-[#001B3A] mb-1">Oficina Central</h3>
                            <p class="text-sm text-gray-500">Boulevard Belisario Domínguez, Km. 1081, Tuxtla Gutiérrez, Chiapas.</p>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 flex items-start">
                        <div class="bg-white p-3 rounded-xl shadow-sm mr-4">
                            <x-heroicon-o-clock class="w-6 h-6 text-[#001B3A]" />
                        </div>
                        <div>
                            <h3 class="font-bold text-[#001B3A] mb-1">Horario de Atención</h3>
                            <p class="text-sm text-gray-500">Lunes a Viernes<br>8:00 hrs a 16:00 hrs.</p>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 flex items-start md:col-span-2">
                        <div class="bg-white p-3 rounded-xl shadow-sm mr-4">
                            <x-heroicon-o-envelope class="w-6 h-6 text-[#001B3A]" />
                        </div>
                        <div>
                            <h3 class="font-bold text-[#001B3A] mb-1">Contacto Institucional</h3>
                            <p class="text-sm text-gray-500 mb-2">Para solicitudes de información, dudas sobre convocatorias o asistencia general.</p>
                            <a href="mailto:contacto@siresu.unach.mx" class="text-[#EAB308] font-bold hover:underline">contacto@siresu.unach.mx</a>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-100 pt-8 mt-8">
                    <p class="text-gray-500 text-sm text-center">
                        * Toda la información publicada en este sitio está sujeta a los lineamientos de acceso a la información pública vigentes en la legislación universitaria.
                    </p>
                </div>

            </div>
        </div>
    </section>

</x-layout>