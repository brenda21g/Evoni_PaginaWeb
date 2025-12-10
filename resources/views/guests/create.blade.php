@extends('layouts.app')

@section('content')
<div class="max-w-4xl px-4 py-12 mx-auto">
    <div class="overflow-hidden bg-white border border-gray-200 shadow-sm rounded-xl">

        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
            <h2 class="text-2xl font-semibold text-gray-900">Agregar Invitado</h2>
            <a href="{{ route('guests.index') }}" class="font-medium text-gray-600 hover:text-black">
                Volver
            </a>
        </div>

        <form action="{{ route('guests.store') }}" method="POST" class="grid grid-cols-1 gap-8 p-6 md:grid-cols-2">
            @csrf

            <div class="space-y-6">

                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Evento asociado</label>
                    <select name="evento_id" required class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg">
                        <option value="">Seleccione un evento</option>
                        @foreach($eventos as $e)
                            <option value="{{ $e->id }}">{{ $e->titulo }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Nombre</label>
                    <input type="text" name="nombre" required class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Nota</label>
                    <input type="text" name="nota" class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Tipo</label>
                    <div class="flex gap-6 text-gray-700">
                        <label><input type="radio" name="tipo" value="Adulto" checked> Adulto</label>
                        <label><input type="radio" name="tipo" value="Niño"> Niño</label>
                        <label><input type="radio" name="tipo" value="Bebé"> Bebé</label>
                    </div>
                </div>

                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Género</label>
                    <div class="flex gap-6 text-gray-700">
                        <label><input type="radio" name="genero" value="Hombre" checked> Hombre</label>
                        <label><input type="radio" name="genero" value="Mujer"> Mujer</label>
                    </div>
                </div>

                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Estatus</label>
                    <div class="flex gap-6 text-gray-700">
                        <label><input type="radio" name="estatus" value="En espera" checked> En espera</label>
                        <label><input type="radio" name="estatus" value="Confirmado"> Confirmado</label>
                        <label><input type="radio" name="estatus" value="Rechazado"> Rechazado</label>
                    </div>
                </div>

            </div>

            <div class="space-y-6">

                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Mesa</label>
                    <input type="text" name="mesa" class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Grupo</label>
                    <input type="text" name="grupo" class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg">
                </div>

                <div class="pt-6 text-right">
                    <button type="submit" class="px-8 py-2 font-semibold text-white bg-black rounded-lg hover:bg-gray-800">
                        Guardar
                    </button>
                </div>

            </div>

        </form>
    </div>
</div>
@endsection
