@extends('layouts.app')

@section('content')
<div style="padding: 40px">

    <h1 style="font-size: 32px; font-weight: bold; margin-bottom: 20px;">
        Dashboard
    </h1>

    <div style="background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 3px 8px rgba(0,0,0,0.1);">

        <h2 style="font-size: 22px; margin-bottom: 10px;">Tus eventos</h2>

        <p><strong>Total eventos:</strong> {{ $totalEventos }}</p>

        <h3 style="margin-top: 20px">Próximos eventos:</h3>

        <ul>
            @foreach($proximos as $ev)
                <li>{{ $ev->titulo }} — {{ $ev->fecha }}</li>
            @endforeach
        </ul>

        <br>

        <a href="{{ route('eventos.index') }}" 
           style="display:inline-block; padding: 10px 20px; background:#ff66a3; color:white; border-radius:8px;">
            Ver todos los eventos
        </a>

    </div>
</div>
@endsection
