@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-12">

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">

        <!-- Header -->
        <div class="border-b border-gray-200 px-6 py-4 flex justify-between items-center">
            <h2 class="text-2xl font-semibold text-gray-900">Agregar Invitado</h2>
            <a href="{{ route('guests.index') }}" class="text-gray-600 hover:text-black font-medium">
                Volver
            </a>
        </div>

        <form action="{{ route('guests.store') }}" method="POST" class="p-6 grid grid-cols-1 md:grid-cols-2 gap-8">
            @csrf

            <!-- Columna izquierda -->
            <div class="space-y-6">

                <div>
                    <label class="font-semibold block mb-1 text-gray-700">Nombre</label>
                    <input type="text" name="nombre" required
                        class="w-full bg-gray-100 rounded-lg px-4 py-2 border border-gray-300 focus:ring-2 focus:ring-black">
                </div>

                <div>
                    <label class="font-semibold block mb-1 text-gray-700">Nota</label>
                    <input type="text" name="nota"
                        class="w-full bg-gray-100 rounded-lg px-4 py-2 border border-gray-300 focus:ring-2 focus:ring-black">
                </div>

                <div>
                    <label class="font-semibold block mb-1 text-gray-700">Tipo</label>
                    <div class="flex gap-6 text-gray-700">
                        <label><input type="radio" name="tipo" value="Adulto" checked> Adulto</label>
                        <label><input type="radio" name="tipo" value="Niño"> Niño</label>
                        <label><input type="radio" name="tipo" value="Bebé"> Bebé</label>
                    </div>
                </div>

                <div>
                    <label class="font-semibold block mb-1 text-gray-700">Género (Color tarjeta)</label>
                    <div class="flex gap-6 text-gray-700">
                        <label><input type="radio" name="genero" value="Hombre" checked> Hombre</label>
                        <label><input type="radio" name="genero" value="Mujer"> Mujer</label>
                    </div>
                </div>

            </div>

            <!-- Columna derecha -->
            <div class="space-y-6">

                <div>
                    <label class="font-semibold block mb-1 text-gray-700">Mesa</label>
                    <select name="mesa"
                        class="w-full bg-gray-100 rounded-lg px-4 py-2 border border-gray-300 focus:ring-2 focus:ring-black">
                        <option value="">Sin asignar</option>
                        <option value="Principal">Mesa Principal</option>
                        <option value="Redonda">Mesa Redonda</option>
                        <option value="Cuadrada">Mesa Cuadrada</option>
                    </select>
                </div>

                <div>
                    <label class="font-semibold block mb-1 text-gray-700">Grupo</label>
                    <select name="grupo"
                        class="w-full bg-gray-100 rounded-lg px-4 py-2 border border-gray-300 focus:ring-2 focus:ring-black">
                        <option value="">Sin grupo</option>
                        <option value="Familia">Familia</option>
                        <option value="Amigos">Amigos</option>
                        <option value="Trabajo">Trabajo</option>
                    </select>
                </div>

                <div class="pt-6 text-right">
                    <button type="submit"
                        class="bg-black text-white px-8 py-2 rounded-lg font-semibold hover:bg-gray-800 transition">
                        Guardar
                    </button>
                </div>

            </div>

        </form>
    </div>
</div>
@endsection
