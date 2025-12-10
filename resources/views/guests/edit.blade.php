@extends('layouts.app')

@section('content')
<div class="max-w-3xl p-10 mx-auto mt-12 bg-white border border-gray-200 shadow-sm rounded-xl">

    <h1 class="mb-8 text-2xl font-semibold text-gray-900">
        Editar invitado
    </h1>

    <form action="{{ route('guests.update', $guest->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" name="nombre" value="{{ $guest->nombre }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">Mesa</label>
            <input type="text" name="mesa" value="{{ $guest->mesa }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">Estatus</label>
            <div class="flex gap-6 text-gray-700">
                <label><input type="radio" name="estatus" value="En espera" {{ $guest->estatus == 'En espera' ? 'checked' : '' }}> En espera</label>
                <label><input type="radio" name="estatus" value="Confirmado" {{ $guest->estatus == 'Confirmado' ? 'checked' : '' }}> Confirmado</label>
                <label><input type="radio" name="estatus" value="Rechazado" {{ $guest->estatus == 'Rechazado' ? 'checked' : '' }}> Rechazado</label>
            </div>
        </div>

        <div class="flex justify-between pt-4">
            <a href="{{ route('guests.index') }}" class="px-5 py-2 text-gray-700 border border-gray-400 rounded-lg hover:bg-gray-100">
                Cancelar
            </a>

            <button class="px-6 py-2 text-white bg-black rounded-lg hover:bg-gray-800">
                Guardar cambios
            </button>
        </div>

    </form>
</div>
@endsection
