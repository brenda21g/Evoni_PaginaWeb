@extends('layouts.app')

@section('content')
<div class="max-w-3xl p-8 mx-auto mt-10 bg-white rounded-lg shadow-md">

    <h1 class="mb-6 text-2xl font-bold text-pink-600">Editar invitado</h1>

    <form action="{{ route('guests.update', $guest->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nombre -->
        <div class="mb-4">
            <label class="block font-semibold">Nombre del invitado</label>
            <input type="text" name="nombre" value="{{ $guest->nombre }}" 
                class="w-full p-2 mt-1 border rounded">
        </div>

        <!-- Mesa -->
        <div class="mb-4">
            <label class="block font-semibold">Mesa</label>
            <input type="text" name="mesa" value="{{ $guest->mesa }}" 
                class="w-full p-2 mt-1 border rounded">
        </div>

        <!-- Evento -->
        <div class="mb-4">
            <label class="block font-semibold">Evento</label>
            <select name="evento_id" class="w-full p-2 mt-1 border rounded">
                @foreach ($eventos as $evento)
                    <option value="{{ $evento->id }}"
                        {{ $guest->evento_id == $evento->id ? 'selected' : '' }}>
                        {{ $evento->titulo }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Botones -->
        <div class="flex justify-between mt-6">
            <a href="{{ route('guests.index') }}" 
               class="px-4 py-2 text-white bg-gray-400 rounded">
                Cancelar
            </a>

            <button class="px-4 py-2 text-white bg-pink-600 rounded hover:bg-pink-700">
                Guardar cambios
            </button>
        </div>

    </form>
</div>
@endsection
