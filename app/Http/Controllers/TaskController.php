<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Evento;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('evento')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $eventos = Evento::all();
        return view('tasks.create', compact('eventos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'evento_id' => 'required|exists:eventos,id',
            'fecha_limite' => 'nullable|date',
            'descripcion' => 'nullable|string'
        ]);

        Task::create([
            'titulo' => $request->titulo,
            'evento_id' => $request->evento_id,
            'fecha_limite' => $request->fecha_limite,
            'descripcion' => $request->descripcion,
            'estado' => 'pendiente'
        ]);

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea creada');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $eventos = Evento::all();

        return view('tasks.edit', compact('task', 'eventos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'evento_id' => 'required|exists:eventos,id',
            'fecha_limite' => 'nullable|date',
            'descripcion' => 'nullable|string',
            'estado' => 'required|in:pendiente,completada'
        ]);

        $task = Task::findOrFail($id);

        $task->update($request->all());

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea actualizada');
    }

    public function toggle($id)
    {
        $task = Task::findOrFail($id);

        $task->estado = $task->estado === 'pendiente'
            ? 'completada'
            : 'pendiente';

        $task->save();

        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        Task::findOrFail($id)->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea eliminada');
    }
}
