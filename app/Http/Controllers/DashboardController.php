<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id() ?? 1;
        $eventos = Evento::where('user_id', $userId)->orderBy('fecha','desc')->get();
        // stats
        $totalEventos = $eventos->count();
        $proximos = $eventos->take(3);

        return view('dashboard.index', compact('eventos','totalEventos','proximos'));
    }
}
