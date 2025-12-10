@extends('layouts.app')

@section('content')

<h1 class="mb-6 text-3xl font-bold text-gray-900">Bienvenido, un gusto volver a tenerte aqui</h1>

<div class="grid grid-cols-1 gap-6 md:grid-cols-3">

    <!-- Eventos -->
    <div class="p-6 bg-white border shadow rounded-xl">
        <h2 class="text-lg font-semibold text-gray-700">Eventos</h2>
        <p class="mt-2 text-4xl font-bold text-gray-900">{{ $total_eventos }}</p>
    </div>

    <!-- Invitados -->
    <div class="p-6 bg-white border shadow rounded-xl">
        <h2 class="text-lg font-semibold text-gray-700">Invitados</h2>
        <p class="mt-2 text-4xl font-bold text-gray-900">{{ $total_invitados }}</p>

        <div class="mt-4 space-y-1 text-sm">
            <p class="text-green-700">✔ Confirmados: {{ $confirmados }}</p>
            <p class="text-yellow-700">⌛ En espera: {{ $pendientes }}</p>
            <p class="text-red-700">✘ Rechazados: {{ $rechazados }}</p>
        </div>
    </div>

    <!-- Tareas -->
    <div class="p-6 bg-white border shadow rounded-xl">
        <h2 class="text-lg font-semibold text-gray-700">Tareas</h2>
        <p class="mt-2 text-4xl font-bold text-gray-900">{{ $total_tareas }}</p>

        <p class="mt-2 text-sm text-green-700">
            ✔ Completadas: {{ $tareas_done }}
        </p>
    </div>
</div>

@endsection
