@extends('layouts.app')
@section('content')
<div class="grid grid-cols-1 gap-6 md:grid-cols-3">
  <div class="md:col-span-2">
    <div class="p-4 bg-white rounded shadow">
      @if($evento->imagen)
        <img src="{{ asset('storage/'.$evento->imagen) }}" class="object-cover w-full h-64 rounded">
      @endif
      <h1 class="mt-4 text-2xl font-bold">{{ $evento->nombre }}</h1>
      <div class="text-sm text-gray-500">{{ $evento->fecha }} · {{ $evento->hora }}</div>
      <p class="mt-4">{{ $evento->descripcion }}</p>
    </div>

    <div class="p-4 mt-4 bg-white rounded shadow">
      <h2 class="font-semibold">Invitados</h2>
      <a href="{{ route('guests.create') }}" class="inline-block px-3 py-1 mt-2 text-white bg-pink-600 rounded">Agregar invitado</a>
      <div class="mt-3">
        @foreach($evento->invitados as $g)
          <div class="flex justify-between py-2 border-b">
            <div>
              <div class="font-semibold">{{ $g->nombre }}</div>
              <div class="text-xs text-gray-500">{{ $g->grupo }} · Mesa: {{ $g->mesa }}</div>
            </div>
            <div class="text-sm">
              <a href="{{ route('guests.edit', $g->id) }}" class="text-blue-600">Editar</a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <aside class="space-y-4">
    <div class="p-4 bg-white rounded shadow">
      <h3 class="text-sm text-gray-500">Resumen</h3>
      <div class="mt-2 text-lg font-bold">{{ $evento->invitados->count() }} invitados</div>
    </div>
    <div class="p-4 bg-white rounded shadow">
      <h3 class="text-sm text-gray-500">Acciones</h3>
      <a href="{{ route('eventos.edit', $evento->id) }}" class="block px-3 py-1 mt-2 text-yellow-800 bg-yellow-100 rounded">Editar evento</a>
    </div>
  </aside>
</div>
@endsection
