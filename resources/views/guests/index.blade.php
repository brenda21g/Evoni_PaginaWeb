@extends('layouts.app')
@section('content')
<div class="flex items-center justify-between mb-4">
  <h1 class="text-2xl font-semibold text-pink-600">Invitados</h1>
  <a href="{{ route('guests.create') }}" class="px-4 py-2 text-white bg-pink-600 rounded">Agregar invitado</a>
</div>

<div class="p-4 bg-white rounded shadow">
  <table class="w-full text-left">
    <thead>
      <tr class="text-sm text-gray-500">
        <th>Nombre</th><th>Grupo</th><th>Mesa</th><th>Estatus</th><th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($guests as $g)
       <tr class="border-t">
         <td>{{ $g->nombre }}</td>
         <td>{{ $g->grupo }}</td>
         <td>{{ $g->mesa }}</td>
         <td>{{ $g->estatus }}</td>
         <td class="text-right">
           <a href="{{ route('guests.edit', $g->id) }}" class="text-blue-600">Editar</a>
         </td>
       </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
