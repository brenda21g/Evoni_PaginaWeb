<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BudgetItem extends Model
{
    protected $fillable = ['budget_id','descripcion','categoria','monto','estado'];

    public function budget()
    {
        return $this->belongsTo(Budget::class, 'budget_id');
    }
}
