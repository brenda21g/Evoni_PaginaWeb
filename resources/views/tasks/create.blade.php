@extends('layouts.app')

@section('content')
<div class="max-w-3xl p-8 mx-auto mt-10 bg-white rounded-lg shadow-md">

    <h1 class="mb-6 text-2xl font-bold text-gray-600">Crear nueva tarea</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <!-- Título -->
        <div class="mb-4">
            <label class="block font-semibold">Título de la tarea *</label>
            <input type="text" name="titulo" required
                   class="w-full p-2 mt-1 border rounded"
                   placeholder="Ej: Confirmar flores, contratar DJ, etc.">
        </div>

        <!-- Evento obligatorio -->
        <div class="mb-4">
            <label class="block font-semibold text-red-600">
                Evento asociado (OBLIGATORIO)
            </label>

            <select name="evento_id" required 
                class="w-full p-2 mt-1 border border-gray-400 rounded">
                <option value="">-- Selecciona un evento --</option>
                @foreach ($eventos as $evento)
                    <option value="{{ $evento->id }}">
                        {{ $evento->titulo }} - {{ $evento->fecha }}
                    </option>
                @endforeach
            </select>

            @error('evento_id')
                <p class="mt-1 text-sm text-red-500">Debes seleccionar un evento.</p>
            @enderror
        </div>

        <!-- Fecha límite -->
        <div class="mb-4">
            <label class="block font-semibold">Fecha límite</label>
            <input type="date" name="fecha_limite" 
                   class="w-full p-2 mt-1 border rounded">
        </div>

        <!-- Descripción -->
        <div class="mb-4">
            <label class="block font-semibold">Descripción</label>
            <textarea name="descripcion" rows="4"
                      class="w-full p-2 mt-1 border rounded"></textarea>
        </div>

        <!-- Botones -->
        <div class="flex justify-between mt-6">
            <a href="{{ route('tasks.index') }}"
               class="px-4 py-2 text-white bg-gray-400 rounded">
                Cancelar
            </a>

            <button class="px-4 py-2 text-gray-700 bg-gray-400 rounded hover:bg-black">
                Guardar tarea
            </button>
        </div>

    </form>
</div>
@endsection
