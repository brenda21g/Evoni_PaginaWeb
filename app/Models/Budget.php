<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $fillable = ['user_id', 'evento_id', 'nombre', 'total'];

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }

    public function items()
    {
        return $this->hasMany(BudgetItem::class, 'budget_id');
    }
}
