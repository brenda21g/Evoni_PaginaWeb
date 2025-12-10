@extends('layouts.app')
@section('content')

<div class="grid grid-cols-1 gap-6 md:grid-cols-3">

    {{-- COLUMNA IZQUIERDA --}}
    <div class="md:col-span-2 space-y-4">

        {{-- Tarjeta del evento --}}
        <div class="p-6 bg-white rounded-lg shadow">
            @if($evento->imagen)
                <img src="{{ asset('storage/'.$evento->imagen) }}" 
                     class="object-cover w-full h-64 rounded mb-4">
            @endif

            <h1 class="text-3xl font-semibold text-black">{{ $evento->nombre }}</h1>

            <div class="mt-1 text-sm text-gray-500">
                {{ $evento->fecha }} · {{ $evento->hora }}
            </div>

            <p class="mt-4 text-gray-700 leading-relaxed">
                {{ $evento->descripcion }}
            </p>
        </div>

        {{-- Invitados --}}
        <div class="p-6 bg-white rounded-lg shadow">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-800">Invitados</h2>
                <a href="{{ route('guests.create') }}" 
                   class="px-3 py-1 text-white bg-gray-600 rounded">
                    Agregar invitado
                </a>
            </div>

            <div class="mt-4 divide-y">
                @foreach($evento->invitados as $g)
                    <div class="flex items-center justify-between py-3">
                        <div>
                            <div class="font-semibold text-gray-800">{{ $g->nombre }}</div>
                            <div class="text-xs text-gray-500">
                                {{ $g->grupo }} · Mesa: {{ $g->mesa }}
                            </div>
                        </div>

                        <a href="{{ route('guests.edit', $g->id) }}" 
                           class="text-blue-600 text-sm">
                            Editar
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    {{-- COLUMNA DERECHA --}}
    <aside class="space-y-4">

        {{-- Resumen --}}
        <div class="p-6 bg-white rounded-lg shadow">
            <h3 class="text-sm text-gray-500">Resumen</h3>
            <div class="mt-2 text-3xl font-bold text-gray-600">
                {{ $evento->invitados->count() }}
            </div>
            <div class="text-sm text-gray-500">invitados registrados</div>
        </div>

        {{-- Acciones --}}
        <div class="p-6 bg-white rounded-lg shadow">
            <h3 class="text-sm text-gray-500">Acciones</h3>

            <a href="{{ route('eventos.edit', $evento->id) }}" 
               class="block px-3 py-2 mt-3 text-center text-gray-800 bg-gray-100 rounded">
                Editar evento
            </a>
        </div>

    </aside>

</div>

@endsection
