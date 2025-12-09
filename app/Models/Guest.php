<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'invitados';

    protected $fillable = [
        'evento_id', 'nombre', 'telefono', 'grupo', 'mesa', 'menu', 'nota', 'genero', 'tipo', 'estatus'
    ];

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }
}
