<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between w-full">
            <!-- Logo EVONI a la izquierda -->
            <div class="flex items-center gap-2">
                <img src="{{ asset('img/evoni.jpg') }}" alt="Evoni" class="w-10 h-10 rounded-md">
                <span class="text-lg font-semibold text-pink-600">EVONI</span>
            </div>
            <!-- Texto "Eventos" centrado -->
            <div class="flex-1 text-center">
                <span class="text-lg font-semibold text-gray-800">Eventos</span>
            </div>
            <!-- Avatar y menú desplegable a la derecha -->
            <div class="flex items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" type="button">
                            <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&color=7F9CF5&background=EBF4FF" alt="Avatar">
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link href="{{ route('profile.edit') }}">
                            {{ __('Cuenta') }}
                        </x-dropdown-link>
                        <x-dropdown-link href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Cerrar Sesión') }}
                        </x-dropdown-link>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Menú lateral con botones grandes -->
                <div class="md:col-span-1">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h3 class="text-lg font-semibold mb-4">Acciones</h3>
                            <div class="space-y-4">
                                <a href="{{ route('tasks.index') }}" class="block w-full bg-pink-500 hover:bg-pink-600 text-white font-bold py-3 px-4 rounded-lg text-center transition duration-300">
                                    Tareas
                                </a>
                                <a href="{{ route('budgets.index', $proximos->first()->id ?? 1) }}" class="block w-full bg-pink-500 hover:bg-pink-600 text-white font-bold py-3 px-4 rounded-lg text-center transition duration-300">
                                    Presupuesto
                                </a>
                                <a href="{{ route('guests.index') }}" class="block w-full bg-pink-500 hover:bg-pink-600 text-white font-bold py-3 px-4 rounded-lg text-center transition duration-300">
                                    Invitados
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contenido principal -->
                <div class="md:col-span-2">
                    <!-- Contador de tiempo del evento más próximo -->
                    @if($proximos->isNotEmpty())
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                            <div class="p-6 text-gray-900">
                                <h3 class="text-lg font-semibold mb-4">Próximo Evento: {{ $proximos->first()->titulo }}</h3>
                                <div id="countdown" class="text-2xl font-bold text-pink-600"></div>
                                <script>
                                    // Función para calcular el tiempo restante
                                    function updateCountdown() {
                                        const eventDate = new Date('{{ $proximos->first()->fecha }}').getTime();
                                        const now = new Date().getTime();
                                        const distance = eventDate - now;

                                        if (distance > 0) {
                                            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                            document.getElementById('countdown').innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
                                        } else {
                                            document.getElementById('countdown').innerHTML = "Evento pasado";
                                        }
                                    }

                                    // Actualizar el contador cada segundo
                                    setInterval(updateCountdown, 1000);
                                    updateCountdown(); // Llamar inmediatamente
                                </script>
                            </div>
                        </div>
                    @endif

                    <!-- Lista de próximos eventos -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h3 class="text-lg font-semibold mb-4">Próximos Eventos</h3>
                            <ul class="space-y-2">
                                @foreach($proximos as $evento)
                                    <li class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                        <span>{{ $evento->titulo }}</span>
                                        <span class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($evento->fecha)->format('d/m/Y') }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            <p class="mt-4 text-sm text-gray-600">Total de eventos: {{ $totalEventos }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
