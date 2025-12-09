<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';

    protected $fillable = [
        'user_id',
        'nombre',
        'fecha',
        'hora',
        'descripcion',
        'imagen',
    ];

    public function invitados()
    {
        return $this->hasMany(Guest::class, 'evento_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'evento_id');
    }

    public function budgets()
    {
        return $this->hasMany(Budget::class, 'evento_id');
    }
}
