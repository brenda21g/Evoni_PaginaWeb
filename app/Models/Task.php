<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{protected $fillable = [
    'titulo',
    'evento_id',
    'fecha_limite',
    'descripcion',
    'user_id'
];

public function evento()
{
    return $this->belongsTo(Evento::class);
}

}
