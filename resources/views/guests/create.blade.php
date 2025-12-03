@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="bg-pink-200 px-6 py-4 flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">Agregar Invitado</h2>
            <a href="{{ route('guests.index') }}" class="text-gray-800 font-bold">Volver</a>
        </div>

        <form action="{{ route('guests.store') }}" method="POST" class="p-6 grid grid-cols-1 md:grid-cols-2 gap-8">
            @csrf
            <div class="space-y-6">
                <div>
                    <label class="font-bold block mb-1">Nombre</label>
                    <input type="text" name="nombre" required class="w-full bg-pink-50 rounded-full px-4 py-2 border-none">
                </div>
                
                <div>
                    <label class="font-bold block mb-1">Nota</label>
                    <input type="text" name="nota" class="w-full bg-pink-50 rounded-full px-4 py-2 border-none">
                </div>

                <div>
                    <label class="font-bold block mb-1">Tipo</label>
                    <div class="flex gap-2">
                        <label><input type="radio" name="tipo" value="Adulto" checked> Adulto</label>
                        <label><input type="radio" name="tipo" value="Niño"> Niño</label>
                        <label><input type="radio" name="tipo" value="Bebé"> Bebé</label>
                    </div>
                </div>

                <div>
                    <label class="font-bold block mb-1">Género (Color Tarjeta)</label>
                    <div class="flex gap-2">
                        <label><input type="radio" name="genero" value="Hombre" checked> Hombre (Verde)</label>
                        <label><input type="radio" name="genero" value="Mujer"> Mujer (Rosa)</label>
                    </div>
                </div>
            </div>

            <!-- Columna Derecha -->
            <div class="space-y-6">
                <div>
                    <label class="font-bold block mb-1">Mesa</label>
                    <select name="mesa" class="w-full bg-pink-50 rounded-lg px-4 py-2 border-none">
                        <option value="">Sin asignar</option>
                        <option value="Principal">Mesa Principal</option>
                        <option value="Redonda">Mesa Redonda</option>
                        <option value="Cuadrada">Mesa Cuadrada</option>
                    </select>
                </div>

                <div>
                    <label class="font-bold block mb-1">Grupo</label>
                    <select name="grupo" class="w-full bg-pink-50 rounded-lg px-4 py-2 border-none">
                        <option value="">Sin grupo</option>
                        <option value="Familia">Familia</option>
                        <option value="Amigos">Amigos</option>
                        <option value="Trabajo">Trabajo</option>
                    </select>
                </div>
                
                <div class="pt-6 text-right">
                    <button type="submit" class="bg-pink-400 text-white px-8 py-2 rounded-full font-bold hover:bg-pink-500">
                        Guardar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection