<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;

// Página pública
Route::get('/', function () {
    return view('inicio');
})->name('inicio');

// Registro
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);

// Rutas protegidas
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Eventos
    Route::resource('eventos', EventoController::class)->except(['show']);
    Route::get('eventos/{id}/show', [EventoController::class, 'show'])->name('eventos.show');

    // Invitados
    Route::resource('guests', GuestController::class);

    // Tareas
    Route::resource('tasks', TaskController::class);
    Route::post('tasks/{id}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');

    // Presupuestos
    Route::get('eventos/{id}/budgets', [BudgetController::class, 'index'])->name('budgets.index');
    Route::get('eventos/{id}/budgets/create', [BudgetController::class, 'create'])->name('budgets.create');
    Route::post('eventos/{id}/budgets', [BudgetController::class, 'store'])->name('budgets.store');
    Route::post('budgets/{id}/items', [BudgetController::class, 'storeItem'])->name('budgets.items.store');
});

// Rutas de Breeze
require __DIR__.'/auth.php';
