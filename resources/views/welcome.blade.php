<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>PetLA | Gestión Veterinaria Moderna</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://unpkg.com/lottie-web@5.7.4/build/player/lottie.min.js"></script>
</head>
<body class="bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200 font-sans antialiased selection:bg-[#ffec20] selection:text-white">

<!-- NAVBAR COMPACTO -->
<nav 
    x-data="{ open: false, scrolled: false }" 
    x-init="scrolled = window.scrollY > 10"
    @scroll.window="scrolled = window.scrollY > 10"
    :class="{ 'bg-white dark:bg-gray-900 shadow-md': scrolled }"
    class="fixed w-full z-50 transition-all duration-300 backdrop-blur-sm text-gray-800 dark:text-white"
>
    <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="flex items-center space-x-1">
            <span class="text-lg">🐾</span>
            <span class="text-lg font-semibold text-[#fafafa]">PetLA</span>
        </a>

        <!-- Desktop Links -->
        <div class="hidden md:flex space-x-5 text-sm font-medium">
            <a href="#features" class="hover:text-[#FF2D20]">Características</a>
            <a href="#testimonios" class="hover:text-[#FF2D20]">Testimonios</a>
            <a href="#contacto" class="hover:text-[#FF2D20]">Contacto</a>
        </div>

        <!-- Mobile Toggle -->
        <div class="md:hidden">
            <button @click="open = !open" class="text-2xl focus:outline-none">☰</button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" x-transition
     class="md:hidden bg-transparent dark:bg-transparent px-6 pb-4 text-sm space-y-2">
     <a href="#features" class="block py-2 hover:text-[#FF2D20] transition">Características</a>
    <a href="#testimonios" class="block py-2 hover:text-[#FF2D20] transition">Testimonios</a>
    <a href="#contacto" class="block py-2 hover:text-[#FF2D20] transition">Contacto</a>
    </div>
</nav>


<!-- HERO -->
<section class="bg-gradient-to-br from-indigo-800 via-indigo-900 to-black text-white text-center py-20 px-6 relative">
    <div class="max-w-6xl mx-auto">
        <div id="lottie" class="w-64 h-64 mx-auto mb-6"></div>
        <h1 class="text-4xl font-extrabold mb-4 leading-tight">Transforma tu clínica veterinaria con PetLA</h1>
        <p class="text-lg text-indigo-200 mb-6">Gestión moderna de pacientes, citas, historial y notificaciones en un solo sistema ágil.</p>
        <a href="{{ route('login') }}" class="bg-[#FF2D20] hover:bg-red-600 transition-all transform hover:scale-105 px-6 py-3 rounded-lg text-white font-bold shadow-lg">Probar ahora</a>
    </div>
</section>

<!-- SEPARADOR SVG -->
<svg class="w-full -mb-1" viewBox="0 0 1440 100"><path fill="#fff" d="M0,0 C720,100 720,100 1440,0 L1440,100 L0,100 Z"></path></svg>
<!-- FEATURES -->
<section id="features" class="py-20 bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-12 text-gray-800 dark:text-white" data-aos="fade-up">¿Por qué elegir PetLA?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <!-- Citas fáciles -->
            <div class="bg-white dark:bg-gray-900 p-6 rounded-xl shadow-md hover:shadow-lg hover:scale-105 transform transition duration-300 border border-gray-100 dark:border-gray-800" data-aos="zoom-in">
                <div class="text-4xl text-[#FF2D20] mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-[#FF2D20] mb-4 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div> 
                <h3 class="text-xl font-semibold mb-2">Citas fáciles</h3>
                <p class="text-gray-600 dark:text-gray-300">Calendario visual, edición rápida y recordatorios automáticos.</p>
            </div>

            <!-- Historial completo -->
            <div class="bg-white dark:bg-gray-900 p-6 rounded-xl shadow-md hover:shadow-lg hover:scale-105 transform transition duration-300 border border-gray-100 dark:border-gray-800" data-aos="zoom-in" data-aos-delay="100">
                <div class="text-4xl text-cyan-400 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-10 h-10 text-cyan-400 mb-4 mx-auto"
                         fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 8l0 4l2 2" />
                        <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Historial completo</h3>
                <p class="text-gray-600 dark:text-gray-300">Diagnósticos, tratamientos y evolución clínica al instante.</p>
            </div>

            <!-- Notificaciones -->
            <div class="bg-white dark:bg-gray-900 p-6 rounded-xl shadow-md hover:shadow-lg hover:scale-105 transform transition duration-300 border border-gray-100 dark:border-gray-800" data-aos="zoom-in" data-aos-delay="200">
                <div class="text-4xl text-yellow-400 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-10 h-10 text-yellow-400 mb-4 mx-auto"
                         viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                        <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                        <path d="M21 6.727a11.05 11.05 0 0 0 -2.794 -3.727" />
                        <path d="M3 6.727a11.05 11.05 0 0 1 2.792 -3.727" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Notificaciones</h3>
                <p class="text-gray-600 dark:text-gray-300">Tu cliente recibe todo por SMS o correo automáticamente.</p>
            </div>

        </div>
    </div>
</section>


<section id="testimonios" class="py-20 bg-gradient-to-b from-[#0e1218] to-gray-900 text-center">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-3xl font-bold mb-12 text-white" data-aos="fade-up">Testimonios</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      
      <!-- Testimonio 1 -->
      <div data-aos="zoom-in" class="relative bg-gray-800 p-6 rounded-xl border-t-4 shadow-md hover:shadow-xl hover:scale-105 transition duration-300 group border-[#FF2D20] overflow-hidden">
        <div class="absolute -top-10 -right-6 text-[#FF2D20] text-[120px] opacity-20 group-hover:opacity-40 transition duration-300 leading-none select-none pointer-events-none">❝</div>
        <p class="italic text-sm sm:text-base mb-4 leading-relaxed text-gray-100">
          “Desde que usamos <strong class="text-white">PetLA</strong>, todo está más organizado y los clientes agradecen los recordatorios.”
        </p>
        <p class="text-[#FF2D20] font-semibold">— Clínica Huellitas Felices</p>
      </div>

      <!-- Testimonio 2 -->
      <div data-aos="zoom-in" data-aos-delay="100" class="relative bg-gray-800 p-6 rounded-xl border-t-4 shadow-md hover:shadow-xl hover:scale-105 transition duration-300 group border-cyan-400 overflow-hidden">
        <div class="absolute -top-10 -right-6 text-cyan-400 text-[120px] opacity-20 group-hover:opacity-40 transition duration-300 leading-none select-none pointer-events-none">❝</div>
        <p class="italic text-sm sm:text-base mb-4 leading-relaxed text-gray-100">
          “Agendar citas y llevar el historial nunca fue tan fácil. El sistema es ágil y completo.”
        </p>
        <p class="text-cyan-400 font-semibold">— VetCare Lima</p>
      </div>

      <!-- Testimonio 3 -->
      <div data-aos="zoom-in" data-aos-delay="200" class="relative bg-gray-800 p-6 rounded-xl border-t-4 shadow-md hover:shadow-xl hover:scale-105 transition duration-300 group border-yellow-400 overflow-hidden">
        <div class="absolute -top-10 -right-6 text-yellow-400 text-[120px] opacity-20 group-hover:opacity-40 transition duration-300 leading-none select-none pointer-events-none">❝</div>
        <p class="italic text-sm sm:text-base mb-4 leading-relaxed text-gray-100">
          “Nos encanta la interfaz y los recordatorios automáticos. Lo recomendamos.”
        </p>
        <p class="text-yellow-400 font-semibold">— Patitas Sanas</p>
      </div>

    </div>
  </div>
</section>







<!-- CONTACTO -->
<section id="contacto" class="py-20 bg-gradient-to-b from-gray-900 to-gray-850 text-center">
    <div class="max-w-4xl mx-auto px-6">
        <h2 class="text-3xl font-bold mb-2 text-white">¿Tienes preguntas?</h2>
        <p class="text-gray-400 mb-6">Escríbenos directamente vía WhatsApp.</p>
        
        <a href="https://wa.me/51999999999" target="_blank" class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white px-5 py-3 rounded-lg transition duration-300 transform hover:scale-105">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
                <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
            </svg>
            Chatear por WhatsApp
        </a>
    </div>
</section>




<!-- FOOTER -->
<footer class="bg-[#0c0f1a] text-gray-400 ">
    <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-8 text-sm">
        <!-- Branding -->
        <div>
            <div class="flex items-center mb-3">
                <span class="text-xl">🐾</span>
                <span class="ml-2 text-white text-lg font-semibold">PetLA</span>
            </div>
            <p class="leading-relaxed text-gray-500">Plataforma moderna para clínicas veterinarias. Optimiza citas, historial y comunicación.</p>
        </div>

        <!-- Navegación -->
        <div>
            <h4 class="text-white font-semibold mb-3">Navegación</h4>
            <ul class="space-y-2">
                <li><a href="#features" class="hover:text-white transition">Características</a></li>
                <li><a href="#testimonios" class="hover:text-white transition">Testimonios</a></li>
                <li><a href="#contacto" class="hover:text-white transition">Contacto</a></li>
            </ul>
        </div>

        <!-- Contacto -->
        <div>
            <h4 class="text-white font-semibold mb-3">Contacto</h4>
            <ul class="space-y-2">
                <li class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
                        <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
                    </svg>
                    <a href="https://wa.me/51999999999" target="_blank" class="hover:text-white">WhatsApp</a>
                </li>
                <li class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M8 9h8" />
                        <path d="M8 13h6" />
                        <path d="M13 18l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v6" />
                        <path d="M16 22l5 -5" />
                        <path d="M21 21.5v-4.5h-4.5" />
                    </svg>
                    <a href="mailto:soporte@petla.com" class="hover:text-white">soporte@petla.com</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="border-t border-gray-800 text-center py-4 text-xs text-gray-500">
        © {{ date('Y') }} PetLA — Con cariño por el bienestar animal 🐾
    </div>
</footer>




<script>
    window.addEventListener('load', function () {
        AOS.init();
        lottie.loadAnimation({
            container: document.getElementById('lottie'),
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: 'https://assets2.lottiefiles.com/packages/lf20_ydo1amjm.json'
        });
    });
</script>


</body>
</html>
