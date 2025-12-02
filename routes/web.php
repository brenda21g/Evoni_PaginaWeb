<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController; 

Route::get('/', function () {
    return redirect()->route('guests.index');
});

// Ruta de recursos para los invitados
Route::resource('guests', GuestController::class);