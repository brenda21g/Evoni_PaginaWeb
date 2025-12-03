<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVONI - Gestor de Eventos</title>
        <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
          theme: {
            extend: {
              colors: {
                'evoni-pink': '#FADadd',      
                'evoni-pink-dark': '#F472B6',  
                'evoni-green': '#dcfce7',      
                'evoni-green-dark': '#16a34a', 
                'evoni-black': '#1a1a1a',      
              }
            }
          }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="min-h-screen bg-gray-50 text-gray-800">
    <header class="bg-evoni-pink px-6 py-4 flex justify-between items-center shadow-md">
        <div class="flex items-center gap-3">
           <img src="{{ asset('img/evoni.jpg') }}" 
     alt="Logo Evoni" 
     class="h-10 w-auto object-contain rounded-md border border-black">
            <span class="text-3xl font-bold tracking-widest text-black uppercase">EVONI</span>
        </div>
                <nav class="flex gap-6">
            <a href="{{ route('guests.index') }}" class="text-black font-bold text-lg hover:text-gray-600 transition">
                Home
            </a>
        </nav>
    </header>
    <main class="container mx-auto p-4 md:p-8">
        
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm flex justify-between items-center animate-pulse" role="alert">
                <div>
                    <strong class="font-bold">¡Hecho!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            </div>
        @endif
        @yield('content')

    </main>
    <footer class="text-center py-8 text-gray-400 text-sm mt-auto">
        &copy; {{ date('Y') }} EVONI - Tu Organizador de Eventos
    </footer>

</body>
</html>