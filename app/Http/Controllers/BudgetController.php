<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\BudgetItem;
use App\Models\Evento;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function index($eventoId)
    {
        $evento = Evento::findOrFail($eventoId);
        $budgets = $evento->budgets()->with('items')->get();
        return view('budgets.index', compact('budgets','evento'));
    }

    public function create($eventoId)
    {
        $evento = Evento::findOrFail($eventoId);
        return view('budgets.create', compact('evento'));
    }

    public function store(Request $request, $eventoId)
    {
        $evento = Evento::findOrFail($eventoId);

        $request->validate(['nombre'=>'required']);

        $budget = Budget::create([
            'user_id' => auth()->id() ?? 1,
            'evento_id' => $eventoId,
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('budgets.index', $eventoId)->with('success','Presupuesto creado');
    }

    public function storeItem(Request $request, $budgetId)
    {
        $request->validate([
            'descripcion' => 'required',
            'monto' => 'required|numeric'
        ]);

        $item = BudgetItem::create([
            'budget_id' => $budgetId,
            'descripcion' => $request->descripcion,
            'categoria' => $request->categoria,
            'monto' => $request->monto,
            'estado' => $request->estado ?? 'pendiente'
        ]);

        // actualizar total
        $budget = $item->budget;
        $budget->total = $budget->items()->sum('monto');
        $budget->save();

        return back()->with('success','Partida agregada');
    }
}
