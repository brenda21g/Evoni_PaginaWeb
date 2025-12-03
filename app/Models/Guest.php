<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

   
    protected $table = 'invitados';

    protected $fillable = [
        'evento_id', 
        'nombre', 
        'telefono', 
        'grupo', 
        'mesa', 
        'menu', 
        'nota', 
        'genero', 
        'tipo', 
        'estatus'
    ];

    // Relación con el Evento
    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }
}