<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica Veterinaria PetCare</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .gradient-overlay {
            background: linear-gradient(45deg, rgba(22, 101, 52, 0.9) 0%, rgba(16, 185, 129, 0.8) 100%);
        }
    </style>
</head>
<body class="bg-white text-gray-800 scroll-smooth font-nunito">
    <!-- Navbar mejorado -->
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <div class="container max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center space-x-2">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="text-2xl font-bold text-gray-800">PetLa</span>
            </a>

            <!-- Navegación desktop -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="#inicio" class="text-gray-600 hover:text-green-600 transition">Inicio</a>
                <a href="#nosotros" class="text-gray-600 hover:text-green-600 transition">Nosotros</a>
                <a href="#servicios" class="text-gray-600 hover:text-green-600 transition">Servicios</a>
                <a href="#contacto" class="text-gray-600 hover:text-green-600 transition">Contacto</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-green-600 transition">{{ Auth::user()->name }}</a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">Iniciar Sesión</a>
                @endauth
            </nav>

            <!-- Botón menú móvil -->
            <button id="mobileMenuButton" class="md:hidden p-2 text-gray-600">
                <svg id="iconMenu" class="w-6 h-6 block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg id="iconClose" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Menú móvil desplegable -->
        <div id="mobileMenu" class="hidden md:hidden fixed inset-0 bg-white z-40 flex flex-col justify-between p-6">

            <!-- Parte superior: Logo + Cerrar -->
            <div class="flex justify-between items-center mb-6">
                <a href="{{ url('/') }}" class="flex items-center space-x-2">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-lg font-bold text-gray-800">PetLa</span>
                </a>
                <button id="mobileMenuClose" class="text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Menú de navegación centrado debajo del logo -->
            <div class="flex-1 flex flex-col justify-start space-y-4 mt-4">
                <a href="#inicio" class="text-gray-600 hover:text-green-600">Inicio</a>
                <a href="#nosotros" class="text-gray-600 hover:text-green-600">Nosotros</a>
                <a href="#servicios" class="text-gray-600 hover:text-green-600">Servicios</a>
                <a href="#contacto" class="text-gray-600 hover:text-green-600">Contacto</a>
            </div>

            <!-- Botón al final -->
            @guest
                <a href="{{ route('login') }}"
                class="w-full px-4 py-3 bg-green-600 text-white text-center rounded-lg hover:bg-green-700 transition">
                    Iniciar Sesión
                </a>
            @endguest
        </div>
    </header>


    <!-- Hero section mejorada -->
    <section id="inicio" class="relative h-[90vh] flex items-center">
        <div class="absolute inset-0 gradient-overlay"></div>
        <div class="container max-w-7xl mx-auto px-4 relative z-10">
            <div class="flex flex-col md:flex-row items-center justify-between h-full">
                <!-- Texto -->
                <div class="text-white max-w-xl text-center md:text-left">
                    <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                        Cuidado experto para tus compañeros peludos
                    </h1>
                    <p class="text-xl mb-8 opacity-95">
                        Medicina preventiva, emergencias 24/7 y atención especializada
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        <a href="#contacto" class="px-8 py-4 bg-white text-green-600 rounded-full font-semibold hover:bg-opacity-90 transition-transform transform hover:scale-105">
                            Solicitar cita
                        </a>
                        @guest
                        <a href="{{ route('register') }}" class="px-8 py-4 border-2 border-white text-white rounded-full hover:bg-white hover:text-green-600 transition">
                            Crear cuenta
                        </a>
                        @endguest
                    </div>
                </div>

                <!-- Imagen decorativa -->
                <div class="mt-12 md:mt-0 md:ml-8 w-full md:w-[50%] flex justify-center">
                    <img src="https://mascotas365.com/wp-content/uploads/2024/07/img-home-1-1536x936.png"
                        alt="Mascota feliz"
                        class="w-[500px] max-w-full object-contain"
                        loading="lazy">
                </div>
            </div>
        </div>
    </section>


    <!-- Sección Nosotros completa -->
    <section id="nosotros" class="py-20 bg-gray-50">
        <div class="container max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="relative rounded-2xl overflow-hidden shadow-lg">
                    <img src="https://facultades.unab.cl/cienciasdelavida/wp-content/uploads/2022/02/Medicina-Veterinaria.webp" alt="Equipo veterinario" 
                         class="w-full h-full object-cover" loading="lazy">
                </div>
                
                <div class="space-y-6">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Nuestra Pasión por los Animales</h2>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        En PetCare llevamos más de 15 años brindando cuidado especializado a mascotas. 
                        Nuestro equipo de veterinarios certificados combina tecnología de última generación 
                        con un enfoque compasivo para garantizar el bienestar de tus compañeros peludos.
                    </p>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center space-x-3 p-4 bg-white rounded-lg shadow-sm">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="font-semibold">Atención 24/7</span>
                        </div>
                        <div class="flex items-center space-x-3 p-4 bg-white rounded-lg shadow-sm">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                            <span class="font-semibold">Equipos Modernos</span>
                        </div>
                        <!-- Agregar más características -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección Servicios completa -->
    <section id="servicios" class="py-20 bg-white">
        <div class="container max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Nuestros Servicios</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Cuidado integral para todas las etapas de vida de tu mascota</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-all">
                    <div class="w-20 h-20 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                        <img src="https://cdn-icons-png.flaticon.com/512/4365/4365924.png" alt="Consulta" class="w-12 h-12">
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Consulta General</h3>
                    <p class="text-gray-600 mb-4">Exámenes completos y planes de salud personalizados</p>
                    <a href="#contacto" class="text-green-600 font-semibold hover:text-green-700">Agendar →</a>
                </div>
                
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-all">
                    <div class="w-20 h-20 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                        <img src="https://img.icons8.com/color/96/syringe.png" alt="Vacunación" class="w-12 h-12">
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Vacunación</h3>
                    <p class="text-gray-600 mb-4">Programas de vacunación preventiva</p>
                    <a href="#contacto" class="text-green-600 font-semibold hover:text-green-700">Agendar →</a>
                </div>
                
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-all">
                    <div class="w-20 h-20 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                        <img src="https://cdn-icons-png.flaticon.com/512/10165/10165725.png" alt="Cirugía" class="w-12 h-12">
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Cirugías</h3>
                    <p class="text-gray-600 mb-4">Intervenciones quirúrgicas de alta complejidad</p>
                    <a href="#contacto" class="text-green-600 font-semibold hover:text-green-700">Agendar →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección Contacto completa -->
    <section id="contacto" class="py-20 bg-gray-50">
        <div class="container max-w-7xl mx-auto px-4">
            <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12">
                <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 text-gray-800">Contáctanos</h2>
                <div class="grid md:grid-cols-2 gap-12">
                    <form class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nombre completo</label>
                                <input type="text" required class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-green-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Teléfono</label>
                                <input type="tel" required class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-green-500">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Correo electrónico</label>
                            <input type="email" required class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-green-500">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Servicio de interés</label>
                            <select class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-green-500">
                                <option>Consulta General</option>
                                <option>Vacunación</option>
                                <option>Cirugía</option>
                                <option>Emergencia</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Mensaje</label>
                            <textarea rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-green-500"></textarea>
                        </div>
                        
                        <button type="submit" class="w-full bg-green-600 text-white py-4 rounded-lg font-semibold hover:bg-green-700 transition">
                            Enviar Mensaje
                        </button>
                    </form>

                    <div class="space-y-8">
                        <div class="bg-green-50 p-6 rounded-xl">
                            <h3 class="text-xl font-semibold mb-4">Información de Contacto</h3>
                            <div class="space-y-3">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span>Av. Principal 123, Ciudad</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    <span>+1 (555) 123-4567</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="w-full h-80 rounded-xl overflow-hidden shadow-lg">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1634.027369335013!2d-76.3852474402322!3d-13.074201079550619!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91101d8069c35a53%3A0xf168b1de2c77cf6a!2sClinica%20Veterinaria%20Mr.%20Pets%20Sede%20San%20Vicente!5e0!3m2!1ses-419!2spe!4v1748441073794!5m2!1ses-419!2spe" 
                                class="w-full h-full" 
                                style="border:0;" 
                                allowfullscreen 
                                loading="lazy">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Footer --}}
    <footer class="bg-green-700 text-white py-10">
        <div class="container max-w-7xl mx-auto px-4 py-4">
            <div class="grid md:grid-cols-3 gap-8 text-sm">
                {{-- Logo y lema --}}
                <div>
                    <h3 class="text-xl font-bold mb-2">Veterinaria PetLA</h3>
                    <p>Comprometidos con la salud y bienestar de tus mascotas.</p>
                </div>

                {{-- Enlaces rápidos --}}
                <div>
                    <h4 class="font-semibold mb-2">Enlaces rápidos</h4>
                    <ul class="space-y-1">
                        <li><a href="#inicio" class="hover:underline">Inicio</a></li>
                        <li><a href="#servicios" class="hover:underline">Servicios</a></li>
                        <li><a href="#equipo" class="hover:underline">Nuestro equipo</a></li>
                        <li><a href="#contacto" class="hover:underline">Contacto</a></li>
                    </ul>
                </div>

                {{-- Redes sociales --}}
                <div>
                    <h4 class="font-semibold mb-2">Síguenos</h4>
                    <ul class="flex gap-4">
                        <li>
                            <a href="#" class="hover:text-gray-200" aria-label="Facebook">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-facebook"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-gray-200" aria-label="Instagram">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-instagram"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 8a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" /><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /><path d="M16.5 7.5v.01" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-gray-200" aria-label="TikTok">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-tiktok"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M21 7.917v4.034a9.948 9.948 0 0 1 -5 -1.951v4.5a6.5 6.5 0 1 1 -8 -6.326v4.326a2.5 2.5 0 1 0 4 2v-11.5h4.083a6.005 6.005 0 0 0 4.917 4.917z" /></svg>                            
                            </a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-gray-200" aria-label="YouTube">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-brand-youtube"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 3a5 5 0 0 1 5 5v8a5 5 0 0 1 -5 5h-12a5 5 0 0 1 -5 -5v-8a5 5 0 0 1 5 -5zm-9 6v6a1 1 0 0 0 1.514 .857l5 -3a1 1 0 0 0 0 -1.714l-5 -3a1 1 0 0 0 -1.514 .857z" /></svg>                            
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mt-8 text-center text-sm text-gray-300">
                © {{ date('Y') }} PetLA. Todos los derechos reservados.
            </div>
        </div>
    </footer>

    <script>
    const menuBtn = document.getElementById('mobileMenuButton');
    const closeBtn = document.getElementById('mobileMenuClose'); // CORREGIDO
    const mobileMenu = document.getElementById('mobileMenu');
    const iconMenu = document.getElementById('iconMenu');
    const iconClose = document.getElementById('iconClose');

    function toggleMenu() {
        mobileMenu.classList.toggle('hidden');
        iconMenu.classList.toggle('hidden');
        iconClose.classList.toggle('hidden');
    }

    if (menuBtn) {
        menuBtn.addEventListener('click', toggleMenu);
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', toggleMenu);
    }

    // Cierra al hacer clic en cualquier enlace dentro del menú móvil
    document.querySelectorAll('#mobileMenu a').forEach(link => {
        link.addEventListener('click', () => {
            if (!mobileMenu.classList.contains('hidden')) {
                toggleMenu();
            }
        });
    });
</script>

</body>
</html>
