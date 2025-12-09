<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Evento;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get(); 
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $eventos = Evento::orderBy('fecha', 'asc')->get();
        return view('tasks.create', compact('eventos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'evento_id' => 'required|exists:eventos,id',
            'fecha_limite' => 'nullable|date',
        ]);

        Task::create([
            'titulo' => $request->titulo,
            'evento_id' => $request->evento_id,
            'fecha_limite' => $request->fecha_limite,
            'descripcion' => $request->descripcion,
            'user_id' => auth()->id() ?? 1
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarea creada correctamente');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $eventos = Evento::all();

        return view('tasks.edit', compact('task', 'eventos'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $request->validate([
            'titulo' => 'required',
            'evento_id' => 'required|exists:eventos,id',
            'fecha_limite' => 'nullable|date',
        ]);

        $task->update([
            'titulo' => $request->titulo,
            'evento_id' => $request->evento_id,
            'fecha_limite' => $request->fecha_limite,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada');
    }

    public function destroy($id)
    {
        Task::destroy($id);
        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada');
    }
}
