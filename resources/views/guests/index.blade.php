@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between mb-8">
    <h1 class="text-2xl font-semibold text-gray-900">Invitados</h1>

    <a href="{{ route('guests.create') }}"
       class="px-4 py-2 text-sm font-semibold text-white transition bg-gray-900 rounded-md hover:bg-black">
        Agregar invitado
    </a>
</div>

@if(session('success'))
    <div class="p-3 mb-4 text-green-700 bg-green-100 border border-green-300 rounded">
        {{ session('success') }}
    </div>
@endif

<div class="p-6 bg-white border border-gray-200 shadow-sm rounded-xl">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="text-xs font-semibold text-gray-500 border-b">
                <th class="py-3">Nombre</th>
                <th class="py-3">Evento</th>
                <th class="py-3">Teléfono</th>
                <th class="py-3">Grupo</th>
                <th class="py-3">Mesa</th>
                <th class="py-3">Estatus</th>
                <th class="py-3 text-right">Acciones</th>
            </tr>
        </thead>

        <tbody class="text-sm text-gray-700">
            @foreach ($guests as $g)
            <tr class="transition border-b last:border-none hover:bg-gray-50">
                <td class="py-3 font-medium">{{ $g->nombre }}</td>

                <td>{{ $g->evento->titulo ?? 'Sin evento' }}</td>

                <td>{{ $g->telefono ?? '—' }}</td>

                <td>{{ $g->grupo ?? '—' }}</td>

                <td>{{ $g->mesa ?? '—' }}</td>

                <td>
                    @php
                        $colors = [
                            'Confirmado' => 'bg-green-200 text-green-800',
                            'En espera'  => 'bg-yellow-200 text-yellow-800',
                            'Rechazado'  => 'bg-red-200 text-red-800',
                        ];
                    @endphp

                    <span class="px-3 py-1 text-xs font-medium rounded-full {{ $colors[$g->estatus] }}">
                        {{ $g->estatus }}
                    </span>
                </td>

                <td class="space-x-4 text-right">

                    <a href="{{ route('guests.edit', $g->id) }}"
                       class="font-medium text-gray-900 hover:underline">
                        Editar
                    </a>

                    <form action="{{ route('guests.destroy', $g->id) }}" method="POST"
                          class="inline-block">
                        @csrf
                        @method('DELETE')

                        <button class="font-medium text-red-600 hover:underline">
                            Eliminar
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
