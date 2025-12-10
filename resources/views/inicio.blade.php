<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVONI | Organización de Eventos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
    .hero-bg {
        background-image: url('https://static.wixstatic.com/media/f41e56_69490bac40b34d00b1b12323f9e4646f~mv2.jpg/v1/fill/w_1169,h_660,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/f41e56_69490bac40b34d00b1b12323f9e4646f~mv2.jpg'); /* tu misma imagen */
        background-size: cover;
        background-position: center;
    }

    .overlay {
        background: rgba(0,0,0,0.55);
    }

    .vertical-text {
        writing-mode: vertical-rl;
        text-orientation: mixed;
        letter-spacing: 4px;
    }
</style>
</head>

<body class="text-white">

    <!-- NAVBAR -->
    <header class="absolute top-0 left-0 z-50 w-full py-6">
        <div class="flex items-center justify-between px-6 mx-auto max-w-7xl">

            <!-- MENÚ -->
            <nav class="space-x-8 text-sm font-semibold">
                <a href="{{ route('inicio') }}" class="hover:text-yellow-400">INICIO</a>
                <a href="/contacto" class="hover:text-yellow-400">CONTACTO</a>
            </nav>

            <!-- LOGO -->
            <div class="text-center">
                <h1 class="text-3xl font-bold tracking-wide">EVONI</h1>
                <p class="text-xs tracking-widest">ORGANIZACIÓN DE EVENTOS</p>
            </div>

            <!-- BOTÓN -->
            <a href="{{ route('login') }}"
             class="px-6 py-2 text-sm font-bold text-black transition bg-white border border-black rounded-md hover:bg-black hover:text-white">
             INICIAR SESIÓN </a>
        </div>
    </header>
<!-- MENÚ -->
<nav class="space-x-8 text-sm font-semibold">
    <a href="{{ route('register') }}" class="hover:text-yellow-400">INICIO</a>  <!-- Actualizamos para que apunte al registro -->
    <a href="{{ route('register') }}" class="hover:text-yellow-400">CONTACTO</a>  <!-- Actualizamos para que apunte al registro -->
</nav>
    <!-- HERO -->
<section class="relative hero-bg">

    <!-- Capa oscura encima de la imagen -->
    <div class="absolute inset-0 overlay"></div>

    <!-- Redes sociales -->
   <div class="absolute z-50 flex flex-col space-y-6 transform -translate-y-1/2 left-10 top-1/2">
        <!-- WhatsApp -->
        <a href="https://wa.me/524495651176" target="_blank" class="text-white hover:text-green-400">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-10 h-10">
                <path d="M20.52 3.48A11.78 11.78 0 0 0 11.99 0C5.37 0 .02 5.36.02 11.98c0 2.11.55 4.17 1.61 6L0 24l6.18-1.62a12.02 12.02 0 0 0 5.81 1.49h.01c6.62 0 11.98-5.36 11.98-11.98a11.9 11.9 0 0 0-3.46-8.41zM12 22.06h-.01a10.1 10.1 0 0 1-5.14-1.41l-.37-.22-3.66.96.98-3.57-.24-.37A10.1 10.1 0 0 1 1.94 12C1.94 6.58 6.58 1.94 12 1.94c2.7 0 5.23 1.05 7.14 2.96a10.04 10.04 0 0 1 2.92 7.1c0 5.42-4.64 10.06-10.06 10.06zm5.54-7.56c-.3-.15-1.77-.87-2.04-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.64.07-.3-.15-1.26-.46-2.4-1.47-.89-.79-1.49-1.76-1.67-2.06-.17-.3-.02-.46.13-.61.14-.14.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.67-1.62-.92-2.22-.24-.58-.48-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.5 0 1.48 1.07 2.91 1.22 3.11.15.2 2.11 3.23 5.11 4.53.71.31 1.27.49 1.7.63.71.23 1.36.2 1.87.12.57-.08 1.77-.72 2.02-1.41.25-.69.25-1.28.17-1.41-.07-.13-.27-.2-.57-.35z"/>
            </svg>
        </a>

        <!-- Instagram -->
        <a href="https://instagram.com" target="_blank" class="text-white hover:text-pink-400">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-10 h-10">
                <path d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm10 2c1.654 0 3 1.346 3 3v10c0 1.654-1.346 3-3 3H7c-1.654 0-3-1.346-3-3V7c0-1.654 1.346-3 3-3h10zm-5 3a5 5 0 1 0 .001 10.001A5 5 0 0 0 12 7zm0 2c1.654 0 3 1.346 3 3s-1.346 3-3 3a3.004 3.004 0 0 1-3-3c0-1.654 1.346-3 3-3zm4.5-.75a1.25 1.25 0 1 0 0-2.5 1.25 1.25 0 0 0 0 2.5z"/>
            </svg>
        </a>
    </div>

    <!-- Texto vertical derecha -->
    <div class="absolute text-sm transform -translate-y-1/2 right-10 top-1/2 vertical-text">
        AGUASCALIENTES, MX
    </div>

    <!-- CONTENIDO CENTRAL CENTRADO -->
    <div class="relative flex items-center justify-center min-h-screen px-6">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="mb-4 text-3xl font-light md:text-5xl">
                Solo lo vas a vivir una vez,
            </h2>

            <h2 class="mb-6 text-3xl font-light md:text-5xl">
                y merece ser
            </h2>

            <h1 class="text-5xl font-semibold tracking-wider md:text-7xl">
                INOLVIDABLE
            </h1>
        </div>
    </div>
</section>

</body>
</html>
