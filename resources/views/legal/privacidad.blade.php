<x-layout title="Aviso de Privacidad - SIRESU">

    <section class="bg-[#001B3A] py-16 md:py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="container mx-auto px-4 lg:px-8 relative z-10 text-center">
            <div class="inline-flex items-center justify-center p-3 bg-white/10 rounded-2xl mb-6 backdrop-blur-sm border border-white/20">
                <x-heroicon-o-shield-check class="w-8 h-8 text-[#EAB308]" />
            </div>
            <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight mb-4">
                Aviso de <span class="text-[#EAB308]">Privacidad</span>
            </h1>
            <p class="text-gray-300 max-w-2xl mx-auto text-lg">
                Conoce cómo protegemos, respetamos y manejamos tu información.
            </p>
        </div>
        <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-[#EAB308] rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
    </section>

    <section class="py-16 bg-gray-50 relative z-20 -mt-8">
        <div class="container mx-auto px-4 lg:px-8 max-w-4xl">
            <div class="bg-white p-8 md:p-12 rounded-3xl shadow-lg shadow-gray-200/50 border border-gray-100">
                
                <div class="flex items-center justify-between border-b border-gray-100 pb-6 mb-8">
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Documento Oficial</p>
                    <p class="text-sm font-bold text-[#EAB308] bg-yellow-50 px-3 py-1 rounded-full">
                        Actualizado: {{ now()->translatedFormat('F Y') }}
                    </p>
                </div>

                <article class="space-y-8 text-gray-600 leading-relaxed">
                    
                    <div>
                        <h2 class="text-2xl font-bold text-[#001B3A] mb-4 flex items-center">
                            <span class="w-8 h-8 rounded-lg bg-blue-50 text-[#001B3A] flex items-center justify-center mr-3 text-sm">1</span>
                            Identidad y Domicilio
                        </h2>
                        <p class="pl-11 text-gray-600">
                            El Sistema Institucional de Responsabilidad Social Universitaria (SIRESU) es el responsable del uso y protección de sus datos personales, en estricto apego a la legislación aplicable en materia de transparencia y protección de datos.
                        </p>
                    </div>

                    <div>
                        <h2 class="text-2xl font-bold text-[#001B3A] mb-4 flex items-center">
                            <span class="w-8 h-8 rounded-lg bg-blue-50 text-[#001B3A] flex items-center justify-center mr-3 text-sm">2</span>
                            Datos que recabamos
                        </h2>
                        <p class="pl-11 text-gray-600">
                            Actualmente, esta plataforma web tiene un propósito estrictamente informativo. <strong class="text-[#001B3A]">No recabamos, solicitamos ni almacenamos datos personales sensibles</strong> (como nombre, teléfono, correo electrónico o matrícula) de manera directa a través de formularios en este portal.
                        </p>
                    </div>

                    <div>
                        <h2 class="text-2xl font-bold text-[#001B3A] mb-4 flex items-center">
                            <span class="w-8 h-8 rounded-lg bg-blue-50 text-[#001B3A] flex items-center justify-center mr-3 text-sm">3</span>
                            Uso de Cookies y Tecnologías de Rastreo
                        </h2>
                        <p class="pl-11 text-gray-600">
                            Nuestro portal utiliza "cookies" técnicas estrictamente necesarias para el funcionamiento y seguridad de la página (por ejemplo, para prevenir ataques de falsificación de peticiones a través de tokens de seguridad). Estas cookies no rastrean su actividad fuera de este sitio ni recopilan información personal identificable.
                        </p>
                    </div>

                    <div>
                        <h2 class="text-2xl font-bold text-[#001B3A] mb-4 flex items-center">
                            <span class="w-8 h-8 rounded-lg bg-blue-50 text-[#001B3A] flex items-center justify-center mr-3 text-sm">4</span>
                            Cambios al Aviso de Privacidad
                        </h2>
                        <p class="pl-11 text-gray-600">
                            En caso de que en el futuro se implementen funciones de registro de usuarios o postulaciones en línea, este aviso será actualizado para reflejar los nuevos datos recabados y sus finalidades. Le recomendamos visitar esta página periódicamente.
                        </p>
                    </div>

                </article>

            </div>
        </div>
    </section>

</x-layout>