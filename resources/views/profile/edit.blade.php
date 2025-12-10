<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <!-- Texto "< BACK" arriba a la izquierda -->
            <div class="mb-4">
                <a href="{{ route('dashboard') }}" class="text-pink-600 hover:text-pink-800 font-semibold">< BACK</a>
            </div>

            <!-- Título centrado -->
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Configurar Cuenta</h1>
            </div>

            <!-- Imagen circular de avatar -->
            <div class="flex justify-center mb-6">
                <img class="w-20 h-20 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&color=7F9CF5&background=EBF4FF" alt="Avatar">
            </div>

            <!-- Formulario -->
            <form method="post" action="{{ route('profile.update') }}" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Campo Nombre -->
                <div>
                    <x-input-label for="name" :value="__('Nombre')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', auth()->user()->name)" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Campo Usuario (Email) -->
                <div>
                    <x-input-label for="email" :value="__('Usuario')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', auth()->user()->email)" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Campo Número de teléfono -->
                <div>
                    <x-input-label for="telefono" :value="__('Número de teléfono')" />
                    <x-text-input id="telefono" name="telefono" type="text" class="mt-1 block w-full" :value="old('telefono', auth()->user()->telefono ?? '')" />
                    <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                </div>

                <!-- Botones -->
                <div class="flex justify-between mt-6">
                    <x-secondary-button type="button" onclick="window.history.back()">Descartar</x-secondary-button>
                    <x-primary-button style="background-color: #ff66a3; border-color: #ff66a3;" onmouseover="this.style.backgroundColor='#e0558a'" onmouseout="this.style.backgroundColor='#ff66a3'">Guardar</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
