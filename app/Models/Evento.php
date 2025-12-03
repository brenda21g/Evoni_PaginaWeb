<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = ['user_id', 'nombre', 'fecha', 'hora', 'descripcion'];

    // Relación Inversa: Evento es organizado por Usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación: Evento "tiene" Invitados (Rombo azul del diagrama)
    public function invitados()
    {
        return $this->hasMany(Guest::class, 'evento_id');
    }
}