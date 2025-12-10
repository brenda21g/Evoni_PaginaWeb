@extends('layouts.app')
@section('content')
<h1 class="mb-4 text-2xl font-semibold text-gary-600">Editar Evento</h1>

<form action="{{ route('eventos.update', $evento->id) }}" 
      method="POST" 
      enctype="multipart/form-data" 
      class="p-6 bg-white rounded shadow">

    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

        <div>
            <label class="block text-sm text-gray-700">Nombre</label>
            <input name="nombre" 
                   class="w-full px-3 py-2 border rounded"
                   value="{{ old('nombre', $evento->nombre) }}">
        </div>

        <div>
            <label class="block text-sm text-gray-700">Fecha</label>
            <input name="fecha" 
                   type="date"
                   class="w-full px-3 py-2 border rounded"
                   value="{{ old('fecha', $evento->fecha) }}">
        </div>

        <div>
            <label class="block text-sm text-gray-700">Hora</label>
            <input name="hora" 
                   type="time"
                   class="w-full px-3 py-2 border rounded"
                   value="{{ old('hora', $evento->hora) }}">
        </div>

        <div>
            <label class="block text-sm text-gray-700">Imagen</label>
            <input name="imagen" type="file" class="w-full">

            @if($evento->imagen)
            <p class="mt-2 text-sm text-gray-600">Imagen actual:</p>
            <img src="{{ asset('storage/' . $evento->imagen) }}" 
                 class="object-cover w-32 h-32 mt-1 rounded">
            @endif
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm text-gray-700">Descripción</label>
            <textarea name="descripcion" 
                      rows="4"
                      class="w-full px-3 py-2 border rounded">{{ old('descripcion', $evento->descripcion) }}</textarea>
        </div>
    </div>

    <div class="mt-4">
        <button class="px-4 py-2 text-white bg-gray-700 rounded">Actualizar</button>
        <a href="{{ route('eventos.index') }}" class="ml-2 text-gray-600">Cancelar</a>
    </div>

</form>
@endsection
