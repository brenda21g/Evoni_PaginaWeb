<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Evento;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::with('evento')
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('guests.index', compact('guests'));
    }

    public function create()
    {
        // La tabla eventos usa "nombre", no "titulo"
        $eventos = Evento::orderBy('nombre')->get();
        return view('guests.create', compact('eventos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'evento_id' => 'required|exists:eventos,id',
            'nombre' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'grupo' => 'nullable|string|max:255',
            'mesa' => 'nullable|string|max:255',
            'menu' => 'nullable|string|max:255',
            'nota' => 'nullable|string|max:255',
            'genero' => 'required|string',
            'tipo' => 'required|string',
            'estatus' => 'required|in:En espera,Confirmado,Rechazado',
        ]);

        Guest::create([
            'evento_id' => $request->evento_id,
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'grupo' => $request->grupo,
            'mesa' => $request->mesa,
            'menu' => $request->menu,
            'nota' => $request->nota,
            'genero' => $request->genero,
            'tipo' => $request->tipo,
            'estatus' => $request->estatus,
        ]);

        return redirect()->route('guests.index')
                         ->with('success', 'Invitado agregado');
    }

    public function edit($id)
    {
        $guest = Guest::findOrFail($id);
        $eventos = Evento::orderBy('nombre')->get();
        return view('guests.edit', compact('guest','eventos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'evento_id' => 'required|exists:eventos,id',
            'nombre' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'grupo' => 'nullable|string|max:255',
            'mesa' => 'nullable|string|max:255',
            'menu' => 'nullable|string|max:255',
            'nota' => 'nullable|string|max:255',
            'genero' => 'required|string',
            'tipo' => 'required|string',
            'estatus' => 'required|in:En espera,Confirmado,Rechazado',
        ]);

        $guest = Guest::findOrFail($id);

        $guest->update([
            'evento_id' => $request->evento_id,
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'grupo' => $request->grupo,
            'mesa' => $request->mesa,
            'menu' => $request->menu,
            'nota' => $request->nota,
            'genero' => $request->genero,
            'tipo' => $request->tipo,
            'estatus' => $request->estatus,
        ]);

        return redirect()->route('guests.index')
                         ->with('success', 'Invitado actualizado');
    }

    public function destroy($id)
    {
        $guest = Guest::findOrFail($id);
        $guest->delete();

        return redirect()->route('guests.index')
                         ->with('success', 'Invitado eliminado');
    }
}
