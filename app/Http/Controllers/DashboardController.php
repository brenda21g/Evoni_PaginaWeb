<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Guest;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'total_eventos'   => Evento::count(),
            'total_invitados' => Guest::count(),
            'confirmados'     => Guest::where('estatus', 'Confirmado')->count(),
            'pendientes'      => Guest::where('estatus', 'En espera')->count(),
            'rechazados'      => Guest::where('estatus', 'Rechazado')->count(),
            'total_tareas'    => Task::count(),
            'tareas_done'     => Task::where('estado', 'completada')->count(),
        ]);
    }
}
