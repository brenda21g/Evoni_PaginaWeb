@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold text-black">Tareas</h1>
    <a href="{{ route('tasks.create') }}" class="px-4 py-2 text-white bg-black rounded">
        Nueva tarea
    </a>
</div>

<div class="grid gap-4 md:grid-cols-2">
    @foreach($tasks as $t)
    <div class="p-4 bg-white rounded shadow">
        <div class="flex justify-between">
            <div>
                <h3 class="font-semibold">{{ $t->titulo }}</h3>
                <div class="text-xs text-gray-500">
                    Evento: {{ $t->evento->titulo }}
                </div>
                <div class="text-xs text-gray-500">
                    Fecha límite: {{ $t->fecha_limite ?? '—' }}
                </div>
            </div>

            <div>
                <form action="{{ route('tasks.toggle', $t->id) }}" method="POST">
                    @csrf
                    <button class="px-3 py-1 bg-gray-200 rounded">
                        {{ $t->estado }}
                    </button>
                </form>
            </div>
        </div>

        <p class="mt-2 text-gray-600">{{ $t->descripcion }}</p>

        <div class="flex justify-end gap-3 mt-3">
            <a href="{{ route('tasks.edit', $t->id) }}" class="text-blue-600">Editar</a>

            <form action="{{ route('tasks.destroy', $t->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="text-red-600">Eliminar</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection
