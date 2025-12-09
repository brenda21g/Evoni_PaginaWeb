<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventoController extends Controller
{
    public function index()
    {
        $userId = auth()->id() ?? 1;
        $eventos = Evento::where('user_id', $userId)->orderBy('fecha','desc')->get();
        return view('eventos.index', compact('eventos'));
    }

    public function create()
    {
        return view('eventos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha' => 'required|date',
            'hora' => 'required',
            'descripcion' => 'nullable',
            'imagen' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:4096'
        ]);

        $ruta = null;
        if ($request->hasFile('imagen')) {
            $ruta = $request->file('imagen')->store('eventos', 'public');
        }

        Evento::create([
            'user_id' => auth()->id() ?? 1,
            'nombre' => $request->nombre,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'descripcion' => $request->descripcion,
            'imagen' => $ruta
        ]);

        return redirect()->route('eventos.index')->with('success','Evento creado');
    }

    public function edit($id)
    {
        $evento = Evento::findOrFail($id);
        return view('eventos.edit', compact('evento'));
    }

    public function update(Request $request, $id)
    {
        $evento = Evento::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha' => 'required|date',
            'hora' => 'required',
            'descripcion' => 'nullable',
            'imagen' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:4096'
        ]);

        if ($request->hasFile('imagen')) {
            // borrar anterior si existe
            if ($evento->imagen && Storage::disk('public')->exists($evento->imagen)) {
                Storage::disk('public')->delete($evento->imagen);
            }
            $evento->imagen = $request->file('imagen')->store('eventos','public');
        }

        $evento->update($request->only(['nombre','fecha','hora','descripcion','imagen']));

        return redirect()->route('eventos.index')->with('success','Evento actualizado');
    }

    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);
        if ($evento->imagen && Storage::disk('public')->exists($evento->imagen)) {
            Storage::disk('public')->delete($evento->imagen);
        }
        $evento->delete();
        return redirect()->route('eventos.index')->with('success','Evento eliminado');
    }

    public function show($id)
    {
        $evento = Evento::with('invitados','tasks','budgets.items')->findOrFail($id);
        return view('eventos.show', compact('evento'));
    }
}
