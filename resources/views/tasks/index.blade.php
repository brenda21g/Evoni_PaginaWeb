@extends('layouts.app')
@section('content')
<div class="flex items-center justify-between mb-4">
  <h1 class="text-2xl font-semibold text-pink-600">Tareas</h1>
  <a href="{{ route('tasks.create') }}" class="px-4 py-2 text-white bg-pink-600 rounded">Nueva tarea</a>
</div>

<div class="grid gap-4 md:grid-cols-2">
  @foreach($tasks as $t)
  <div class="p-4 bg-white rounded shadow">
    <div class="flex justify-between">
      <div>
        <h3 class="font-semibold">{{ $t->titulo }}</h3>
        <div class="text-xs text-gray-500">{{ $t->fecha_limite }}</div>
      </div>
      <div>
        <form action="{{ route('tasks.toggle',$t->id) }}" method="POST">@csrf <button class="px-3 py-1 bg-{{ $t->estado=='completada'?'green':'yellow' }}-100 rounded">{{ $t->estado }}</button></form>
      </div>
    </div>
    <p class="mt-2 text-gray-600">{{ $t->descripcion }}</p>
  </div>
  @endforeach
</div>
@endsection
