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
            ->orderBy('created_at','desc')
            ->get();

        return view('guests.index', compact('guests'));
    }

    public function create()
    {
        $eventos = Evento::orderBy('titulo')->get();
        return view('guests.create', compact('eventos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'evento_id' => 'required|exists:eventos,id',
            'nombre' => 'required',
            'telefono' => 'nullable',
            'grupo' => 'nullable',
            'mesa' => 'nullable',
            'menu' => 'nullable',
            'nota' => 'nullable',
            'genero' => 'required',
            'tipo' => 'required',
            'estatus' => 'required|in:En espera,Confirmado,Rechazado'
        ]);

        Guest::create($request->all());

        return redirect()->route('guests.index')->with('success','Invitado agregado');
    }

    public function edit($id)
    {
        $guest = Guest::findOrFail($id);
        $eventos = Evento::orderBy('titulo')->get();
        return view('guests.edit', compact('guest','eventos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'evento_id' => 'required|exists:eventos,id',
            'nombre' => 'required',
            'telefono' => 'nullable',
            'grupo' => 'nullable',
            'mesa' => 'nullable',
            'menu' => 'nullable',
            'nota' => 'nullable',
            'genero' => 'required',
            'tipo' => 'required',
            'estatus' => 'required|in:En espera,Confirmado,Rechazado'
        ]);

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
