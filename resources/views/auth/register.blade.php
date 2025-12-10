<x-guest-layout>
    <div class="max-w-md p-6 mx-auto mt-10 bg-white rounded shadow">

        <h1 class="mb-4 text-2xl font-bold text-center">Crear cuenta</h1>

        @if ($errors->any())
            <div class="p-3 mb-4 text-red-700 bg-red-100 rounded">
                <ul class="pl-5 list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ESTA ES LA RUTA CORRECTA --}}
        <form action="{{ route('register') }}" method="POST">
            @csrf

            <label class="block mb-2 font-medium">Nombre</label>
            <input type="text" name="name" value="{{ old('name') }}" required
                   class="w-full p-2 mb-4 border rounded">

            <label class="block mb-2 font-medium">Correo electrónico</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                   class="w-full p-2 mb-4 border rounded">

            <label class="block mb-2 font-medium">Contraseña</label>
            <input type="password" name="password" required
                   class="w-full p-2 mb-4 border rounded">

            <label class="block mb-2 font-medium">Confirmar contraseña</label>
            <input type="password" name="password_confirmation" required
                   class="w-full p-2 mb-4 border rounded">

            <button class="w-full p-2 text-white bg-pink-600 rounded hover:bg-pink-700">
                Crear cuenta
            </button>
        </form>

        <p class="mt-4 text-center">
            ¿Ya tienes cuenta?
            <a href="{{ route('login') }}" class="font-semibold text-pink-600">Iniciar sesión</a>
        </p>

    </div>
</x-guest-layout>
