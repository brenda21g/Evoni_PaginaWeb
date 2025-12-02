<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Evento;
use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function index()
    {
       
        
        $user = Auth::user(); 

        if (!$user) {
            $user = User::first();
        }

        if (!$user) {
            $user = User::create([
                'name' => 'Admin',
                'email' => 'admin@evoni.com',
                'password' => bcrypt('12345678')
            ]);
        }

        Auth::login($user);

    

        $evento = $user->eventos()->first();

        if (!$evento) {
            $evento = Evento::create([
                'user_id' => $user->id,
                'nombre' => 'Mi Boda',
                'fecha' => now(),
                'hora' => '20:00',
                'descripcion' => 'Evento Principal'
            ]);
        }
        
        $guests = $evento->invitados()->orderBy('created_at', 'desc')->get();

        return view('guests.index', compact('guests', 'evento'));
    }

    public function create()
    {
        return view('guests.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required']);

        if (!Auth::check()) {
            $user = User::first();
            if ($user) Auth::login($user);
        }

        $evento = Auth::user()->eventos()->first();

        Guest::create([
            'evento_id' => $evento->id,
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'grupo' => $request->grupo,
            'mesa' => $request->mesa,
            'menu' => $request->menu,
            'nota' => $request->nota,
            'genero' => $request->genero ?? 'Hombre',
            'tipo' => $request->tipo ?? 'Adulto',
            'estatus' => 'En espera'
        ]);

        return redirect()->route('guests.index')->with('success', 'Invitado agregado');
    }

    public function destroy($id)
    {
        $guest = Guest::findOrFail($id);
        $guest->delete();
        return redirect()->route('guests.index')->with('success', 'Eliminado');
    }
}