@extends('layouts.app')

@section('content')
<div class="max-w-3xl p-8 mx-auto mt-10 bg-white rounded-lg shadow-md">

    <h1 class="mb-6 text-2xl font-bold text-gray-700">Crear nueva tarea</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold">Título *</label>
            <input type="text" name="titulo" required class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Evento *</label>
            <select name="evento_id" required class="w-full p-2 border rounded">
                <option value="">-- Selecciona un evento --</option>
                @foreach ($eventos as $e)
                    <option value="{{ $e->id }}">{{ $e->titulo }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Fecha límite</label>
            <input type="date" name="fecha_limite" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Descripción</label>
            <textarea name="descripcion" class="w-full p-2 border rounded"></textarea>
        </div>

        <div class="flex justify-between mt-6">
            <a href="{{ route('tasks.index') }}" class="px-4 py-2 text-gray-700 bg-gray-200 rounded">
                Cancelar
            </a>

            <button class="px-4 py-2 text-white bg-black rounded">
                Guardar
            </button>
        </div>

    </form>
</div>
@endsection
