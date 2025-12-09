@extends('layouts.app')
@section('content')
<div class="flex items-center justify-between mb-6">
  <h1 class="text-2xl font-semibold text-pink-600">Eventos</h1>
  <a href="{{ route('eventos.create') }}" class="px-4 py-2 text-white bg-pink-600 rounded">Agregar evento</a>
</div>

<div class="grid grid-cols-1 gap-6 md:grid-cols-3">
@foreach($eventos as $ev)
  <div class="overflow-hidden bg-white rounded-lg shadow">
    @if($ev->imagen)
      <img src="{{ asset('storage/'.$ev->imagen) }}" class="object-cover w-full h-48">
    @else
      <div class="flex items-center justify-center h-48 text-pink-300 bg-gradient-to-r from-pink-100 to-pink-50">Sin imagen</div>
    @endif
    <div class="p-4">
      <h3 class="text-lg font-semibold">{{ $ev->nombre }}</h3>
      <p class="text-sm text-gray-500">{{ $ev->fecha }} · {{ $ev->hora }}</p>
      <p class="mt-2 text-gray-700">{{ Str::limit($ev->descripcion, 120) }}</p>

      <div class="flex gap-2 mt-4">
        <a href="{{ route('eventos.edit', $ev->id) }}" class="px-3 py-1 text-yellow-800 bg-yellow-100 rounded">Editar</a>
        <form action="{{ route('eventos.destroy', $ev->id) }}" method="POST" onsubmit="return confirm('Eliminar evento?');">
          @csrf @method('DELETE')
          <button type="submit" class="px-3 py-1 text-red-800 bg-red-100 rounded">Eliminar</button>
        </form>
        <a href="{{ route('eventos.show', $ev->id) }}" class="px-3 py-1 text-blue-800 bg-blue-100 rounded">Ver</a>
      </div>
    </div>
  </div>
@endforeach
</div>
@endsection
