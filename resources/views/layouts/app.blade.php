<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','EVONI')</title>

    @vite('resources/css/app.css')

    <style>
        /* Ligero toque extra minimal */
        .nav-link {
            @apply text-sm text-gray-700 hover:text-black transition;
        }

        .btn-mobile {
            @apply p-2 rounded-md hover:bg-gray-200 transition;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-900">
    <header class="bg-white border-b border-gray-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                <!-- LOGO -->
                <div class="flex items-center gap-3">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                        <img src="{{ asset('img/EvoniLogo.jpeg') }}" alt="Evoni" class="w-10 h-10 rounded-md">

                        <span class="text-xl font-semibold tracking-wide text-black">EVONI</span>
                    </a>
                </div>
                <nav class="hidden md:flex items-center gap-6">
                    <a href="{{ route('dashboard') }}" class="nav-link">Inicio</a>
                    <a href="{{ route('eventos.index') }}" class="nav-link">Eventos</a>
                    <a href="{{ route('guests.index') }}" class="nav-link">Invitados</a>
                    <a href="{{ route('tasks.index') }}" class="nav-link">Tareas</a>
                    <a href="{{ route('profile.edit') }}" class="nav-link">Perfil</a>
                </nav>
                <!-- MOBILE BUTTON -->
                <button id="mobile-open" class="md:hidden btn-mobile">
                    <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </header>

 
    <main class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-4 bg-gray-200 text-gray-900 border-l-4 border-black">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('info'))
                <div class="mb-4 p-4 bg-gray-200 text-gray-900 border-l-4 border-gray-700">
                    {{ session('info') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-white border-t border-gray-300 py-6">
        <div class="max-w-7xl mx-auto px-4 text-center text-gray-600 text-sm">
            © {{ date('Y') }} EVONI — Minimal design
        </div>
    </footer>

    <script>
        document.getElementById('mobile-open')?.addEventListener('click', function() {
            alert('Menú móvil pendiente de implementar 🚀');
        });
    </script>

</body>
</html>
