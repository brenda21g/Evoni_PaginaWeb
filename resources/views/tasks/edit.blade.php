@extends('layouts.app')

@section('content')
<div class="max-w-3xl p-8 mx-auto mt-10 bg-white rounded-lg shadow">

    <h1 class="mb-6 text-2xl font-semibold">Editar tarea</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="font-semibold">Título</label>
            <input type="text" name="titulo" value="{{ $task->titulo }}" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="font-semibold">Evento</label>
            <select name="evento_id" class="w-full p-2 border rounded">
                @foreach($eventos as $e)
                    <option value="{{ $e->id }}" {{ $task->evento_id == $e->id ? 'selected' : '' }}>
                        {{ $e->titulo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Fecha límite</label>
            <input type="date" name="fecha_limite" value="{{ $task->fecha_limite }}" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="font-semibold">Descripción</label>
            <textarea name="descripcion" class="w-full p-2 border rounded">{{ $task->descripcion }}</textarea>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Estado</label>
            <select name="estado" class="w-full p-2 border rounded">
                <option value="pendiente" {{ $task->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="completada" {{ $task->estado == 'completada' ? 'selected' : '' }}>Completada</option>
            </select>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('tasks.index') }}" class="px-4 py-2 bg-gray-300 rounded">Cancelar</a>
            <button class="px-4 py-2 text-white bg-black rounded">Guardar cambios</button>
        </div>

    </form>

</div>
@endsection
