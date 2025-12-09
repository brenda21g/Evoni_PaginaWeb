<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','EVONI')</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-[#fff7fb] text-gray-800">
  <header class="bg-white shadow">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center gap-4">
          <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
            <img src="{{ asset('logo.png') }}" alt="Evoni" class="w-10 h-10 rounded-md">
            <span class="text-lg font-semibold text-pink-600">EVONI</span>
          </a>
        </div>
        <nav class="items-center hidden gap-4 md:flex">
          <a href="{{ route('dashboard') }}" class="text-sm text-gray-700 hover:text-pink-600">Inicio</a>
          <a href="{{ route('eventos.index') }}" class="text-sm text-gray-700 hover:text-pink-600">Eventos</a>
          <a href="{{ route('guests.index') }}" class="text-sm text-gray-700 hover:text-pink-600">Invitados</a>
          <a href="{{ route('tasks.index') }}" class="text-sm text-gray-700 hover:text-pink-600">Tareas</a>
          <a href="{{ route('profile.edit') }}" class="text-sm text-gray-700 hover:text-pink-600">Perfil</a>
          
        </nav>

        <!-- mobile menu -->
        <div class="md:hidden">
          <button id="mobile-open" class="p-2">
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
          </button>
        </div>
      </div>
    </div>
  </header>

  <main class="py-8">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
      @if(session('success'))
        <div class="p-4 mb-4 border-l-4 border-green-400 bg-green-50">
          <p class="text-green-700">{{ session('success') }}</p>
        </div>
      @endif
      @if(session('info'))
        <div class="p-4 mb-4 border-l-4 border-blue-400 bg-blue-50">
          <p class="text-blue-700">{{ session('info') }}</p>
        </div>
      @endif

      @yield('content')
    </div>
  </main>

  <footer class="py-6 bg-white border-t">
    <div class="px-4 mx-auto text-sm text-center text-gray-500 max-w-7xl">
      © {{ date('Y') }} EVONI · Hecho con ❤️
    </div>
  </footer>

  <script>
    // minimal mobile menu toggle
    document.getElementById('mobile-open')?.addEventListener('click', function(){
      alert('Usa la versión desktop para navegación o implementa el menú móvil según necesites.');
    });
  </script>
</body>
</html>
