<!DOCTYPE html>
<html>
<head>
    <title>Editar evento</title>
    <style>
        body { background:#fff0f7; font-family: Arial; }
        label { color:#ff7bbf; font-weight:bold; }
        input, textarea { border-radius:10px; border:1px solid #ffb3d9; padding:8px; }
        img { width:150px; border-radius:15px; margin-bottom:10px; }
        .btn { background:#ff7bbf; color:white; padding:10px 20px; border:none; border-radius:10px; }
    </style>
</head>
<body>

<h1 style="color:#ff7bbf;">Editar Evento</h1>

<form action="{{ route('eventos.update', $evento->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    @if($evento->imagen)
        <img src="{{ asset('storage/'.$evento->imagen) }}">
    @endif

    <label>Nueva imagen (opcional):</label><br>
    <input type="file" name="imagen"><br><br>

    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="{{ $evento->nombre }}"><br><br>

    <label>Fecha:</label><br>
    <input type="date" name="fecha" value="{{ $evento->fecha }}"><br><br>

    <label>Hora:</label><br>
    <input type="time" name="hora" value="{{ $evento->hora }}"><br><br>

    <label>Descripción:</label><br>
    <textarea name="descripcion">{{ $evento->descripcion }}</textarea><br><br>

    <button class="btn">Actualizar</button>
</form>

</body>
</html>
