@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between mb-8">
    <h1 class="text-2xl font-semibold text-gray-900">Invitados</h1>

    <a href="{{ route('guests.create') }}"
       class="px-4 py-2 text-sm font-semibold text-white bg-gray-900 rounded-md hover:bg-black transition">
        Agregar invitado
    </a>
</div>

<div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="text-xs font-semibold text-gray-500 border-b">
                <th class="py-3">Nombre</th>
                <th class="py-3">Grupo</th>
                <th class="py-3">Mesa</th>
                <th class="py-3">Estatus</th>
                <th class="py-3 text-right">Acciones</th>
            </tr>
        </thead>

        <tbody class="text-sm text-gray-700">
            @foreach ($guests as $g)
            <tr class="border-b last:border-none hover:bg-gray-50 transition">
                <td class="py-3">{{ $g->nombre }}</td>
                <td>{{ $g->grupo ?? '—' }}</td>
                <td>{{ $g->mesa ?? '—' }}</td>
                <td>
                    <span class="px-3 py-1 text-xs font-medium bg-gray-200 text-gray-700 rounded-full">
                        {{ $g->estatus }}
                    </span>
                </td>
                <td class="text-right">
                    <a href="{{ route('guests.edit', $g->id) }}"
                       class="text-gray-900 font-medium hover:underline">
                        Editar
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
