@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-12 bg-white border border-gray-200 rounded-xl p-10 shadow-sm">

    <!-- Título -->
    <h1 class="text-2xl font-semibold text-gray-900 mb-8">
        Editar invitado
    </h1>

    <form action="{{ route('guests.update', $guest->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Nombre -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nombre del invitado</label>
            <input type="text" name="nombre" value="{{ $guest->nombre }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-gray-900 focus:outline-none transition">
        </div>

        <!-- Mesa -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Mesa</label>
            <input type="text" name="mesa" value="{{ $guest->mesa }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-gray-900 focus:outline-none transition">
        </div>

        <!-- Evento -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Evento</label>
            <select name="evento_id"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-gray-900 focus:outline-none transition">
                @foreach ($eventos as $evento)
                    <option value="{{ $evento->id }}" 
                        {{ $guest->evento_id == $evento->id ? 'selected' : '' }}>
                        {{ $evento->titulo }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Botones -->
        <div class="flex justify-between pt-4">

            <a href="{{ route('guests.index') }}"
                class="px-5 py-2 rounded-lg border border-gray-400 text-gray-700 hover:bg-gray-100 transition">
                Cancelar
            </a>

            <button
                class="px-6 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition">
                Guardar cambios
            </button>

        </div>

    </form>
</div>
@endsection
