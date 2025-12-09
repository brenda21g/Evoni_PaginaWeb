<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Evento;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $userId = auth()->id() ?? 1;
        $evento = Evento::where('user_id', $userId)->first();
        if (!$evento) {
            // redirigir a crear evento si no hay
            return redirect()->route('eventos.create')->with('info','Crea tu primer evento antes de agregar invitados');
        }

        $guests = Guest::where('evento_id', $evento->id)->orderBy('created_at','desc')->get();
        return view('guests.index', compact('guests','evento'));
    }

    public function create()
    {
        $eventos = Evento::all();
        return view('guests.create', compact('eventos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'evento_id' => 'required|exists:eventos,id',
            'nombre' => 'required|string|max:255',
            'telefono' => 'nullable',
            'grupo' => 'nullable',
            'mesa' => 'nullable',
            'menu' => 'nullable',
            'nota' => 'nullable',
            'genero' => 'nullable',
            'tipo' => 'nullable',
            'estatus' => 'nullable',
        ]);

        Guest::create($request->all());
        return redirect()->route('guests.index')->with('success','Invitado agregado');
    }

    public function edit($id)
    {
        $guest = Guest::findOrFail($id);
        $eventos = Evento::all();
        return view('guests.edit', compact('guest','eventos'));
    }

    public function update(Request $request, $id)
    {
        $guest = Guest::findOrFail($id);
        $guest->update($request->all());
        return redirect()->route('guests.index')->with('success','Invitado actualizado');
    }

    public function destroy($id)
    {
        $guest = Guest::findOrFail($id);
        $guest->delete();
        return redirect()->route('guests.index')->with('success','Invitado eliminado');
    }
}
