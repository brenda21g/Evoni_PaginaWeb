@extends('layouts.app')
@section('content')

<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Eventos</h1>
    <a href="{{ route('eventos.create') }}"
       class="px-4 py-2 text-white bg-gray-900 rounded hover:bg-gray-700 transition">
        Agregar evento
    </a>
</div>

<div class="grid grid-cols-1 gap-6 md:grid-cols-3">
@foreach($eventos as $ev)
    <div class="overflow-hidden bg-white border rounded-lg shadow-sm">
        
        {{-- Imagen --}}
        @if($ev->imagen)
            <img src="{{ asset('storage/'.$ev->imagen) }}" 
                 class="object-cover w-full h-48 grayscale">
        @else
            <div class="flex items-center justify-center h-48 text-gray-400 bg-gray-100">
                Sin imagen
            </div>
        @endif

        <div class="p-4">
            <h3 class="text-lg font-semibold text-gray-900">{{ $ev->nombre }}</h3>

            <p class="text-sm text-gray-500">
                {{ $ev->fecha }} · {{ $ev->hora }}
            </p>

            <p class="mt-2 text-gray-700">
                {{ Str::limit($ev->descripcion, 120) }}
            </p>

            <div class="flex gap-2 mt-4">

                {{-- Editar --}}
                <a href="{{ route('eventos.edit', $ev->id) }}"
                   class="px-3 py-1 text-gray-800 bg-gray-200 rounded hover:bg-gray-300 transition">
                    Editar
                </a>

                {{-- Eliminar --}}
                <form action="{{ route('eventos.destroy', $ev->id) }}" 
                      method="POST"
                      onsubmit="return confirm('¿Eliminar evento?');">
                    @csrf @method('DELETE')
                    <button type="submit"
                        class="px-3 py-1 text-white bg-red-600 rounded hover:bg-red-700 transition">
                        Eliminar
                    </button>
                </form>

                {{-- Ver --}}
                <a href="{{ route('eventos.show', $ev->id) }}"
                   class="px-3 py-1 text-white bg-gray-900 rounded hover:bg-gray-700 transition">
                    Ver
                </a>
            </div>
        </div>
    </div>
@endforeach
</div>

@endsection
