@extends('layouts.app')

@section('content')
<div class="max-w-3xl p-10 mx-auto bg-white border border-gray-200 shadow-sm rounded-xl">

    <h1 class="mb-6 text-2xl font-semibold text-gray-900">Perfil de Usuario</h1>

    @if(session('success'))
        <div class="p-3 mb-4 text-green-700 bg-green-100 border border-green-300 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Datos del usuario -->
    <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium text-gray-700">Nombre</label>
            <input type="text" name="name" value="{{ $user->name }}"
                   class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg">
        </div>

        <div>
            <label class="block font-medium text-gray-700">Correo electrónico</label>
            <input type="email" name="email" value="{{ $user->email }}"
                   class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg">
        </div>

        <div class="pt-4 border-t">
            <h2 class="mb-3 text-lg font-semibold text-gray-800">Cambiar contraseña</h2>

            <label class="block font-medium text-gray-700">Nueva contraseña</label>
            <input type="password" name="password"
                   class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg">

            <label class="block mt-4 font-medium text-gray-700">Confirmar nueva contraseña</label>
            <input type="password" name="password_confirmation"
                   class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg">
        </div>

        <div class="flex justify-between pt-4">
            <a href="{{ route('dashboard') }}" 
               class="px-5 py-2 border border-gray-400 rounded-lg hover:bg-gray-100">
                Cancelar
            </a>

            <button class="px-6 py-2 text-white bg-black rounded-lg hover:bg-gray-800">
                Guardar cambios
            </button>
        </div>
    </form>

    <!-- Cerrar sesión -->
    <form action="{{ route('logout') }}" method="POST" class="mt-8">
        @csrf
        <button class="px-6 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700">
            Cerrar sesión
        </button>
    </form>

</div>
@endsection
